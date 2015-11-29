<?php
/**
 *
 */
class Blog extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('employer/Employer_model', 'employer');
		$this->load->model('employer/Recruitment_model', 'recruitment');
		$this->load->model('blog/Blog_model', 'blog');
		$this->load->helper('security');
		$this->load->helper('language');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->lang->load('message', 'vi');
		$this->load->model('UtilModel', 'util');
		//$this->load->model('Facebook_model', 'fbModel');
		$this->load->library('pagination');
	}
	function index() {
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$head = $this->load->view('main/head', array(), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/allSHIGOTO.png',
			'showTitle' => true,
			'logoWidth' => '170px',
			'logoHeight' => '70px',
			'menu' => 'blog',
			'user' => $user,
		), TRUE);
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$blogCategory = $this->blog->getListBlogCategory();
		$blogCurrent = $this->blog->getListBlogCurrent();

		#pagging
		$blogs = $this->blog->getListBlogPagging();

		//$url = 'province/' . $provinceName . '-' . $id . '.html';
		$url = $this->uri->segment(0) . '/' . $this->uri->segment(1);
		$config['base_url'] = site_url($url);
		$config['total_rows'] = count($blogs);
		$config['per_page'] = "10";
		$config["uri_segment"] = 2;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		//config for bootstrap pagination class integration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		// if ($page * $config["per_page"] >= count($jobSearch)) {
		// 	$page = 0;
		// }
		//call the model function to get the department data
		$blogPagination = $this->blog->getListBlogPagging($config["per_page"], $page);
		//log_message('error', count($listRecruitmentProvincePage));
		$pagination = $this->pagination->create_links();

		$category = $this->load->view('main/blog/category', array('blogCategory' => $blogCategory), TRUE);
		$blog_category = $this->load->view('main/blog/blog-category', array('blogCurrent' => $blogCurrent), TRUE);
		$blog_content = $this->load->view('main/blog/index', array('blogPagination' => $blogPagination, 'pagination' => $pagination), TRUE);

		$content = $this->load->view('main/blog/layout', array('blog_content' => $blog_content, 'category' => $category, 'blog_category' => $blog_category, 'csrf' => $csrf), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('isGray' => true, 'head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));

	}
	function detail($blog) {
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$head = $this->load->view('main/head', array(), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/allSHIGOTO.png',
			'showTitle' => true,
			'logoWidth' => '170px',
			'logoHeight' => '70px',
			'menu' => 'blog',
			'user' => $user,
		), TRUE);
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);

		$blogDetail = $this->blog->getDetailBlog($blog);
		$blogCategory = $this->blog->getListBlogCategory();
		$blogCurrent = $this->blog->getListBlogCategoryCurrent($blogDetail->blog_map_category);
		$category = $this->load->view('main/blog/category', array('blogCategory' => $blogCategory), TRUE);
		$blog_category = $this->load->view('main/blog/blog-category', array('blogCurrent' => $blogCurrent), TRUE);
		$blog_content = $this->load->view('main/blog/blog-detail', array('blogDetail' => $blogDetail), TRUE);

		$content = $this->load->view('main/blog/layout', array('blog_content' => $blog_content, 'category' => $category, 'blog_category' => $blog_category, 'csrf' => $csrf), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('isGray' => true, 'head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));

	}
	function blogCategory($category) {
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$head = $this->load->view('main/head', array(), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/allSHIGOTO.png',
			'showTitle' => true,
			'logoWidth' => '170px',
			'logoHeight' => '70px',
			'menu' => 'blog',
			'user' => $user,
		), TRUE);
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);

		//$blogDetail = $this->blog->getDetailBlog($blog);
		$blogCategory = $this->blog->getListBlogCategory();
		$blogCurrent = $this->blog->getListBlogCategoryCurrent($category);

		#pagging
		$blogs = $this->blog->getListBlogCategoryPagging($category);
		if (count($blogs) <= 0) {
			redirect(base_url('blog'), 'refresh');
		}
		//$url = 'province/' . $provinceName . '-' . $id . '.html';
		$url = $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3);
		$config['base_url'] = site_url($url);
		$config['total_rows'] = count($blogs);
		$config['per_page'] = "10";
		$config["uri_segment"] = 4;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		//config for bootstrap pagination class integration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		// if ($page * $config["per_page"] >= count($jobSearch)) {
		// 	$page = 0;
		// }
		//call the model function to get the department data
		$blogPagination = $this->blog->getListBlogCategoryPagging($category, $config["per_page"], $page);
		//log_message('error', count($listRecruitmentProvincePage));
		$pagination = $this->pagination->create_links();

		$category = $this->load->view('main/blog/category', array('blogCategory' => $blogCategory), TRUE);
		$blog_category = $this->load->view('main/blog/blog-category', array('blogCurrent' => $blogCurrent), TRUE);
		$blog_content = $this->load->view('main/blog/blog-category-list', array('blogPagination' => $blogPagination, 'pagination' => $pagination), TRUE);

		$content = $this->load->view('main/blog/layout', array('blog_content' => $blog_content, 'category' => $category, 'blog_category' => $blog_category, 'csrf' => $csrf), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('isGray' => true, 'head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));

	}
}