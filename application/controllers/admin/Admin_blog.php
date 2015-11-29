<?php
/**
 *
 */
class Admin_blog extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		//$this->load->library(array('form_validation', 'session'));
		$this->load->model('admin/Jobseeker_model', 'jobseeker');
		$this->load->model('admin/Mail_model', 'mail');
		$this->load->model('admin/Admin_api_model', 'api');
		$this->load->model('admin/Blog_model', 'blog');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('UtilModel', 'util');
		$this->lang->load('message', 'vi');
		// $this->load->helper('security');
		if (!$this->session->userdata['user']['isLogged']) {
			redirect(base_url('404'));
			//redirect(base_url() . 'admin/login'); // no session established, kick back to login page
		} else if ($this->session->userdata['user']['role'] != 5 && $this->session->userdata['user']['role'] != 1) {
			//redirect(base_url('error/403'));
			redirect(base_url('404'));
		}
	}

	function getBlog() {
		$user = $this->session->userdata['user'];
		$scripts = array(
			'assets/admin/angularjs/controller/blog.controller.js',
			'assets/admin/angularjs/service/blog.service.js',
		);
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/blog/blog', array('user' => $user), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'blogManager',
			'sub' => 'blogs'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
		));
	}
	function getBlogCategory() {
		$scripts = array(
			'assets/admin/angularjs/controller/blog.controller.js',
			'assets/admin/angularjs/service/blog.service.js',
		);
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/blog/blog-category', array(), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'blogManager',
			'sub' => 'blogCategory'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
		));
	}
	function getCreateBlog() {
		$scripts = array(
			'assets/admin/angularjs/controller/blog.controller.js',
			'assets/admin/angularjs/service/blog.service.js',
			'ckeditor/ckeditor/ckeditor.js',
			'ckeditor/ckfinder/ckfinder.js',
			'server_upload/js/vendor/jquery.ui.widget.js',
			'server_upload/js/jquery.iframe-transport.js',
			'server_upload/js/jquery.fileupload.js',
			'assets/admin/dist/js/admin-blog.js',
			'assets/admin/dist/js/admin-create-blog.js',
		);
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$blogCategory = $this->blog->getListBlogCategory();
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/blog/create-blog', array('csrf' => $csrf, 'blogCategory' => $blogCategory), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'blogManager',
			'sub' => 'createBlog'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
		));
	}

	function getListBlogCategory() {
		$result = $this->blog->getListBlogCategory();
		echo json_encode($result);
	}
	function updateBlogCategory() {
		$category = json_decode($this->input->post('category'), true);
		$result = $this->blog->updateBlogCategory($category);
		//log_message('error', 'category' . json_encode($result));
		echo json_encode($result);
	}
	function deleteBlogCategory() {
		$category = json_decode($this->input->post('category'), true);
		$result = $this->blog->deleteBlogCategory($category);
		//log_message('error', 'category' . json_encode($result));
		echo json_encode($result);
	}
	function createBlogCategory() {
		$category = json_decode($this->input->post('category'), true);
		$result = $this->blog->createBlogCategory($category);
		//log_message('error', 'category' . json_encode($result));
		echo json_encode($result);
	}
	function getListBlog() {
		$result = $this->blog->getListBlog();
		echo json_encode($result);
	}
	function deleteBlog() {
		$blog = json_decode($this->input->post('blog'), true);
		log_message('error', 'value' . json_encode($blog));
		$result = $this->blog->deleteBlog($blog);
		//log_message('error', 'category' . json_encode($result));
		echo json_encode($result);
	}
	function disabledBlog() {
		$blog = json_decode($this->input->post('blog'), true);
		$result = $this->blog->disabledBlog($blog);
		//log_message('error', 'category' . json_encode($result));
		echo json_encode($result);
	}

	function createBlog() {
		$user = $this->session->userdata['user'];
		$this->form_validation->set_message('required', "'%s' là bắt buộc.");
		$this->form_validation->set_message('min_length', "'%s' tối thiểu '%s' ký tự");
		//$this->form_validation->set_error_delimiters('<label class="error alert-danger">', '</label>');

		$this->form_validation->set_rules('blog_title', 'Tiêu đề blog', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('blog_introduce', 'Lời giới thiệu blog', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('blog_content', 'Nội dung blog', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('file_name', 'Hình ảnh blog', 'trim|required');
		//$blogImage = $this->security->xss_clean($this->input->post('file-name'));

		//log_message('error', 'blgo content' . $blog_content);
		if ($this->form_validation->run()) {
			//log_message('error', 'run true');
			$blog_title = $this->input->post('blog_title');
			$blog_introduce = $this->input->post('blog_introduce');
			$blog_content = $this->input->post('blog_content', false);
			$blog_image = $this->input->post('file_name');
			$blog_image_tmp = $this->input->post('file-tmp');
			$blog_category = $this->input->post('blog-category');
			$blog_is_active = true;
			$blog_is_draft = false;
			$blog_is_delete = false;
			$data = array(
				'blog_title' => $blog_title,
				'blog_code' => '',
				'blog_map_category' => $blog_category,
				'blog_image' => $blog_image,
				'blog_image_tmp' => $blog_image_tmp,
				'blog_introduce' => $blog_introduce,
				'blog_content' => $blog_content,
				'blog_map_account' => $user['id'],
				'blog_is_active' => $blog_is_active,
				'blog_is_draft' => $blog_is_draft,
				'blog_is_delete' => $blog_is_delete,
				'blog_update_at' => date('Y-m-d'),
				'blog_created_at' => date('Y-m-d'),
			);
			$result = $this->blog->insertBlog($data);
			if ($result) {
				$tmp_name = 'files/' . $blog_image_tmp;
				$path = 'uploads/blog/' . $result;
				if (!file_exists($path)) {
					mkdir($path, 0777, true);
				}
				copy($tmp_name, 'uploads/blog/' . $result . '/' . $blog_image_tmp);
				echo json_encode(array('status' => 'success', 'content' => 'Register complete'));
			} else {
				echo json_encode(array('status' => 'errvalid', 'contenterror' => true));
			}

		} else {
			$dataerr = array(
				'blog_title' => form_error('blog_title'),
				'blog_introduce' => form_error('blog_introduce'),
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
				'blog_image' => form_error('file_name'),
				'blog_content' => form_error('blog_content'),
			);
			// if (strlen($blog_image) <= 0) {
			// 	$dataerr['blog_image'] = 'Chưa chọn hình cho blog';
			// }
			// if (strlen($blog_content) <= 0) {
			// 	$dataerr['blog_content'] = 'Nội dung không được để trống.';
			// }
			log_message('error', 'run false');
			echo json_encode(array('status' => 'errvalid', 'content' => $dataerr));
		}
	}
	function draftBlog() {
		$user = $this->session->userdata['user'];
		//$this->form_validation->set_message('required', "'%s' là bắt buộc.");
		//$this->form_validation->set_message('min_length', "'%s' tối thiểu '%s' ký tự");
		//$this->form_validation->set_error_delimiters('<label class="error alert-danger">', '</label>');

		//$this->form_validation->set_rules('blog_title', 'Tiêu đề blog', 'trim|required|min_length[10]');
		//$this->form_validation->set_rules('blog_introduce', 'Lời giới thiệu blog', 'trim|required|min_length[10]');
		//$this->form_validation->set_rules('blog_content', 'Nội dung blog', 'trim|required|min_length[10]');
		//$this->form_validation->set_rules('file_name', 'Hình ảnh blog', 'trim|required');
		//$blogImage = $this->security->xss_clean($this->input->post('file-name'));

		//log_message('error', 'blgo content' . $blog_content);
		//if ($this->form_validation->run()) {
		//log_message('error', 'run true');
		$blog_title = $this->input->post('blog_title');
		$blog_introduce = $this->input->post('blog_introduce');
		$blog_content = $this->input->post('blog_content', false);
		$blog_image = $this->input->post('file_name');
		$blog_image_tmp = $this->input->post('file-tmp');
		$blog_category = $this->input->post('blog-category');
		$blog_is_active = false;
		$blog_is_draft = true;
		$blog_is_delete = false;
		$data = array(
			'blog_title' => $blog_title,
			'blog_code' => '',
			'blog_map_category' => $blog_category,
			'blog_image' => $blog_image,
			'blog_image_tmp' => $blog_image_tmp,
			'blog_introduce' => $blog_introduce,
			'blog_content' => $blog_content,
			'blog_map_account' => $user['id'],
			'blog_is_active' => $blog_is_active,
			'blog_is_draft' => $blog_is_draft,
			'blog_is_delete' => $blog_is_delete,
			'blog_update_at' => date('Y-m-d'),
			'blog_created_at' => date('Y-m-d'),
		);
		$result = $this->blog->insertBlog($data);
		if ($result) {
			if (strlen($blog_image) > 0) {
				$tmp_name = 'files/' . $blog_image_tmp;
				$path = 'uploads/blog/' . $result;
				if (!file_exists($path)) {
					mkdir($path, 0777, true);
				}
				copy($tmp_name, 'uploads/blog/' . $result . '/' . $blog_image_tmp);
			}
			echo json_encode(array('status' => 'success', 'content' => 'Register complete'));
		} else {
			echo json_encode(array('status' => 'errvalid', 'contenterror' => true));
		}

	}
	function getEditBlog($idBlog) {
		if (is_numeric($idBlog)) {
			$scripts = array(
				'assets/admin/angularjs/controller/blog.controller.js',
				'assets/admin/angularjs/service/blog.service.js',
				'ckeditor/ckeditor/ckeditor.js',
				'ckeditor/ckfinder/ckfinder.js',
				'server_upload/js/vendor/jquery.ui.widget.js',
				'server_upload/js/jquery.iframe-transport.js',
				'server_upload/js/jquery.fileupload.js',
				'assets/admin/dist/js/admin-blog.js',
				'assets/admin/dist/js/admin-create-blog.js',
				'assets/admin/dist/js/admin-edit-blog.js',
			);
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			$blog = $this->blog->getBlog($idBlog);
			$blogCategory = $this->blog->getListBlogCategory();
			$head = $this->load->view('admin/head', array(), TRUE);
			$header = $this->load->view('admin/header', array(), TRUE);
			$content = $this->load->view('admin/blog/edit-blog', array('csrf' => $csrf, 'blogCategory' => $blogCategory, 'blog' => $blog), TRUE);
			$footer = $this->load->view('admin/footer', array(), TRUE);
			$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
				'role' => $this->session->userdata['user']['role'],
				'selected' => 'blogManager',
				'sub' => ''), TRUE);

			$this->load->view('admin/layout', array('head' => $head,
				'header' => $header,
				'sidemenu' => $sidemenu,
				'content' => $content,
				'footer' => $footer,
				'scripts' => $scripts,
			));
		} else {
			redirect(base_url('404'), 'refresh');
		}

	}
	function updateBlog() {
		$user = $this->session->userdata['user'];
		$this->form_validation->set_message('required', "'%s' là bắt buộc.");
		$this->form_validation->set_message('min_length', "'%s' tối thiểu '%s' ký tự");
		//$this->form_validation->set_error_delimiters('<label class="error alert-danger">', '</label>');

		$this->form_validation->set_rules('blog_title', 'Tiêu đề blog', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('blog_introduce', 'Lời giới thiệu blog', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('blog_content', 'Nội dung blog', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('file_name', 'Hình ảnh blog', 'trim|required');
		//$blogImage = $this->security->xss_clean($this->input->post('file-name'));

		//log_message('error', 'blgo content' . $blog_content);
		if ($this->form_validation->run()) {
			//log_message('error', 'run true');
			$blog_title = $this->input->post('blog_title');
			$blog_introduce = $this->input->post('blog_introduce');
			$blog_content = $this->input->post('blog_content', false);
			$blog_image = $this->input->post('file_name');
			$blog_image_tmp = $this->input->post('file-tmp');
			$blog_category = $this->input->post('blog-category');
			$blog_id = $this->input->post('blog_id');
			$blog_is_active = true;
			$blog_is_draft = false;
			$blog_is_delete = false;
			$data = array(
				'blog_title' => $blog_title,
				'blog_code' => '',
				'blog_map_category' => $blog_category,
				'blog_image' => $blog_image,
				'blog_image_tmp' => $blog_image_tmp,
				'blog_introduce' => $blog_introduce,
				'blog_content' => $blog_content,
				'blog_map_account' => $user['id'],
				'blog_is_active' => $blog_is_active,
				'blog_is_draft' => $blog_is_draft,
				'blog_is_delete' => $blog_is_delete,
				'blog_update_at' => date('Y-m-d'),
			);
			$result = $this->blog->updateBlog($data, $blog_id);
			if ($result) {
				if (strlen($blog_image) > 0) {
					$tmp_name = 'files/' . $blog_image_tmp;
					$path = 'uploads/blog/' . $blog_id;
					if (!file_exists($path)) {
						mkdir($path, 0777, true);
					}
					copy($tmp_name, 'uploads/blog/' . $blog_id . '/' . $blog_image_tmp);
				}
				echo json_encode(array('status' => 'success', 'content' => 'Register complete'));
			} else {
				echo json_encode(array('status' => 'errvalid', 'contenterror' => true));
			}

		} else {
			$dataerr = array(
				'blog_title' => form_error('blog_title'),
				'blog_introduce' => form_error('blog_introduce'),
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
				'blog_image' => form_error('file_name'),
				'blog_content' => form_error('blog_content'),
			);
			// if (strlen($blog_image) <= 0) {
			// 	$dataerr['blog_image'] = 'Chưa chọn hình cho blog';
			// }
			// if (strlen($blog_content) <= 0) {
			// 	$dataerr['blog_content'] = 'Nội dung không được để trống.';
			// }
			log_message('error', 'run false');
			echo json_encode(array('status' => 'errvalid', 'content' => $dataerr));
		}
	}
	function updateDraftBlog() {
		$user = $this->session->userdata['user'];
		$blog_title = $this->input->post('blog_title');
		$blog_introduce = $this->input->post('blog_introduce');
		$blog_content = $this->input->post('blog_content', false);
		$blog_image = $this->input->post('file_name');
		$blog_image_tmp = $this->input->post('file-tmp');
		$blog_category = $this->input->post('blog-category');
		$blog_id = $this->input->post('blog_id');
		$blog_is_active = false;
		$blog_is_draft = true;
		$blog_is_delete = false;
		$data = array(
			'blog_title' => $blog_title,
			'blog_code' => '',
			'blog_map_category' => $blog_category,
			'blog_image' => $blog_image,
			'blog_image_tmp' => $blog_image_tmp,
			'blog_introduce' => $blog_introduce,
			'blog_content' => $blog_content,
			'blog_map_account' => $user['id'],
			'blog_is_active' => $blog_is_active,
			'blog_is_draft' => $blog_is_draft,
			'blog_is_delete' => $blog_is_delete,
			'blog_update_at' => date('Y-m-d'),
		);
		$result = $this->blog->updateBlog($data, $blog_id);
		if ($result) {
			if (strlen($blog_image) > 0) {
				$tmp_name = 'files/' . $blog_image_tmp;
				$path = 'uploads/blog/' . $blog_id;
				if (!file_exists($path)) {
					mkdir($path, 0777, true);
				}
				copy($tmp_name, 'uploads/blog/' . $blog_id . '/' . $blog_image_tmp);
			}
			echo json_encode(array('status' => 'success', 'content' => 'Register complete'));
		} else {
			echo json_encode(array('status' => 'errvalid', 'contenterror' => true));
		}
	}
	function getContentBlog($id) {
		$result = $this->blog->getContentBlog($id);
		echo $result;
	}
	function detailBlog($idBlog) {
		$user = $this->session->userdata['user'];
		// $scripts = array(
		// 		'assets/admin/angularjs/controller/blog.controller.js',
		// 		'assets/admin/angularjs/service/blog.service.js',
		// 		'ckeditor/ckeditor/ckeditor.js',
		// 		'ckeditor/ckfinder/ckfinder.js',
		// 		'server_upload/js/vendor/jquery.ui.widget.js',
		// 		'server_upload/js/jquery.iframe-transport.js',
		// 		'server_upload/js/jquery.fileupload.js',
		// 		'assets/admin/dist/js/admin-blog.js',
		// 		'assets/admin/dist/js/admin-create-blog.js',
		// 		'assets/admin/dist/js/admin-edit-blog.js',
		// 	);
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$blog = $this->blog->getDetailBlog($idBlog);
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/blog/detail-blog', array('csrf' => $csrf, 'blog' => $blog, 'user' => $user), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'blogManager',
			'sub' => ''), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
		));
	}
}