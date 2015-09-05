$(function(){
	$("a.toggle-menu").click(function(){
			var header = $("header#header");
			if(header.hasClass("open")){
				header.removeClass("open");
			}
			else{
				header.addClass("open");
			}
	});


	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
			$('.title-job-scroll').removeClass('hide');
		} else {
			$('.scrollToTop').fadeOut();
			$('.title-job-scroll').addClass('hide');
		}
	});
	
	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
});





