
<div class="card">

	<div class="row-employer row ">
		<div class="col-sm-12 clear mb_20 margin-top-10">
            <p><span class="border-vertical text-color-1"></span>
            <span class="text-color-1 title-jobseeker-register"><strong><?php echo $recruitment->rec_title?></strong></span>
            <?php if ($employerInfo->user['id'] == $recruitment->rec_map_user_employer) {?><button data-href="<?php echo base_url('employer/recruitment') . '/edit/' . $recruitment->rec_code . '-' . $recruitment->rec_id . '.html'?>"  class="btn btn-sm btn-primary pull-right btn-edit-recruitment-em">Sửa tin</button> <?php }
?></p>
        </div>
         <div class="col-sm-12 loading-recruitments-em">
		    <img class="img-responsive" style="margin: 0 auto;" src="<?php echo base_url();?>assets/main/img/default/load.gif">
		  </div>
		<div class="col-sm-12 content-recruitments-em hide">
			<div class="col-sm-12 job-content-item ">


										<div class="col-sm-12 field-job-line"></div>
										<div class="col-sm-12 option-detail-job ">
											<div class="row">
												<div class="col-sm-6 item-option-detail-job"><b>Ngành nghề:</b> <?php echo $recruitment->career_name;?></div>
												<div class="col-sm-6 item-option-detail-job"><b>Mức lương:</b> <?php echo $recruitment->salary_value;?></div>
												<div class="col-sm-6 item-option-detail-job"><b>Loại hình công việc:</b> <?php echo $recruitment->fjob_type . '-' . $recruitment->jcform_type;?></div>
												<div class="col-sm-6 item-option-detail-job"><b>Trình độ:</b><?php echo $recruitment->ljob_level?></div>
												<div class="col-sm-12 item-option-detail-job"><b>Địa điểm làm việc:</b><label class="address-detail-job"><?php
$provinces = json_decode($recruitment->provinces);
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
						<?php $welfares = json_decode($recruitment->welfares);
if (count($welfares) > 0) {
	?>
						<div class="col-sm-12 job-content-item ">

								<!-- <div class="row col-sm-12 job-content-item text-center">
									<h1 class="title-detail-job"><?php echo $recruitment->rec_title;?></h1>
								</div> -->



										<h3 class="title-field-detail-job">Phúc lợi

										</h3>
										<!-- <div class="col-sm-12 field-job-line"></div> -->
										<?php
foreach ($welfares as $value) {
		echo '<span class="welfare-detail-job"><i class=' . '"' . $value->iconwelfare . '"></i>' . '&nbsp;' . $value->titlewelfare . '</span>'; //echo $value->nameprovince . '&nbsp&nbsp';
	}
	?>
						</div>
<?php }
?>
						<div class="col-sm-12 job-content-item">

								<!-- <div class="row col-sm-12 job-content-item text-center">
									<h1 class="title-detail-job"><?php echo $recruitment->rec_title;?></h1>
								</div> -->



										<h3 class="title-field-detail-job">Mô tả và yêu cầu công việc

										</h3>
										<!-- <div class="col-sm-12 field-job-line"></div> -->
										<div class="col-sm-12 option-detail-job ">
											<div class="row">
												<div class="col-sm-12 item-option-detail-job "><span class="title-item-dj ">Nội dung công việc</span>
													<div class="col-sm-12 field-job-line"></div>
												<div class="col-sm-12 item-option-detail-job text-muted"><?php echo nl2br($recruitment->rec_job_content);?></div>
												</div>

												<div class="col-sm-12 item-option-detail-job"><span class="title-item-dj">Chế độ hậu đãi</span>
														<div class="col-sm-12 field-job-line"></div>
												<div class="col-sm-12 item-option-detail-job text-muted"><?php echo nl2br($recruitment->rec_job_regimen);?></div>
												</div>

												<div class="col-sm-12 item-option-detail-job "><span class="title-item-dj">Thời gian làm việc</span>
													<div class="col-sm-12 field-job-line"></div>
												<div class="col-sm-12 item-option-detail-job text-muted"><?php echo date('d/m/Y', strtotime($recruitment->rec_job_time));?></div>
												</div>

												<div class="col-sm-12 item-option-detail-job "><span class="title-item-dj">Yêu cầu bắt buộc</span>
													<div class="col-sm-12 field-job-line"></div>
												<div class="col-sm-12 item-option-detail-job text-muted"><?php echo nl2br($recruitment->rec_job_require);?></div>
												</div>

												<div class="col-sm-12 item-option-detail-job "><span class="title-item-dj">Điều kiện/Ưu tiên</span>
													<div class="col-sm-12 field-job-line"></div>
												<div class="col-sm-12 item-option-detail-job text-muted"><?php echo nl2br($recruitment->rec_job_priority);?></div>
												</div>

											</div>
										</div>
						</div>


						<!--thông tin liên hệ-->
						<div class="col-sm-12 job-content-item">




										<h3 class="title-field-detail-job">Thông tin liên hệ

										</h3>
										<!-- <div class="col-sm-12 field-job-line"></div> -->
										<div class="col-sm-12 option-detail-job ">
											<div class="row">
												<div class="col-sm-12 item-option-detail-job "><span class="title-item-dj ">Người liên hệ</span>
													<div class="col-sm-12 field-job-line"></div>
												<div class="col-sm-12 item-option-detail-job text-muted"><?php echo $recruitment->rec_contact_name;?></div>
												</div>

												<div class="col-sm-12 item-option-detail-job"><span class="title-item-dj">Email</span>
														<div class="col-sm-12 field-job-line"></div>
												<div class="col-sm-12 item-option-detail-job text-muted"><?php echo $recruitment->rec_contact_email;?></div>
												</div>

												<div class="col-sm-12 item-option-detail-job "><span class="title-item-dj">Địa chỉ</span>
													<div class="col-sm-12 field-job-line"></div>
												<div class="col-sm-12 item-option-detail-job text-muted"><?php echo $recruitment->rec_contact_address;?></div>
												</div>

												<div class="col-sm-12 item-option-detail-job "><span class="title-item-dj">Điện thoại</span>
													<div class="col-sm-12 field-job-line"></div>
												<div class="col-sm-12 item-option-detail-job text-muted"><?php echo $recruitment->rec_contact_phone;?></div>
												</div>

												<div class="col-sm-12 item-option-detail-job "><span class="title-item-dj">Di động</span>
													<div class="col-sm-12 field-job-line"></div>
												<div class="col-sm-12 item-option-detail-job text-muted"><?php echo $recruitment->rec_contact_mobile;?></div>
												</div>
												<div class="col-sm-12 item-option-detail-job "><span class="title-item-dj">Hình thức liên hệ</span>
													<div class="col-sm-12 field-job-line"></div>
												<div class="col-sm-12 item-option-detail-job text-muted"><?php echo $recruitment->contact_form_type;?></div>
												</div>

											</div>
										</div>
						</div>


		</div>

    </div>

</div>