	<div class="row">
		<div class="col-lg-12 col-sm-12 col-md-12">
			<div class="flexslider">
	              <ul class="slides">
	              	<?php
	              	//var_dump($slides);
	              		foreach ($slides as $value) { ?>
	              			<li><a href="#"><img src="<?php echo base_url() .'assets/view1/img/slide/'.$value;?>" alt="slider" /></a></li>
	              		<?php }
	              	 ?>
	               <!--  <li><a href="gallery-single.htm"><img src="<?php echo base_url();?>assets/common/img/gallery/bg1.jpg" alt="slider" /></a></li>
	                <li><a href="gallery-single.htm"><img src="<?php echo base_url();?>assets/common/img/gallery/bg2.jpg" alt="slider" /></a></li>
	                <li><a href="gallery-single.htm"><img src="<?php echo base_url();?>assets/common/img/gallery/bg3.jpg" alt="slider" /></a></li>
	                <li><a href="gallery-single.htm"><img src="<?php echo base_url();?>assets/common/img/gallery/bg4.jpg" alt="slider" /></a></li>
	                <li><a href="gallery-single.htm"><img src="<?php echo base_url();?>assets/common/img/gallery/bg5.jpg" alt="slider" /></a></li> -->
	              </ul>
	        </div>
		</div>
	</div>
	<!--Search box-->
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="search-box">
				<div class="search-box-title">
					<h1>Tìm việc làm</h1>
				</div>
				<div class="search-box-content">
					<form class="form-inline" role="form">
						<div class="row">
					  <div class="form-group col-sm-5 col-md-5 col-xs-12">
					    <label for="email">Ngành nghề:</label>
					    <input type="email" class="form-control" id="email">
					  </div>
					  <div class="form-group col-sm-5 col-md-5 col-xs-12">
					    <label for="pwd">Địa điểm:</label>
					    	<select class="form-control select-address input-large" data-width="100%">
					    		<option value="-1">Tất cả</option>
					    		<option value="-1">Hồ chí minh</option>
					    	</select>
					  </div>
					  <!-- <div class="form-group col-sm-3 col-md-3 col-xs-12">
					    <label for="pwd">Cấp bậc:</label>
					    <select class="form-control select-rank">
					    		<option value="-1">Tất cả</option>
					    		<option value="-1">Nhân viên</option>
					    		<option value="-1">Mới tốt nghiệp</option>
					    </select>
					  </div> -->
					  <div class="form-group col-sm-2 col-md-2 col-xs-12">
					  		<button type="submit" class="btn btn-default btn-search">Tìm kiếm</button>
					  </div>
					  </div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--company partner-->
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
			<div class="company-partner-box">
				<div class="col-sm-2 col-md-2 col-lg-2 col-xs-4 item-company-partner">
					<a href="#" class="single-ad">
						<img src="<?php echo base_url().'assets/view1/img/companypartner/canon_fe_88x43_3.png'?>">
						<span class="ad-slogan">Company</span>
					</a>
				</div>
				<div class="col-sm-2 col-md-2 col-lg-2 col-xs-4 item-company-partner">
					<a href="#" class="single-ad">
						<img src="<?php echo base_url().'assets/view1/img/companypartner/eva_fe_24jan (1).jpg'?>">
						<span class="ad-slogan">Company</span>
					</a>
				</div>
				<div class="col-sm-2 col-md-2 col-lg-2 col-xs-4 item-company-partner">
					<a href="#" class="single-ad">
						<img src="<?php echo base_url().'assets/view1/img/companypartner/eva_fe_24jan.jpg'?>">
						<span class="ad-slogan">Company</span>
					</a>
				</div>
				<div class="col-sm-2 col-md-2 col-lg-2 col-xs-4 item-company-partner">
					<a href="#" class="single-ad">
						<img src="<?php echo base_url().'assets/view1/img/companypartner/honda-fe-88x43.gif'?>">
						<span class="ad-slogan">Company</span>
					</a>
				</div>
				<div class="col-sm-2 col-md-2 col-lg-2 col-xs-4 item-company-partner">
					<a href="#" class="single-ad">
						<img src="<?php echo base_url().'assets/view1/img/companypartner/logovg_resize.jpg'?>">
						<span class="ad-slogan">Company</span>
					</a>
				</div>
				<div class="col-sm-2 col-md-2 col-lg-2 col-xs-4 item-company-partner">
					<a href="#" class="single-ad">
						<img src="<?php echo base_url().'assets/view1/img/companypartner/microsoft.jpg'?>">
						<span class="ad-slogan">Company</span>
					</a>
				</div>
				
			</div>
		</div>
	</div>
	<!--content page-->
	<div class="row content-page">
		<div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
			<div class="left-page">
				<!--list job-->
				<div class="list-job-box">
					<div class="title-job-box">
						<h1>Công việc mới</h1>
					</div>
					<div class="content-job-box">
						<ul class="job_listings">
							<li id="job_listing-8" class="job_listing job-type-part-time job_position_filled type-job_listing post-8 type-job_listing status-publish has-post-thumbnail hentry job_listing_region-san-francisco job_listing_category-developement job_listing_type-part-time" data-longitude="-122.4863492" data-latitude="37.7467314" data-title="Design Technologist at Amazon" data-href="https://demo.astoundify.com/jobify-darker/job/design-technologist-shopping-innovation/">
								<div class="row">
									<a href="job/design-technologist-shopping-innovation/index.html" class="job_listing-link">
										<div class="logo col-sm-2 col-md-1 col-lg-1">
											<img class="company_logo" src="<?php echo base_url() .'assets/view1/img/job/job-no-image.jpg'; ?>" alt="Amazon">
										</div>
										<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
											<h3>Game Developer</h3>
											<div class="company">
												<strong>Gameloft</strong> 									
											</div>
										</div>

										<div class="location col-xs-12 col-md-5 col-lg-4">
											Đã nẵng
										</div>

										<ul class="meta col-lg-2">					
											<li class="job-type full-time">Full Time</li>
											<li class="date"><date>Posted 2 day ago</date></li>
										</ul>
									</a>
								</div>
							</li>
							<!--item-->
							<li id="job_listing-8" class="job_listing job-type-part-time job_position_filled type-job_listing post-8 type-job_listing status-publish has-post-thumbnail hentry job_listing_region-san-francisco job_listing_category-developement job_listing_type-part-time" data-longitude="-122.4863492" data-latitude="37.7467314" data-title="Design Technologist at Amazon" data-href="https://demo.astoundify.com/jobify-darker/job/design-technologist-shopping-innovation/">
								<div class="row">
									<a href="job/design-technologist-shopping-innovation/index.html" class="job_listing-link">
										<div class="logo col-sm-2 col-md-1 col-lg-1">
											<img class="company_logo" src="<?php echo base_url() .'assets/view1/img/job/job-no-image.jpg'; ?>" alt="Amazon">
										</div>
										<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
											<h3>PHP Developer</h3>
											<div class="company">
												<strong>Tinh vân</strong> 									
											</div>
										</div>

										<div class="location col-xs-12 col-md-5 col-lg-4">
											Hà nội
										</div>

										<ul class="meta col-lg-2">					
											<li class="job-type part-time">Part Time</li>
											<li class="date"><date>Posted 2 days ago</date></li>
										</ul>
									</a>
								</div>
							</li>
							<!--item-->
							<li id="job_listing-8" class="job_listing job-type-part-time job_position_filled type-job_listing post-8 type-job_listing status-publish has-post-thumbnail hentry job_listing_region-san-francisco job_listing_category-developement job_listing_type-part-time" data-longitude="-122.4863492" data-latitude="37.7467314" data-title="Design Technologist at Amazon" data-href="https://demo.astoundify.com/jobify-darker/job/design-technologist-shopping-innovation/">
								<div class="row">
									<a href="job/design-technologist-shopping-innovation/index.html" class="job_listing-link">
										<div class="logo col-sm-2 col-md-1 col-lg-1">
											<img class="company_logo" src="<?php echo base_url() .'assets/view1/img/job/job-no-image.jpg'; ?>" alt="Amazon">
										</div>
										<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
											<h3>Developer mobile</h3>
											<div class="company">
												<strong>TMA</strong> 									
											</div>
										</div>

										<div class="location col-xs-12 col-md-5 col-lg-4">
											Hồ chí minh
										</div>

										<ul class="meta col-lg-2">					
											<li class="job-type full-time">Full Time</li>
											<li class="date"><date>Posted 3 days ago</date></li>
										</ul>
									</a>
								</div>
							</li>
							<!--item-->
							<li id="job_listing-8" class="job_listing job-type-part-time job_position_filled type-job_listing post-8 type-job_listing status-publish has-post-thumbnail hentry job_listing_region-san-francisco job_listing_category-developement job_listing_type-part-time" data-longitude="-122.4863492" data-latitude="37.7467314" data-title="Design Technologist at Amazon" data-href="https://demo.astoundify.com/jobify-darker/job/design-technologist-shopping-innovation/">
								<div class="row">
									<a href="job/design-technologist-shopping-innovation/index.html" class="job_listing-link">
										<div class="logo col-sm-2 col-md-1 col-lg-1">
											<img class="company_logo" src="<?php echo base_url() .'assets/view1/img/job/job-no-image.jpg'; ?>" alt="Amazon">
										</div>
										<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
											<h3>Design Technologist</h3>
											<div class="company">
												<strong>FPT</strong> 									
											</div>
										</div>

										<div class="location col-xs-12 col-md-5 col-lg-4">
											Hồ chí minh
										</div>

										<ul class="meta col-lg-2">					
											<li class="job-type part-time">Part Time</li>
											<li class="date"><date>Posted 5 days ago</date></li>
										</ul>
									</a>
								</div>
							</li>
					
						</ul>
					</div>
					<div class="footer-job-box text-center">
							<a class="load_more_jobs" href="#"><strong>Xem thêm công việc</strong></a>						
					</div>
				</div>
				<!--list job mien bac-->

				<div class="list-job-box">
					<div class="title-job-box">
						<h1>Công việc miền bắc</h1>
					</div>
					<div class="content-job-box">
						<ul class="job_listings">
							<li id="job_listing-8" class="job_listing job-type-part-time job_position_filled type-job_listing post-8 type-job_listing status-publish has-post-thumbnail hentry job_listing_region-san-francisco job_listing_category-developement job_listing_type-part-time" data-longitude="-122.4863492" data-latitude="37.7467314" data-title="Design Technologist at Amazon" data-href="https://demo.astoundify.com/jobify-darker/job/design-technologist-shopping-innovation/">
								<div class="row">
									<a href="job/design-technologist-shopping-innovation/index.html" class="job_listing-link">
										<div class="logo col-sm-2 col-md-1 col-lg-1">
											<img class="company_logo" src="<?php echo base_url() .'assets/view1/img/job/job-no-image.jpg'; ?>" alt="Amazon">
										</div>
										<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
											<h3>Game Developer</h3>
											<div class="company">
												<strong>Gameloft</strong> 									
											</div>
										</div>

										<div class="location col-xs-12 col-md-5 col-lg-4">
											Đã nẵng
										</div>

										<ul class="meta col-lg-2">					
											<li class="job-type full-time">Full Time</li>
											<li class="date"><date>Posted 2 day ago</date></li>
										</ul>
									</a>
								</div>
							</li>
							<!--item-->
							<li id="job_listing-8" class="job_listing job-type-part-time job_position_filled type-job_listing post-8 type-job_listing status-publish has-post-thumbnail hentry job_listing_region-san-francisco job_listing_category-developement job_listing_type-part-time" data-longitude="-122.4863492" data-latitude="37.7467314" data-title="Design Technologist at Amazon" data-href="https://demo.astoundify.com/jobify-darker/job/design-technologist-shopping-innovation/">
								<div class="row">
									<a href="job/design-technologist-shopping-innovation/index.html" class="job_listing-link">
										<div class="logo col-sm-2 col-md-1 col-lg-1">
											<img class="company_logo" src="<?php echo base_url() .'assets/view1/img/job/job-no-image.jpg'; ?>" alt="Amazon">
										</div>
										<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
											<h3>PHP Developer</h3>
											<div class="company">
												<strong>Tinh vân</strong> 									
											</div>
										</div>

										<div class="location col-xs-12 col-md-5 col-lg-4">
											Hà nội
										</div>

										<ul class="meta col-lg-2">					
											<li class="job-type part-time">Part Time</li>
											<li class="date"><date>Posted 2 days ago</date></li>
										</ul>
									</a>
								</div>
							</li>
							<!--item-->
							<li id="job_listing-8" class="job_listing job-type-part-time job_position_filled type-job_listing post-8 type-job_listing status-publish has-post-thumbnail hentry job_listing_region-san-francisco job_listing_category-developement job_listing_type-part-time" data-longitude="-122.4863492" data-latitude="37.7467314" data-title="Design Technologist at Amazon" data-href="https://demo.astoundify.com/jobify-darker/job/design-technologist-shopping-innovation/">
								<div class="row">
									<a href="job/design-technologist-shopping-innovation/index.html" class="job_listing-link">
										<div class="logo col-sm-2 col-md-1 col-lg-1">
											<img class="company_logo" src="<?php echo base_url() .'assets/view1/img/job/job-no-image.jpg'; ?>" alt="Amazon">
										</div>
										<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
											<h3>Developer mobile</h3>
											<div class="company">
												<strong>TMA</strong> 									
											</div>
										</div>

										<div class="location col-xs-12 col-md-5 col-lg-4">
											Hồ chí minh
										</div>

										<ul class="meta col-lg-2">					
											<li class="job-type full-time">Full Time</li>
											<li class="date"><date>Posted 3 days ago</date></li>
										</ul>
									</a>
								</div>
							</li>
							<!--item-->
							<li id="job_listing-8" class="job_listing job-type-part-time job_position_filled type-job_listing post-8 type-job_listing status-publish has-post-thumbnail hentry job_listing_region-san-francisco job_listing_category-developement job_listing_type-part-time" data-longitude="-122.4863492" data-latitude="37.7467314" data-title="Design Technologist at Amazon" data-href="https://demo.astoundify.com/jobify-darker/job/design-technologist-shopping-innovation/">
								<div class="row">
									<a href="job/design-technologist-shopping-innovation/index.html" class="job_listing-link">
										<div class="logo col-sm-2 col-md-1 col-lg-1">
											<img class="company_logo" src="<?php echo base_url() .'assets/view1/img/job/job-no-image.jpg'; ?>" alt="Amazon">
										</div>
										<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
											<h3>Design Technologist</h3>
											<div class="company">
												<strong>FPT</strong> 									
											</div>
										</div>

										<div class="location col-xs-12 col-md-5 col-lg-4">
											Hồ chí minh
										</div>

										<ul class="meta col-lg-2">					
											<li class="job-type part-time">Part Time</li>
											<li class="date"><date>Posted 5 days ago</date></li>
										</ul>
									</a>
								</div>
							</li>
					
						</ul>
					</div>
					<div class="footer-job-box text-center">
							<a class="load_more_jobs" href="#"><strong>Xem thêm công việc</strong></a>						
					</div>
				</div>
				<!--list job mien trung-->
				<div class="list-job-box">
					<div class="title-job-box">
						<h1>Công việc miền trung</h1>
					</div>
					<div class="content-job-box">
						<ul class="job_listings">
							<li id="job_listing-8" class="job_listing job-type-part-time job_position_filled type-job_listing post-8 type-job_listing status-publish has-post-thumbnail hentry job_listing_region-san-francisco job_listing_category-developement job_listing_type-part-time" data-longitude="-122.4863492" data-latitude="37.7467314" data-title="Design Technologist at Amazon" data-href="https://demo.astoundify.com/jobify-darker/job/design-technologist-shopping-innovation/">
								<div class="row">
									<a href="job/design-technologist-shopping-innovation/index.html" class="job_listing-link">
										<div class="logo col-sm-2 col-md-1 col-lg-1">
											<img class="company_logo" src="<?php echo base_url() .'assets/view1/img/job/job-no-image.jpg'; ?>" alt="Amazon">
										</div>
										<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
											<h3>Game Developer</h3>
											<div class="company">
												<strong>Gameloft</strong> 									
											</div>
										</div>

										<div class="location col-xs-12 col-md-5 col-lg-4">
											Đã nẵng
										</div>

										<ul class="meta col-lg-2">					
											<li class="job-type full-time">Full Time</li>
											<li class="date"><date>Posted 2 day ago</date></li>
										</ul>
									</a>
								</div>
							</li>
							<!--item-->
							<li id="job_listing-8" class="job_listing job-type-part-time job_position_filled type-job_listing post-8 type-job_listing status-publish has-post-thumbnail hentry job_listing_region-san-francisco job_listing_category-developement job_listing_type-part-time" data-longitude="-122.4863492" data-latitude="37.7467314" data-title="Design Technologist at Amazon" data-href="https://demo.astoundify.com/jobify-darker/job/design-technologist-shopping-innovation/">
								<div class="row">
									<a href="job/design-technologist-shopping-innovation/index.html" class="job_listing-link">
										<div class="logo col-sm-2 col-md-1 col-lg-1">
											<img class="company_logo" src="<?php echo base_url() .'assets/view1/img/job/job-no-image.jpg'; ?>" alt="Amazon">
										</div>
										<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
											<h3>PHP Developer</h3>
											<div class="company">
												<strong>Tinh vân</strong> 									
											</div>
										</div>

										<div class="location col-xs-12 col-md-5 col-lg-4">
											Hà nội
										</div>

										<ul class="meta col-lg-2">					
											<li class="job-type part-time">Part Time</li>
											<li class="date"><date>Posted 2 days ago</date></li>
										</ul>
									</a>
								</div>
							</li>
							<!--item-->
							<li id="job_listing-8" class="job_listing job-type-part-time job_position_filled type-job_listing post-8 type-job_listing status-publish has-post-thumbnail hentry job_listing_region-san-francisco job_listing_category-developement job_listing_type-part-time" data-longitude="-122.4863492" data-latitude="37.7467314" data-title="Design Technologist at Amazon" data-href="https://demo.astoundify.com/jobify-darker/job/design-technologist-shopping-innovation/">
								<div class="row">
									<a href="job/design-technologist-shopping-innovation/index.html" class="job_listing-link">
										<div class="logo col-sm-2 col-md-1 col-lg-1">
											<img class="company_logo" src="<?php echo base_url() .'assets/view1/img/job/job-no-image.jpg'; ?>" alt="Amazon">
										</div>
										<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
											<h3>Developer mobile</h3>
											<div class="company">
												<strong>TMA</strong> 									
											</div>
										</div>

										<div class="location col-xs-12 col-md-5 col-lg-4">
											Hồ chí minh
										</div>

										<ul class="meta col-lg-2">					
											<li class="job-type full-time">Full Time</li>
											<li class="date"><date>Posted 3 days ago</date></li>
										</ul>
									</a>
								</div>
							</li>
							<!--item-->
							<li id="job_listing-8" class="job_listing job-type-part-time job_position_filled type-job_listing post-8 type-job_listing status-publish has-post-thumbnail hentry job_listing_region-san-francisco job_listing_category-developement job_listing_type-part-time" data-longitude="-122.4863492" data-latitude="37.7467314" data-title="Design Technologist at Amazon" data-href="https://demo.astoundify.com/jobify-darker/job/design-technologist-shopping-innovation/">
								<div class="row">
									<a href="job/design-technologist-shopping-innovation/index.html" class="job_listing-link">
										<div class="logo col-sm-2 col-md-1 col-lg-1">
											<img class="company_logo" src="<?php echo base_url() .'assets/view1/img/job/job-no-image.jpg'; ?>" alt="Amazon">
										</div>
										<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
											<h3>Design Technologist</h3>
											<div class="company">
												<strong>FPT</strong> 									
											</div>
										</div>

										<div class="location col-xs-12 col-md-5 col-lg-4">
											Hồ chí minh
										</div>

										<ul class="meta col-lg-2">					
											<li class="job-type part-time">Part Time</li>
											<li class="date"><date>Posted 5 days ago</date></li>
										</ul>
									</a>
								</div>
							</li>
					
						</ul>
					</div>
					<div class="footer-job-box text-center">
							<a class="load_more_jobs" href="#"><strong>Xem thêm công việc</strong></a>						
					</div>
				</div>
				<!--list job mien nam -->
				<div class="list-job-box">
					<div class="title-job-box">
						<h1>Công việc miền nam</h1>
					</div>
					<div class="content-job-box">
						<ul class="job_listings">
							<li id="job_listing-8" class="job_listing job-type-part-time job_position_filled type-job_listing post-8 type-job_listing status-publish has-post-thumbnail hentry job_listing_region-san-francisco job_listing_category-developement job_listing_type-part-time" data-longitude="-122.4863492" data-latitude="37.7467314" data-title="Design Technologist at Amazon" data-href="https://demo.astoundify.com/jobify-darker/job/design-technologist-shopping-innovation/">
								<div class="row">
									<a href="job/design-technologist-shopping-innovation/index.html" class="job_listing-link">
										<div class="logo col-sm-2 col-md-1 col-lg-1">
											<img class="company_logo" src="<?php echo base_url() .'assets/view1/img/job/job-no-image.jpg'; ?>" alt="Amazon">
										</div>
										<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
											<h3>Game Developer</h3>
											<div class="company">
												<strong>Gameloft</strong> 									
											</div>
										</div>

										<div class="location col-xs-12 col-md-5 col-lg-4">
											Đã nẵng
										</div>

										<ul class="meta col-lg-2">					
											<li class="job-type full-time">Full Time</li>
											<li class="date"><date>Posted 2 day ago</date></li>
										</ul>
									</a>
								</div>
							</li>
							<!--item-->
							<li id="job_listing-8" class="job_listing job-type-part-time job_position_filled type-job_listing post-8 type-job_listing status-publish has-post-thumbnail hentry job_listing_region-san-francisco job_listing_category-developement job_listing_type-part-time" data-longitude="-122.4863492" data-latitude="37.7467314" data-title="Design Technologist at Amazon" data-href="https://demo.astoundify.com/jobify-darker/job/design-technologist-shopping-innovation/">
								<div class="row">
									<a href="job/design-technologist-shopping-innovation/index.html" class="job_listing-link">
										<div class="logo col-sm-2 col-md-1 col-lg-1">
											<img class="company_logo" src="<?php echo base_url() .'assets/view1/img/job/job-no-image.jpg'; ?>" alt="Amazon">
										</div>
										<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
											<h3>PHP Developer</h3>
											<div class="company">
												<strong>Tinh vân</strong> 									
											</div>
										</div>

										<div class="location col-xs-12 col-md-5 col-lg-4">
											Hà nội
										</div>

										<ul class="meta col-lg-2">					
											<li class="job-type part-time">Part Time</li>
											<li class="date"><date>Posted 2 days ago</date></li>
										</ul>
									</a>
								</div>
							</li>
							<!--item-->
							<li id="job_listing-8" class="job_listing job-type-part-time job_position_filled type-job_listing post-8 type-job_listing status-publish has-post-thumbnail hentry job_listing_region-san-francisco job_listing_category-developement job_listing_type-part-time" data-longitude="-122.4863492" data-latitude="37.7467314" data-title="Design Technologist at Amazon" data-href="https://demo.astoundify.com/jobify-darker/job/design-technologist-shopping-innovation/">
								<div class="row">
									<a href="job/design-technologist-shopping-innovation/index.html" class="job_listing-link">
										<div class="logo col-sm-2 col-md-1 col-lg-1">
											<img class="company_logo" src="<?php echo base_url() .'assets/view1/img/job/job-no-image.jpg'; ?>" alt="Amazon">
										</div>
										<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
											<h3>Developer mobile</h3>
											<div class="company">
												<strong>TMA</strong> 									
											</div>
										</div>

										<div class="location col-xs-12 col-md-5 col-lg-4">
											Hồ chí minh
										</div>

										<ul class="meta col-lg-2">					
											<li class="job-type full-time">Full Time</li>
											<li class="date"><date>Posted 3 days ago</date></li>
										</ul>
									</a>
								</div>
							</li>
							<!--item-->
							<li id="job_listing-8" class="job_listing job-type-part-time job_position_filled type-job_listing post-8 type-job_listing status-publish has-post-thumbnail hentry job_listing_region-san-francisco job_listing_category-developement job_listing_type-part-time" data-longitude="-122.4863492" data-latitude="37.7467314" data-title="Design Technologist at Amazon" data-href="https://demo.astoundify.com/jobify-darker/job/design-technologist-shopping-innovation/">
								<div class="row">
									<a href="job/design-technologist-shopping-innovation/index.html" class="job_listing-link">
										<div class="logo col-sm-2 col-md-1 col-lg-1">
											<img class="company_logo" src="<?php echo base_url() .'assets/view1/img/job/job-no-image.jpg'; ?>" alt="Amazon">
										</div>
										<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
											<h3>Design Technologist</h3>
											<div class="company">
												<strong>FPT</strong> 									
											</div>
										</div>

										<div class="location col-xs-12 col-md-5 col-lg-4">
											Hồ chí minh
										</div>

										<ul class="meta col-lg-2">					
											<li class="job-type part-time">Part Time</li>
											<li class="date"><date>Posted 5 days ago</date></li>
										</ul>
									</a>
								</div>
							</li>
					
						</ul>
					</div>
					<div class="footer-job-box text-center">
							<a class="load_more_jobs" href="#"><strong>Xem thêm công việc</strong></a>						
					</div>
				</div>

				<!--end list job-->
			</div>



		</div>
		<div class="col-md-4 col-md-4 col-sm-4 col-xs-12 right-page">

			<div class="tag-job">
				<div class="title-tag-job">
					<h1>Tag Công việc</h1>
				</div>
				<div class="content-tag-job">
					<ul class="ul-tag-job">
						<li class="item-tag-job">
							<a href="#" >Biên dịch</a>
						</li>
						<li class="item-tag-job">
							<a href="#" >Developer mobile</a>
						</li>
						<li class="item-tag-job">
							<a href="#" >php</a>
						</li>
						<li class="item-tag-job">
							<a href="#" >Hồ chí minh</a>
						</li>
						<li class="item-tag-job">
							<a href="#" >~500$</a>
						</li>
						<li class="item-tag-job">
							<a href="#" >500$-2000$</a>
						</li>
						<li class="item-tag-job">
							<a href="#" >Java developer</a>
						</li>
						<li class="item-tag-job">
							<a href="#" >Marketing</a>
						</li>
						<li class="item-tag-job">
							<a href="#" >Hà nội</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- <div class="banner-ads-box">
				<img src="<?php echo base_url().'assets/view1/img/slide/slide1.jpg'; ?>">
			</div> -->

			
			<!--search detail-->
			<div class="search-detail-box">
				<form role="form">
				<div class="title-search-detail-box">
					<h1>Tìm việc nhanh</h1>
				</div>
				<div class="content-search-detail-box">
					
					  <div class="form-group">
					    <input type="email" class="form-control" id="email" placeholder="Từ khóa">
					  </div>
					  <div class="form-group">
					   	<select class="fomr-control">
					   		<option>Chọn ngành nghề</option>
					   	</select>
					  </div>
					  <div class="form-group">
					   	<select class="fomr-control">
					   		<option>Chọn tỉnh thành</option>
					   	</select>
					  </div>
					  <div class="form-group">
					   	<select class="fomr-control">
					   		<option>Chọn mức lương</option>
					   	</select>
					  </div>
					  <div class="form-group">
					   	<select class="fomr-control">
					   		<option>Chọn trình độ</option>
					   	</select>
					  </div>
					  <div class="form-group">
					   	<select class="fomr-control">
					   		<option>Chọn giới tính</option>
					   	</select>
					  </div>
					  <div class="form-group">
					   	<select class="fomr-control">
					   		<option>Chọn loại hình công việc</option>
					   	</select>
					  </div>
					  <div class="form-group">
					   	<select class="fomr-control">
					   		<option>Chọn kinh nghiệm</option>
					   	</select>
					  </div>
					  
					
				</div>
				<div class="footer-search-detail-box text-center">
				<button type="submit" class="btn btn-info">Tìm kiếm</button>
				</div>
				</form>
			</div>

			<!--banner ads-->
			

			<div class="banner-ads-box">
				<img src="<?php echo base_url().'assets/view1/img/slide/slide1.jpg'; ?>">
			</div>

			<div class="banner-ads-box">
				<img src="<?php echo base_url().'assets/view1/img/slide/slide1.jpg'; ?>">
			</div>

			<div class="banner-ads-box">
				<img src="<?php echo base_url().'assets/view1/img/slide/slide1.jpg'; ?>">
			</div>
			<div class="banner-ads-box">
				<img src="<?php echo base_url().'assets/view1/img/slide/slide1.jpg'; ?>">
			</div>
			<div class="banner-ads-box">
				<img src="<?php echo base_url().'assets/view1/img/slide/slide1.jpg'; ?>">
			</div>
		</div>
	</div>
