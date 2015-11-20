<?php
$video = $this->globals->getVideoIntro();
$members = $this->globals->getMembers();
$videoName = '';
$extension = ''; // substr(strrchr($logoName, '.'), 1);
if (isset($video)) {
	$videoJson = json_decode($video->config_data_json, true);
	$videoName .= $videoJson['file_tmp'];
	$extension .= substr(strrchr($videoName, '.'), 1);
}
//var_dump($video)
?>

	<div class="container-fluid about-page-box">
		<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-12">

							<!-- page-title start -->
							<!-- ================ -->
							<!-- <h1 class="page-title">About Us</h1>
							<div class="separator-2"></div> -->
							<!-- <div class="space"></div> -->
							<div class="space"></div>
							<h1 class="h1-about-us "><?php echo lang('m_introduce'); ?></h1>
							<div class="border-bottom-title-left border-color-1"></div>
							<!-- page-title end -->

							<div class="row margin-top-10">
								<div class="col-md-6">
									<p class="align-justify">Bắt đầu bằng nhận thức rõ những khó khăn trong khâu tìm việc của các sinh viên vừa ra trường, và dựa trên mong muốn tạo ra 1 cầu nối NHẬT- VIỆT hay nói ngắn gọn hơn là 1 cộng đồng nhân sự tiếng Nhật giữa người tìm việc và nhà tuyển dụng. Cũng như là phát triển nhịp gạch nối mở rộng  trang facebook Tuyển Dụng Nhân Sự Tiếng Nhật ở Việt Nam (www.facebook.com/japanese.job) để ngày càng đáp ứng nhu cầu, nguyện vọng của các thành viên trên trang. Ngày 1/7/2015, chúng tôi đã đi đến quyết định thành lập trang website www.allshigoto.com. Đây là thể được xem là bước ngoặt đánh dấu sự chuyển mình sau hơn ba năm kể từ năm 2012- năm bắt đầu hoạt động của trang facebook Tuyển Dụng Nhân Sự Tiếng Nhật ở Việt Nam, mở ra 1 kỷ nguyên mới cho chúng tôi cũng như các bạn đã, đang và sẽ song hành gắn bó cùng chúng tôi trong những chặng đường sắp tới.</p>
									<!-- <p>Sed eget pulvinar quam, vel feugiat enim. Aliquam erat volutpat. Phasellus eu porta ipsum. Suspendisse aliquet imperdiet commodo. Aenean vel lacinia elit. Class aptent taciti sociosqu ad litora torquent per. Vestibulum velmo.</p> -->
									<ul class="list-icons">
										<li class="object-non-visible animated object-visible fadeInUpSmall" data-animation-effect="fadeInUpSmall">Chuyên nghiệp-Nhanh chóng-Hiệu quả</li>
										<li class="object-non-visible animated object-visible fadeInUpSmall" data-animation-effect="fadeInUpSmall" data-effect-delay="100">Cam kết chất lượng</li>
										<li class="object-non-visible animated object-visible fadeInUpSmall" data-animation-effect="fadeInUpSmall" data-effect-delay="300">Đảm bảo uy tín</li>
										<li class="object-non-visible animated object-visible fadeInUpSmall" data-animation-effect="fadeInUpSmall" data-effect-delay="500">Hỗ trợ 24/7</li>
									</ul>
								</div>

								<!-- sidebar start -->
								<?php if (strlen($videoName) > 0) {?>
								<aside class="sidebar col-md-6">
									<div class="side vertical-divider-left">
										<div class="block clearfix">
											<h3 class="title margin-top-clear"><?php echo lang('abt_video'); ?></h3>
											<div class="embed-responsive embed-responsive-16by9">
												<video controls="controls">
													<source src="<?php echo base_url() . 'uploads/config/video/' . $videoName ?>" type="video/<?php echo $extension; ?>">
													<!-- <source src=”movie.mp4″ type=”video/mp4″> -->
													<?php echo lang('abt_error_video'); ?>
												</video>
												<!-- <iframe class="embed-responsive-item" src="//player.vimeo.com/video/29198414?byline=0&amp;portrait=0"></iframe>
												<p><a href="http://vimeo.com/29198414">Introducing Vimeo Music Store</a> from <a href="http://vimeo.com/staff">Vimeo Staff</a> on <a href="https://vimeo.com">Vimeo</a>.</p>
											 -->
											</div>
										</div>
									</div>
								</aside>
								<?php }
?>
								<!-- sidebar end -->
							</div>

						</div>
						<!-- main end -->

					</div>
				</div>
	</div>
	<?php if (isset($members)) {
	?>
<div class="section gray-bg clearfix">
				<div class="container manager">
					<!-- <div class="space"></div> -->
					<h1 class="h1-about-us "><?php echo lang('abt_title_regent'); ?></h1>
					<div class="border-bottom-title-left border-color-1"></div>
					<!-- <p class="lead">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus.</p> -->
					<div class="row grid-space-20 margin-top-10">
					<?php foreach ($members as $member) {
		$objectMember = json_decode($member->config_data_json, true);?>
		<div class="col-md-3 col-sm-6">
							<div class="box-style-1 white-bg team-member">
								<div class="overlay-container">
									<img src="<?php echo base_url() ?>uploads/config/member/<?php echo $objectMember['file_tmp'] ?>" alt="" class="img-margin-auto avatar-member">
									<br>
									<span class="member-name"><?php echo $objectMember['name']; ?></span>
									<span class="member-position"><?php echo $objectMember['position']; ?></span>
									<div class="overlay">
										<ul class="social-links clearfix">
											<li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
											<li class="skype"><a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a></li>
											<li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
										</ul>
									</div>
								</div>
								<!-- <h3>John Doe</h3>
								CEO -->
							</div>
						</div>
	<?php }
	?>
						<!-- <div class="col-md-3 col-sm-6">
							<div class="box-style-1 white-bg team-member">
								<div class="overlay-container">
									<img src="<?php echo base_url() ?>assets/main/img/about/about-team-1.png" alt="" class="img-margin-auto">
									<div class="overlay">
										<ul class="social-links clearfix">
											<li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
											<li class="skype"><a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a></li>
											<li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
										</ul>
									</div>
								</div>

							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="box-style-1 white-bg team-member">
								<div class="overlay-container">
									<img src="<?php echo base_url() ?>assets/main/img/about/about-team-3.png" alt="" class="img-margin-auto">
									<div class="overlay">
										<ul class="social-links clearfix">
											<li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
											<li class="skype"><a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a></li>
											<li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
										</ul>
									</div>
								</div>

							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="box-style-1 white-bg team-member">
								<div class="overlay-container">
									<img src="<?php echo base_url() ?>assets/main/img/about/about-team-2.png" alt="" class="img-margin-auto">
									<div class="overlay">
										<ul class="social-links clearfix">
											<li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
											<li class="skype"><a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a></li>
											<li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
										</ul>
									</div>
								</div>

							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="box-style-1 white-bg team-member">
								<div class="overlay-container">
									<img src="<?php echo base_url() ?>assets/main/img/about/about-team-4.png" alt="" class="img-margin-auto">
									<div class="overlay">
										<ul class="social-links clearfix">
											<li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
											<li class="skype"><a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a></li>
											<li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
										</ul>
									</div>
								</div>

							</div>
						</div> -->
					</div>
				</div>
			</div>
			<?php }
?>