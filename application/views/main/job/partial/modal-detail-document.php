            <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title"><?php echo lang('job_vform_title'); ?> <label class="btn btn-default"><?php echo $doc->docon_code; ?></label></h3>
            </div>
            <div class="modal-body">
                    <form name="updatedocumentJobseekerForm">
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-12">
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="firstname"><?php echo lang('job_form_name'); ?></label>
                                        <div class="controls" ng-model="documentJobseeker.name">
                                            <?php echo $doc->jobseeker_name; ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="firstname"><?php echo lang('job_form_birthday'); ?></label>
                                        <div class="controls">
                                            <?php echo date('d/m/Y', strtotime($doc->docon_birthday)); ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="surname"><?php echo lang('job_form_phone'); ?> </label>
                                        <div class="controls">
                                            <?php echo $doc->docon_phone; ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="suburb"><?php echo lang('m_email'); ?></label>
                                        <div class="controls">
                                            <?php echo $doc->jobseeker_email; ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="surname"><?php echo lang('job_form_level'); ?></label>
                                        <div class="controls">
                                            <?php echo $doc->ljob_level; ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="surname"><?php echo lang('job_form_work_at'); ?></label>
                                        <div class="controls">
                                            <?php echo $doc->province; ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="surname"><?php echo lang('s_title_career'); ?></label>
                                        <div class="controls">
                                            <?php echo $doc->career_name; ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="suburb"><?php echo lang('job_form_degree'); ?></label>
                                        <div class="controls">
                                            <?php echo $doc->docon_degree; ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="surname"><?php echo lang('job_form_education'); ?></label>
                                        <div class="controls">
                                            <?php echo $doc->docon_education; ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="suburb"><?php echo lang('job_form_current_address'); ?></label>
                                        <div class="controls">
                                            <?php echo $doc->docon_address; ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="surname"><?php echo lang('job_form_experience'); ?></label>
                                        <div class="controls">
                                            <?php echo $doc->docon_experience; ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="suburb"><?php echo lang('job_form_skill'); ?></label>
                                        <div class="controls">
                                            <?php echo $doc->docon_skill; ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="surname"><?php echo lang('job_form_healthy'); ?></label>
                                        <div class="controls">
                                            <?php echo $doc->healthy_type; ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="suburb"><?php echo lang('job_form_reason_apply'); ?></label>
                                        <div class="controls">
                                            <?php echo $doc->docon_reason_apply; ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="suburb"><?php echo lang('s_title_salary'); ?></label>
                                        <div class="controls">
                                            <?php echo $doc->docon_salary; ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="suburb"><?php echo lang('job_form_advance'); ?></label>
                                        <div class="controls">
                                            <?php echo $doc->docon_advance; ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="control-label" for="suburb"><?php echo lang('job_form_wish'); ?></label>
                                        <div class="controls">
                                            <?php echo $doc->docon_wish; ?>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group text-center">
                                         <button type="button" class="btn btn-warning" data-dismiss="modal"><?php echo lang('m_close'); ?></button>
                                    </div>
                                </div>
                            </div>
                    </fieldset>

                    </form>
            </div>