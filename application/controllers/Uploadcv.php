<?php
class UploadCv extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->model('Uploadcv_model', 'upload_cv');
		$this->load->helper('form');
    	$this->load->library('form_validation');
    	$this->lang->load('message', 'vi');
    	$this->load->helper('language');
    	$this->load->library('session');
	}

	public function index(){
		$head = $this->load->view('main/head', array('titlePage' => 'JOB7VN Group|user register'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/logo.jpg',
			'showTitle' => true,
			'logoWidth' => '70px',
			'logoHeight' => '70px',
		), TRUE);

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$content = $this->load->view('main/upload_cv', array('csrf' => $csrf), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));
	}
	///upload cv online
	public function upload_cv_online(){
		$id_account = '100';
		 $dataupload= array(
				'docon_map_user' => $id_account,
				'docon_birthday' => $doccv_file_tmp,
				'docon_phone' => $doccv_file_name,
				'docon_career' => '0',
				'docon_degree' => date('Y-m-d'),
				'docon_education' => date('Y-m-d'),
				'docon_address' => '0',
				'docon_experience' => '0',
				'docon_skill' => '0',
				'docon_healthy' => '0',
				'docon_reason_apply' => '0',
				'docon_salary' => '0',
				'docon_advance' => '0',
				'docon_is_delete' => '0',
				'docon_update_at' => date('Y-m-d'),
				'docon_created_at' => date('Y-m-d'),
			);
            $id_upload = $this->upload_cv->insertcvUser($dataupload);
	}
	//upload cv
	public function upload_cv(){
		$id_account = '100';
		$file_img_upload = $this->do_upload($id_account);
		if($file_img_upload['status'] == 'success'){
            //upload images
            $doccv_file_tmp = $file_img_upload['name_new'];//$this->uploadImages($file_img_upload, $id_account);
            $doccv_file_name = $file_img_upload['name_old'];;//$_FILES["image"]["name"];

            $dataupload= array(
				'doccv_map_user' => $id_account,
				'doccv_file_tmp' => $doccv_file_tmp,
				'doccv_file_name' => $doccv_file_name,
				'doccv_is_delete' => '0',
				'doccv_created_at' => date('Y-m-d'),
				'doccv_update_at' => date('Y-m-d'),
			);
            $id_upload = $this->upload_cv->insertcvUser($dataupload);
        	echo json_encode(array('status' => 'success', 'content' => 'upload success'));
        }else{

        	$arr_err = array(
        		'contente' => $file_img_upload['content'],
        		'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
        	);
           echo json_encode(array('status' => 'error', 'content' => $arr_err));
	    }
	}

	public function do_upload($id_account){
     	$arr_upload;
        $path = './uploads/cv_user/'.$id_account."/";
        if (!file_exists($path)) {
			mkdir($path, 0777, true);
		}
          $this->load->library('upload');
   
            // Define file rules
            $this->upload->initialize(array(
                'upload_path' => $path,
				'allowed_types' => "doc|docx|pdf",
				'overwrite' => TRUE,
				'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				// 'max_height' => "768",
				// 'max_width' => "1024"
            ));
             $file_upload = 'userfile';
             
             if($this->upload->do_upload($file_upload)){
                $your_file_new_name = 'hinh_new';
                $data = $this->upload->data();
                $arr_upload['status'] = 'success';
                $arr_upload['name_old'] = $data['file_name'];
				$file_path     = $data['file_path'];
				$file         = $data['full_path'];
				$file_ext     = $data['file_ext'];
				$final_file_name = md5($file_upload."_".time()).$file_ext; 
				// here is the renaming functon
				rename($file, $file_path . $final_file_name);
				$arr_upload['name_new'] = $final_file_name;

                 return $arr_upload;
                // echo json_encode(array('status' => 'ss', 'content' => 'success'));
                 
             } else {
             	$arr_upload['status'] = 'error';
             	$error = array('error' => $this->upload->display_errors());
             	$arr_upload['content'] = $error;
             	return $arr_upload;    
          
             }
     }
	
}