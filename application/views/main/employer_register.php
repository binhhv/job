<div class="modal fade" id="employer_registerModal" tabindex="-1" role="dialog" aria-labelledby="Register" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h3 class="modal-title"><?php echo lang('title_re_depl');?></h3>
                 <div class="require_info clearfix italic">(<span class="colorRed">*</span>) <?php echo lang('require_info');?></div>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                <form enctype="multipart/form-data" role="form" name="employer-register-form" id="employer-register-form" method="post">
                    <fieldset>
                         <div class="row">

                             <div class="col-sm-12">
                                <div class="error text-center">
                                    <label class="error alert-danger" id="message_empoyer">
                                    </label>
                                </div>

                            </div>
                            <div class="col-sm-12 clear mb_20">
                                <span class="fwb fs20 txt-color-363636"><?php echo lang('title_register_re_depl');?></span>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('email_re_user');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="account_email" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('password_re_user');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="password" class="form-control" name="account_password" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('passconf_re_user');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="password" class="form-control" name="confirm_password" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 clear mb_20">
                                <span class="fwb fs20 txt-color-363636"><?php echo lang('title_depoyer_re_depl');?></span>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_name_re_depl');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="employer_name" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_size_re_depl');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <!-- <select class="form-control" name="employer_size" id="employer_size">
                                            <option value="0">Chọn quy mô doanh nghiệp</option>
                                            <option value="1">Ít hơn 10 nhân viên</option>
                                            <option value="2">Từ 10 đến 24 nhân viên</option>
                                            <option value="3">Từ 25 đến 50 nhân viên</option>
                                        </select> -->
                                         <input type="text" class="form-control" name="employer_size" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_phone_re_depl');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="employer_phone" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_fax_re_depl');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                         <input type="text" class="form-control" name="employer_fax" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_about_re_depl');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <textarea type="text" class="form-control" name="employer_about" rows="3"> </textarea>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_address_re_depl');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                          <textarea type="text" class="form-control" name="employer_address"  rows="3"> </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_map_province_re_depl');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <select class="form-control" name="employer_map_province" id="employer_map_province">
                                            <option value="0">Chọn quy tỉnh thành</option>
                                            <?php foreach ($province as $rows): ?>
                                                <option value="<?php echo $rows->province_id?>"><?php echo $rows->province_name?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_website_re_depl');?></label>
                                    <div class="controls">
                                         <input type="text" class="form-control" name="employer_website" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('employer_logo_re_depl');?></label>
                                    <div class="controls">
                                        <div class="display_block btn-big pos_relactive w170 floatLeft">
                                            <input class="bt_input pos_absolute" type="file" name="userfile" id="userfile" size="20" onchange="uploadOnChange(this)">
                                            <span class="icon_upload_file"></span>Chọn file đính kèm
                                        </div>
                                        <span class="select_file_note floatLeft txt-color-363636" id="note_file_select">(Chưa chọn file nào)</span>
                                    </div>

                                </div>
                                <div class="note_size_photo clearfix font12 italic" id="error_giayphepkinhdoanh">(Dạng file .jpg .gif .png, dung lượng &lt;<=2MB)</div>
                            </div>


                            <div class="col-sm-12 clear mb_20">
                                <span class="fwb fs20 txt-color-363636"><?php echo lang('title_user_re_depl');?></span>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_contact_name_re_depl');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="employer_contact" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_contact_email_re_depl');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                         <input type="text" class="form-control" name="employer_contact_email" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_contact_phone_re_depl');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="employer_contact_phone" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_contact_mobile_re_depl');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                         <input type="text" class="form-control" name="employer_contact_mobile" />
                                    </div>
                                </div>
                            </div>

                         </div>

                          <div class="row">
                             <div class="col-sm-12">
                                <div class="form-group text-right">
                                     <button type="submit" class="btn btn-primary"><?php echo lang('btn_register_re_user');?></button>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <span class="colorRed">*</span> Nhấp chọn "Đăng Ký"đồng nghĩa với việc tôi đã đọc và đồng ý với các <a class="a-term" href="<?php echo base_url('about/term');?>">Thỏa thuận sử dụng</a>.
                            </div>
                        </div>
                    </fieldset>
                    <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                </form>
            </div>
        </div>
    </div>
</div>