	<?php $loginUrl = $this->globals->getLoginUrl();?>
  <div class="container-fluid login-page">
		<div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3  col-xs-12">
          <div class="login-box">
        <div class="login-box-body">
          <form action="<?php echo base_url() . 'checkLogin' ?>" method="post">
          <?php
if (isset($errors)) {?>
                 <div class="form-group has-feedback text-center">
                    <label class="alert-danger"><?php echo $errors['msg']; ?></label>

                 </div>
              <?php }

?>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="<?php echo lang('m_email'); ?>" name="email" <?php if (isset($errors['email'])) {
	echo 'value ="' . $errors['email'] . '"';
}
?>>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="<?php echo lang('m_password'); ?>" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
          <a class="btn btn-block btn-social btn-facebook" href="<?php echo $loginUrl; ?>">
              <span class="fa fa-facebook"></span> <?php echo lang('login_facebook'); ?>
            </a>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" name="remember_me"> <?php echo lang('lg_remember'); ?>
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">

              <input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?php echo $csrf['hash']; ?>" />
              <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo lang('m_login'); ?></button>
            </div><!-- /.col -->
            <div class="col-xs-12 text-right">
              <a href="<?php echo base_url('forgot-password'); ?>" style="text-decoration: underline;"><?php echo lang('m_title_forgot_password_lower'); ?></a>
            </div>
          </div>
        </form>
        </div>
      </div>
        </div>
      </div>

		</div>
	</div>

<script type="text/javascript">
  // window.fbAsyncInit = function() {
  //   FB.init({
  //   appId      : '<?php echo APP_ID ?>', // Biến app_id trong constants mà bạn vừa khởi tạo
  //   channelUrl : '<?php echo base_url(); ?>', // Sau khi login facebook sẽ redirect về trang của bạn
  //   status     : true,
  //   cookie     : true,
  //   xfbml      : true
  //   });
  // };
  // (function(d){
  //   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
  //   if (d.getElementById(id)) {return;}
  //   js = d.createElement('script'); js.id = id; js.async = true;
  //   js.src = "//connect.facebook.net/en_US/all.js";
  //   ref.parentNode.insertBefore(js, ref);
  // }(document));

  // Hàm FBLogin sử dụng đơn giản đi đến controller Login

  // window.fbAsyncInit = function() {
  //   FB.init({
  //   appId      : '<?php echo APP_ID ?>', // Biến app_id trong constants mà bạn vừa khởi tạo
  //   channelUrl : '<?php echo base_url(); ?>', // Sau khi login facebook sẽ redirect về trang của bạn
  //   status     : true,
  //   cookie     : true,
  //   xfbml      : true
  //   });
  // };
  // function FBLogin(){
  //   FB.login(function(response){
  //     if(response.authResponse){
  //       window.location.href = "<?php echo base_url(); ?>login-fb";
  //     }
  //   }, {scope: 'email,user_likes'});
  // }
</script>


