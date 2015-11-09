<div class="modal-header">
                <button type="button" class="close" onclick="closeModal_update()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h3 class="modal-title"><?php echo lang('title_re_depl_update_contact');?></h3>
                 <div class="require_info clearfix italic">(<span class="colorRed">*</span>) <?php echo lang('require_info');?></div>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                <form enctype="multipart/form-data" role="form" name="employer-contact-update-form" id="employer-contact-update-form" method="post">
                    <fieldset>

                         <div class="row">
                             <div class="form-group col-sm-12 error-em-contact hide">
                                <div class="error text-center">
                                    <div class="error text-left" id="message_update_contact_empoyer">
                                    </div>
                                </div>

                            </div>
                            <!-- <div class="col-sm-12 clear mb_20">
                                <label class="alert-recruitment text-color-1">
                                    <h3 class="alert-field-employer">
                                        <?php echo lang('title_depoyer_re_depl');?>
                                    </h3>
                                </label>
                                <span class="fwb fs20 txt-color-363636"><?php echo lang('title_depoyer_re_depl');?></span>
                            </div> -->

                            <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('employer_contact_name_re_depl');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="employer_contact_name" value="<?php echo $employerInfo->employer_contact_name;?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                 <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('employer_contact_phone_re_depl');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                          <input type="text" class="form-control" name="employer_contact_phone" value="<?php echo $employerInfo->employer_contact_phone;?>" />
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('employer_contact_mobile_re_depl');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                         <input type="text" class="form-control" name="employer_contact_mobile" value="<?php echo $employerInfo->employer_contact_mobile;?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('employer_contact_email_re_depl');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                         <input type="text" class="form-control" name="employer_contact_email" value="<?php echo $employerInfo->employer_contact_email;?>"/>
                                    </div>
                                </div>
                            </div>


                         </div>

                          <div class="row">
                             <div class="col-sm-12">
                                <div class="form-group text-right">
                                     <button type="submit" class="btn btn-primary"><?php echo lang('btn_update_employer');?></button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <input type="hidden" name="employer_id" value="<?php echo $employerInfo->employer_id;?>" />
                    <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                </form>
            </div>