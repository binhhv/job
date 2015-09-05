
	<div class="container employer-page">
		<div class="row">
			<div class="col-sm-4 col-sm-push-8">
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="info-employer row">
								<div class="col-sm-3 col-xs-3">
									<?php if (isset($employerInfo->employer_logo) && isset($employerInfo->employer_logo_tmp)) {?>
										<img src="<?php echo base_url() . 'uploads/logo/' . $employerInfo->employer_id . '/' . $employerInfo->employer_logo_tmp?>" class="logo-employer">
									<?php } else {?>
										<img src="<?php echo base_url()?>uploads/common/logo.png" class="logo-employer">
									<?php }

?>
								</div>
								<div class="col-sm-9 col-xs-9">
									<label class="employer-name"><?php echo $employerInfo->employer_name;?></label>
									<span class="employer-detail-info"><strong>
									<?php
switch ($employerInfo->account_map_role) {
case 2:
	# code...
	echo 'Quản trị';
	break;

default:
	# code...
	echo 'Nhân viên';
	break;
}
?> </strong>
									</span>
									<a class="employer-logout" href="<?php echo base_url('logout')?>"><i class="fa fa-sign-out"></i>Đăng xuất</a>
								</div>

							</div>

							<div class="row-employer row employer-tools">
								<div class="col-sm-12 employer-box-header text-center background-color-3">
									<h5 class="employer-tools-title">Nhà tuyển dụng</h5>
									<!-- <div class="border-bottom-title border-color-3"></div> -->
								</div>
								<div class="col-sm-12 employer-line"></div>
								<div class="col-sm-12 employer-tools-item">
									<a href=""><i class="fa fa-user"></i>&nbsp;Quản lý tài khoản</a>
								</div>
								<div class="col-sm-12 employer-line"></div>
								<?php if ($employerInfo->account_map_role == 2) {?>
								<div class="col-sm-12 employer-tools-item">
									<a href=""><i class="fa fa-users"></i>&nbsp;Quản lý nhân viên</a>
								</div>
								<div class="col-sm-12 employer-line"></div>
								<?php }
?>
								<div class="col-sm-12 employer-tools-item">
									<a href=""><i class="fa fa-suitcase"></i>&nbsp;Quản lý tin tuyển dụng</a>
								</div>
								<div class="col-sm-12 employer-line"></div>
								<div class="col-sm-12 employer-tools-item">
									<a href="#create_recruitmentModel"  data-toggle="modal"><i class="fa fa-pencil-square-o"></i>&nbsp;Đăng tin tuyển dụng</a>
								</div>
								<div class="col-sm-12 employer-line"></div>
								<div class="col-sm-12 employer-tools-item">
									<a href=""><i class="fa fa-file-text-o"></i>&nbsp;Tìm kiếm hồ sơ ứng viên</a>
								</div>
								<div class="col-sm-12 employer-line"></div>
								<div class="col-sm-12 employer-tools-item">
									<a href=""><i class="fa fa-pencil-square-o"></i>&nbsp;Đăng tin tuyển dụng</a>
								</div>
								<div class="col-sm-12 employer-line"></div>

							</div>

							<div class="row-employer row employer-tools">
								<div class="col-sm-12 employer-tools-item">
									<a href=""><i class="fa fa-bars"></i>&nbsp;Hồ sơ theo ngành nghề</a>
								</div>
								<div class="col-sm-12 employer-line"></div>
								<div class="col-sm-12 employer-tools-item">
									<a href=""><i class="fa fa-map-marker"></i>&nbsp;Hồ sơ theo tỉnh thành</a>
								</div>
								<div class="col-sm-12 employer-line"></div>

							</div>

							<div class="row-employer row employer-tools">
								<div class="col-sm-12 employer-box-header background-color-2 text-center">
									<h5 class="employer-tools-title">Liên hệ quảng cáo</h5>
									<!-- <div class="border-bottom-title border-color-1"></div> -->
								</div>
								<div class="col-sm-12 employer-line"></div>
								<div class="col-sm-12 employer-tools-item text-center">
									<h5><i class="fa fa-phone"></i>&nbsp;XXXXXXXXXXXX</h5>
								</div>
								<div class="col-sm-12 employer-line"></div>


							</div>


						</div>

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
