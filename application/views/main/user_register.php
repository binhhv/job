<style type="text/css">
.error-register {
    color: red;
}
 </style>

<p class="text-center contact-box">
    <button class="btn btn-default" data-toggle="modal" data-target="#registerModal">Regiser</button>
</p>

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="Register" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title"><?php echo lang('title_re_user');?></h5>
                 <div id="message">


                </div>
            </div>

            <div class="modal-body">

                <!-- The form is placed inside the body of modal -->
                <form role="form" name="register-form" id="register-form" method="post" class="form-horizontal">

                    <div class="form-group mb_10">
                     <div class="require_info clearfix italic">(<span class="colorRed">*</span>) Thông tin bắt buộc nhập</div>
                    </div>
                    <div class="form-group mb_10">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label control-label-info"><?php echo lang('email_re_user');?> <span class="colorRed">*</span></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control input-lg2" name="account_email" />
                        </div>
                    </div>

                    <div class="form-group mb_10">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label control-label-info"><?php echo lang('password_re_user');?> <span class="colorRed">*</span></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="password" class="form-control input-lg2" name="account_password" />
                        </div>
                    </div>
                    <div class="form-group mb_10">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label  control-label-info"><?php echo lang('passconf_re_user');?> <span class="colorRed">*</span></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="password" class="form-control input-lg2" name="confirm_password" />
                        </div>
                    </div>
                    <div class="form-group mb_10">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label  control-label-info"><?php echo lang('first_name_re_user');?> <span class="colorRed">*</span></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control input-lg2" name="account_first_name" />
                        </div>
                    </div>
                     <div class="form-group mb_10">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label  control-label-info"><?php echo lang('last_name_re_user');?> <span class="colorRed">*</span></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control input-lg2" name="account_last_name" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12 col-md-12 col-xs-12 row-btn-register">
                            <button type="submit" class="btn btn-primary" onclick="register_user(this)"><?php echo lang('btn_register_re_user');?></button>

                        </div>
                    </div>
                    <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
//user register
$(document).ready(function() {
$("#register-form").submit(function(event){
     event.preventDefault();
        $.ajax({
        type: "POST", // HTTP method POST or GET
        url: "<?php echo base_url('register/insertAccount');?>", //Where to make Ajax calls
        dataType:"json", // Data type, HTML, json etc.
        data:$(this).serialize(), //Form variables
        success:function(response){
            // var objs = $.parseJSON(response);
            var status = response.status;
            if(status == 'errvalid'){
                var account_email = response.content.account_email;
                var account_password = response.content.account_password;
                var confirm_password = response.content.confirm_password;
                var account_first_name = response.content.account_first_name;
                var account_last_name = response.content.account_last_name;
                var csrf_name = response.content.name;
                var csrf_hash = response.content.hash;
                $('#message').text("");
                $('#message').append(account_email);
                $('#message').append(account_password);
                $('#message').append(confirm_password);
                $('#message').append(account_first_name);
                $('#message').append(account_last_name);
                $('input[name="csrf_test_name"]').val(csrf_hash);
            }else if(status == 'success'){
                $('#message').text("");
                $('#registerModal').modal('hide')
            }
        },
        error:function (xhr, ajaxOptions, thrownError){
            // alert("failure");
        }
        });
})
});
</script>