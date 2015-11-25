<div ng-controller="adminController">


<section class="content-header">
<h1>
Thông tin tài khoản
</h1>
<ol class="breadcrumb">
  <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
  <li class="active">Thông tin tài khoản</li>
</ol>
</section>

<!-- Main content -->
<!-- <section class="content-header">
  <div class="row">

    <div class="col-md-12">
      <a class="btn btn-primary" href="<?php echo base_url('admin/document/uploadCV') ?>">upload cv mới</a> &nbsp;
      <button class="btn btn-success" ng-click="reloadCV();" >tải lại dữ liệu</button></div>
  </div>
</section> -->
<section class="content">

  <div class="row">
    <div class="col-sm-12">
       <div class="box">
        <div class="box-body">
          <div class="col-sm-8 col-sm-offset-2">
            <div class=" ad-profile-box row">
            <!-- <div class="col-sm-5 col-xs-12 margin-top-10 ad-profile-box-left">
                 <img class="img-responsive ad-profile-avatar" src="<?php echo base_url() ?>assets/admin/dist/img/supportonline/icon_black.png">
            </div> -->
            <div class="col-sm-12 col-xs-12 margin-top-10 ad-profile-box-right">
                 <span class=" col-sm-12 ad-profile-name w-wrap"><?php echo $user['firstname'] . '&nbsp' . $user['lastname']; ?></span>
                 <span class="col-sm-12 ad-profile-email w-wrap"><?php echo $user['email']; ?></span>
                  <button ng-click="modalChangePassword('md','<?php echo $user['id']; ?>','<?php echo $user['email'] ?>',1);" class="col-sm-12 w-space btn btn-primary text-center w-100 margin-top-10">Đổi mật khẩu login</button>
                  <?php if ($user['role'] == 1) {?>
                  <!-- <button ng-click="modalChangePassword('md','<?php echo $user['id']; ?>','<?php echo $user['email'] ?>',2);" class="col-sm-12 w-space btn btn-danger text-center w-100 margin-top-10">Đổi mật khẩu xem lịch sử</button> -->
                  <button class="col-sm-12 w-space btn btn-warning text-center w-100 margin-top-10">Xem lịch sử thao tác</button>
                  <?php }
?>
            </div>
          </div>
            <!-- <div class="ad-profile-box">
              <div class="col-sm-5 ad-profile-box-left no-padding">
               <img class="img-responsive" src="<?php echo base_url() ?>assets/admin/dist/img/supportonline/icon_black.png">
              </div>
              <div class="col-sm-7 ad-profile-box-right">
                <span class="ad-profile-name"><?php echo $user['firstname'] . '&nbsp' . $user['lastname']; ?></span>
                <span class="ad-profile-email"><?php echo $user['email']; ?></span>
                <div class="col-sm-12 no-padding-left ad-profile-action">
                  <div class="col-sm-12 margin-top-10">
                  <button class="btn btn-primary text-center w-100">Đổi mật khẩu login</button>
                  </div>
                  <div class="col-sm-12 margin-top-10">
                  <button class="btn btn-danger text-center w-100">Đổi mật khẩu xem lịch sử</button>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>