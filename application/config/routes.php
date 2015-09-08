<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
 */
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['loadview'] = 'welcome/loadview';
$route['example'] = 'welcome/example';
$route['logout'] = 'welcome/logout';
$route['fblogin'] = 'welcome/fblogin';
$route['404'] = 'welcome/page404';
$route['home'] = 'home/index';

$route['test'] = 'contact/insertExample';
$route['admin'] = 'admin/admin/index';
$route['admin/login'] = 'admin/login';
$route['admin/checkLogin'] = 'admin/login/checkLogin';
$route['admin/logout'] = 'admin/login/logout';
//jobseeker admin route
$route['admin/jobseeker'] = 'admin/admin/jobseekerManager';
$route['admin/jobseeker/getListJobseeker'] = 'admin/admin/jobseeker';
$route['admin/jobseeker/createJobseeker'] = 'admin/admin/createJobseeker';
$route['admin/jobseeker/updateJobseeker'] = 'admin/admin/updateJobseeker';
$route['admin/jobseeker/deleteJobseeker'] = 'admin/admin/deleteJobseeker';
$route['admin/jobseeker/getToken'] = 'admin/admin/getToken';
$route['admin/jobseeker/detail/(:num)'] = 'admin/admin/detailJobseeker/$1';
$route['admin/jobseeker/detail/document/(:num)'] = 'admin/admin/documentJobseeker/$1';
$route['admin/jobseeker/checkEmailExits/(:any)'] = 'admin/admin/checkEmailExits/$1';
//employer admin route
$route['admin/employer'] = 'admin/admin_employer/index';
$route['admin/employer/getListEmployer'] = 'admin/admin_employer/getListEmployer';
$route['admin/employer/detail/(:num)'] = 'admin/admin_employer/detailEmployer/$1';
$route['admin/employer/getListEmployerUser/(:num)'] = 'admin/admin_employer/getListEmployerUser/$1';
$route['admin/employer/getListEmployerRecruitment/(:num)'] = 'admin/admin_employer/getListEmployerRecruitment/$1';
$route['admin/employer/checkAdminEmployerExits/(:num)'] = 'admin/admin_employer/checkAdminEmployerExits/$1';
$route['admin/employer/setRoleAdminEmployer'] = 'admin/admin_employer/setRoleAdminEmployer';
$route['admin/employer/deleteEmployerUser'] = 'admin/admin_employer/deleteEmployerUser';
$route['admin/employer/createEmployerUser'] = 'admin/admin_employer/createEmployerUser';
$route['admin/employer/deleteEmployerRecruitment'] = 'admin/admin_employer/deleteEmployerRecruitment';
$route['admin/employer/detailEmployerRecruitment/(:num)'] = 'admin/admin_employer/getDetailEmployerRecruitment/$1';
$route['admin/employer/getListWelfare'] = 'admin/admin_employer/getListWelfare';
$route['admin/employer/getListForm'] = 'admin/admin_employer/getListForm';
$route['admin/employer/getListFormChild'] = 'admin/admin_employer/getListFormChild';
$route['admin/employer/getListLevel'] = 'admin/admin_employer/getListLevel';
$route['admin/employer/getListContactForm'] = 'admin/admin_employer/getListContactForm';
$route['admin/employer/getListWelfareEmployerRecruitment/(:num)'] = 'admin/admin_employer/getListWelfareEmployerRecruitment/$1';
$route['admin/employer/updateEmployerRecruitment'] = 'admin/admin_employer/updateEmployerRecruitment';
$route['admin/employer/getListProvinceCountry/(:num)'] = 'admin/admin_employer/getListProvinceCountry/$1';
$route['admin/employer/getListCountry'] = 'admin/admin_employer/getListCountry';
$route['admin/employer/getListProvinceRecruitment/(:num)'] = 'admin/admin_employer/getListProvinceRecruitment/$1';
$route['admin/employer/getListProvinceRecruitmentChange/(:num)/(:num)'] = 'admin/admin_employer/getListProvinceRecruitmentChange/$1/$2';
$route['admin/employer/createEmployerRecruitment'] = 'admin/admin_employer/createEmployerRecruitment';
$route['admin/employer/approveEmployerRecruitment'] = 'admin/admin_employer/approveEmployerRecruitment';
$route['admin/employer/updateemployer'] = 'admin/admin_employer/updateEmployer';
$route['admin/employer/createemployer'] = 'admin/admin_employer/createEmployer';

//recruitment admin manager
$route['admin/recruitment/recruitment-active'] = 'admin/admin_recruitment/recruitmentActive';
$route['admin/recruitment/recruitment-approve'] = 'admin/admin_recruitment/recruitmentApprove';
$route['admin/recruitment/recruitment-disabled'] = 'admin/admin_recruitment/recruitmentDisabled';
$route['admin/recruitment'] = 'admin/admin_recruitment/recruitmentCreate';
$route['admin/recruitment/getListEmployer'] = 'admin/admin_recruitment/getListEmployer';
$route['admin/recruitment/createRecruitment'] = 'admin/admin_recruitment/createRecruitment';
$route['admin/recruitment/getListRecruitment/(:num)'] = 'admin/admin_recruitment/getListRecruitment/$1';
$route['admin/recruitment/getRecruitmentApply/(:num)'] = 'admin/admin_recruitment/getRecruitmentApply/$1';
//manager admin route
$route['admin/manager'] = 'admin/admin_manager/index';
$route['admin/manager/getListManager'] = 'admin/admin_manager/getListManager';
$route['admin/manager/updateManager'] = 'admin/admin_manager/updateManager';
$route['admin/manager/deleteManager'] = 'admin/admin_manager/deleteManager';
$route['admin/manager/createManager'] = 'admin/admin_manager/createManager';

//document and cv admin route
$route['admin/document/cv'] = 'admin/admin_document/cvManager';
$route['admin/document/form'] = 'admin/admin_document/formManager';
$route['admin/document/getListCV'] = 'admin/admin_document/getCV';
$route['admin/document/getListForm'] = 'admin/admin_document/getForm';
$route['admin/document/updateForm'] = 'admin/admin_document/updateForm';
$route['admin/document/form/(:num)/(:num)'] = 'admin/admin_document/getDetailForm/$1/$2';
$route['admin/document/deleteCV'] = 'admin/admin_document/deleteCV';
$route['admin/document/deleteForm'] = 'admin/admin_document/deleteForm';
$route['admin/document/getListHealthy'] = 'admin/admin_document/getListHealthy';
$route['admin/document/cv-store'] = 'admin/admin_document/cvStoreManager';
$route['admin/document/form-store'] = 'admin/admin_document/formStoreManager';
$route['admin/document/detail/(:num)'] = 'admin/admin_document/detailDocumentForm/$1';
$route['admin/document/getListProvinceDocument/(:num)/(:num)'] = 'admin/admin_document/getListProvinceDocument/$1/$2';
$route['admin/document/createForm'] = 'admin/admin_document/createForm';
$route['admin/document/uploadCV'] = 'admin/admin_document/uploadCV';
$route['admin/document/upload'] = 'admin/admin_document/upload';
$route['admin/document/getListCareer'] = 'admin/admin_document/getListCareer';

//contact admin
$route['admin/contact'] = 'admin/admin_contact/index';
$route['admin/contact/getListContact'] = 'admin/admin_contact/getListContact';
$route['admin/contact/deleteContact'] = 'admin/admin_contact/deleteContact';
$route['admin/contact/replyContact'] = 'admin/admin_contact/replyContact';
$route['admin/contact/updateContactView/(:num)'] = 'admin/admin_contact/updateContactView/$1';
//errors route
$route['error/403'] = 'admin/admin_error/page403';
$route['404_override'] = 'error_page/index';
$route['file-not-found'] = 'error_page/filenotfound';
//test some function
$route['insertDBTest'] = 'admin/test_db/insertDB';

//download file
$route['download/(:any)/(:any)/(:any)'] = 'file/file_controller/download/$1/$2/$3';
$route['downloadcv/(:num)/(:any)/(:any)/(:num)'] = 'file/file_controller/downloadcv/$1/$2/$3/$4';

//test send mail
$route['sendmail'] = 'sendmail/index';
$route['sendmailtest'] = 'Test_mail/index';
$route['test/array'] = 'Test_controller/testarray';

//user
$route['register'] = 'register/index';
$route['uploadcv'] = 'uploadcv/index';
$route['createrecruitment'] = 'createrecruitment/index';
//coming soon
$route['admin/category'] = 'admin/admin_comingsoon/index';
$route['admin/setup'] = 'admin/admin_comingsoon/index';

//route main page
$route['contact'] = 'contact/index';
$route['contact/send-contact'] = 'contact/sendContact';
$route['faq'] = 'faq/index';
$route['about'] = 'home/about';
$route['organizational-structure'] = 'home/structure';
$route['service'] = 'home/service';

//job manager
$route['job/(:any)-(:num).html'] = 'job/job_detail/index/$2';
$route['job/getListDoconUser'] = 'job/job_detail/getListDoconUser';
$route['job/getListCVUser'] = 'job/job_detail/getListCVUser';
$route['job/getToken'] = 'job/job_detail/getToken';
$route['job/getTokenView'] = 'job/job_detail/getTokenView';
$route['job/getDetailDoc/(:num)'] = 'job/job_detail/getDocView/$1';
$route['job/apply-job'] = 'job/job_detail/applyJob';
$route['job/getCreateForm/(:num)'] = 'job/job_detail/getCreateForm/$1';
$route['job/getListLevel'] = 'job/job_detail/getListLevel';
$route['job/apply-create-form-job'] = 'job/job_detail/applyCreateFormJob';

//job of province
$route['province/(:any)-(:num).html'] = 'job/job_province/index/$2';
//test simple
$route['test1'] = 'test_controller/updateProvince';

//login
$route['login'] = 'login/index';
$route['logout'] = 'login/logout';
$route['checkLogin'] = 'login/checkLogin';

//employer page
$route['employer'] = 'employer/employer/index';

//test upload
$route['uploads/do_upload'] = 'uploads/do_upload';
