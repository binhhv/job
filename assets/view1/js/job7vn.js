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

