 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h3 class="modal-title"><?php echo lang('m_resume_vn'); ?><label class="btn btn-danger"><strong><?php echo $resume->docon_code; ?></strong></label></h3>
    </div>
    <div class="modal-body">
            <form name="updatedocumentJobseekerForm">
            <fieldset>
                <div class="row">
                    <div class="col-sm-12">
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="firstname"><?php echo lang('job_form_name'); ?></label>
                                <div class="controls" ng-model="documentJobseeker.name">
                                    <?php echo $resume->jobseeker_name ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="firstname"><?php echo lang('job_form_birthday'); ?></label>
                                <div class="controls">
                                    <?php echo date('d/m/Y', strtotime($resume->docon_birthday)); ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname"><?php echo lang('job_form_phone'); ?> </label>
                                <div class="controls">
                                    <?php echo $resume->docon_phone ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb"><?php echo lang('m_email'); ?></label>
                                <div class="controls">
                                    <?php echo $resume->jobseeker_email ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname"><?php echo lang('job_form_level'); ?></label>
                                <div class="controls">
                                    <?php echo $resume->ljob_level ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname"><?php echo lang('job_form_work_at'); ?></label>
                                <div class="controls">
                                    <?php echo $resume->province ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname"><?php echo lang('s_tite_career'); ?> </label>
                                <div class="controls">
                                    <?php echo $resume->career_name ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb"><?php echo lang('job_form_degree'); ?></label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_degree); ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname"><?php echo lang('job_form_education'); ?></label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_education); ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb"><?php echo lang('job_form_current_address'); ?></label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_address); ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname"><?php echo lang('job_form_experience'); ?></label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_experience); ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb"><?php echo lang('job_form_skill'); ?></label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_skill); ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname"><?php echo lang('job_form_healthy'); ?></label>
                                <div class="controls">
                                    <?php echo $resume->healthy_type ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb"><?php echo lang('job_form_reason_apply'); ?></label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_reason_apply); ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb"><?php echo lang('s_title_salary'); ?> </label>
                                <div class="controls">
                                    <?php echo $resume->docon_salary ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb"><?php echo lang('job_form_advance'); ?></label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_advance); ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="suburb"><?php echo lang('job_form_wish'); ?></label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_wish); ?>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">
                                <button class="btn btn-warning" data-dismiss="modal"><?php echo lang('m_close'); ?></button>
                            </div>
                        </div>
                    </div>
            </fieldset>

            </form>
    </div>