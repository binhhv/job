<style type="text/css">
.error-register {
    color: red;
}
</style>

<p class="text-center contact-box">
    <button class="btn btn-default" data-toggle="modal" data-target="#registerModal">Regiser</button>
</p>

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="Register" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            
                <h5 class="modal-title"><?php echo lang('title_re_depl'); ?></h5>
    
                 <div id="message">
                </div> 
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                <form enctype="multipart/form-data" role="form" name="register-form" id="register-form" method="post" class="form-horizontal">
                    <div class="clear mb_20">
                        <span class="fwb fs20 txt-color-363636"><?php echo lang('title_register_re_depl'); ?></span>
                    </div>
                    <div class="form-group">
                         <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('email_re_user'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="account_email" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('password_re_user'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="password" class="form-control" name="account_password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('passconf_re_user'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="password" class="form-control" name="confirm_password" />
                        </div>
                    </div>
                    <div class="clear mb_20">
                        <span class="fwb fs20 txt-color-363636"><?php echo lang('title_depoyer_re_depl'); ?></span>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('employer_name_re_depl'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="employer_name" />
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label" for="employer_size"><?php echo lang('employer_size_re_depl'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                             <select class="form-control" name="employer_size" id="employer_size">
                                <option value="0">Chọn quy mô doanh nghiệp</option>
                                <option value="1">Ít hơn 10 nhân viên</option>
                                <option value="2">Từ 10 đến 24 nhân viên</option>
                                <option value="3">Từ 25 đến 50 nhân viên</option>
                            </select>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('employer_phone_re_depl'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="employer_phone" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('employer_fax_re_depl'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="employer_fax" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('employer_about_re_depl'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="employer_about" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('employer_address_re_depl'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="employer_address" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label" for="employer_map_province"><?php echo lang('employer_map_province_re_depl'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <select class="form-control" name="employer_map_province" id="employer_map_province">
                                <option value="0">Chọn quy tỉnh thành</option>
                                <option value="1">Hà nội</option>
                                <option value="2">Thành phố hồ chí minh</option>
                                <option value="3">Bình dương</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('employer_website_re_depl'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="employer_website" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('employer_logo_re_depl'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <div class="display_block btn-big pos_relactive w170 floatLeft">
                                <input class="bt_input pos_absolute" type="file" name="userfile" id="userfile" size="20" onchange="uploadOnChange(this)">
                                <span class="icon_upload_file"></span>Chọn file đính kèm
                            </div>
                            <span class="select_file_note floatLeft txt-color-363636" id="note_file_select">(Chưa chọn file nào)</span>
                        </div>
                    </div>
                    <label class="col-sm-4 col-md-4 col-xs-4 control-label"></label>
                    <div class="col-sm-8 col-md-8 col-xs-8">
                       <div class="note_size_photo clearfix font12 italic" id="error_giayphepkinhdoanh">(Dạng file .jpg .gif .png, dung lượng &lt;<=2MB)</div>
                    </div>
                    <div class="clear mb_20">
                        <span class="fwb fs20 txt-color-363636"><?php echo lang('title_user_re_depl'); ?></span>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('employer_contact_name_re_depl'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="employer_contact" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('employer_contact_email_re_depl'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="employer_contact_email" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('employer_contact_phone_re_depl'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="employer_contact_phone" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('employer_contact_mobile_re_depl'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="employer_contact_mobile" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12 col-md-12 col-xs-12 row-btn-register">
                            <button type="submit" class="btn btn-primary"><?php echo lang('btn_register_re_user'); ?></button>
             				
                        </div>
                    </div>
                    <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function uploadOnChange(objFile) {
        fileName = objFile.value.replace(/C:\\fakepath\\/i, '');
        $("#note_file_select").html(fileName);
    }
//user register
$(document).ready(function() {
$("#register-form").submit(function(event){
     event.preventDefault();
      var form = $(this);
        var formdata = false;
        if(window.FormData){
            formdata = new FormData(form[0]);
        }
        var formAction = form.attr('action');
        $.ajax({
        type: "POST", // HTTP method POST or GET
        url: "<?php echo base_url('register/insertEmployer');?>", //Where to make Ajax calls
        dataType:"json", // Data type, HTML, json etc.
        cache : false,
        data        : formdata ? formdata : form.serialize(),
        contentType : false,
        processData : false,

        success:function(response){
            // var objs = $.parseJSON(response);
            var status = response.status;
            if(status == 'errvalid'){
                var account_email = response.content.account_email;
                var account_password = response.content.account_password;
                var confirm_password = response.content.confirm_password;
                var employer_name = response.content.employer_name;
                var employer_size = response.content.employer_size;
                var employer_phone = response.content.employer_phone;
                var employer_fax = response.content.employer_fax;
                var employer_about = response.content.employer_about;
                var employer_address = response.content.employer_address;
                var employer_map_province = response.content.employer_map_province;
                var employer_contact = response.content.employer_contact;
                var employer_contact_email = response.content.employer_contact_email;
                var employer_contact_phone = response.content.employer_contact_phone;
                var employer_contact_mobile = response.content.employer_contact_mobile;
                var csrf_name = response.content.name;
                var csrf_hash = response.content.hash;
                $('#message').text("");
                $('#message').append(account_email);
                $('#message').append(account_password);
                $('#message').append(confirm_password);
                $('#message').append(employer_name);
                $('#message').append(employer_size);
                $('#message').append(employer_phone);
                $('#message').append(employer_fax);
                $('#message').append(employer_about);
                $('#message').append(employer_address);
                $('#message').append(employer_map_province);
                $('#message').append(employer_contact);
                $('#message').append(employer_contact_email);
                $('#message').append(employer_contact_phone);
                $('#message').append(employer_contact_mobile);
                $('input[name="csrf_test_name"]').val(csrf_hash);
            }else if(status == 'success'){
                $('#message').text("");
                $('#registerModal').modal('hide')
            }
        },
        error:function (xhr, ajaxOptions, thrownError){
           alert('lalue');
        }
        });
})
});
</script>