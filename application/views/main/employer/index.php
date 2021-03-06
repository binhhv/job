
	<div class="container employer-page">
		<div class="row">
			<div class="col-sm-4 col-sm-push-8">
				<div class="row">
					<div class="col-sm-12">
						<?php echo $employer_menu;?>

					</div>
				</div>
			</div>


			<div class="col-sm-8 col-sm-pull-4">
			<div class="card">
				<div class="row-employer row">
					<div class="col-sm-12">
						<label class="alert-recruitment text-color-3">
							<h3 >211</h3>
						</label>
						<label class="alert-recruitment">tin tuyển dụng đã được đăng .</label>
					</div>
				</div>
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
					<?php if ($employerInfo->account_map_role == 2) {?>
					<div class="col-sm-12 item-field-employer text-left">
						<button class="btn btn-primary" data-toggle="modal" data-target="#employer_updateModal"><i class="fa fa-pencil-square-o"></i> &nbsp; Chỉnh sửa</button>
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
					<div class="col-sm-12 item-field-employer text-left">
						<button class="btn btn-primary" data-toggle="modal" data-target="#employer_contact_updateModal"><i class="fa fa-pencil-square-o"></i> &nbsp; Chỉnh sửa</button>
					</div>
					<div class="col-sm-12 employer-line"></div>
				</div>
				<!--thông tin tài khoản-->

				<!--thông tin liên hệ-->
				<div class="row-employer row">
					<div class="col-sm-12">
						<label class="alert-recruitment text-color-1">
							<h3 class="alert-field-employer" >Thông tin tài khoản</h3>
						</label>

					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted">Email</div>
						<div class="detail-field-employer "><?php echo $employerInfo->account_email;?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted">Mật khẩu</div>
						<div class="detail-field-employer ">**********</div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer text-left">
						<button class="btn btn-primary" data-toggle="modal" data-target="#employer_account_updateModal"><i class="fa fa-pencil-square-o"></i> &nbsp; Chỉnh sửa</button>
					</div>
					<div class="col-sm-12 employer-line"></div>

				</div>
			</div>

			</div>

		</div>
	</div>
		<?php echo $update_imfomation_employer?>
	<?php echo $update_contact_employer?>
	<?php echo $update_account_employer?>
	<?php echo $recruitment?>
