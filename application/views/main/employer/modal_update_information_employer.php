<div class="modal fade" id="employer_updateModal" tabindex="-1" role="dialog" aria-labelledby="Register" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="closeModal_update()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h3 class="modal-title"><?php echo lang('title_re_depl_update');?></h3>
                 <div class="require_info clearfix italic">(<span class="colorRed">*</span>) <?php echo lang('require_info');?></div>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                <form enctype="multipart/form-data" role="form" name="employer-update-form" id="employer-update-form" method="post">
                    <fieldset>

                         <div class="row">
                             <div class="form-group col-sm-12">
                                 <div class="error text-center">
                                    <div class="error text-left" id="message_update_empoyer">
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-12 clear mb_20">
                                <label class="alert-recruitment text-color-1">
                                    <h3 class="alert-field-employer">
                                        <?php echo lang('title_depoyer_re_depl');?>
                                    </h3>
                                </label>
                                <!-- <span class="fwb fs20 txt-color-363636"><?php echo lang('title_depoyer_re_depl');?></span> -->
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('employer_name_re_depl');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="employer_name" value="<?php echo $employerInfo->employer_name;?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                 <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('employer_address_re_depl');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                          <textarea type="text" class="form-control" name="employer_address"  rows="3" value="<?php echo $employerInfo->employer_address;?>"> <?php echo $employerInfo->employer_address;?></textarea>
                                    </div>
                                </div>
                            </div>

                             <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('employer_map_province_re_depl');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <select class="form-control" name="employer_map_province" id="employer_map_province">

                                            <?php foreach ($province as $row): ?>
                                                <?php if ($row->province_id == $employerInfo->employer_map_province) {?>
                                                    <option  value="<?php echo $employerInfo->employer_map_province?>" selected><?php echo $row->province_name?></option>
                                                <?php } else {?>
                                                    <option  value="<?php echo $row->province_id?>"><?php echo $row->province_name?></option>
                                                <?php }
?>
                                            <?php endforeach?>

                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('employer_phone_re_depl');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                         <input type="text" class="form-control" name="employer_phone" value="<?php echo $employerInfo->employer_phone;?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('employer_size_re_depl');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                         <input type="text" class="form-control" name="employer_size" value="<?php echo $employerInfo->employer_size;?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('employer_website_re_depl');?></label>
                                    <div class="controls">
                                         <input type="text" class="form-control" name="employer_website" value="<?php echo $employerInfo->employer_website;?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('employer_about_re_depl');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <textarea type="text" class="form-control" name="employer_about" rows="3" value="<?php echo $employerInfo->employer_about;?>"><?php echo $employerInfo->employer_about;?> </textarea>
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
        </div>
    </div>
</div>