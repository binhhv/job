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
	
});

 $(window).load(function(){

    $('.flexslider').flexslider({
        animation: "slide",
        slideshow: true,
        start: function(slider){
          $('body').removeClass('loading');
        },
        direction:false,
    });  
});