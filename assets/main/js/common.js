$(function(){

	$(".btn-register-jobseeker-top").on('click',function(){
		window.location.href = base_website + 'register_uv';
	});
	$(".btn-profile-jobseeker-top").on('click',function(){
		window.location.href = base_website + 'jobseeker';
	});
	$(".btn-create-resume-not-login-top").on('click',function(){
		window.location.href = base_website + 'register_uv';
	});
	$(".btn-create-resume-login-top").on('click',function(){
		window.location.href = base_website + 'create-resume';
	});
	$(".btn-apply-recruit-not-login-top").on('click',function(){
		window.location.href = base_website + 'register_uv';
	});
	$(".btn-apply-recruit-login-top").on('click',function(){
		window.location.href = base_website + 'job/search/all';
	});

});