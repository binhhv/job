	<div class="container-fluid login-page">
		<div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-xs-12">
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
          </div>
        </form>
        </div>
      </div>
        </div>
      </div>

		</div>
	</div>


