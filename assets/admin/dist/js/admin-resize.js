$(window).load(function(){
	setHeightPlan();
});

var setHeightPlan = function(){
        var highest = null;
        var hi = 0;
        $(".plan").each(function(){
          var h = $(this).height();
          if(h > hi){
             hi = h;
             highest = $(this);  
          }    
        });
      var h1 = hi-48;
     // highest.find("ul li").each(function())
     $(".plan ul li").css('height',h1/6);
}