$(document).ready(function() {
 // alert("123123");
var w = document.documentElement.clientWidth;//window.innerHeight;
if(w > 767){
	resizeContent();
}

});
$( window ).resize(function() {
  var w = document.documentElement.clientWidth;//window.innerHeight;
   if(w > 767){
   		resizeContent();
   }

});
function resizeContent(){
	var hLeft = $(".jobs-content-left").height();
	var hRight = $(".jobs-content-right").height();
	if(hLeft > hRight){
		$(".jobs-content-right .job-province-box").css("min-height",(hLeft-5));
	}
	else {
		$(".jobs-content-left .job-province-box ").css("min-height",(hRight-60));
	}
}