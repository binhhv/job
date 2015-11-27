<div class="container-fluid login-page">
		<div class="container">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-xs-12">
          <div class="login-box">

        <div class="login-box-body" style="display: inline-block;width: 100%">
    <!--<?php

?> -->
    <?php if (isset($tokenValidate)) {?>
      <form id="fChangeForgotPassword" action="<?php echo base_url() . 'forgot-password' ?>" method="post" class="form-horizontal" role="form">
            <div class="form-group">
              <div class="form-group">
                  <!-- <label class="control-label col-sm-2" for="email">Email:</label> -->
                  <div class="col-sm-12">
                    <h3 style="margin:0;padding-left: 15px;" ><?php echo lang('m_title_change_forgot_password') ?></h3>
                  </div>
                </div>
            </div>
               <div class="form-group has-feedback text-center">
                  <label class="alert-danger error-forgot hide"></label>
               </div>

               <div class="form-group">
                  <label class="control-label col-sm-4" for="email"><?php echo lang('m_new_password'); ?></label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-4" for="email"><?php echo lang('m_confirm_password'); ?></label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="passwordcf" name="passwordcf">
                     <input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?php echo $csrf['hash']; ?>" />
                      <input type="hidden" name="idUser" value="<?php echo $tokenValidate->account_id; ?>" />
                  </div>
                </div>
            <div class="form-group">
            <div class="col-sm-12 text-right">
              <!-- <div class="col-sm-10">
                 <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo lang('m_placeholder_email'); ?>">
                 <input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?php echo $csrf['hash']; ?>" />
              </div> -->
              <button id="btn-send-fpass" type="submit" class="btn btn-primary" for="email"><?php echo lang('m_send'); ?></button>
              <!-- <div class="col-sm-2 sending hide">
                <img src="<?php echo base_url() ?>/assets/main/img/default/icon_loading.gif" class="img-responsive">
              </div> -->
            </div>
            </div>
        </form>
<?php } else {?>
 <div class="col-sm-12 forgot-success" style="padding:20px;">
            Token đã hết hạn sử dụng. Nhấn vào <a href="<?php echo base_url() ?>">ĐÂY</a> để về trang chủ.
        </div>
<?php }
?>

  <div class="col-sm-12 change-fpass-success hide" style="padding:20px">
  Bạn đã đổi mật khẩu thành công. Nhấn vào <a href="<?php echo base_url('login') ?>">ĐÂY </a> để đăng nhập vào website.
  </div>

        </div>
      </div>
        </div>
      </div>

		</div>
	</div>

<script type="text/javascript">
$(document).ready(function() {

$("#fChangeForgotPassword").submit(function(event){
   event.preventDefault();
   //$("#btn-send-fpass").addClass('hide');
   //$(".sending").removeClass('hide');
   //$("#email").prop('disabled', true);
$.ajax({
    type: "POST", // HTTP method POST or GET
    url: "<?php echo base_url('post-change-forgot-password'); ?>", //Where to make Ajax calls
    dataType:"json", // Data type, HTML, json etc.
    data:$(this).serialize(), //Form variables
    success:function(response){
      if(response.status == 'error'){
        $(".error-forgot").removeClass('hide').append(response.error);
        $("input:hidden[name=csrf_test_name]").val(response.csrf.hash);
        //$("#btn-send-fpass").removeClass('hide');
        //$(".sending").addClass('hide');
        //$("#email").prop('disabled', false);
      }
      else{
       // $(".login-box-body").css('display','inline-block');
        //$("#fForgotPassword").addClass('hide');
        //$(".forgot-success").removeClass('hide');
        //window.location.href='<?php echo base_url("login") ?>';
        //console.log(response);
        $(".change-fpass-success").removeClass('hide');
         $("#fChangeForgotPassword").addClass('hide');
      }
    },
    error:function (xhr, ajaxOptions, thrownError){
      //On error, we alert user
      //$("#alert-error-contact").removeClass('hide');
      //alert(thrownError);
    }
    });
})
});
</script>
