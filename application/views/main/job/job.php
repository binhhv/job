<div class="container-fluid job-detail">
<?php if (isset($jobDetail)) {
	?>

	<?php if (!isset($user) || $user['role'] == 4) {?>
	<div class=" title-job-scroll hide">
		<div class="col-sm-8 text-center"><label class="lb-title-job-scroll"><?php echo $jobDetail->rec_title;?></label></div>
		<div class="col-sm-4 text-center"><button class="btn btn-lg btn-danger btn-scroll-apply-job">NỘP HỒ SƠ</button></div>
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
										<button class="btn btn-danger btn-md pull-right btn-apply-job">Nộp hồ sơ</button>
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

						<?php if (!isset($user) || $user['role'] == 4) {
		?>
						<div class="job-left-item col-sm-12">
						<div class="row" id="focus-apply">
							<div class="col-sm-12 employer-box-header text-center background-color-3">
								<!-- <label class="text-color-1 field-job"> -->
									<h3 class="alert-field-job employer-tools-title text-color-2">Nộp hồ sơ trong một bước</h3>
								<!-- </label> -->
							</div>
							<div class="col-sm-12 field-job-line"></div>
							<div class="col-sm-12 margin-top-10" >
							<form class="form-horizontal" role="form" name="form-apply" id="form-apply" method="post" enctype="multipart/form-data">
							  	<div class="form-group">
							    <label class="control-label col-sm-2" for="firstname">Họ</label>
							    <div class="col-sm-10">
							    <input type="hidden" name="idjob" value="<?php echo $jobDetail->rec_id;?>">
							    <input type="hidden" name="idjobseeker" value="<?php
if (isset($user)) {
			echo $user['id'];
		}
		?>">
							      <input type="text" class="form-control" id="firstname" placeholder="Họ" <?php
if (isset($user)) {
			echo 'value = "' . $user['firstname'] . '" disabled';
		}
		?>>
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-2" for="lastname">Tên</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="lastname" placeholder="Tên" <?php
if (isset($user)) {
			echo 'value = "' . $user['lastname'] . '" disabled';
		}
		?>>
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-2" for="email">Email</label>
							    <div class="col-sm-10">
							      <input type="email" class="form-control" id="email" placeholder="Email" <?php
if (isset($user)) {
			echo 'value = "' . $user['email'] . '" disabled';
		}
		?>>
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-2">Resume</label>
							    <div class="col-sm-10">
							    	<label><input type="radio" name="doc" value="doconline">Hồ sơ trực tuyến </label>&nbsp;
							    	<label><input type="radio" name="doc" value="doccv">Hồ sơ đính kèm</label>
							    </div>
							  </div>
							  <div class="form-group hide">

							    <div class="col-sm-10 token">

							    </div>
							  </div>
							  <div class="form-group hide" id="data-doc">
							    <label class="control-label col-sm-2"></label>
							    <div class="col-sm-10 data-doc-user ">
							    	<div class="col-sm-12"></div>
							    </div>
							  </div>

							  <div class="form-group">
							    <div class="col-sm-offset-2 col-sm-10">
							    <!-- <input type="file" class="form-control file-cv" name="cv1"> -->
							    <?php if (isset($user) && $user['role'] == 4) {?>
							    	<button type="submit" class="btn btn-danger">Nộp hồ sơ</button>
							    <?php } else {?>
							    	<a href="<?php echo base_url('login');?>?url=<?php echo urlencode(current_url());?>" class="btn btn-primary">Đăng nhập để nộp hồ sơ</a>
							    	<?php	}
		?>

							    </div>
							  </div>
							</form>
							<div  class="col-sm-12 text-center msg-apply hide"></div>
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
$(document).ready(function(){
	$('input:radio[name="doc"]').attr('checked', false);

	$("#form-apply").submit(function(event){
	 event.preventDefault();
	 if(!checkSelectedDoc()) {
	 	alert("chua chon");
	 }
	 else{
				 	var form = $(this);
			        var formdata = false;
			        if (window.FormData) {
			            formdata = new FormData(form[0]);
			        }
				$.ajax({
				type: "POST", // HTTP method POST or GET
				url: "<?php echo base_url('job/apply-job');?>", //Where to make Ajax calls
				dataType:"json", // Data type, HTML, json etc.
				data:  new FormData(this),
	            mimeType:"multipart/form-data",
	            contentType: false,
	            cache: false,
	            processData:false,
				//data:formdata ? formdata : form.serialize(),//$(this).serialize(), //Form variables
				success:function(response){
					if(response.status == 'success'){
						$("#form-apply").addClass('hide');
						$(".msg-apply").removeClass('hide');
						$(".msg-apply").append(response.msg);
					}
					else{
						if(response.type=='data'){
							$(".msg-apply").removeClass('hide');
							$(".msg-apply").append(response.msg);
						}
						else if(response.type=='file'){
							$(".error-file").removeClass('hide');
							$(".token").empty();
				        	var token ='<input type="hidden" name="'+response.name+'" value="'+response.hash+'" />';
				        	$(".token").append(token);
							$(".error-file").empty();
							$(".error-file").append(response.msg);
						}
					}
				},
				error:function (xhr, ajaxOptions, thrownError){
					alert("error");
					//On error, we alert user
					//$("#alert-error-contact").removeClass('hide');
					//alert(thrownError);
				}
				});
		}
});

});
$(".btn-scroll-apply-job").on("click",function(e){
	//e.preventDefault();
	//$("#focus-apply").focus();
	//alert("doconline");
	$('html, body').animate({
    scrollTop: ($('#focus-apply').first().offset().top)
},500);

});
$(".btn-apply-job").on("click",function(e){
	$('html, body').animate({
    scrollTop: ($('#focus-apply').first().offset().top)
},500);
});
function checkSelectedDoc(){
	var resutlt = false;
	if($("input:radio[name='doc']").is(":checked") && $("input:radio[name='doc-user']").is(":checked") ){
		resutlt = true;
	}

	if($("input:radio[name='doc']").is(":checked") && $("input:radio[name='cv-user']").is(":checked")){
		resutlt = true;
	}

	return resutlt;
}
	$('input:radio[name="doc"]').change(
    function(){
        if ($(this).val() == 'doconline') {
            //alert("doconline");
            $(".data-doc-user").empty();
           // getToken(getDoconline(data,<?php echo $user['id'];?>));
           getToken(getDoconline);
        }
        else if($(this).val() == 'doccv') {
            $(".data-doc-user").empty();
             getToken(getCV);
        }
    });

    function getDoconline(data){

    	var name = ''+data.name+'';
    	var hash = ''+data.hash+'';
    	var id = data.id;
    	var dataOb = {'csrf_test_name':hash,'id':id};
    	//console.log(hash);
    	   $.ajax({
        url: '<?php echo base_url() . "job/getListDoconUser"?>',
        data: dataOb, // change this to send js object
        type: "post",
        dataType:'html',
        success: function(data){
           //document.write(data); just do not use document.write
           //console.log(data);
           if(data){
           		$("#data-doc").removeClass('hide');
           		$(".data-doc-user").append(data);
           }
        }
      });
    };
    function getCV(data){
    	var name = ''+data.name+'';
    	var hash = ''+data.hash+'';
    	var id = data.id;
    	var dataOb = {'csrf_test_name':hash,'id':id};
    	//console.log(hash);
    	   $.ajax({
        url: '<?php echo base_url() . "job/getListCVUser"?>',
        data: dataOb, // change this to send js object
        type: "post",
        dataType:'html',
        success: function(data){
           //document.write(data); just do not use document.write
           //console.log(data);
           if(data){
           		$("#data-doc").removeClass('hide');
           		$(".data-doc-user").append(data);
           }
        }
      });
    };
    var getToken = function(callback){
    	 $.ajax({
        url: '<?php echo base_url() . "job/getToken"?>',
        type: "get",
        dataType:'json',
        success: function(data){
        	$(".token").empty();
        	//var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
        	//$(".token").append(token);
           //document.write(data); just do not use document.write
           //console.log(data);
           callback(data);
           //console.log(data.name);
        }
      });
    };


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
                  url: "<?php echo base_url('province') . '/'?>"+  data.province_name.replace(' ', '-')  + '-'  + data.province_id + '.html',
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

