<div class="card">
<style>
.nav-list{padding-right:15px;padding-left:15px;margin-bottom:0;}
.nav-list-main{padding-left:0px;padding-right:0px;margin-bottom:0;}
span.nav-toggle-icon{font-size:7px !important;top:-2px !important;color:#888 !important;}

</style>



							<div class="info-employer row">
								<div class="col-sm-3 col-xs-3">



									<?php
if (isset($employerInfo->employer_logo) && isset($employerInfo->employer_logo_tmp)) {?>
										<img src="<?php
echo base_url() . 'uploads/logo/' . $employerInfo->employer_id . '/' . $employerInfo->employer_logo_tmp?>" class="logo-employer">
									<?php
} else {?>
										<img src="<?php
echo base_url()?>uploads/common/logo.png" class="logo-employer">
									<?php
}
?>
								</div>
								<div class="col-sm-9 col-xs-9">
									<label class="employer-name"><?php
echo $employerInfo->employer_name;?></label>
									<span class="employer-detail-info"><strong>
									<?php
switch ($user['role']) {
case 2:
	// code...
	echo 'Quản trị';
	break;

default:
	// code...
	echo 'Nhân viên';
	break;
}
?> </strong>
									</span>
									<a class="employer-logout" href="<?php
echo base_url('logout')?>"><i class="fa fa-sign-out"></i>Đăng xuất</a>
								</div>

							</div>
							<!-- <div class="row-employer row employer-tools"> -->
								<!--thông tin tài khoản-->
								<div class="row-employer row">
									<div class="col-sm-12">
										<label class="alert-recruitment text-color-1">
											<h3 class="alert-field-employer" >Thông tin tài khoản</h3>
										</label>

									</div>
									<div class="col-sm-12 employer-line"></div>
									<div class="col-sm-12 item-field-employer">
										<div class="title-field-employer text-muted">Email</div>
										<div class="detail-field-employer "><?php echo $user['email'];?></div>
									</div>
									<div class="col-sm-12 employer-line"></div>
									<div class="col-sm-12 item-field-employer">
										<div class="title-field-employer text-muted">Mật khẩu</div>
										<div class="detail-field-employer ">**********</div>
									</div>
									<div class="col-sm-12 employer-line"></div>
									<div class="col-sm-12 item-field-employer text-left">
										<button class="btn btn-primary" data-toggle="modal" data-target="#employer_account_updateModal"><i class="fa fa-pencil-square-o"></i> &nbsp; Đổi mật khẩu</button>
									</div>
									<div class="col-sm-12 employer-line"></div>

								</div>
							<!-- </div> -->
							<div class="row-employer row employer-tools">



								<div class="col-sm-12 employer-box-header text-center background-color-3">
									<h5 class="employer-tools-title">Nhà tuyển dụng</h5>
									<!-- <div class="border-bottom-title border-color-3"></div> -->
								</div>
								<div class="col-sm-12 employer-line"></div>
								<div class="col-sm-12 employer-tools-item">
									<a href="<?php echo site_url('employer');?>"><i class="fa fa-pencil-square-o"></i>&nbsp;Quản lý tài khoản</a>
								</div>

								<div class="col-sm-12 employer-line"></div>
								<?php if ($employerInfo->account_map_role == 2) {?>
								<div class="col-sm-12">
									<ul class="nav nav-list-main">
								        <label class="nav-toggle nav-header"><span><i class="fa fa-users"></i>&nbsp;Quản lý nhân viên</span></label>
								            <ul class="nav nav-list nav-left-ml menu_left">
								                <li><a href="#"><i class="fa fa-circle-o"></i>Danh sách nhân viên</a></li>
								                <li><a href="#"><i class="fa fa-circle-o"></i>Link</a></li>
								            </ul>
								        </li>
									</ul>
								</div>

																<?php
}
?>
								<div class="col-sm-12 employer-line"></div>

								<div class="col-sm-12">
									<ul class="nav nav-list-main">
								        <label class="nav-toggle nav-header"><span><i class="fa fa-user"></i>&nbsp;Quản lý tin tuyển dụng</span></label>
								            <ul class="nav nav-list nav-left-ml menu_left">
								            	<li><a href="#create_recruitmentModel"  data-toggle="modal"><i class="fa fa-circle-o"></i>Tạo tin tuyển dụng</a></li>
								                <li><a href="<?php echo site_url('employer/employer/recruitment_active');?>"><i class="fa fa-circle-o"></i>Tin tuyển dụng đã đăng</a></li>
								                <li><a href="<?php echo site_url('employer/employer/recruitment_active');?>"><i class="fa fa-circle-o"></i>Tin tuyển dụng chờ duyệt</a></li>
								                <li><a href="<?php echo site_url('employer/employer/recruitment_active');?>"><i class="fa fa-circle-o"></i>Tin tuyển dụng hết hạn</a></li>
								            </ul>
									</ul>
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
									<!-- <div class="col-sm-12 text-center margin-top-10"> -->
										<button class="btn btn-danger btn-lg" onclick="location.href='<?php echo base_url('adwords');?>'">Liên hệ</button>
										<h5 class="margin-top-10"><i class="fa fa-phone"></i>&nbsp;Hotline: 01212 049 149</h5>
									<!-- </div> -->

								</div>
								<div class="col-sm-12 employer-line"></div>


							</div>


						</div>




<script>
	$('ul.nav-left-ml').toggle();
$('label.nav-toggle span').click(function () {
  $(this).parent().parent().children('ul.nav-left-ml').toggle(300);
  var cs = $(this).attr("class");
  if(cs == 'nav-toggle-icon glyphicon glyphicon-chevron-right') {
    $(this).removeClass('glyphicon-chevron-right').addClass('glyphicon-chevron-down');
  }
  if(cs == 'nav-toggle-icon glyphicon glyphicon-chevron-down') {
    $(this).removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-right');
  }
});
</script>