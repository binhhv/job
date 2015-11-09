<div class="card">

<?php if (isset($numRecruitmentActive)) {
	?>
				<div class="row-employer row">
					<div class="col-sm-12">
					<?php if ($numRecruitmentActive > 0) {?>
						<label class="alert-recruitment text-color-3">
							<h3 ><?php echo $numRecruitmentActive;?></h3>
						</label>
						<label class="alert-recruitment">tin tuyển dụng đã được đăng .</label>
						<?php } else {?>
						<label class="alert-recruitment">Chưa có tin tuyển dụng đã được đăng . &nbsp;<a class="btn btn-xs btn-primary" href="">Đăng tin ngay</a></label>
							<?php }
	?>
					</div>
				</div> <?php }
?>
				<div class="row-employer row">
					<div class="col-sm-12">
						<label class="alert-recruitment text-color-1">
							<h3 class="alert-field-employer" >Thông tin công ty</h3>
						</label>

					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted">Tên công ty</div>
						<div class="detail-field-employer "><?php echo $employerInfo->employer_name;?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted">Địa chỉ</div>
						<div class="detail-field-employer "><?php echo $employerInfo->employer_address;?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted">Tỉnh/Thành phố</div>
						<div class="detail-field-employer"><?php echo $employerInfo->province_name;?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted">Số điện thoại</div>
						<div class="detail-field-employer "><?php echo $employerInfo->employer_phone;?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted">Quy mô</div>
						<div class="detail-field-employer "><?php echo $employerInfo->employer_size;?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted">Website</div>
						<div class="detail-field-employer "><?php echo $employerInfo->employer_website;?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted">Giới thiệu công ty</div>
						<div class="detail-field-employer "><?php echo $employerInfo->employer_about;?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<?php if ($user['role'] == 2) {?>
					<div class="col-sm-12 item-field-employer text-left">
						<button class="btn btn-primary btn-edit-info-employer" ><i class="fa fa-pencil-square-o"></i> &nbsp; Chỉnh sửa</button> <!--data-toggle="modal" data-target="#employer_updateModal"-->
					</div>
					<div class="col-sm-12 employer-line"></div>
					<?php }
?>
				</div>

				<!--thông tin liên hệ-->
				<div class="row-employer row">
					<div class="col-sm-12">
						<label class="alert-recruitment text-color-1">
							<h3 class="alert-field-employer" >Thông tin liên hệ</h3>
						</label>

					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted">Người liên hệ</div>
						<div class="detail-field-employer "><?php echo $employerInfo->employer_contact_name;?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted">Số điện thoại</div>
						<div class="detail-field-employer "><?php echo $employerInfo->employer_contact_phone;?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted">Di động</div>
						<div class="detail-field-employer"><?php echo $employerInfo->employer_contact_mobile;?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted">Email</div>
						<div class="detail-field-employer "><?php echo $employerInfo->employer_contact_email;?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<?php if ($user['role'] == 2) {?>
					<div class="col-sm-12 item-field-employer text-left">
						<button class="btn btn-primary btn-edit-contact-employer"><i class="fa fa-pencil-square-o"></i> &nbsp; Chỉnh sửa</button><!-- data-toggle="modal" data-target="#employer_contact_updateModal"-->
					</div>
					<?php }
?>
					<div class="col-sm-12 employer-line"></div>
				</div>
				<!--thông tin tài khoản-->


			</div>


<!--modal edit contact employer-->
<div class="modal fade" id="employer_contact_updateModal" tabindex="-1" role="dialog" aria-labelledby="Register" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content content_employer_contact_updateModal">
        </div>
    </div>
</div>
<!--modal edit info employer-->
<div class="modal fade" id="employer_updateModal" tabindex="-1" role="dialog" aria-labelledby="Register" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content content_employer_updateModal">
        </div>
    </div>
</div>