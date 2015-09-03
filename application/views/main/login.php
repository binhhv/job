	<div class="container-fluid login-page">
		<div class="container">
			<div class="login-box">
				<div class="login-box-body">
					<form action="<?php echo base_url() . 'checkLogin'?>" method="post">
          <?php
if (isset($errors)) {?>
                 <div class="form-group has-feedback text-center">
                    <label class="alert-danger"><?php echo $errors;?></label>

                 </div>
              <?php }

?>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" name="remember_me"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">

              <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?php echo $csrf['hash'];?>" />
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
				</div>
			</div>
		</div>
	</div>


