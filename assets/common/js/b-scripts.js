$(document).ready(function(){ 
	var touch 	= $('#touch-menu');
	var menu 	= $('.menu');
 	var submenu = $('.menu li');
	$(touch).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});

	
		// $(submenu).on('click', function(e) {
		
		// $('.menu li ul').stop().slideUp({queue: false});
		// //submenu.find('ul').slideDown();
		// $(this).find('ul').stop().slideToggle({queue: false});
		// //e.preventDefault();
		// });
	
	
	

	// $('.menu li ul.sub-menu li').on('click', function(e) {
	// 	//alert("123123");
	// 	//$('.menu li ul').stop().slideUp({queue: false});
	// 	//submenu.find('ul').slideDown();
	// 	$(this).find('ul').stop().slideToggle({queue: false});
	// 	//e.preventDefault();
	// });
	//$(submenu).trigger('click');

	$(window).resize(function(){
		var w = $(window).width();
		if(w > 767 ) {
			menu.removeAttr('style');
		}
	});
	
});