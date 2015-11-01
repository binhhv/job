$(function(){

	$(window).load(function() {
		//var currentTab = $(".hc-tabs .nav.nav-tabs li.active a").attr("href"),
		//tabsImageAnimation = $(".hc-tabs-top").find("[data-tab='" + currentTab + "']").attr("data-tab-animation-effect");
		//$(".hc-tabs-top").find("[data-tab='" + currentTab + "']").addClass("current-img show " + tabsImageAnimation + " animated");
		
		$('.service-employer div div div a').on('click', function(event) {
			var currentAlert = $(this).attr("href");
			var type = $(this).data('type');
			if(type === 'open'){
				$(".service-employer").find("[data-alert='" + currentAlert + "']").removeClass("hide");
				$(this).data('type','close');// ='close';
				$(this).find('span').html('Đóng');
			}
			else{
				$(".service-employer").find("[data-alert='" + currentAlert + "']").addClass("hide");
				$(this).data('type','open');// ='open';
				$(this).find('span').html('Chi tiết');
			}
			
			//$(".current-img").removeClass("current-img show " + tabsImageAnimation + " animated");
			//$(".hc-tabs-top").find("[data-tab='" + currentTab + "']").addClass("current-img show " + tabsImageAnimation + " animated");
			//alert("click");
		});

		$('.service-employer .alert .close').on('click', function(event) {
			var currentAlert = $(this).attr("alert-value");
			$('.service-employer div div div a').each(function(){
				if($(this).attr("href")=== currentAlert){
					$(".service-employer").find("[data-alert='" + currentAlert + "']").addClass("hide");
					$(this).data('type','open');// ='open';
					$(this).find('span').html('Chi tiết');
				}
			});
		});
	});

		
})