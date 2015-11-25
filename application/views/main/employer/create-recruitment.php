<div class="card">
	<div class="row-employer row">
		<div class="col-sm-12">
		<div class="col-sm-12 clear mb_20 margin-top-10">
                                <!-- <span class="fwb fs20 txt-color-363636"><?php echo lang('title_depoyer_re_depl'); ?></span> -->
                                 <span class="border-vertical text-color-1"></span>
                                <span class="text-color-1 title-jobseeker-register"><strong><?php echo lang('title_create_recruitment_em'); ?></strong></span>
                            </div>
                             <form enctype="multipart/form-data" role="form" name="femployer-create-recruitment" id="femployer-create-recruitment" method="post">
			<div class="col-sm-12">
			<div class="form-group col-sm-12 error-em-info hide">
                                 <div class="error text-center">
                                    <div class="error text-left" id="message_update_empoyer">
                                    </div>
                                </div>

                            </div>
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('f_title_recruitment_em'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="title_recruitment" />
                                    </div>
                                    <div class="col-sm-12 text-danger error-title-recruitment"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('f_work_at_country_em'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <!-- <label><input type="radio" value="1" checked="true" name="country">Việt Nam</label> &nbsp;
                                        <label><input type="radio" value="2" name="country">Nhật Bản</label> -->
                                        <div class="row">
                                            <label class="col-sm-6"><input type="radio" value="1" checked="true" name="country">Việt Nam</label>
                                            <label class="col-sm-6"><input type="radio" value="2" name="country">Nhật Bản</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 text-danger error-employer-name"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('f_province_em'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <div class="select-province-vn hide">
                                <select data-placeholder="<?php echo lang('s_chose_province'); ?>"  multiple class="chosen-select-vn form-control province-vn " tabindex="11" >
                                        <option value=""></option>
                                        <?php if (isset($provinceVN)) {
	foreach ($provinceVN as $value) {?>
                                                <option value="<?php echo $value->province_id ?>"><?php echo $value->province_name; ?></option>
                                            <?php }
}
?>
                                      </select>
                                      <!-- <label class="text-danger">(tối thiểu 1 tỉnh thành và tối đa là 5 tỉnh thành)</label> -->
                                  </div>
                                  <div class="select-province-jp hide">
                                    <select data-placeholder="<?php echo lang('s_chose_province'); ?>"  multiple class="chosen-select-jp form-control province-jp hide" tabindex="11" >
                                        <option value=""></option>
                                        <?php if (isset($provinceJP)) {
	foreach ($provinceJP as $value) {?>
                                                <option value="<?php echo $value->province_id ?>"><?php echo $value->province_name; ?></option>
                                            <?php }
}
?>
                                      </select>
                                      <!-- <label class="text-danger">(tối thiểu 1 tỉnh thành và tối đa là 5 tỉnh thành)</label> -->
                            </div>
                                    </div>
                                    <div class="col-sm-12 text-danger">(<?php echo lang('job_form_province_require'); ?>)</div>
                                    <div class="col-sm-12 text-danger error-province"></div>
                                </div>
                                 <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('f_career_em'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <select name="career" class="form-control">

                                            <?php if (isset($listCareer) && count($listCareer) > 0) {
	foreach ($listCareer as $key => $value) {?>


                                                <option value="<?php echo $value->career_id; ?>"><?php echo $value->career_name; ?></option>
                                            <?php }}
?>
                                        </select>
                                    </div>

                                    <div class="col-sm-12 text-danger error-career"></div>
                                </div>
                                 <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('f_salary_em'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <select name="salary" class="form-control">
                                            <?php if (isset($listSalary) && count($listSalary) > 0) {
	foreach ($listSalary as $key => $value) {?>


                                                <option value="<?php echo $value->salary_id; ?>"><?php echo $value->salary_value; ?></option>
                                            <?php }}
?>
                                        </select>
                                    </div>

                                    <div class="col-sm-12 text-danger error-salary"></div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('f_welfare_em'); ?><span class="colorRed">*</span></label>
                                    <div class="controls"  style="background-color: #f2f9f2;">
                                        <?php if (isset($listWelfare) && count($listWelfare) > 0) {
	foreach ($listWelfare as $key => $value) {?>
                                            <span class="welfare-detail-job">
                                                <label>
                                                    <input type="checkbox" value="<?php echo $value->welfare_id ?>" name="welfare[]">
                                                    <i class="<?php echo $value->welfare_icon; ?>"></i><?php echo $value->welfare_title; ?>
                                                </label>
                                            </span>
                                             <?php }
}
?>
                                    </div>

                                    <div class="col-sm-12 text-danger error-welfare"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <span class="text-color-1 title-jobseeker-register"><strong><?php echo lang('title_description_recruitment_em'); ?></strong></span>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('f_time_work_em'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="time_work" id="time_work" />
                                    </div>

                                    <div class="col-sm-12 text-danger error-time-work"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('f_level_jp_em'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <select class="form-control" name="levelJP">
                                            <?php if (isset($listLevelJP) && count($listLevelJP) > 0) {
	foreach ($listLevelJP as $key => $value) {?>
    <option value="<?php echo $value->ljob_id; ?>"><?php echo $value->ljob_level; ?></option>
                                               <?php }
}
?>
                                        </select>
                                    </div>

                                    <div class="col-sm-12 text-danger error-levelJP"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('f_recruitment_type_em'); ?><span class="colorRed">*</span></label>
                                    <div class="controls row">
                                        <div class="col-sm-6 margin-top-5">
                                             <select class="form-control" name="jobForm">
                                                 <?php if (isset($listJobForm) && count($listJobForm) > 0) {
	foreach ($listJobForm as $key => $value) {?>
    <option value="<?php echo $value->fjob_id; ?>"><?php echo $value->fjob_type; ?></option>
                                                     <?php }
}
?>
                                             </select>
                                        </div>
                                        <div class="col-sm-6 margin-top-5">
                                            <select class="form-control" name="jobFormChild">
                                                 <?php if (isset($listJobFormChild) && count($listJobFormChild) > 0) {
	foreach ($listJobFormChild as $key => $value) {?>
    <option value="<?php echo $value->jcform_id; ?>"><?php echo $value->jcform_type; ?></option>
                                                     <?php }
}
?>
                                             </select>
                                        </div>

                                    </div>

                                    <div class="col-sm-12 text-danger error-jobForm"></div>
                                </div>
                                 <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('f_content_recruitment_em'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                         <textarea type="text" class="form-control" name="content_recruitment"  rows="3"></textarea>
                                    </div>

                                    <div class="col-sm-12 text-danger error-content-recruitment"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('f_regimen_em'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                         <textarea type="text" class="form-control" name="regimen_recruitment"  rows="3"></textarea>
                                    </div>

                                    <div class="col-sm-12 text-danger error-regimen-recruitment"></div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <span class="text-color-1 title-jobseeker-register"><strong><?php echo lang('title_require_recruitment_em'); ?></strong></span>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('f_sex_em'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                       <div class="row">
                                         <div class="col-sm-6">
                                             <select name="sex-recruitment">
                                                <option value="-1"><?php echo lang('m_not_require'); ?></option>
                                                <option value="0"><?php echo lang('m_male'); ?></option>
                                                <option value="1"><?php echo lang('m_female'); ?></option>
                                             </select>
                                         </div>
                                       </div>
                                    </div>

                                    <!-- <div class="col-sm-12 text-danger error-require-recruitment"></div> -->
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('f_require_em'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                         <textarea type="text" class="form-control" name="require_recruitment"  rows="3"></textarea>
                                    </div>

                                    <div class="col-sm-12 text-danger error-require-recruitment"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('f_priority_em'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                         <textarea type="text" class="form-control" name="priority_recruitment"  rows="3"></textarea>
                                    </div>

                                    <div class="col-sm-12 text-danger error-priority-recruitment"></div>
                                </div>
                                 <div class="form-group col-sm-12">
                                    <span class="text-color-1 title-jobseeker-register"><strong><?php echo lang('title_contact_em'); ?></strong></span>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('f_contact_name_em'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="contact_name"  />
                                    </div>

                                    <div class="col-sm-12 text-danger error-contact-name"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('f_contact_email_em'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="contact_email"  />
                                    </div>

                                    <div class="col-sm-12 text-danger error-contact-email"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('f_contact_address_em'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="contact_address" />
                                    </div>

                                    <div class="col-sm-12 text-danger error-contact-address"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('f_contact_phone_em'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="contact_phone"  />
                                    </div>

                                    <div class="col-sm-12 text-danger error-contact-phone"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('f_contact_mobile_em'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="contact_mobile"  />
                                    </div>

                                    <div class="col-sm-12 text-danger error-contact-mobile"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('f_contact_type_em'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <select class="form-control" name="contact_form">
                                            <?php if (isset($listContactForm) && count($listContactForm) > 0) {
	foreach ($listContactForm as $key => $value) {?>
    <option value="<?php echo $value->contact_form_id; ?>"><?php echo $value->contact_form_type; ?></option>
                                                 <?php }
}
?>
                                        </select>
                                    </div>

                                    <div class="col-sm-12 text-danger error-employer-name"></div>
                                </div>

                            </div>
                            <div class="col-sm-12 text-right">
                                <div class="form-group col-sm-12">
                                    <a href="javascript:draftRecruiment()" class="btn btn-warning margin-top-5 btn-drafts"><?php echo lang('m_save'); ?></a>
                                    <button class="btn btn-primary margin-top-5"><?php echo lang('em_rec_post'); ?></button>
                                    <a class="btn btn-danger margin-top-5" href="<?php echo base_url('employer'); ?>"><?php echo lang('em_back_employer_page'); ?></a>

                                </div>
                            </div>

                            <div class="col-sm-12">
                                <?php echo str_replace('"%s"', base_url(), lang('m_terms_post_recruitment')); ?>
                            </div>
                            <input type="hidden" name="province">
                            <input type="hidden" name="employer_id" value="<?php echo $employerInfo->employer_id; ?>" />
                            <input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?php echo $csrf['hash']; ?>" />
                            <div class="hide draft-rec">
                                <input type="hidden" name="isDraft" value="0">
                            </div>
                        </form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("input:radio[name=country]").change(function(){
            if($(this).val() == 1){
                $(".select-province-vn").removeClass('hide');
                $(".select-province-jp").addClass('hide');
            }
            else if($(this).val() == 2){
                $(".select-province-vn").addClass('hide');
                $(".select-province-jp").removeClass('hide');
            }
      });

	$(function(){
        $("#time_work").datepicker().datepicker("setDate", new Date());
        $(".chosen-select-vn").chosen({max_selected_options: 5,no_results_text: "<?php echo lang('msg_no_result_province_em') ?>"});
        $(".chosen-select-jp").chosen({max_selected_options: 5,no_results_text: "<?php echo lang('msg_no_result_province_em') ?>"});
		if($("input:radio[name=country]:checked").val() == 1){
			 $(".select-province-vn").removeClass('hide');
                $(".select-province-jp").addClass('hide');
		}
		else{
			$(".select-province-vn").addClass('hide');
                $(".select-province-jp").removeClass('hide');
		}

})


/*{
//showOn: both - datepicker will appear clicking the input box as well as the calendar icon
//showOn: button - datepicker will appear only on clicking the calendar icon
showOn: 'button',
//you can use your local path also eg. buttonImage: 'images/x_office_calendar.png'
buttonImage: 'http://theonlytutorials.com/demo/x_office_calendar.png',
buttonImageOnly: true,
changeMonth: true,
changeYear: true,
showAnim: 'slideDown',
duration: 'fast',
dateFormat: 'dd-mm-yy'
}
*/
</script>