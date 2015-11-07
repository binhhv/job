$(function(){
	var w = $(".fb-load").width();
	w = Math.min(w,500);
	var fb = '<div class="fb-page" data-href="https://www.facebook.com/japanese.job" data-width="'+ w +'" data-height="150" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/japanese.job"><a href="https://www.facebook.com/japanese.job">Tuyển dụng nhân sự tiếng Nhật ở Việt Nam（ベトナムでの日本語関係の仕事の募集）</a></blockquote></div></div>';
	if(w < 500) {
		$(".fb-load").empty().append(fb);
	}
	else{
		$(".fb-load").addClass('text-right').empty().append(fb);
	}
})