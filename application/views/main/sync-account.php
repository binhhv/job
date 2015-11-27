<div class="container-fluid login-page">
		<div class="container">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-xs-12">
          <div class="login-box">

        <div class="login-box-body" style="display: inline-block;width: 100%">
    <!--<?php

?> -->
          <div class="col-sm-12 " style="padding:20px;">
           Email facebook này đã được đăng ký trên website. Bạn có muốn đồng bộ tài khoản facebook với tài khoản hiện có không ?
           Nhấn vào <a href="<?php echo base_url('sync-account') . '/' . base64_encode($idFacebook) . '-' . base64_encode($email); ?>">ĐÂY</a> để đồng bộ tài khoản.
          </div>
          <!-- <form id="fForgotPassword" action="<?php echo base_url() . 'forgot-password' ?>" method="post" class="form-horizontal" role="form">
            <div class="form-group">
              <div class="form-group">
                  <!-- <label class="control-label col-sm-2" for="email">Email:</label>
                  <div class="col-sm-12">
                    <h3 style="margin:0;padding-left: 15px;" ><?php echo lang('m_title_forgot_password') ?></h3>
                  </div>
                </div>
            </div>
               <div class="form-group has-feedback text-center">
                  <label class="alert-danger error-forgot hide"></label>
               </div>
            <div class="form-group">

              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo lang('m_placeholder_email'); ?>">
                 <input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?php echo $csrf['hash']; ?>" />
              </div>
              <button id="btn-send-fpass" type="submit" class="btn btn-primary col-sm-2" for="email"><?php echo lang('m_send'); ?></button>
              <div class="col-sm-2 sending hide">
                <img src="<?php echo base_url() ?>/assets/main/img/default/icon_loading.gif" class="img-responsive">
              </div>
            </div>
        </form> -->

        </div>
      </div>
        </div>
      </div>

		</div>
	</div>