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

                <h5 class="modal-title"><?php echo lang('title_upload_cv');?></h5>

                 <div id="message">
                </div>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                <form enctype="multipart/form-data" role="form" name="uploadcv-form" id="uploadcv-form" method="post" class="form-horizontal">
                    <div class="form-group">
                         <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('email_re_user');?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <label class="col-sm-4 col-md-4 col-xs-4 control-label">vanhungpc@gmail.com</label>
                            <input type="hidden" type="text" class="form-control" name="account_email" />
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label"><?php echo lang('doccv_file_tmp');?></label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <div class="display_block btn-big pos_relactive w170 floatLeft">
                                <input class="bt_input pos_absolute" type="file" name="userfile" id="userfile" size="20" onchange="uploadOnChange_cv(this)">
                                <span class="icon_upload_file"></span><?php echo lang('btn_choose_file');?>
                            </div>
                            <span class="select_file_note floatLeft txt-color-363636" id="note_file_select"><?php echo lang('label_choose_file');?></span>
                        </div>
                    </div>
                    <label class="col-sm-4 col-md-4 col-xs-4 control-label"></label>
                    <div class="col-sm-8 col-md-8 col-xs-8">
                       <div class="note_size_photo clearfix font12 italic" id="error_file"><?php echo lang('format_file_cv');?></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 col-md-12 col-xs-12 row-btn-register">
                            <button type="submit" class="btn btn-primary"><?php echo lang('btn_upload');?></button>
                        </div>
                    </div>
                    <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                </form>
            </div>
        </div>
    </div>
</div>
