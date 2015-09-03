
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
                <h3 class="modal-title"><?php echo lang('title_re_user');?></h3>
                 <div class="require_info clearfix italic">(<span class="colorRed">*</span>) <?php echo lang('require_info');?></div>
            </div>

            <div class="modal-body">

                <!-- The form is placed inside the body of modal -->
                <form role="form" name="register-form" id="register-form" method="post">
                     <fieldset>
                         <div class="row">
                            <div class="col-sm-12">
                                <div class="error text-center">
                                    <label class="error alert-danger" id="message">
                                    </label>
                                </div>
                                </label>
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
                                     <label class="control-label"><?php echo lang('last_name_re_user');?> <span class="colorRed">*</span></label>
                                     <div class="controls">
                                         <input type="text" class="form-control" name="account_last_name" />
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
                        </div>
                     </fieldset>
                    <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                </form>
            </div>
        </div>
    </div>
</div>