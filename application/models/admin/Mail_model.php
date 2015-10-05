<?php
/**
 *
 */
class Mail_model extends CI_Model {
	//protected $mail;
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->config->load('email');
		$this->load->library('My_phpmailer');

	}
	function sendMail($data) {
		$type = $data['type'];
		if ($type == 'delete') {
			$message = file_get_contents(base_url() . 'mail_template/delete_template_mail.html');
			$message = str_replace('%name%', $data['name'], $message);
			$message = str_replace('%type%', $data['typedelete'], $message);
		} else if ($type == 'notifyEmployer') {
			$message = file_get_contents(base_url() . 'mail_template/notify_template_mail.html');
			$message = str_replace('%name%', $data['name'], $message);
			$message = str_replace('%mail%', $data['mail'], $message);
			$message = str_replace('%password%', $data['password'], $message);
		}
		$mail = new PHPMailer();
		$mail->CharSet = $this->config->item('charset');
		$mail->IsSMTP(); // set mailer to use SMTP
		$mail->Host = $this->config->item('host'); //
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->Username = $this->config->item('username'); // SMTP username
		$mail->Password = $this->config->item('password'); // SMTP password
		$mail->From = $this->config->item('username');
		$mail->FromName = $this->config->item('name');
		$mail->WordWrap = 50; // set word wrap to 50 characters
		$mail->IsHTML(true); // set email format to HTML (true) or plain text (false)

		if (isset($data['multisend']) && $data['multisend']) {
			foreach ($data['listmail'] as $objectMail) {
				$mail->AddAddress($objectMail->account_email, $objectMail->account_first_name . $objectMail->account_last_name);
			}
		} else {
			$mail->AddAddress($data['mailsend'], $data['name']);
		}
		$mail->Subject = 'THÔNG BÁO TỪ BAN QUẢN TRỊ WEBSITE WWW.ALLLSHIGOTO.COM';
		$mail->MsgHTML($message);
		$mail->AltBody = strip_tags($message);

		if (!$mail->Send()) {
			return true;
		}
		return false;
	}
	function sendmailContact($to, $subject, $message, $contactname) {
		// $type = $data['type'];
		// if ($type == 'delete') {
		// 	$message = file_get_contents(base_url() . 'mail_template/delete_template_mail.html');
		// 	$message = str_replace('%name%', $data['name'], $message);
		// 	$message = str_replace('%type%', $data['typedelete'], $message);
		// } else if ($type == 'notifyEmployer') {
		// 	$message = file_get_contents(base_url() . 'mail_template/notify_template_mail.html');
		// 	$message = str_replace('%name%', $data['name'], $message);
		// 	$message = str_replace('%mail%', $data['mail'], $message);
		// 	$message = str_replace('%password%', $data['password'], $message);
		// }
		$mail = new PHPMailer();
		$mail->CharSet = $this->config->item('charset');
		$mail->IsSMTP(); // set mailer to use SMTP
		$mail->Host = $this->config->item('host'); //
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->Username = $this->config->item('username'); // SMTP username
		$mail->Password = $this->config->item('password'); // SMTP password
		$mail->From = $this->config->item('username');
		$mail->FromName = $this->config->item('name');
		$mail->WordWrap = 50; // set word wrap to 50 characters
		$mail->IsHTML(true); // set email format to HTML (true) or plain text (false)
		$mail->AddAddress($to, $contactname);
		// if (isset($data['multisend']) && $data['multisend']) {
		// 	foreach ($data['listmail'] as $objectMail) {
		// 		$mail->AddAddress($objectMail->account_email, $objectMail->account_first_name . $objectMail->account_last_name);
		// 	}
		// } else {
		// 	$mail->AddAddress($data['mailsend'], $data['name']);
		// }
		$mail->Subject = $subject;
		$mail->MsgHTML($message);
		$mail->AltBody = strip_tags($message);

		if (!$mail->Send()) {
			return true;
		}
		return false;
	}
	function sendMailJobseeker($data) {
		// $type = $data['type'];
		// if ($type == 'delete') {
		// 	$message = file_get_contents(base_url() . 'mail_template/delete_template_mail.html');
		// 	$message = str_replace('%name%', $data['name'], $message);
		// 	$message = str_replace('%type%', $data['typedelete'], $message);
		// } else if ($type == 'notifyEmployer') {
		// 	$message = file_get_contents(base_url() . 'mail_template/notify_template_mail.html');
		// 	$message = str_replace('%name%', $data['name'], $message);
		// 	$message = str_replace('%mail%', $data['mail'], $message);
		// 	$message = str_replace('%password%', $data['password'], $message);
		// }
		$mail = new PHPMailer();
		$mail->CharSet = $this->config->item('charset');
		$mail->IsSMTP(); // set mailer to use SMTP
		$mail->Host = $this->config->item('host'); //
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->Username = $this->config->item('username'); // SMTP username
		$mail->Password = $this->config->item('password'); // SMTP password
		$mail->From = $this->config->item('username');
		$mail->FromName = $this->config->item('name');
		$mail->WordWrap = 50; // set word wrap to 50 characters
		$mail->IsHTML(true); // set email format to HTML (true) or plain text (false)

		if (isset($data['listmail']) && $data['listmail']) {
			foreach ($data['listmail'] as $objectMail) {
				$arrMail = explode(')', $objectMail);
				if (strrpos($objectMail, ")") === false) {
					$mail->AddAddress(trim($arrMail[0]), '');
				} else {
					if (count($arrMail) > 0) {
						$mail->AddAddress(trim($arrMail[1]), trim(substr($arrMail[0], 1)));
					}
				}

			}
		}
		$mail->Subject = $data['subject']; //'THÔNG BÁO TỪ BAN QUẢN TRỊ WEBSITE WWW.ALLLSHIGOTO.COM';
		//$mail->MsgHTML($message);
		//$file_name = substr(strrchr($this->input->post('file-name'), "\\"), 1);
		$message = $data['content'];
		$indexFile = 0;
		if (isset($data['fileTmp'])) {

			foreach ($data['fileTmp'] as $fileTmp) {
				$file_name = substr(strrchr($data['file'][$indexFile], "\\"), 1);
				log_message('error', $fileTmp);
				$mail->addAttachment('files/' . $fileTmp, $file_name);
				$indexFile++;
			}
		}
		$mail->Body = $message; //$data['content'];
		$mail->AltBody = strip_tags($message);

		if ($mail->Send()) {
			return true;
		}
		return false;
	}
}