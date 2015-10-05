<div class="modal fade" id="uploadcvModel" tabindex="-1" role="dialog" aria-labelledby="uploadcv" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h3 class="modal-title"><?php echo lang('title_upload_cv');?></h3>

                <div class="require_info clearfix italic">(<span class="colorRed">*</span>) <?php echo lang('require_info');?></div>
            </div>
            <div class="modal-body">
            <!-- The form is placed inside the body of modal -->
                <form enctype="multipart/form-data" role="form" name="uploadcv-form" id="uploadcv-form" method="post">
                     <fieldset>
                        <div class="row">
                            <div class="form-group col-sm-12" id="upload_cv">
                                <div class="error text-center">
                                    <div class="error text-left" id="message_upload_cv">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label">Họ <span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="jobseeker_first_name" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label">Tên <span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="jobseeker_last_name" />
                                    </div>
                                </div>
                            </div>
                             <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label">Số điện thoại <span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="jobseeker_phone" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label">Email <span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="jobseeker_mail" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('doccv_file_tmp');?></label>
                                    <div class="controls">
                                        <div class="display_block btn-big pos_relactive w170 floatLeft">
                                            <input class="bt_input pos_absolute" type="file" name="userfile" id="userfile" size="20" onchange="uploadOnChange_cv(this)">
                                            <span class="icon_upload_file"></span><?php echo lang('btn_choose_file');?>
                                        </div>
                                        <span class="select_file_note floatLeft txt-color-363636" id="note_file_select"><?php echo lang('label_choose_file');?></span>
                                    </div>


                                </div>
                                 <div class="note_size_photo clearfix font12 italic" id="error_file"><?php echo lang('format_file_cv');?></div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="text-danger"></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group text-right">
                                     <button type="submit" class="btn btn-primary"><?php echo lang('btn_upload');?></button>
                                </div>
                            </div>
                        </div>
                     </fieldset>
                    <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                </form>
            </div>
        </div>

        </div>



</div>
