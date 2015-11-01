	<div class="container about-page">
		<div class="row">
			<div class="col-sm-12">
				<div class="about-title-box text-center">
					<h1>Giới thiệu</h1>
					<div class="border-bottom-title border-color-1"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 left-about-box">
				<div class="col-sm-12 item-left-about-box about-box margin-top-5">
					<div class="row">
						<div class="col-sm-12 background-color-3 text-center">
							<h1 class="title-about-box-item">Mục đích thành lập</h1>
						</div>
						<div class="col-sm-12 about-box-item">
							<p>Bắt đầu bằng nhận thức rõ những khó khăn trong khâu tìm việc của các sinh viên vừa ra trường, và dựa trên mong muốn tạo ra 1 cầu nối  NHẬT- VIỆT hay nói ngắn gọn hơn là 1 cộng đồng nhân sự tiếng Nhật giữa người tìm việc và nhà tuyển dụng, ngày 14 /7/2012 chúng tôi đã đi đến quyết định thành lập trang facebook Tuyển Dụng Nhân Sự Tiếng Nhật ở Việt Nam (gọi tắt là JJVN).</p>
						</div>
					</div>

				</div>
			</div>
			<div class="col-sm-6 right-about-box">
				<div class="col-sm-12 item-right-about-box about-box margin-top-5">
					<div class="row">
						<div class="col-sm-12 background-color-2 text-center">
							<h1 class="title-about-box-item">Tiêu chí hoạt động</h1>
						</div>

						<div class="col-sm-12 about-box-item">
							<i class="fa fa-circle"></i> &nbsp;Lấy hiệu quả làm cam kết cao nhất
						</div>
						<div class="col-sm-12 line-about-box"></div>
						<div class="col-sm-12 about-box-item">
							<i class="fa fa-circle"></i> &nbsp;Lấy uy tín làm nền tảng vững chắc nhất
						</div>
						<div class="col-sm-12 line-about-box"></div>
						<div class="col-sm-12 about-box-item">
							<i class="fa fa-circle"></i> &nbsp;Lấy trách nhiệm, hợp tác, sự đãi ngộ làm phương châm hoạt động
						</div>
						<div class="col-sm-12 line-about-box"></div>
						<div class="col-sm-12 about-box-item">
							<i class="fa fa-circle"></i> &nbsp;Lấy sự say mê, khác biệt làm lợi thế trong cạnh tranh
						</div>
						<div class="col-sm-12 line-about-box"></div>
						<div class="col-sm-12 about-box-item">
							<i class="fa fa-circle"></i> &nbsp;Lấy mục tiêu, lợi ích của khách hàng làm khởi sự cho mọi hoạt động
						</div>
						<div class="col-sm-12 line-about-box"></div>
						<div class="col-sm-12 about-box-item">
							<i class="fa fa-circle"></i> &nbsp;Lấy sự tin tưởng của khách hàng làm mục tiêu phấn đấu của bản thân
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
	$(document).ready(function(){
		var w = document.documentElement.clientWidth;
		//alert(h);
		if(w > 768){
			//alert("1");
			var hleft = $(".left-about-box").height();
			var hright = $(".right-about-box").height();
			var h = (hleft > hright) ? hleft : hright;
			if(h == hleft){
				$(".item-right-about-box").css('min-height',h-5);

			}
			else{
				$(".item-left-about-box").css('min-height',h-5);

			}
			//alert(hleft);
		}
	});
	$( window ).resize(function() {
		var w = document.documentElement.clientWidth;
		//alert(h);
		if(w > 768){
			//alert("1");
			var hleft = $(".left-about-box").height();
			var hright = $(".right-about-box").height();
			var h = (hleft > hright) ? hleft : hright;
			if(h == hleft){
				$(".item-right-about-box").css('min-height',h-5);

			}
			else{
				$(".item-left-about-box").css('min-height',h-5);

			}
			//alert(hleft);
		}
		else{
			$(".item-left-about-box").removeAttr('style');
			$(".item-right-about-box").removeAttr('style');
		}
	});
	</script>