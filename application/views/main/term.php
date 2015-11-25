	<div class="container about-page">
		<div class="row">
			<div class="col-sm-12">
				<div class="about-title-box text-center">
					<h1><?php echo lang('tp_title'); ?></h1>
					<div class="border-bottom-title border-color-1"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 ">
				<div class="col-sm-12 item-left-about-box about-box margin-top-5 margin-bottom-10">
					<div class="row ">
						<!-- <div class="col-sm-12 background-color-3 text-center">
							<h1 class="title-about-box-item">Mục đích thành lập</h1>
						</div> -->
						<div class="col-sm-12 about-box-item ">
							<p><?php echo lang('term_introduce'); ?></p>
							<ol class="ol-term">
								<li class="li-term-item"><?php echo lang('term_1'); ?>
									<ul class="ul-term-1">
										<li><p><?php echo lang('term_1_p_1'); ?></p> </li>
										<li><p><?php echo lang('term_1_p_2'); ?></p></li>
										<li><p><?php echo lang('term_1_p_3'); ?> </p></li>
										<li><p><?php echo lang('term_1_p_4'); ?></p></li>
										<li><p><?php echo lang('term_1_p_5'); ?> </p></li>
									</ul>
								</li>
								<li class="li-term-item"><?php echo lang('term_2'); ?>
									<ul class="ul-term-1">
										<li><p><?php echo lang('term_2_p_1'); ?> </p>
											<p><?php echo lang('term_2_p_2'); ?></p>
											<ul class="ul-term-child-1">
												<li><?php echo lang('term_2_p_2_1'); ?></li>
												<li><?php echo lang('term_2_p_2_2'); ?> </li>
												<li><?php echo lang('term_2_p_2_3'); ?></li>
											</ul>
											<p><?php echo lang('term_2_p_3'); ?></p>
											<ul class="ul-term-child-1">
												<li><?php echo lang('term_2_p_3_1'); ?></li>
												<li><?php echo lang('term_2_p_3_2'); ?></li>
												<!-- <li>Chúng tôi sẽ không chịu trách nhiệm trong việc hoàn tiền chi phí đăng tin nếu bạn muốn ngưng đăng tin hoặc thay đổi nội dung tin đăng giữa chừng vì lí do chỉ liên quan đến phía bạn.</li> -->
											</ul>
										</li>
										<li><p><?php echo lang('term_2_p_4'); ?></p></li>
										<li><p><?php echo lang('term_2_p_5'); ?></p></li>
										<li><p><?php echo lang('term_2_p_6'); ?></p></li>
										<li><p><?php echo lang('term_2_p_7'); ?></p></li>
									</ul>
								</li>
								<li class="li-term-item"><?php echo lang('term_3'); ?>
									<ul class="ul-term-1">
										<li><p><?php echo lang('term_3_p_1'); ?></p></li>
										<li><p><?php echo lang('term_3_p_2'); ?></p></li>
										<li><p><?php echo lang('term_3_p_3'); ?></p></li>
										<li><p><?php echo lang('term_3_p_4'); ?></p></li>
										<li><p><?php echo lang('term_3_p_5'); ?></p></li>
										<li><p><?php echo lang('term_3_p_6'); ?></p></li>
										<li><p><?php echo lang('term_3_p_7'); ?></p></li>
										<li><p><?php echo lang('term_3_p_8'); ?> </p></li>
										<li><p><?php echo lang('term_3_p_9'); ?></p></li>
										<li><p><?php echo lang('term_3_p_10'); ?> </p></li>
										<li><p><?php echo lang('term_3_p_11'); ?> </p></li>
										<li><p><?php echo lang('term_3_p_12'); ?></p></li>
										<li><p><?php echo lang('term_3_p_13'); ?></p>
											<ul class="ul-term-child-2">
												<li><?php echo lang('term_3_p_13_1'); ?> </li>
												<li><?php echo lang('term_3_p_13_2'); ?></li>
												<li><?php echo lang('term_3_p_13_3'); ?></li>
												<li><?php echo lang('term_3_p_13_4'); ?></li>
											</ul>
										</li>
									</ul>
								</li>
							</ol>
							<p>
								<?php echo lang('term_end'); ?>
							</p>
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