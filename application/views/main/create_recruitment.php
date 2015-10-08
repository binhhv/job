
<div class="modal fade" id="create_recruitmentModel" tabindex="-1" role="dialog" aria-labelledby="create_recruitment" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="closeModal()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h3 class="modal-title"><?php echo lang('title_recruitment');?></h3>

                <div class="require_info clearfix italic">(<span class="colorRed">*</span>) <?php echo lang('require_info');?></div>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                <form role="form" name="create_recruitment-form" id="create_recruitment-form" method="post">
                    <fieldset>
                        <div class="row">
                             <div class="form-group col-sm-12">
                                 <div class="error text-center">
                                        <div class="error text-left" id="message_recruitment">
                                        </div>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_title');?> <label class="text-danger">(*)</label></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="rec_title" />
                                    </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_salary');?><label class="text-danger">(*)</label></label>
                                    <div class="controls">

                                    <select class="form-control" name="rec_salary" id="rec_salary">
                                             <?php foreach ($salary as $row) {?>
                                                <option value="<?php echo $row->salary_id;?>"><?php echo $row->salary_value;?></option>
                                            <?php }
?>
                                        </select>
                                    </div>
                                </div>


                            </div>


                             <div class="col-sm-12">

                             <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_job_map_country');?> <label class="text-danger">(*)</label></label>
                                        <div class="controls controls_label">
                                            <?php foreach ($arr_country as $row) {?>
                                                 <label class="col-sm-6 ng-binding ng-scope">
                                                <input type="radio" value = "<?php echo $row->country_id;?>" name="rec_job_map_country"><?php echo $row->country_name;?>
                                                </label>
                                            <?php }
?>


                                           <!-- <input type="text" class="form-control" name="rec_job_map_country" /> -->
                                        </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('province_name');?> <label class="text-danger">(*)</label></label>
                                    <div class="controls">
                                            <select class="form-control selectpicker" id="province_name" multiple data-max-options="5" name="province_name[]">

                                            </select>
                                    </div>
                                     <label class="text-danger"> (tối thiểu 1 tỉnh thành và tối đa 5 tỉnh thành)</label>
                                </div>






                            </div>

                           <div class="col-sm-12">




                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_job_map_career');?> <label class="text-danger">(*)</label></label>
                                    <div class="controls">
                                        <select class="form-control" name="rec_job_map_career" id="rec_job_map_career">
                                             <?php foreach ($arr_career as $row) {?>
                                                <option value="<?php echo $row->career_id;?>"><?php echo $row->career_name;?></option>
                                            <?php }
?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_job_require_sex');?> </label>
                                    <div class="controls">
                                        <label class="col-sm-6 ng-binding ng-scope">
                                            <input type="radio" value = "0" name="rec_job_require_sex" checked="true">Nữ
                                        </label>
                                        <label class="col-sm-6 ng-binding ng-scope">
                                            <input type="radio" value = "1" name="rec_job_require_sex">Nam
                                        </label>
                                    </div>
                                </div>

                            </div>





                            <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('welfare_title');?></label>
                                    <div class="controls welfare_backgound">
                                        <?php foreach ($arr_welfare as $row) {?>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="welfare[]" value="<?php echo $row->welfare_id;?>"><?php echo $row->welfare_title;?></label>
                                             </div>
                                        <?php }
?>

                                       <!--  <input type="text" class="form-control" name="welfare_title" /> -->
                                    </div>
                                </div>

                            </div>
                             <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('title_job_description');?></label>
                                </div>

                            </div>
                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_job_content');?><label class="text-danger">(*)</label></label>
                                    <div class="controls">
                                        <textarea class="form-control" name="rec_job_content" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_job_regimen');?><label class="text-danger">(*)</label></label>
                                    <div class="controls">
                                        <textarea class="form-control" name="rec_job_regimen" rows="3"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_job_time');?><label class="text-danger">(*)</label></label>


                                    <div class="controls">
                                        <div class="col-xs-2 col-sm-2 col-md-2">
                                            <select id="job_day" name="job_day" class="form-control"></select>
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2 ">
                                            <select id="job_month" name="job_month" class="form-control"></select>
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2">
                                            <select id="job_year" name="job_year" class="form-control"></select>
                                        </div>
                                    </div>



                                </div>
                            </div>





                            <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('title_job_requirement');?></label>
                                </div>

                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_job_require');?><label class="text-danger">(*)</label></label>
                                    <div class="controls">
                                        <textarea class="form-control" name="rec_job_require" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_job_priority');?><label class="text-danger">(*)</label></label>
                                    <div class="controls">
                                        <textarea class="form-control" name="rec_job_priority" rows="3"></textarea>
                                    </div>
                                </div>

                            </div>

                             <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_job_map_form');?><label class="text-danger">(*)</label></label>
                                    <div class="controls">

                                        <select class="form-control" name="rec_job_map_form" id="rec_job_map_form">
                                             <?php foreach ($arr_job_form as $row) {?>
                                                <option value="<?php echo $row->fjob_id;?>"><?php echo $row->fjob_type;?></option>
                                            <?php }
?>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_job_map_level');?><label class="text-danger">(*)</label></label>
                                        <div class="controls">
                                            <select class="form-control" name="rec_job_map_level" id="rec_job_map_level">
                                                  <?php foreach ($job_level as $row) {?>
                                                <option value="<?php echo $row->ljob_id;?>"><?php echo $row->ljob_level;?></option>
                                            <?php }
?>
                                            </select>

                                        </div>
                                </div>

                                 <div class="form-group col-sm-6">
                                    <div class="controls">
                                         <select class="form-control" name="rec_job_map_form_child" id="rec_job_map_form_child">
                                            <?php foreach ($job_form_child as $row) {?>
                                                <option value="<?php echo $row->jcform_id;?>"><?php echo $row->jcform_type;?></option>
                                            <?php }
?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('title_job_contact_info');?></label>
                                </div>

                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_contact_name');?><label class="text-danger">(*)</label></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="rec_contact_name" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_contact_email');?><label class="text-danger">(*)</label></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="rec_contact_email" />
                                    </div>
                                </div>

                            </div>

                             <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_contact_address');?><label class="text-danger">(*)</label></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="rec_contact_address" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_contact_phone');?><label class="text-danger">(*)</label></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="rec_contact_phone" />
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_contact_mobile');?></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="rec_contact_mobile" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_contact_form');?><label class="text-danger">(*)</label></label>
                                    <div class="controls">
                                        <select class="form-control" name="rec_contact_form" id="rec_contact_form">
                                            <?php foreach ($contact_form as $row) {?>
                                                <option value="<?php echo $row->contact_form_id;?>"><?php echo $row->contact_form_type;?></option>
                                            <?php }
?>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group col-sm-12">
                                <label class="text-danger"></label>
                            </div>


                        <div class="col-sm-12">
                             <div class="col-sm-12">
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary"><?php echo lang('btn_upload');?></button>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group ">
                                *Nhấp chọn "ĐăngTin"đồng nghĩa với việc tôi đã đọc và đồng ý với các <a class="a-term" href="<?php echo base_url('about/term');?>">Thỏa thuận sử dụng</a>.
                            </div>
                            </div>
                        </div>
                    </fieldset>
                    <input type="hidden" id="csrf" name="<?php echo $csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                </form>
            </div>
        </div>
    </div>
</div>