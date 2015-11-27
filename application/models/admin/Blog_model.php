<?php
class Blog_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
		$this->load->model('Utilmodel', 'util');
	}
	function getListBlogCategory() {
		$sql = "select a.*, IFNULL(b.numBlog,0) as numBlog
		from blog_category a
		left join (select blog_map_category, count(blog_id) as numBlog from blog where blog_is_delete =  0 group by blog_map_category) as b on b.blog_map_category = a.cblog_id
		where cblog_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	function updateBlogCategory($category) {
		$data = array('from' => 'blog_category',
			'where' => 'cblog_id = ' . $category['cblog_id'],
			'data' => array('cblog_name' => $category['cblog_name'], 'cblog_update_at' => date('Y-m-d')));
		//print_r($data);
		return $this->dbutil->updateDb($data);
	}
	function deleteBlogCategory($category) {
		$data = array('from' => 'blog_category',
			'where' => 'cblog_id = ' . $category['cblog_id'],
			'data' => array('cblog_is_delete' => true, 'cblog_update_at' => date('Y-m-d')));
		//print_r($data);
		return $this->dbutil->updateDb($data);
	}
	function createBlogCategory($category) {
		$data = array('cblog_name' => $category['cblog_name'],
			'cblog_is_delete' => false,
			'cblog_update_at' => date('Y-m-d'),
			'cblog_created_at' => date('Y-m-d'));
		return $this->dbutil->insertDb($data, 'blog_category');
	}
	function getListBlog() {
		$sql = "select a.*,b.*
		from blog as a
		left join blog_category as b on b.cblog_id = a.blog_map_category and b.cblog_is_delete = 0
		where blog_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	function deleteBlog($blog) {
		$data = array(
			'from' => 'blog',
			'where' => 'blog_id = ' . $blog['blog_id'],
			'data' => array('blog_is_delete' => true, 'blog_update_at' => date('Y-m-d')));
		return $this->dbutil->updateDb($data);
	}
	function disabledBlog($blog) {
		$data = array(
			'from' => 'blog',
			'where' => 'blog_id = ' . $blog['blog_id'],
			'data' => array('blog_is_active' => false, 'blog_is_draft' => true, 'blog_update_at' => date('Y-m-d')));
		return $this->dbutil->updateDb($data);
	}

	function insertBlog($data) {
		$result = $this->dbutil->insertDb($data, 'blog');
		$code = $this->util->General_Code('blog', $result, 0);
		$this->util->update_Code('blog', 'blog_code', $code, 'blog_id', $result);
		return $result;
	}

}