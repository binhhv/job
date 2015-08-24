<?php
class Test_mail extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('My_PHPMailer');
	}
	function index() {
// get config data
		// $mail = new PHPMailer();
		// $mail->IsSMTP(); // we are going to use SMTP
		// $mail->SMTPAuth = true; // enabled SMTP authentication
		// $mail->SMTPSecure = "ssl"; // prefix for secure protocol to connect to the server
		// $mail->Host = "smtp.gmail.com"; // setting GMail as our SMTP server
		// $mail->Port = 465; // SMTP port to connect to GMail
		// $mail->Username = "hvbinh1990@gmail.com"; // user email address
		// $mail->Password = "binh2381990"; // password in GMail
		// $mail->SetFrom('hvbinh1990@gmail.com', 'binh hoangvan'); //Who is sending the email
		// $mail->AddReplyTo("hvbinh1990@gmail.com", "Binh hoang van"); //email address that receives the response
		// $mail->Subject = "Happy birthday";
		// $mail->Body = "happy birthday to me.";
		// $mail->AltBody = "Plain text message";
		// $destino = "binhhv@live.com"; // Who is addressed the email to
		// $mail->AddAddress($destino, "John Doe");

		// //$mail->AddAttachment("images/phpmailer.gif"); // some attached files
		// //$mail->AddAttachment("images/phpmailer_mini.gif"); // as many as you want
		// if (!$mail->Send()) {
		// 	//$data["message"] = "Error: " . $mail->ErrorInfo;
		// 	echo 'errors';
		// } else {
		// 	//$data["message"] = "Message sent correctly!";
		// 	echo 'complete';
		// }
		//$this->load->view('sent_mail', $data);
		$message = file_get_contents(base_url() . 'mail_template/delete_cv.html');

		// Replace the % with the actual information
		$message = str_replace('%name%', "hưng", $message);
		$message = str_replace('%message%', "bạn nhận được một đề nghị là gửi quà cho bạn Bình :))", $message);
		$message = str_replace('%mail%', "binhhv@live.com", $message);
		$mail = new PHPMailer();

		$mail->CharSet = "utf-8";
		$mail->IsSMTP(); // set mailer to use SMTP
		$mail->Host = "smtp.live.com"; //
		//$mail->Port=465;// specify main and backup server
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->Username = "binhhv@live.com"; // SMTP username
		$mail->Password = "Binhminh2381990"; // SMTP password

		$mail->From = 'binhhv@live.com';
		$mail->FromName = 'Binh hoang van';
		$mail->AddAddress("hvbinh1990@gmail.com", "binh hoang van");
		//$mail->AddCC('hvbinh1990@gmail.com', 'Ánh sáng hoàn mỹ');
		$mail->WordWrap = 50; // set word wrap to 50 characters
		$mail->IsHTML(true); // set email format to HTML (true) or plain text (false)

		$mail->Subject = 'happy birthday';
		//$mail->Body = "happy birthday to me :))";
		//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
		//$mail->AddEmbeddedImage('images/logo.png', 'logo', 'logo.png');
		// $mail->addAttachment('files/file.xlsx');
		$mail->MsgHTML($message);
		$mail->AltBody = strip_tags($message);

		if (!$mail->Send()) {
			echo "Message could not be sent. <p>";
			echo "Mailer Error: " . $mail->ErrorInfo;
			exit;
		}
	}
}