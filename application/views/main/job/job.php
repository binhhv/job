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

							    <div class="col-sm-10 token hide">
													<input type="hidden" name="<?php echo $csrf['name'];?>" value="<?php echo $csrf['hash'];?>" />
												</div>
							  </div>
							  <div class="form-group hide" id="data-doc">
							    <label class="control-label col-sm-2"></label>
							    <div class="col-sm-10 data-doc-user hide">
							    	<?php
if (isset($docs) && count($docs) > 0) {
			foreach ($docs as $value) {?>
												<div class="col-sm-12">
													<label>
														<input type="radio" name="docuser" value="<?php echo $value->docon_id?>">
														<?php echo $value->docon_code?>

													</label>
													&nbsp;(<span class="view-doc" data-id="<?php echo $value->docon_id?>">xem</span>)
												</div>
												<?php }

			if (count($docs) < 3) {
				?>
												<div class="col-sm-12">
												<label>
													<input type="radio" name="docuser" value="-1" data-id="<?php echo $value->docon_id?>">Tạo hồ sơ mới

												</label>
												<!-- <a class="create-doc-user" href="#" onclick="openModalCreateDocon" >Tạo hồ sơ mới</a> -->
												</div>

												<!-- <div class="col-sm-12 hide">
													<div id="token-name"></div>
													<div id="token-hash"></div>
												</div> -->
										<?php }
			?>
										<?php } else {?>
										<label >Bạn chưa có hồ sơ nào.</label><br>
											<label>
													<input  type="radio" name="docuser" value="-1" data-id="0">Tạo hồ sơ mới

												</label>
		<?php }
		?>
							    	<!-- <div class="col-sm-12"></div> -->
							    </div>
							    <div class="col-sm-10 data-cv-user hide">
							    		<?php
if (isset($cvs) && count($cvs) > 0) {
			foreach ($cvs as $value) {?>
												<div class="col-sm-12">
													<label>
														<input type="radio" name="cvuser" value="<?php echo $value->doccv_id?>">
														<?php echo $value->doccv_code?>

													</label>
													&nbsp;(<a class="download-cv" href="<?php echo base_url() . 'downloadcv/' . $value->doccv_map_user . '/' . $value->doccv_file_tmp . '/' . $value->doccv_file_name . '/1'?>">tải xuống</a>)
												</div>
												<?php }

			if (count($cvs) < 3) {
				?>
												<div class="col-sm-12">
												<label><input type="radio" name="cvuser" value="-1">upload cv</label><label class="text-danger">(doc|docx|pdf)</label>
												<div class="fileupload hide">
												<!-- <input type="file" class="form-control hide file-cv" name="cv" id="cv"> -->
												<!-- <span class="btn btn-success fileinput-button">
											        <i class="glyphicon glyphicon-plus"></i>
											        <span>Select files...</span> -->
											        <!-- The file input field used as target for the file upload widget -->
											        <input id="fileupload" type="file" name="files" >
											    <!-- </span>
											    <br> -->
											    <br>
											    <!-- The global progress bar -->
											    <div id="progress" class="progress">
											        <div class="progress-bar progress-bar-success"></div>
											    </div>
											    <!-- The container for the uploaded files -->
											    <div id="files" class="files"></div>
												</div>
												<label class="text-danger error-file hide"></label>
												</div>
										<?php }
			?>
										<?php } else {?>
										<label>Bạn chưa có cv nào.</label><br>
											<label>
											<input type="radio" name="cvuser" value="-1" >upload cv
											</label><label class="text-danger">(doc|docx|pdf)</label>
											<div class="fileupload hide">
											<!-- <span class="btn btn-success fileinput-button">
										        <i class="glyphicon glyphicon-plus"></i> -->
										        <!-- <span>Select files...</span> -->
										        <!-- The file input field used as target for the file upload widget -->
										        <input id="fileupload" type="file" name="files" >
										    <!-- </span> -->
										    <!-- <br> -->
										    <br>
										    <!-- The global progress bar -->
										    <div id="progress" class="progress">
										        <div class="progress-bar progress-bar-success"></div>
										    </div>
										    <!-- The container for the uploaded files -->
										    <div id="files" class="files"></div>
											</div>
											<!-- <input type="file" class="form-control hide file-cv" name="cv" id="cv"> -->
											<label class="text-danger error-file hide"></label>
		<?php }
		?>
							    </div>
							  </div>
							  <!-- <div class="hide" id="value-doc"></div> -->
							  <div class="form-group">
							    <div class="col-sm-offset-2 col-sm-10">
							    <input type="hidden" name="file-name">
							    <input type="hidden" name="file-tmp">
							     <!-- <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?php echo $csrf['hash'];?>" /> -->
							    <!-- <input type="file" class="form-control file-cv" name="cv1"> -->
							    <?php if (isset($user) && $user['role'] == 4) {?>
							    	<button type="submit" class="btn btn-danger" disabled="true" id="btn-apply">Nộp hồ sơ</button>
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
											<a href="<?php echo base_url('job') . '/' . str_replace(' ', '-', $value->rec_title) . '-' . $value->recmp_map_rec . '.html'?>"><?php echo (strlen($value->rec_title) > 30) ? substr($value->rec_title, 0, 30) . '...' : $value->rec_title;?></a>
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
<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-document" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content content-document">

    </div>
 </div>
</div>

<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-create-document" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content content-create-document">

    </div>
 </div>
</div>

<div class="modal fade" id="modalApplyJobAlert">
 <div class="vertical-alignment-helper">
  <div class="modal-dialog modal-sm vertical-align-center">
    <div class="modal-content">
      <div class="modal-header background-color-3">
      	<div class="modal-popup-box">
      		<!-- <span>Modal title</span> -->
      		<img src="<?php echo base_url();?>assets/main/img/header/allSHIGOTO.png" >
      		 <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">×</button>
      	</div>

        <!-- <h4 class="modal-title">Modal title</h4> -->
      </div>
      <div class="modal-body">
      	<p class="text-danger">Bạn chưa chọn hồ sơ hoặc cv để nộp hồ sơ.</p>

		<div class="text-right"><button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Đóng</button></div>

      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div><!-- /.modal-content has-error has-feedback-->
  </div><!-- /.modal-dialog -->
	</div>
</div><!-- /.modal -->

<script type="text/javascript">
$(document).ready(function(){
	$('input:radio[name="doc"]').attr('checked', false);
	$('input:radio[name="cvuser"]').change(function(){
		 if ($(this).val() == '-1') {
		 	$(".file-cv").removeClass('hide');
		 }
		 else{
		 	$(".file-cv").addClass('hide');

		 }
	});

	$("#form-apply").submit(function(event){
	 event.preventDefault();

	 if(!checkSelectedDoc()) {
	 	//alert("chua chon");
	 	$("#modalApplyJobAlert").modal("show");
	 }
	 else{
	 			//alert($("#token-name").val());
	 			//$("#btn-apply").attr("disabled",false);
	 			 //$('input[type="submit"]').removeAttr('disabled');
	 			var form = $(this);
			    var formdata = false;
			    var dataOb ={};
			    if (window.FormData){
			       // formdata = new FormData(form[0]);
			        //console.log("> 8");
			        formdata = true;
			    }
			    else{
			    	var checupload = $('input:radio[name=cvuser]:checked').val();
			    	if(checupload == '-1'){
			    		dataOb = {'csrf_test_name':$('input:hidden[name=csrf_test_name]').val(),
			    				'idjob':$('input:hidden[name=idjob]').val(),
			    				'idjobseeker':$('input:hidden[name=idjobseeker]').val(),
			    				'doc':$('input:radio[name=doc]:checked').val(),
			    				'docuser':$('input:radio[name=docuser]:checked').val(),
			    				'cvuser':$('input:radio[name=cvuser]:checked').val(),
			    				'file-name':$('input:hidden[name=file-name]').val(),
			    				'file-tmp':$('input:hidden[name=file-tmp]').val(),
			    				};
			    	}
			    	else{
			    		dataOb = {'csrf_test_name':$('input:hidden[name=csrf_test_name]').val(),
			    				'idjob':$('input:hidden[name=idjob]').val(),
			    				'idjobseeker':$('input:hidden[name=idjobseeker]').val(),
			    				'doc':$('input:radio[name=doc]:checked').val(),
			    				'docuser':$('input:radio[name=docuser]:checked').val(),
			    				'cvuser':$('input:radio[name=cvuser]:checked').val(),
			    				};
			    	}

			    				 console.log("< 8");
			    				 console.log(dataOb);
			    }


				$.ajax({
				type: "POST", // HTTP method POST or GET
				url: "<?php echo base_url('job/apply-job');?>", //Where to make Ajax calls
				dataType:"json", // Data type, HTML, json etc.
				data:  formdata ? $(this).serialize() : dataOb,//new FormData(this),
	            // mimeType:"multipart/form-data",
	            // contentType: false,
	            // cache: false,
	            // processData:false,
				//data:formdata ? formdata : form.serialize(),//$(this).serialize(), //Form variables
				success:function(response){
					if(response.status == 'success'){
						$("#form-apply").addClass('hide');
						$(".msg-apply").removeClass('hide');
						$(".msg-apply").append(response.msg);
						$(".btn-apply-job").addClass('hide');
						$(".btn-scroll-apply-job").addClass('hide');
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
					alert(thrownError);
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
	if($("input:radio[name='doc']").is(":checked") && $("input:radio[name='docuser']").is(":checked") ){
		resutlt = true;
	}

	if($("input:radio[name='doc']").is(":checked") && $("input:radio[name='cvuser']").is(":checked")){
		resutlt = true;
	}

	var checkcv = $("input:radio[name='cvuser']:checked").val();
	var filename = $("input:hidden[name='file-name']").val();
	var filetmp = $("input:hidden[name='file-tmp']").val();
	// if(checkcv && checkcv=='-1' && filename.length > 0 && filetmp.length > 0){
	// 	result = true;
	// }
	return resutlt;
}
	$('input:radio[name="doc"]').change(
    function(){
        if ($(this).val() == 'doconline') {
            //alert("doconline");
            $("#data-doc").removeClass('hide');
            $(".data-doc-user").removeClass('hide');
            	$(".data-cv-user").addClass('hide');
           // getToken(getDoconline(data,<?php echo $user['id'];?>));
           //getToken(getDoconline);
        }
        else if($(this).val() == 'doccv') {
        	$("#data-doc").removeClass('hide');
        	$(".data-cv-user").removeClass('hide');
        	 $(".data-doc-user").addClass('hide');
           // $(".data-doc-user").empty();
             //getToken(getCV);
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

    function addTokenInput(data){
    		$(".token").empty();
        	var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
        	$(".token").append(token);
    }
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
				        // window.open(marker.url);// window.location.href = marker.url;
				        window.open(marker.url, '_self');
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


    <script type="text/javascript">
	 $(".view-doc").on("click",function(){
    	//alert("123123");
    	var id = $(this).data('id');
    	 $.ajax({
        url: '<?php echo base_url() . "job/getDetailDoc/"?>'+id,
        type: "get",
        dataType:'html',
        success: function(data){
           //document.write(data); just do not use document.write
           //console.log(data);
           $(".content-document").empty();
           $(".content-document").append(data);
            var h = document.documentElement.clientHeight;//window.innerHeight;
    		h = (h*70)/100;
    		var top = $(".title-job-scroll").height();
    		$(".modal-content").css({"height":h,"overflow":"auto","margin-top":top + 20});
           $('#modal-document').modal('show');
           //console.log(data.name);
           //alert(data);
        }
      });
    });

	 $('input:radio[name="docuser"]').change(function(){
	 	//alert("123123");
			$.ajax({
		        url: '<?php echo base_url() . "job/getToken"?>',
		        type: "get",
		        dataType:'json',
		        success: function(data){
		        	//$("#token-name").empty();
		        	$(".token").empty();
		        	var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
		        	$(".token").append(token);
		        	//alert(token);
		        	//$("#token-hash").val(data);
		           //document.write(data); just do not use document.write
		           //console.log(data);
		          // callback(data);
		           //console.log(data);
		        },
		        error:function (xhr, ajaxOptions, thrownError){
					alert(thrownError);
					//On error, we alert user
					//$("#alert-error-contact").removeClass('hide');
					//alert(thrownError);
				}
		  });
		 if ($(this).val() == '-1') {
		 	var id = $(this).data('id');
		    	 $.ajax({
		        url: '<?php echo base_url() . "job/getCreateForm/"?>'+id,
		        type: "get",
		        dataType:'html',
		        success: function(data){
		           //document.write(data); just do not use document.write
		           //console.log(data);
		           $(".content-create-document").empty();
		           $(".content-create-document").append(data);
		            var h = document.documentElement.clientHeight;//window.innerHeight;
		    		h = (h*70)/100;
		    		var top = $(".title-job-scroll").height();
		    		$(".modal-content").css({"height":h,"overflow":"auto","margin-top":top + 20});
		           $('#modal-create-document').modal('show');
		           //console.log(data.name);
		           //alert(data);
		        }
		      });
		 }

	});
$('#modal-create-document').on('hidden.bs.modal', function () {
  // do something…
 $('input:radio[name="docuser"]').attr("checked",false);
 //alert("123123");
})


</script>

<script type="text/javascript">

    $(function () {
        'use strict';
        var url = "<?php echo base_url()?>uploads/do_upload";
        $('#fileupload').fileupload({
        	 add: function(e, data) {
                var uploadErrors = [];
                var acceptFileTypes = /(\.|\/)(doc|docx|pdf)$/i;
                console.log(JSON.stringify(data));
                var ext = data.originalFiles[0]['name'].split('.').pop().toLowerCase();
					// if($.inArray(ext, ['doc','docx','pdf']) == -1) {
					//     alert('invalid extension!');
					// }
                if($.inArray(ext, ['doc','docx','pdf']) == -1) {
                    uploadErrors.push('File không đúng định dạng.');
                }
                // if(data.originalFiles[0]['size'].length && data.originalFiles[0]['size'] > 5000000) {
                //     uploadErrors.push('Kích thước file quá lớn.');
                // }
                if(uploadErrors.length > 0) {
                    var errormsg = uploadErrors.join("\n");
                    $('.error-file').empty();
                    $('.error-file').removeClass('hide');
                    $('.error-file').append(errormsg);
                } else {
                    data.submit();
                }
        	},
            url: url,
            dataType: 'json',
            done: function (e, data) {
                $.each(data.result.files, function (index, file) {
                	$("#files").empty();
                	$('.error-file').empty();
                    $('<p/>').text(file.name).appendTo('#files');
                    $("input[name=file-tmp]:hidden").val(file.name);
                    getToken(addTokenInput);
                    $("#btn-apply").attr("disabled",false);
                });
            },
         //    fail: function (e, data) {
         //    $.each(data.messages, function (index, error) {
         //    	$('.error-file').removeClass('hide');
         //        var errormsg = '<p style="color: red;">Upload file error: ' + error + '<i class="elusive-remove" style="padding-left:10px;"/></p>';
         //        $('.error-file').append(errormsg);
         //    });
       		// },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
 	$('#fileupload').change(function() {
  		var filename = $('#fileupload').val();
  //       var ext = $('#fileupload').val().split('.').pop().toLowerCase();
		// if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
		//     alert('invalid extension!');
		// }
		// else{

		// }
		$("input[name=file-name]:hidden").val(filename);
       //alert(filename);
    });
    $('#fileupload').on("click", function(){
    	//alert("123123");
    	 //var filename = $(this).val();
    	 //alert(filename);
    	$.ajax({
        url: '<?php echo base_url() . "job/getToken"?>',
        type: "get",
        dataType:'json',
        success: function(data){
        	//alert(data.hash);
        	$(".token").empty();
        	var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
        	$(".token").append(token);
           //document.write(data); just do not use document.write
           //console.log(data);
           //callback(data);
           //console.log(data.name);
        }
      });
     });

     $('input:radio[name="cvuser"]').change(function(){
     	if($(this).val() == '-1'){
     		$('.fileupload').removeClass('hide');
     	}
     	else{
     		$('.fileupload').addClass('hide');
     		$("#files").empty();
     		$('.error-file').empty();
     		$("#btn-apply").attr("disabled",false);
     	}
     });
      $('input:radio[name="docuser"]').change(function(){
     	if($(this).val() == '-1'){
     		//$('.fileupload').removeClass('hide');

     		$("#btn-apply").attr("disabled",true);
     	}
     	else{
     		//$('.fileupload').addClass('hide');
     		//$("#files").empty();
     		//$('.error-file').empty();
     		$("#btn-apply").attr("disabled",false);
     	}
     });
</script>




