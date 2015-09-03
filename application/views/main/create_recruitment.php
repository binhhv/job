<style type="text/css">
.error-create_recruitment {
    color: red;
}
 </style>


<!-- Button to trigger modal -->
<a href="#myModal" role="button" class="btn" data-toggle="modal">Open Modal</a>

<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Modal</h3>
  </div>

  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
</div>



<p class="text-center contact-box">
    <button class="btn btn-default" data-toggle="modal" data-target="#create_recruitmentModel">create_recruitment</button>
</p>

<div class="modal fade" id="create_recruitmentModel" tabindex="-1" role="dialog" aria-labelledby="create_recruitment" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                        <div class="error text-left" id="message">
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_title');?> <span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="rec_title" />
                                    </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_job_map_country');?> <span class="colorRed">*</span></label>
                                        <div class="controls controls_label">

                                          <!--   <select class="form-control" name="rec_job_map_country" id="rec_job_map_country">
                                                <option value="0">Chọn mức lương mong muốn</option>
                                                <option value="1">từ 2 đến 5 triệu</option>
                                                <option value="1">Từ 5 đến 10 triệu</option>

                                            </select> -->
                                            <?php foreach ($arr_country as $row) {?>
                                                 <label class="radio-inline">
                                                <input type="radio" value = "<?php echo $row->country_id;?>" name="rec_job_map_country"><?php echo $row->country_name;?>
                                                </label>
                                            <?php }
?>


                                           <!-- <input type="text" class="form-control" name="rec_job_map_country" /> -->
                                        </div>
                                </div>

                            </div>


                             <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('province_name');?> <span class="colorRed">*</span></label>
                                    <div class="controls">
                                            <select class="form-control selectpicker" id="province_name" multiple data-max-options="5" name="province_name[]">

                                            </select>
                                        </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_salary');?></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="rec_salary" />
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
                                    <label class="control-label"><?php echo lang('rec_job_content');?></label>
                                    <div class="controls">
                                        <textarea class="form-control" name="rec_job_content" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_job_regimen');?></label>
                                    <div class="controls">
                                        <textarea class="form-control" name="rec_job_regimen" rows="3"></textarea>
                                    </div>
                                </div>

                            </div>
                             <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_job_time');?></label>
                                    <div class="controls input-append date" id="datetimepicker1">
                                        <!-- <input type="text" class="form-control" name="welfare_title" /> -->

                                        <input data-format="dd/MM/yyyy hh:mm:ss" type="text" name="rec_job_time"></input>
                                          <span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
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
                                    <label class="control-label"><?php echo lang('rec_job_require');?></label>
                                    <div class="controls">
                                        <textarea class="form-control" name="rec_job_require" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_job_priority');?></label>
                                    <div class="controls">
                                        <textarea class="form-control" name="rec_job_priority" rows="3"></textarea>
                                    </div>
                                </div>

                            </div>

                             <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_job_map_form');?><span class="colorRed">*</span></label>
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
                                    <label class="control-label"><?php echo lang('rec_job_map_level');?><span class="colorRed">*</span></label>
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
                                    <label class="control-label"><?php echo lang('rec_contact_name');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="rec_contact_name" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_contact_email');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="rec_contact_email" />
                                    </div>
                                </div>

                            </div>

                             <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_contact_address');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="rec_contact_address" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_contact_phone');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="rec_contact_phone" />
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_contact_mobile');?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="rec_contact_mobile" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('rec_contact_form');?><span class="colorRed">*</span></label>
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

                        </div>
                        <div class="row">
                             <div class="col-sm-12">
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary"><?php echo lang('btn_upload');?></button>
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
 <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>