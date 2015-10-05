<div class="modal fade" id="createcv_onlineModel" tabindex="-1" role="dialog" aria-labelledby="createcv_online" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h3 class="modal-title"><?php echo lang('title_upload_cv_online');?></h3>

                <!--  <div id="message">
                </div> -->
                <div class="require_info clearfix italic">(<span class="colorRed">*</span>) <?php echo lang('require_info');?></div>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                <form role="form" name="createcv_online-form" id="createcv_online-form" method="post">
                    <fieldset>
                        <div class="row">


                            <div class="form-group col-sm-12">
                                <div class="error text-center">
                                    <div class="error text-left" id="message_upload_cv_online">
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('docon_career');?> <span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="docon_career" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('docon_salary');?> <span class="colorRed">*</span></label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="docon_salary" />

                                        </div>
                                </div>
                            </div>

                             <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('docon_degree');?> <span class="colorRed">*</span></label>
                                    <div class="controls">
                                         <input type="text" class="form-control" name="docon_degree" />

                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('docon_education');?> <span class="colorRed">*</span></label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="docon_education" />
                                        </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('docon_experience');?> <span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="docon_experience" />

                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('docon_healthy');?><span class="colorRed">*</span></label>
                                        <div class="controls">
                                            <select class="form-control input-lg2" name="docon_healthy" id="docon_healthy">
                                                <option value="0">Chọn tình trạng sức khỏe </option>
                                                <?php foreach ($healthy as $rows): ?>
                                                    <option value="<?php echo $rows->healthy_id;?>"><?php echo $rows->healthy_type;?></option>
                                                <?php endforeach?>
                                            </select>
                                        </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('docon_skill');?></label>
                                    <div class="controls">
                                        <textarea class="form-control" name="docon_skill" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('docon_advance');?><span class="colorRed">*</span></label>
                                        <div class="controls">
                                            <textarea class="form-control" name="docon_advance" rows="3"></textarea>
                                        </div>
                                </div>
                            </div>

                             <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('docon_reason_apply');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <textarea class="form-control" name="docon_reason_apply" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('docon_address');?><span class="colorRed">*</span></label>
                                        <div class="controls">
                                            <textarea class="form-control" name="docon_address" rows="3"></textarea>
                                        </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('docon_phone');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="docon_phone" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('docon_birthday');?><span class="colorRed">*</span></label>
                                        <div class="controls">
                                            <div class="col-xs-2 col-sm-2 col-md-2">
                                                <select id="dobday" class="form-control"></select>
                                            </div>
                                            <div class="col-xs-2 col-sm-2 col-md-2 ">
                                                <select id="dobmonth" class="form-control"></select>
                                            </div>
                                            <div class="col-xs-2 col-sm-2 col-md-2">
                                                <select id="dobyear" class="form-control"></select>
                                            </div>
                                        </div>
                                </div>
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