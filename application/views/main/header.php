
				<div class="container">
					<div class="row top-header">
					<?php if (!isset($user)) {?>
						<div class="col-sm-6 text-center">
							<a href="">Đăng ký</a> |
							<a href="<?php echo base_url('login');?>?url=<?php echo urlencode(current_url());?>">Đăng nhập</a>
						</div>
						<?php } else {
	?>
							<div class="col-sm-6 text-center">

								<?php if ($user['role'] == 2 || $user['role'] == 3) {?>
									<a href="<?php echo base_url('employer');?>">Trang nhà tuyển dụng</a> |
									<a href="<?php echo base_url('logout');?>">Đăng xuất</a>
									<?php } else if ($user['role'] == 4) {?>
									<a href="">Trang của tôi</a> |
									<a href="<?php echo base_url('logout');?>">Đăng xuất</a>
	<?php } else if ($user['role'] == 1 || $user['role'] == 5) {?>
									<a href="<?php echo base_url('admin')?>">Trang admin</a> |
									<a href="<?php echo base_url('logout');?>">Đăng xuất</a>
	<?php }
	?>


						</div>
						<?php }
?>
						<div class="col-sm-6 text-right change-language-header">
							<a href="">Tiếng Việt</a> |
							<a href="">English</a> |
							<a href="">日本語</a>
						</div>
					</div>
					<a href="<?php echo base_url();?>" title="Jobify Darker" rel="home" class="site-branding">
						<h1 class="site-title">
							<img class="img-logo-page"  src="<?php
$logoJson = json_decode($this->globals->getLogoPage(), true);
if (isset($logoJson)) {
	echo base_url() . "uploads/config/logo/" . $logoJson['file_tmp'];
}
?>" width="<?php if (isset($logoWidth)) {
	echo $logoWidth;
} else {echo '170px';}
?>" height="<?php if (isset($logoHeight)) {
	echo '37px';
} else {echo '37px';}
?>" alt="JOB7VN">
							<span <?php if (isset($showTitle) && $showTitle) {
	echo 'class="web-title"';
}
?>><?php echo $this->globals->getSloganPage();?></span>
						</h1>
						<!--Tuyển dụng nhân sự tiếng Nhật <h2 class="site-description">Job Searching Just Got Easy</h2> -->
					</a>

					<nav id="site-navigation" class="site-primary-navigation slide-left">
						<a href="#" class="primary-menu-toggle navbar-toggle collapsed toggle-menu" id="toggle-menu-close"><i class="fa fa-times-circle"></i></a>
						<!-- <form role="search" method="get" id="searchform" action="https://demo.astoundify.com/jobify-darker/">
	    <div><label class="screen-reader-text" for="s">Search for:</label>
	        <input type="text" value="" name="s" id="s">
	        <button type="submit" id="searchsubmit"><i class="icon-search"></i></button>
	    </div>
	</form>	 -->
	<div class="menu-main-menu-container">
		<ul id="menu-main-menu" class="nav-menu-primary">
			<!-- <li id="menu-item-2075" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  menu-item-2075"><a href="find-a-job/index.html">Trang chủ</a> -->
			<!-- <ul class="sub-menu">
				<li id="menu-item-2076" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2076"><a href="job-region/san-francisco/index.html">San Francisco</a></li>
				<li id="menu-item-2077" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2077"><a href="job-region/palo-alto/index.html">Palo Alto</a></li>
				<li id="menu-item-2148" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2148"><a href="job-region/san-jose/index.html">San Jose</a></li>
			</ul> -->
			<li class="<?php if (isset($menu) && $menu == 'home') {
	echo 'active-menu';
}
?>  menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  menu-item-2075">
				<a href="<?php echo base_url();?>"><img class="logo-allshigoto" src="<?php echo base_url()?>assets/main/img/header/home.png"></a>
			</li>
				<li id="menu-item-1897" class="<?php if (isset($menu) && $menu == 'aboutus') {
	echo 'active-menu';
}
?> menu-item menu-item-type-post_type menu-item-object-page menu-item-1897"><a href="<?php echo base_url('aboutus')?>">Về chúng tôi</a></li>
			<!-- <li id=" menu-item-2075" class="  <?php if (isset($menu) && $menu == 'aboutus') {
	echo 'active-menu';
}
?> menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  menu-item-2075"><a href="#">Về chúng tôi<i class="fa fa-chevron-down"></i></a>
				<ul class="sub-menu">
					<li id="menu-item-2076" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2076"><a href="<?php echo base_url('about')?>">Giới thiệu</a></li>
					<li id="menu-item-2077" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2077"><a href="job-region/palo-alto/index.html">Tiêu chí</a>
					<li id="menu-item-2148" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2148"><a href="<?php echo base_url('service')?>">Tổng quan các gói dịch vụ</a></li>
					<li id="menu-item-2148" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2148"><a href="<?php echo base_url('organizational-structure')?>">Cơ cấu tổ chức</a></li>
					 <li id="menu-item-2148" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2148"><a href="<?php echo base_url('contact');?>">Liên hệ</a></li>
				</ul>
			</li> -->
	<li id="menu-item-1897" class="<?php if (isset($menu) && $menu == 'service') {
	echo 'active-menu';
}
?> menu-item menu-item-type-post_type menu-item-object-page menu-item-1897"><a href="<?php echo base_url('service')?>">Dịch vụ</a></li>
	<li id="menu-item-1897" class="<?php if (isset($menu) && $menu == 'search') {
	echo 'active-menu';
}
?> menu-item menu-item-type-post_type menu-item-object-page menu-item-1897"><a href="<?php echo base_url() . 'search/all'?>">Tìm kiếm</a></li>
	<li id="menu-item-2075" class="<?php if (isset($menu) && $menu == 'jobs') {
	echo 'active-menu';
}
?> menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  menu-item-2075"><a href="#">Việc làm<i class="fa fa-chevron-down"></i></a>
			<ul class="sub-menu">
				<li id="menu-item-2076" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2076"><a href="<?php echo base_url('job') . '/new-jobs/all';?>">Việc làm mới nhất</a></li>
				<li id="menu-item-2077" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2077"><a href="<?php echo base_url('job') . '/jobs-at-japanese/all';?>">Việc làm ở Nhật</a></li>
				<li id="menu-item-2148" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2148"><a href="<?php echo base_url('job') . '/jobs-at-north/all';?>">Việc làm miền bắc</a></li>
				<li id="menu-item-2148" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2148"><a href="<?php echo base_url('job') . '/jobs-at-middle/all';?>">Việc làm miền trung</a></li>
				<li id="menu-item-2148" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2148"><a href="<?php echo base_url('job') . '/jobs-at-south/all';?>">Việc làm miền nam</a></li>
				<!-- <li id="menu-item-2148" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2148"><a href="job-region/san-jose/index.html">Việc làm full time</a></li>
				<li id="menu-item-2148" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2148"><a href="job-region/san-jose/index.html">Việc làm part time</a></li> -->
			</ul>
	</li>
	<!-- <li id="menu-item-6454" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6454"><a href="post-a-resume/index.html">Việc làm miền Bắc</a></li>
	<li id="menu-item-6454" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6454"><a href="post-a-resume/index.html">Việc làm miền Trung</a></li>
	<li id="menu-item-6454" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6454"><a href="post-a-resume/index.html">Việc làm miền Nam</a></li>
	 -->
	<!-- <li id="menu-item-2788" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2788"><a href="<?php echo base_url('contact');?>">Contact us</a></li> -->
	<!-- <li id="menu-item-1892" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children has-children menu-item-1892"><a href="#">Pages</a>
	<ul class="sub-menu">
		<li id="menu-item-1895" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1895"><a href="blog/index.html">Blog</a></li>
		<li id="menu-item-4169" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4169"><a href="company-directory/index.html">Companies</a></li>
		<li id="menu-item-1906" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1906"><a href="post-a-job/index.html">Post A Job</a></li>
		<li id="menu-item-1967" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1967"><a href="manage-jobs/index.html">Manage Jobs</a></li>
		<li id="menu-item-2135" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2135"><a href="resumes/index.html">Resumes</a></li>
		<li id="menu-item-2136" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2136"><a href="manage-resumes/index.html">Manage Resumes</a></li>
		<li id="menu-item-1966" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1966"><a href="my-alerts/index.html">My Alerts</a></li>
		<li id="menu-item-1924" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1924"><a href="job-plans-pricing/index.html">Job Plans &amp; Pricing</a></li>
		<li id="menu-item-1902" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1902"><a href="testimonials/index.html">Testimonials</a></li>
		<li id="menu-item-1904" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1904"><a href="privacy-policy/index.html">Privacy Policy</a></li>
		<li id="menu-item-1905" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1905"><a href="terms-and-conditions/index.html">Our Terms</a></li>
		<li id="menu-item-1954" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1954"><a href="contact/index.html">Contact</a></li>
	</ul>
	</li> -->
	<li  id="register-modal" class="<?php if (isset($menu) && $menu == 'contact') {
	echo 'active-menu';
}
?> register menu-item menu-item-type-post_type menu-item-object-page menu-item-1945"><a href="<?php echo base_url('contact');?>">Liên hệ</a></li>
<?php if (!isset($user)) {?>

							<li  id="register-modal" class=" reponsive-menu register menu-item menu-item-type-post_type menu-item-object-page menu-item-1945"><a href="sign-up/index.html">Đăng ký</a></li>
	<li id="register-modal" class=" reponsive-menu register menu-item menu-item-type-post_type menu-item-object-page menu-item-1945"><a href="sign-up/index.html">Đăng nhập</a></li>

						<?php } else {
	?>


								<?php if ($user['role'] == 2 || $user['role'] == 3) {?>
									<li  id="register-modal" class=" reponsive-menu register menu-item menu-item-type-post_type menu-item-object-page menu-item-1945"><a href="<?php echo base_url('employer');?>">Trang nhà tuyển dụng</a></li>
	<li id="register-modal" class=" reponsive-menu register menu-item menu-item-type-post_type menu-item-object-page menu-item-1945"><a href="<?php echo base_url('logout')?>">Đăng xuất</a></li>
									<?php } else if ($user['role'] == 4) {?>
									<li  id="register-modal" class=" reponsive-menu register menu-item menu-item-type-post_type menu-item-object-page menu-item-1945"><a href="sign-up/index.html">Trang của tôi</a></li>
	<li id="register-modal" class=" reponsive-menu register menu-item menu-item-type-post_type menu-item-object-page menu-item-1945"><a href="<?php echo base_url('logout')?>">Đăng xuất</a></li>
	<?php } else if ($user['role'] == 1 || $user['role'] == 5) {?>
									<li  id="register-modal" class=" reponsive-menu register menu-item menu-item-type-post_type menu-item-object-page menu-item-1945"><a href="sign-up/index.html">Trang admin</a></li>
	<li id="register-modal" class=" reponsive-menu register menu-item menu-item-type-post_type menu-item-object-page menu-item-1945"><a href="<?php echo base_url('logout')?>">Đăng xuất</a></li>
	<?php }
	?>



						<?php }
?>


	<!-- <li id="login-modal" class="login menu-item menu-item-type-post_type menu-item-object-page menu-item-1900"><a href="login/index.html">Login</a></li> -->
	<li id="menu-item-2075" class=" reponsive-menu menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  menu-item-2075"><a href="find-a-job/index.html">English<i class="fa fa-chevron-down"></i></a>
			<ul class="sub-menu">
				<li id="menu-item-2076" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2076"><a href="job-region/san-francisco/index.html">English</a></li>
				<li id="menu-item-2077" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2077"><a href="job-region/palo-alto/index.html">Tiếng việt</a></li>
				<li id="menu-item-2148" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2148"><a href="job-region/san-jose/index.html">Japanese</a></li>
			</ul>
	</li>
	</ul></div>				</nav>

									<a href="#" class="primary-menu-toggle in-header toggle-menu" id="toggle-menu-open"><i class="fa fa-bars"></i></a>
								</div>
