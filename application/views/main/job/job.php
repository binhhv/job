<div class="container-fluid job-detail">
<?php if (isset($jobDetail)) {
	?>

	<?php if (!isset($user) || $user['role'] == 4) {?>
	<div class=" title-job-scroll hide">
		<div class="col-sm-8 text-center"><label class="lb-title-job-scroll"><?php echo $jobDetail->rec_title;?></label></div>
		<div class="col-sm-4 text-center"><button class="btn btn-lg btn-danger">NỘP HỒ SƠ</button></div>
	</div>
	<?php }
	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div class=" job-content">

						<div class="col-sm-12 job-content-item ">

								<!-- <div class="row col-sm-12 job-content-item text-center">
									<h1 class="title-detail-job"><?php echo $jobDetail->rec_title;?></h1>
								</div> -->



										<h3 class="title-field-detail-job">Chi tiết công việc
										<?php if (!isset($user) || $user['role'] == 4) {?>
										<button class="btn btn-danger btn-md pull-right">Nộp hồ sơ</button>
										<?php }
	?>
										</h3>
										<div class="col-sm-12 field-job-line"></div>
										<h1 class="title-detail-job"><?php echo $jobDetail->rec_title;?></h1>
										<span class="employer-name-dj"><?php echo $jobDetail->employer_name;?></span>
										<span class="employer-address-dj"><?php echo $jobDetail->employer_address;?></span>
										<div class="col-sm-12 field-job-line"></div>
										<div class="col-sm-12 option-detail-job ">
											<div class="row">
												<div class="col-sm-6 item-option-detail-job"><b>Ngành nghề:</b> <?php echo $jobDetail->career_name;?></div>
												<div class="col-sm-6 item-option-detail-job"><b>Mức lương:</b> <?php echo $jobDetail->rec_salary;?></div>
												<div class="col-sm-6 item-option-detail-job"><b>Loại hình công việc:</b> <?php echo $jobDetail->fjob_type . '-' . $jobDetail->jcform_type;?></div>
												<div class="col-sm-6 item-option-detail-job"><b>Trình độ:</b><?php echo $jobDetail->ljob_level?></div>
												<div class="col-sm-12 item-option-detail-job"><b>Địa điểm làm việc:</b><label class="address-detail-job"><?php
$provinces = json_decode($jobDetail->provinces);
	if (count($provinces) > 0) {
		foreach ($provinces as $value) {
			echo $value->nameprovince . '&nbsp&nbsp';
		}
	}
	//var_dump($provinces);
	?></label></div>
											</div>
										</div>
						</div>
						<?php $welfares = json_decode($jobDetail->welfares);
	if (count($welfares) > 0) {
		?>
						<div class="col-sm-12 job-content-item ">

								<!-- <div class="row col-sm-12 job-content-item text-center">
									<h1 class="title-detail-job"><?php echo $jobDetail->rec_title;?></h1>
								</div> -->



										<h3 class="title-field-detail-job">Phúc lợi

										</h3>
										<div class="col-sm-12 field-job-line"></div>
										<?php
foreach ($welfares as $value) {
			echo '<span class="welfare-detail-job"><i class=' . '"' . $value->iconwelfare . '"></i>' . '&nbsp;' . $value->titlewelfare . '</span>'; //echo $value->nameprovince . '&nbsp&nbsp';
		}
		?>
						</div>
<?php }
	?>
						<div class="col-sm-12 job-content-item ">

								<!-- <div class="row col-sm-12 job-content-item text-center">
									<h1 class="title-detail-job"><?php echo $jobDetail->rec_title;?></h1>
								</div> -->



										<h3 class="title-field-detail-job">Mô tả và yêu cầu công việc

										</h3>
										<div class="col-sm-12 field-job-line"></div>
										<div class="col-sm-12 option-detail-job ">
											<div class="row">
												<div class="col-sm-12 item-option-detail-job "><span class="title-item-dj ">Nội dung công việc</span>
													<div class="col-sm-12 field-job-line"></div>
												<div class="col-sm-12 item-option-detail-job text-muted"><?php echo nl2br($jobDetail->rec_job_content);?></div>
												</div>

												<div class="col-sm-12 item-option-detail-job"><span class="title-item-dj">Chế độ hậu đãi</span>
														<div class="col-sm-12 field-job-line"></div>
												<div class="col-sm-12 item-option-detail-job text-muted"><?php echo nl2br($jobDetail->rec_job_regimen);?></div>
												</div>

												<div class="col-sm-12 item-option-detail-job "><span class="title-item-dj">Thời gian làm việc</span>
													<div class="col-sm-12 field-job-line"></div>
												<div class="col-sm-12 item-option-detail-job text-muted"><?php echo date('d/m/Y', strtotime($jobDetail->rec_job_time));?></div>
												</div>

												<div class="col-sm-12 item-option-detail-job "><span class="title-item-dj">Yêu cầu bắt buộc</span>
													<div class="col-sm-12 field-job-line"></div>
												<div class="col-sm-12 item-option-detail-job text-muted"><?php echo nl2br($jobDetail->rec_job_require);?></div>
												</div>

												<div class="col-sm-12 item-option-detail-job "><span class="title-item-dj">Điều kiện/Ưu tiên</span>
													<div class="col-sm-12 field-job-line"></div>
												<div class="col-sm-12 item-option-detail-job text-muted"><?php echo nl2br($jobDetail->rec_job_priority);?></div>
												</div>

											</div>
										</div>
						</div>

						<div class="col-sm-12 job-content-item margin-bottom-10">

								<!-- <div class="row col-sm-12 job-content-item text-center">
									<h1 class="title-detail-job"><?php echo $jobDetail->rec_title;?></h1>
								</div> -->



										<h3 class="title-field-detail-job">Thông tin liên hệ

										</h3>
										<div class="col-sm-12 field-job-line"></div>
										<div class="col-sm-12 option-detail-job ">
											<div class="row">
												<div class="col-sm-12 item-option-detail-job "><span class="title-item-dj ">Người liên hệ</span>
													<div class="col-sm-12 field-job-line"></div>
												<div class="col-sm-12 item-option-detail-job text-muted"><?php echo $jobDetail->rec_contact_name;?></div>
												</div>

												<div class="col-sm-12 item-option-detail-job"><span class="title-item-dj">Email</span>
														<div class="col-sm-12 field-job-line"></div>
												<div class="col-sm-12 item-option-detail-job text-muted"><?php echo $jobDetail->rec_contact_email;?></div>
												</div>

												<div class="col-sm-12 item-option-detail-job "><span class="title-item-dj">Địa chỉ</span>
													<div class="col-sm-12 field-job-line"></div>
												<div class="col-sm-12 item-option-detail-job text-muted"><?php echo $jobDetail->rec_contact_address;?></div>
												</div>

												<div class="col-sm-12 item-option-detail-job "><span class="title-item-dj">Điện thoại</span>
													<div class="col-sm-12 field-job-line"></div>
												<div class="col-sm-12 item-option-detail-job text-muted"><?php echo $jobDetail->rec_contact_phone;?></div>
												</div>

												<div class="col-sm-12 item-option-detail-job "><span class="title-item-dj">Di động</span>
													<div class="col-sm-12 field-job-line"></div>
												<div class="col-sm-12 item-option-detail-job text-muted"><?php echo $jobDetail->rec_contact_mobile;?></div>
												</div>
												<div class="col-sm-12 item-option-detail-job "><span class="title-item-dj">Hình thức liên hệ</span>
													<div class="col-sm-12 field-job-line"></div>
												<div class="col-sm-12 item-option-detail-job text-muted"><?php echo $jobDetail->contact_form_type;?></div>
												</div>
											</div>
										</div>
						</div>


						<!-- <div class="col-sm-12 job-content-item ">





										<h3 class="title-field-detail-job">Nộp hồ sơ trong một bước

										</h3>
										<div class="col-sm-12 field-job-line"></div>
										<div class="col-sm-12 option-detail-job ">
											<div class="row">

											</div>
										</div>
						</div> -->


				</div>
			</div>
			<div class="col-sm-4 ">
				<div class="job-left">

						<div class="job-left-item col-sm-12">
						<div class="row">
							<div class="col-sm-12">
								<label class="text-color-1 field-job">
									<h3 class="alert-field-job">Bản đồ các công việc</h3>
								</label>
							</div>
							<div class="col-sm-12 field-job-line"></div>
							<div class="col-sm-12 map-job" id="map-job">
							</div>
							</div>
						</div>

						<?php if (!isset($user) || $user['role'] == 4) {?>
						<div class="job-left-item col-sm-12">
						<div class="row">
							<div class="col-sm-12 employer-box-header text-center background-color-3">
								<!-- <label class="text-color-1 field-job"> -->
									<h3 class="alert-field-job employer-tools-title text-color-2">Nộp hồ sơ trong một bước</h3>
								<!-- </label> -->
							</div>
							<div class="col-sm-12 field-job-line"></div>
							<div class="col-sm-12 margin-top-10" >
							<form class="form-horizontal" role="form">
							  	<div class="form-group">
							    <label class="control-label col-sm-2" for="firstname">Họ</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="firstname" placeholder="Họ">
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-2" for="lastname">Tên</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="lastname" placeholder="Tên">
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-2" for="email">Email</label>
							    <div class="col-sm-10">
							      <input type="email" class="form-control" id="email" placeholder="Email">
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-2">Resume</label>
							    <div class="col-sm-10">
							    	<label><input type="radio" name="doc" value="doconline">Hồ sơ trực tuyến </label>&nbsp;
							    	<label><input type="radio" name="doc" value="doccv">Hồ sơ đính kèm</label>
							    </div>
							  </div>

							  <div class="form-group">
							    <div class="col-sm-offset-2 col-sm-10">
							      <button type="submit" class="btn btn-danger">Nộp hồ sơ</button>
							    </div>
							  </div>
							</form>
							</div>
							</div>
						</div>
						<?php }
	?>

						<div class="job-left-item col-sm-12  margin-bottom-10">
						<div class="row">
							<div class="col-sm-12 employer-box-header text-center background-color-2">
								<!-- <label class="text-color-1 field-job"> -->
									<h3 class="alert-field-job-advance employer-tools-title">Các công việc tương tự</h3>
								<!-- </label> -->
							</div>
							<div class="col-sm-12 field-job-line"></div>
							<?php if (isset($jobSames)) {
		foreach ($jobSames as $value) {?>
										<div class="col-sm-12  item-job-advance" >
											<a href="<?php echo base_url('job') . '/' . str_replace(' ', '-', $value->rec_title) . '-' . $value->recmp_map_rec . '.html'?>"><?php echo $value->rec_title;?></a>
											<small><?php echo $value->employer_name;?></small>
										</div>
										<div class="col-sm-12 field-job-line "></div>
								<?php }
	}
	?>


							<!-- <div class="col-sm-12 item-job-advance" >
								<a href="#">Kỹ sư cầu nối</a>
								<small>Hà nội</small>
							</div>
							<div class="col-sm-12 field-job-line "></div>
							<div class="col-sm-12 item-job-advance" >
								<a href="#">Kế toán doanh nghiệp</a>
								<small>Bình dương</small>
							</div>
							<div class="col-sm-12 field-job-line "></div>
							<div class="col-sm-12 item-job-advance" >
								<a href="#">Kế toán trưởng</a>
								<small>Đồng nai</small>
							</div>

							<div class="col-sm-12 field-job-line "></div>
							<div class="col-sm-12 item-job-advance" >
								<a href="#">Kế toán trưởng</a>
								<small>Đồng nai</small>
							</div>
							<div class="col-sm-12 field-job-line "></div>
							<div class="col-sm-12 item-job-advance" >
								<a href="#">Kế toán trưởng</a>
								<small>Đồng nai</small>
							</div>
							<div class="col-sm-12 field-job-line "></div> -->

							</div>
						</div>



				</div>
			</div>
		</div>
	</div>
	<?php } else {?>
	<div class="container">
		<div class="row not-find-job">
			<div class="col-sm-12 text-center">
				Không tìm thấy công việc này. Vui lòng thử lại sau hoặc nhấn vào <a href="<?php echo base_url();?>"><strong>ĐÂY</strong></a> để về trang chủ.
			</div>
		</div>
	</div>
<?php }
?>
</div>
<script type="text/javascript">

      function initialize() {




            var datacenter = <?php echo $centerMap;?>;
            var data = <?php echo $jobMap;?>;
            if(datacenter){
	      	  var mapOptions = {
			    zoom: 6,
			    center: new google.maps.LatLng(datacenter.province_lat, datacenter.province_long)
			  };
  			map = new google.maps.Map(document.getElementById('map-job'),
     		 mapOptions);

            //var bounds = new google.maps.LatLngBounds();

            for (var i = 0; i < data.length; i++) {
                createMarker(map,data[i]); <!-- MARKERS! -->

            }
            }

        }
      function createMarker(currentMap, data) {
				var marker = new MarkerWithLabel({
       			position: new google.maps.LatLng(data.province_lat, data.province_long),
     			 map: currentMap,
                 icon: '<?php echo base_url();?>assets/main/img/map/marker5.png',

                 draggable: false,
                 raiseOnDrag: false,
                 labelContent: ""+data.numjob,
                 labelAnchor: new google.maps.Point((data.numjob.length >= 3)? 10 : ((data.numjob.length >= 2) ? 7 : 4), 25),
                 labelClass: "mapIconLabel", // the CSS class for the label
                 labelInBackground: false,
                  url: "http://www.google.com"
				});
				 var infowindow = new google.maps.InfoWindow({
				                     content: data.province_name + "<br>" + data.numjob +" việc làm. "
				                 });

				 google.maps.event.addListener(marker, 'click', function() {
				         window.open(marker.url);// window.location.href = marker.url;
				    });
				 google.maps.event.addListener(marker, 'mouseover', function() {
				    infowindow.open(map, this);
				});
				 google.maps.event.addListener(marker, 'mouseout', function() {
				    infowindow.close();
				});

				}
		      $(document).ready(function(){
		      		initialize();
		      });

    </script>

