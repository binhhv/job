<?php
//if (!defined('BASEPATH')) {
// 	exit('No direct script access allowed');
// }

// $config['appId']   = '1494342414191651';
// $config['secret']  = '775288a56787896f92da0f2096c6de7c';
// $config['facebook_default_scope']   = 'email,user_friends';

// $config['protocol'] = 'smtp',
// $config['smtp_host'] = 'ssl://smtp.googlemail.com',
// $config['smtp_port'] = 465,
// $config['smtp_user'] ='hvbinh1990@gmail.com', // change it to yours
// $config['smtp_pass'] = 'binh2381990', // change it to yours
// $config['mailtype'] = 'html',
// $config['charset'] ='iso-8859-1',
// $config['wordwrap'] =TRUE
// $config['configEmail'] = Array(
// 	'protocol' => 'smtp',
// 	'smtp_host' => 'smtp.live.com',
// 	'smtp_port' => 25,
// 	'smtp_user' => 'binhhv@live.com',
// 	'smtp_pass' => 'Binhminh2381990',
// 	'mailtype' => 'html',
// 	'charset' => 'iso-8859-1',
// );

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'localhost';
$config['email_address'] = 'binhhv@localhost.com';
$config['email_name'] = 'Localhost test';
?>
