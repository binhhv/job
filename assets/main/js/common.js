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

	
	$(".btn-employer-register-top").on('click',function(){
		window.location.href = base_website + 'register_ntd';
	});
	$(".btn-employer-profile-top").on('click',function(){
		window.location.href = base_website + 'employer';
	});
	$(".btn-create-recruit-not-login").on('click',function(){
		//window.location.href = base_website + 'job/search/all';
	});
	$(".btn-create-recruit-login").on('click',function(){
		//window.location.href = base_website + 'job/search/all';
	});
});