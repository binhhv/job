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
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
	
	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
});

