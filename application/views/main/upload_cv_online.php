<style type="text/css">
.error-uploadcv {
    color: red;
}
 </style>


<p class="text-center contact-box">
    <button class="btn btn-default" data-toggle="modal" data-target="#uploadcvModel">Uploadcv</button>
</p>

<div class="modal fade" id="uploadcvModel" tabindex="-1" role="dialog" aria-labelledby="uploadcv" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            
                <h5 class="modal-title"><?php echo lang('title_upload_cv'); ?></h5>
    
                 <div id="message">
                </div> 
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                <form role="form" name="uploadcv-form" id="uploadcv-form" method="post" class="form-horizontal">
                    <div class="form-group">
                         <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('email_re_user'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="account_email" />
                        </div>
                    </div>
                    <div class="form-group">
                         <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('email_re_user'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="account_email" />
                        </div>
                    </div>
                    <div class="form-group">
                         <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('email_re_user'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="account_email" />
                        </div>
                    </div>
                    <div class="form-group">
                         <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('email_re_user'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="account_email" />
                        </div>
                    </div>
                    <div class="form-group">
                         <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('email_re_user'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="account_email" />
                        </div>
                    </div>
                    <div class="form-group">
                         <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('email_re_user'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="account_email" />
                        </div>
                    </div>
                    <div class="form-group">
                         <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('email_re_user'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="account_email" />
                        </div>
                    </div>
                    <div class="form-group">
                         <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('email_re_user'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="account_email" />
                        </div>
                    </div>
                    <div class="form-group">
                         <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('email_re_user'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="account_email" />
                        </div>
                    </div>
                    <div class="form-group">
                         <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('email_re_user'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="account_email" />
                        </div>
                    </div>
                    <div class="form-group">
                         <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('email_re_user'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="account_email" />
                        </div>
                    </div>
                    <div class="form-group">
                         <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('email_re_user'); ?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="account_email" />
                        </div>
                    </div>

                   
                    
                   
                    <div class="form-group">
                        <div class="col-sm-12 col-md-12 col-xs-12 row-btn-register">
                            <button type="submit" class="btn btn-primary"><?php echo lang('btn_upload'); ?></button>   
                        </div>
                    </div>
                    <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var err_ext = false;
function getExt(filename)
{
    var ext = filename.split('.').pop();
    if(ext == filename) return "";
    return ext;
}
function uploadOnChange(objFile) {
        fileName = objFile.value.replace(/C:\\fakepath\\/i, '');
        var ext = getExt(fileName);
        if(ext == "doc" || ext == "docx" || ext == "pdf"){
             $("#note_file_select").html(fileName);
            err_ext =  true;
        }else{
             $("#note_file_select").html('file định dạng không đúng');
            err_ext = false;
        }
        
 }
//user uploadcv
$(document).ready(function() {
$("#uploadcv-form").submit(function(event){
     event.preventDefault();
      var form = $(this);
        var formdata = false;
        if(window.FormData){
            formdata = new FormData(form[0]);
        }

        var formAction = form.attr('action');
        if(err_ext){
             $.ajax({
            type: "POST", // HTTP method POST or GET
            url: "<?php echo base_url('uploadcv/upload_cv');?>", //Where to make Ajax calls
            dataType:"json", // Data type, HTML, json etc.
            cache : false,
            data        : formdata ? formdata : form.serialize(),
            contentType : false,
            processData : false,

            success:function(response){
                // alert(response);
                
                // var objs = $.parseJSON(response);
                var status = response.status;
                if(status == 'success'){
                    $('#uploadcvModel').modal('hide');
                }else{
                    var content = response.content.contente;
                    $('#message').text("");
                    $('#message').append(content);
                    $('input[name="csrf_test_name"]').val(csrf_hash);
                }
                // if(status == 'errvalid'){
                //     // var account_email = response.content.account_email;
                //     // var account_password = response.content.account_password;
                //     // var csrf_name = response.content.name;
                //     // var csrf_hash = response.content.hash;
                //     // $('#message').text("");
                //     // $('#message').append(account_email);
                //     // $('#message').append(account_password);
                //     // $('input[name="csrf_test_name"]').val(csrf_hash);
                //      $('#message').text("");
                //     $('#uploadcvModel').modal('hide')
                // }else if(status == 'success'){
                //     $('#message').text("");
                //     $('#uploadcvModel').modal('hide')
                // }
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert("failure");
            }
            });
        }else{
            $("#note_file_select").html('file dinh dang khong dung');
        }
       
    })
});
</script>