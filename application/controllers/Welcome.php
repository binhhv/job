<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(  ){
		parent::__construct();
		$this->load->helper('url');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($section ='default')
	{
		if($section == 'default'){
		//'logo'=>'img/header/logo.jpg',
			$slide = array('slide1.jpg','slide1.jpg','slide1.jpg','slide1.jpg'
			);
			$head = $this->load->view('view1/head',array(),TRUE);
			$header = $this->load->view('view1/header',array(
										'logo'=>'img/header/logo.jpg',
										'showTitle'=>true,
										'logoWidth'=>'70px',
										'logoHeight'=>'70px'),TRUE);
			$content = $this->load->view('view1/content',array('slides'=>$slide),TRUE);
			$footer = $this->load->view('view1/footer',array(),TRUE);
			$this->load->view('view1/layout',array('head'=>$head,'header'=>$header,'content'=>$content,'footer'=>$footer));
		}
		// else if($section =='view2'){
		// 	$head = $this->load->view('view2/head',array(),TRUE);
		// 	$header = $this->load->view('view2/header',array(),TRUE);
		// 	$content = $this->load->view('view2/content',array(),TRUE);
		// 	$footer = $this->load->view('view2/footer',array(),TRUE);

		// 	$this->load->view('view2/layout',array('head'=>$head,'header'=>$header,'content'=>$content,'footer'=>$footer));
		// }
	}
	public function loadview(){
		$head = $this->load->view('view2/head',array(),TRUE);
		$header = $this->load->view('view2/header',array(),TRUE);
		$content = $this->load->view('view2/content',array(),TRUE);
		$footer = $this->load->view('view2/footer',array(),TRUE);

		$this->load->view('view2/layout',array('head'=>$head,'header'=>$header,'content'=>$content,'footer'=>$footer));
	}

}
