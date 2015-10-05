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
	$( window ).resize(function() {
  var w = document.documentElement.clientWidth;//window.innerHeight;
 // alert(w);
  if(w > 768){
  	var header = $("header#header");
  	header.removeClass("open");
  }
  //$('<style type="text/css">#main-page,.contact-page,.job-detail {min-height:'+h+'px; }</style>').appendTo($('head'));

});
	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
});





