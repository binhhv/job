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
$route['404_override'] = 'error_page/index';
$route['translate_uri_dashes'] = FALSE;
$route['loadview'] = 'welcome/loadview';
$route['example'] = 'welcome/example';
$route['logout'] = 'welcome/logout';
$route['fblogin'] = 'welcome/fblogin';
$route['404'] = 'error_page/index';
//$route['error/404'] = 'error_page/index';
$route['home'] = 'home/index';

$route['test'] = 'contact/insertExample';
$route['admin'] = 'admin/admin/index';
$route['page/login'] = 'admin/login';
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
$route['admin/recruitment/getListSalary'] = 'admin/admin_recruitment/getListSalary';
$route['admin/recruitment-highlight'] = 'admin/admin_recruitment/recruitmentHighlight';
$route['admin/recruitment/editShowRecruitment'] = 'admin/admin_recruitment/editShowRecruitment';
$route['admin/recruitment/disabledRecruitment'] = 'admin/admin_recruitment/disabledRecruitment';
$route['admin/recruitment/getRecruitmentShow/(:num)'] = 'admin/admin_recruitment/getRecruitmentShow/$1';
$route['admin/recruitment/getMaxViewRecruitment'] = 'admin/admin_recruitment/getMaxViewRecruitment';
$route['admin/recruitment/removeAllRecruitmentShow'] = 'admin/admin_recruitment/removeAllRecruitmentShow';
$route['admin/recruitment/addRecruitmentShow/(:num)/(:num)'] = 'admin/admin_recruitment/addRecruitmentShow/$1/$2';
$route['admin/recruitment/removeRecruitmentShow'] = 'admin/admin_recruitment/removeRecruitmentShow';
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
//support admin
$route['admin/support'] = 'admin/admin_support/index';

//category admin
$route['admin/province'] = 'admin/admin_category/province';
$route['admin/category/getListProvinceCountry/(:num)'] = 'admin/admin_category/getListProvinceCountry/$1';
$route['admin/category/getListRegionCountry/(:num)'] = 'admin/admin_category/getListRegionCountry/$1';
$route['admin/category/updateProvince'] = 'admin/admin_category/updateProvince';
$route['admin/category/createProvince'] = 'admin/admin_category/createProvince';
$route['admin/category/deleteProvince'] = 'admin/admin_category/deleteProvince';
$route['admin/health'] = 'admin/admin_category/health';
$route['admin/category/getListHealth'] = 'admin/admin_category/getListHealth';
$route['admin/category/createHealth'] = 'admin/admin_category/createHealth';
$route['admin/category/updateHealth'] = 'admin/admin_category/updateHealth';
$route['admin/category/deleteHealth'] = 'admin/admin_category/deleteHealth';
$route['admin/form'] = 'admin/admin_category/form';
$route['admin/level'] = 'admin/admin_category/level';
$route['admin/welfare'] = 'admin/admin_category/welfare';
$route['admin/career'] = 'admin/admin_category/career';
$route['admin/contact-form'] = 'admin/admin_category/contactForm';
$route['admin/salary'] = 'admin/admin_category/salary';
$route['admin/faq'] = 'admin/admin_category/faq';
$route['admin/category/getListForm'] = 'admin/admin_category/getListForm';
$route['admin/category/createForm'] = 'admin/admin_category/createForm';
$route['admin/category/updateForm'] = 'admin/admin_category/updateForm';
$route['admin/category/deleteForm'] = 'admin/admin_category/deleteForm';
$route['admin/category/getListLevel'] = 'admin/admin_category/getListLevel';
$route['admin/category/createLevel'] = 'admin/admin_category/createLevel';
$route['admin/category/updateLevel'] = 'admin/admin_category/updateLevel';
$route['admin/category/deleteLevel'] = 'admin/admin_category/deleteLevel';
$route['admin/category/getListWelfare'] = 'admin/admin_category/getListWelfare';
$route['admin/category/createWelfare'] = 'admin/admin_category/createWelfare';
$route['admin/category/updateWelfare'] = 'admin/admin_category/updateWelfare';
$route['admin/category/deleteWelfare'] = 'admin/admin_category/deleteWelfare';
$route['admin/category/getListCareer'] = 'admin/admin_category/getListCareer';
$route['admin/category/getListContactForm'] = 'admin/admin_category/getListContactForm';
$route['admin/category/getListFAQ'] = 'admin/admin_category/getListFAQ';
$route['admin/category/getListSalary'] = 'admin/admin_category/getListSalary';
$route['admin/category/createCareer'] = 'admin/admin_category/createCareer';
$route['admin/category/createContactForm'] = 'admin/admin_category/createContactForm';
$route['admin/category/createFAQ'] = 'admin/admin_category/createFAQ';
$route['admin/category/createSalary'] = 'admin/admin_category/createSalary';
$route['admin/category/updateCareer'] = 'admin/admin_category/updateCareer';
$route['admin/category/updateContactForm'] = 'admin/admin_category/updateContactForm';
$route['admin/category/updateFAQ'] = 'admin/admin_category/updateFAQ';
$route['admin/category/updateSalary'] = 'admin/admin_category/updateSalary';
$route['admin/category/deleteCareer'] = 'admin/admin_category/deleteCareer';
$route['admin/category/deleteContactForm'] = 'admin/admin_category/deleteContactForm';
$route['admin/category/deleteFAQ'] = 'admin/admin_category/deleteFAQ';
$route['admin/category/deleteSalary'] = 'admin/admin_category/deleteSalary';
$route['admin/category/getListIcon'] = 'admin/admin_category/getListIcon';

//admin config page
$route['admin/logo'] = 'admin/admin_config/logo';
$route['admin/config/getListLogo'] = 'admin/admin_config/getListLogo';
$route['admin/config/activeDeleteLogo'] = 'admin/admin_config/activeDeleteLogo';
$route['admin/config/uploadLogo'] = 'admin/admin_config/uploadLogo';
$route['admin/ads'] = 'admin/admin_config/ads';
$route['admin/slide'] = 'admin/admin_config/slide';
$route['admin/slogan-site'] = 'admin/admin_config/site';
$route['admin/config/getListSlide/(:num)'] = 'admin/admin_config/getListSlide/$1';
$route['admin/config/uploadSlide'] = 'admin/admin_config/uploadSlide';
$route['admin/config/deleteSlide'] = 'admin/admin_config/deleteSlide';
$route['admin/config/activeSlide/(:num)/(:num)'] = 'admin/admin_config/activeSlide/$1/$2';
$route['admin/config/deactiveSlide/(:num)/(:num)'] = 'admin/admin_config/deactiveSlide/$1/$2';
$route['admin/config/getListTitleSite/(:num)'] = 'admin/admin_config/getListTitleSite/$1';
$route['admin/config/selectedTitleSite/(:num)/(:num)/(:num)'] = 'admin/admin_config/selectedTitleSite/$1/$2/$3';
//$route['admin/config/unselectedTitleSite'] = 'admin/admin_config/unselectedTitleSite';
$route['admin/config/deleteTitleSite'] = 'admin/admin_config/deleteTitleSite';
$route['admin/config/createTitleSite'] = 'admin/admin_config/createTitleSite';
$route['admin/adwords'] = 'admin/admin_config/adwords';
$route['admin/title-site'] = 'admin/admin_config/title';
$route['admin/aboutus-video'] = 'admin/admin_config/videoIntro';
$route['admin/aboutus-management'] = 'admin/admin_config/structure';
$route['admin/config/getListAdwords'] = 'admin/admin_config/getListAdwords';
$route['admin/config/updateAdword'] = 'admin/admin_config/updateAdword';
$route['admin/config/getListMember'] = 'admin/admin_config/getListMember';
$route['admin/config/choiceMember/(:num)'] = 'admin/admin_config/choiceMember/$1';
$route['admin/config/unchoiceMember/(:num)'] = 'admin/admin_config/unchoiceMember/$1';
$route['admin/config/changeMember/(:num)/(:num)'] = 'admin/admin_config/changeMember/$1/$2';
$route['admin/config/deleteMember'] = 'admin/admin_config/deleteMember';
$route['admin/config/createMember'] = 'admin/admin_config/createMember';
$route['admin/config/updateMember'] = 'admin/admin_config/updateMember';
$route['admin/config/uploadVideo'] = 'admin/admin_config/uploadVideo';
$route['admin/config/getListVideos'] = 'admin/admin_config/getListVideos';
$route['admin/config/activeDeleteVideo'] = 'admin/admin_config/activeDeleteVideo';
$route['admin/number-recruitment'] = 'admin/admin_config/numberRecruitment';
$route['admin/config/getConfigNumRecruitment'] = 'admin/admin_config/getConfigNumRecruitment';
$route['admin/config/updateConfigNumRecruitment'] = 'admin/admin_config/updateConfigNumRecruitment';
$route['admin/image-recruitment'] = 'admin/admin_config/imageRecruitment';
$route['admin/config/getImageRec'] = 'admin/admin_config/getImageRec';
$route['admin/config/uploadImageRec'] = 'admin/admin_config/uploadImageRec';
$route['admin/config/deleteImageRec'] = 'admin/admin_config/deleteImageRec';
$route['admin/config/activeImageRec/(:num)'] = 'admin/admin_config/activeImageRec/$1';
$route['admin/config/deactiveImageRec/(:num)'] = 'admin/admin_config/deactiveImageRec/$1';
//mail admin
$route['admin/mail/send-mail-jobseeker'] = 'admin/admin_mail/mailJobseeker';
$route['admin/mail/send-mail-employer'] = 'admin/admin_mail/mailEmployer';
$route['admin/mail/getListMailJobseeker'] = 'admin/admin_mail/getListMailJobseeker';
$route['admin/mail/getListMailEmployer'] = 'admin/admin_mail/getListMailEmployer';
$route['admin/mail/uploadAttachFile'] = 'admin/admin_mail/uploadAttachFile';
$route['admin/mail/sendMail'] = 'admin/admin_mail/sendMail';
//$route['admin/mai/success']
//admin api
$route['admin/getNotifyContact'] = 'admin/admin_api/getNotifyContact';
$route['admin/getNotifySupport'] = 'admin/admin_api/getNotifySupport';
$route['admin/support/getListSupportChat'] = 'admin/admin_api/getListSupportChat';
$route['admin/getDataChartRecruitment'] = 'admin/admin_api/getDataChartRecruitment';
$route['admin/getDataChartJobseekerEmployer'] = 'admin/admin_api/getDataChartJobseekerEmployer';
//errors route
$route['403'] = 'admin/admin_error/page403';
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
$route['aboutus'] = 'home/about';
$route['aboutus/(:any)'] = 'home/aboutTeam/$1';
$route['about/term'] = 'home/term';
$route['organizational-structure'] = 'home/structure';
$route['service'] = 'home/service';
$route['getNewsRecruitment'] = 'home/getNewsRecruitment';
$route['adwords'] = 'home/adwords';

//job manager
$route['job/(:any)-(:num).html'] = 'job/job_detail/index/$2/$1';
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
$route['province/(:any)-(:num).html'] = 'job/job_province/index/$1/$2';
$route['province/(:any)-(:num).html/(:num)'] = 'job/job_province/index/$1/$2';

//new job-japanesejob-region job
$route['job/(:any)/(:any)_(:any)_(:any)'] = 'job/job/index/$1/$2/$3/$4';
$route['job/(:any)/(:any)_(:any)_(:any)/(:num)'] = 'job/job/index/$1/$2/$3/$4';
$route['job/(:any)/(:any)'] = 'job/job/index/$1/$2';
$route['job/(:any)/(:any)/(:num)'] = 'job/job/index/$1/$2';

$route['search/(:any)_(:any)_(:any)'] = 'job/job_search/index/$1/$2/$3';
$route['search/(:any)_(:any)_(:any)/(:num)'] = 'job/job_search/index/$1/$2/$3';
$route['search/(:any)'] = 'job/job_search/index/$1';
$route['search/(:any)/(:num)'] = 'job/job_search/index/$1';
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

//SUPPORT API
$route['supportAPI/getMessage/(:any)'] = 'admin/admin_support/getMessage/$1';
$route['supportAPI/getMessageClient/(:any)'] = 'admin/admin_support/getMessageClient/$1';
$route['supportAPI/startChatWithSend'] = 'admin/admin_support/startChatWithSend';
$route['supportAPI/startChatWithReply'] = 'admin/admin_support/startChatWithReply';
$route['supportAPI/getMessageReply/(:any)/(:num)'] = 'admin/admin_support/getMessageReply/$1/$2';
$route['supportAPI/getMessageReplyUser/(:any)/(:num)'] = 'admin/admin_support/getMessageReplyUser/$1/$2';

//captchar API
$route['captcha/createCaptcha'] = 'captcha/createCaptcha';
$route['captcha/checkCaptcha/(:any)'] = 'captcha/checkCaptcha/$1';
