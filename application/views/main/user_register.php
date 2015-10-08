<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="Register" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" onclick="closeModal()" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title"><?php echo lang('title_re_user');?></h3>
                 <div class="require_info clearfix italic">(<span class="colorRed">*</span>) <?php echo lang('require_info');?></div>
            </div>

            <div class="modal-body">

                <!-- The form is placed inside the body of modal -->
                <form role="form" name="register-form" id="register-form" method="post">
                     <fieldset>
                         <div class="row">
                            <div class="form-group col-sm-12">
                                <div class="error text-center">
                                    <div class="error text-left" id="message_user">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                     <label class="control-label"><?php echo lang('last_name_re_user');?> <span class="colorRed">*</span></label>
                                     <div class="controls">
                                         <input type="text" class="form-control" name="account_last_name" />
                                     </div>

                                </div>
                             </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                     <label class="control-label"><?php echo lang('first_name_re_user');?> <span class="colorRed">*</span></label>
                                     <div class="controls">
                                         <input type="text" class="form-control" name="account_first_name" />
                                     </div>

                                </div>
                             </div>



                             <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                     <label class="control-label"><?php echo lang('email_re_user');?> <span class="colorRed">*</span></label>
                                     <div class="controls">
                                         <input type="text" class="form-control" name="account_email" />
                                     </div>

                                </div>
                             </div>

                             <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                     <label class="control-label"><?php echo lang('password_re_user');?> <span class="colorRed">*</span></label>
                                     <div class="controls">
                                         <input type="password" class="form-control" name="account_password" />
                                     </div>

                                </div>
                             </div>


                            <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                     <label class="control-label"><?php echo lang('passconf_re_user');?> <span class="colorRed">*</span></label>
                                     <div class="controls">
                                         <input type="password" class="form-control" name="confirm_password" />
                                     </div>

                                </div>
                             </div>

                         </div>
                         <div class="row">
                             <div class="col-sm-12">
                              <div class="col-sm-12">
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary"><?php echo lang('btn_register_re_user');?></button>
                                </div>
                              </div>


                                <div class="col-sm-12">
                                    <div class="form-group ">
                                        *Nhấp chọn "ĐăngTin"đồng nghĩa với việc tôi đã đọc và đồng ý với các <a class="a-term" href="<?php echo base_url('about/term');?>">Thỏa thuận sử dụng</a>.
                                    </div>
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