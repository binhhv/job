<div class="modal-header">
                <button type="button" class="close"
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                   Sửa hồ sơ <label class="btn btn-default"><strong><?php echo $resume->docon_code;?></strong></label>
                </h4>
                <label ><?php echo lang('m_title_field'); ?></label><label class="text-danger">(*)</label> <?php echo lang('m_title_field_require'); ?>.
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                <form class="form-horizontal" role="form" method="post" id="form-create-form-apply">
                  <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('job_form_name'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"
                        id="name" placeholder="<?php echo lang('job_form_name'); ?>" name="name" disabled="true" value="<?php echo $user['firstname'] . $user['lastname'];?>" />
                        <input type="hidden" name="idjobseeker" value="<?php echo $user['id'];?>">
                        <input type="hidden" name="idResume" value ="<?php echo $resume->docon_id; ?>">
                         <!-- <input type="hidden" name="idjob" value="<?php echo $idjob;?>"> -->
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label"
                          for="inputPassword3" ><?php echo lang('job_form_birthday'); ?><span class="text-danger">*</span></label>
                     <div class="col-sm-8">
                    <?php $time = strtotime($resume->docon_birthday);
    $d = date('d', $time);
    $m = date('m', $time);
    $y = date('Y', $time);
    //print_r($d.$m.$y);
    ?>
                        <div class="row">
                        <div class="col-sm-3">
                            <input type="text" name="date" placeholder="ngày" class="form-control margin-top-5 date" value="<?php echo $d;?>">
                        </div>
                         <div class="col-sm-3">
                             <select name="month" class="form-control margin-top-5">
                             <?php for($i = 1; $i < 13 ; $i ++) { ?>
                                <option <?php if($i == $m){echo 'selected';} ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                              <? } ?>
                                    <!-- <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option> -->

                             </select>
                         </div>
                          <div class="col-sm-4">
                              <input class="form-control margin-top-5 year" type="text" name="year" placeholder="năm sinh" value="<?php echo $y;?>">
                          </div>
                      </div>
                    </div>
                    <div class="col-sm-offset-4 col-sm-8 text-danger error-birthday"></div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('job_form_phone'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control phone-number"
                        id="phone" placeholder="<?php echo lang('job_form_phone'); ?>" name="phone" value="<?php echo $resume->docon_phone;?>" />
                    </div>
                    <div class="col-sm-offset-4 col-sm-8 text-danger error-phone"></div>
                  </div>


                  <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('m_email'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control"
                        id="email" placeholder="<?php echo lang('m_email'); ?>" name="email" disabled="true" value="<?php echo $user['email'];?>" />
                    </div>
                  </div>

                <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('job_form_level'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <select class="form-control" name="level">
                            <?php if (isset($listLevel)) {
	foreach ($listLevel as $value) {
		?>
    <option <?php if ($resume->docon_map_job_level == $value->ljob_level) {echo "selected";}
		?> value="<?php echo $value->ljob_id?>"><?php echo $value->ljob_level;?></option>
                                <?php }
}
?>
                        </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('job_form_work_at'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-12">
                                <?php
if (isset($listCountry)) {
	foreach ($listCountry as $value) {
		?>
    <label><input <?php if ($resume->docon_map_country == $value->country_id) {echo 'checked = "checked"';}
		?> type="radio" name="country" value="<?php echo $value->country_id?>"><?php echo $value->country_name;?></label>
                                    <?php }
}
?>
                            </div>
                            <div class="col-sm-12 select-province-vn hide">
                                <select data-placeholder="<?php echo lang('s_chose_province'); ?>"  multiple class="chosen-select-vn form-control province-vn " tabindex="11" >
                                        <option value=""></option>
                                        <?php if (isset($listProvinceVN)) {
	foreach ($listProvinceVN as $value) {
		?>
                                                <option <?php if ($value->numProvince > 0) {echo "selected";}
		?> value="<?php echo $value->province_id?>"><?php echo $value->province_name;?></option>
                                            <?php }
}
?>
                                      </select>
                                      <label class="text-danger">(<?php echo lang('job_form_province_require'); ?>)</label>
                                  </div>
                                  <div class="col-sm-12 select-province-jp hide">
                                    <select data-placeholder="<?php echo lang('s_chose_province'); ?>"  multiple class="chosen-select-jp form-control province-jp hide" tabindex="11" >
                                        <option value=""></option>
                                        <?php if (isset($listProvinceJP)) {
	foreach ($listProvinceJP as $value) {
		?>
                                                <option <?php if ($value->numProvince > 0) {echo "selected";}
		?> value="<?php echo $value->province_id?>"><?php echo $value->province_name;?></option>
                                            <?php }
}
?>
                                      </select>
                                      <label class="text-danger">(<?php echo lang('job_form_province_require'); ?>)</label>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-offset-4 col-sm-8 text-danger error-province"></div>
                  </div>

                  <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('s_tite_career'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <select class="form-control" name="career">
                            <?php if (isset($listCareer)) {
	foreach ($listCareer as $value) {
		?>
    <option <?php if ($resume->docon_career == $value->career_id) {echo "selected";}
		?> value="<?php echo $value->career_id?>"><?php echo $value->career_name;?></option>
                                <?php }
}
?>
                        </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('job_form_degree'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"
                        id="email" placeholder="<?php echo lang('job_form_degree'); ?>" name="degree" value="<?php echo $resume->docon_degree;?>" />
                    </div>
                    <div class="col-sm-offset-4 col-sm-8 text-danger error-degree"></div>
                  </div>


                  <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('job_form_education'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"
                        id="email" placeholder="<?php echo lang('job_form_education'); ?>" name="education" value="<?php echo $resume->docon_education;?>" />
                    </div>
                    <div class="col-sm-offset-4 col-sm-8 text-danger error-education"></div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('job_form_current_address'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"
                        id="email" placeholder="<?php echo lang('job_form_current_address'); ?>" name="address" value="<?php echo $resume->docon_address;?>"/>
                    </div>
                    <div class="col-sm-offset-4 col-sm-8 text-danger error-address"></div>
                  </div>

                  <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('job_form_experience'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"
                        id="email" placeholder="<?php echo lang('job_form_experience'); ?>" name="experience" value="<?php echo $resume->docon_experience;?>" />
                    </div>
                    <div class="col-sm-offset-4 col-sm-8 text-danger error-experience"></div>
                  </div>
                   <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('job_form_skill'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <textarea placeholder="<?php echo lang('job_form_skill'); ?>" name="skill"  id="skill" class="form-control" tabindex="3" rows="3" cols="50"
                        value="<?php echo nl2br($resume->docon_degree);?>"
                        ></textarea>
                    </div>
                    <div class="col-sm-offset-4 col-sm-8 text-danger error-skill"></div>
                  </div>

                   <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('job_form_healthy'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <select class="form-control" name="healthy">
                            <?php if (isset($listHealthy)) {
	foreach ($listHealthy as $value) {
		?>
    <option <?php if ($resume->docon_healthy == $value->healthy_id) {echo "selected";}
		?> value="<?php echo $value->healthy_id?>"><?php echo $value->healthy_type;?></option>
                                <?php }
}
?>
                        </select>
                    </div>
                  </div>

                   <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('job_form_reason_apply'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                         <textarea placeholder="<?php echo lang('job_form_reason_apply'); ?>" name="reason-apply"  id="reason-apply" class="form-control" tabindex="3" rows="3" cols="50"
                          value="<?php echo nl2br($resume->docon_reason_apply);?>" ></textarea>
                    </div>
                    <div class="col-sm-offset-4 col-sm-8 text-danger error-reason-apply"></div>
                  </div>

                   <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('s_title_salary'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"
                        id="email" placeholder="<?php echo lang('s_title_salary'); ?>" name="salary" value="<?php echo nl2br($resume->docon_salary);?>"/>
                    </div>
                    <div class="col-sm-offset-4 col-sm-8 text-danger error-salary"></div>
                  </div>

                   <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('job_form_advance'); ?></label>
                    <div class="col-sm-8">
                           <textarea placeholder="<?php echo lang('job_form_advance'); ?>" name="advance"  id="advance" class="form-control" tabindex="3" rows="3" cols="50"
                           value="<?php echo nl2br($resume->docon_advance);?>"></textarea>
                    </div>
                  </div>

                   <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('job_form_wish'); ?></label>
                    <div class="col-sm-8">
                         <textarea  name="wish"  placeholder="<?php echo lang('job_form_wish'); ?>" id="wish" class="form-control" tabindex="3" rows="3" cols="50" value="<?php echo nl2br($resume->docon_wish);?>"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                      <div class="col-sm-12 text-center">
                      <input type="hidden" name="province">
                      <div class="token-create-form">
                        
                         <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?php echo $csrf['hash'];?>" /></div>
                          <button type="button" class="btn btn-danger"
                        data-dismiss="modal">
                            <?php echo lang('m_close'); ?>
                            </button>
                            <button type="submit" class="btn btn-primary btn-create-form-apply">
                                <?php echo lang('m_save'); ?>
                            </button>
                      </div>
                  </div>


                </form>






            </div>

            <!-- Modal Footer -->
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Đóng
                </button>
                <button type="button" class="btn btn-primary btn-create-form-apply">
                    Tạo và apply.
                </button>
            </div> -->
<script type="text/javascript">
    function checkValidInput() {
    $(".year").keydown(function(event) {
        // Allow only delete, backspace,left arrow,right arrow, Tab and numbers
        if (!((event.keyCode == 46 ||
            event.keyCode == 8  ||
            event.keyCode == 37 ||
            event.keyCode == 39 ||
            event.keyCode == 9) ||
            $(this).val().length < 4 &&
            ((event.keyCode >= 48 && event.keyCode <= 57) ||
            (event.keyCode >= 96 && event.keyCode <= 105)))) {
            // Stop the event
            event.preventDefault();
            return false;
        }
    });

    $(".date").keydown(function(event) {
        // Allow only delete, backspace,left arrow,right arrow, Tab and numbers
        if (!((event.keyCode == 46 ||
            event.keyCode == 8  ||
            event.keyCode == 37 ||
            event.keyCode == 39 ||
            event.keyCode == 9) ||
            $(this).val().length < 2 &&
            ((event.keyCode >= 48 && event.keyCode <= 57) ||
            (event.keyCode >= 96 && event.keyCode <= 105)))) {
            // Stop the event
            event.preventDefault();
            return false;
        }
    });

     $(".phone-number").keydown(function(event) {
        // Allow only delete, backspace,left arrow,right arrow, Tab and numbers
        if (!((event.keyCode == 46 ||
            event.keyCode == 8  ||
            event.keyCode == 37 ||
            event.keyCode == 39 ||
            event.keyCode == 9) ||
            $(this).val().length < 11 &&
            ((event.keyCode >= 48 && event.keyCode <= 57) ||
            (event.keyCode >= 96 && event.keyCode <= 105)))) {
            // Stop the event
            event.preventDefault();
            return false;
        }
    });

}
$('input:radio[name="country"]').change(function(){

         if ($(this).val() == '1') {
            $(".select-province-jp").addClass('hide')
            $(".select-province-vn").removeClass('hide');
         }
         else{
            $(".select-province-vn").addClass('hide')
            $(".select-province-jp").removeClass('hide');

         }
    });
//$(".btn-create-form-apply").on("click",function(){
    //alert("123123");


$("#form-create-form-apply").submit(function(event){
    event.preventDefault();
    var province =[];
   var countrySelect = $('input:radio[name="country"]:checked').val();
    if(countrySelect == '1'){
    $('.select-province-vn .chosen-container ul.chosen-choices li.search-choice').each(function () {
        var li = $(this).find('a');
        var indexProvince = li.data('option-array-index');
       province.push($('select.province-vn option').eq(indexProvince).val());
        //alert("123123");

    });
    }else{
        $('.select-province-jp .chosen-container ul.chosen-choices li.search-choice').each(function () {
        var li = $(this).find('a');
       //province.push(li.data('option-array-index'));
       var indexProvince = li.data('option-array-index');
       province.push($('select.province-jp option').eq(indexProvince).val());
        //alert("123123");

    });
    }
    //alert(province);
    ///var formData = new FormData(this);
    //alert("123123");
    //formData.append("province", province);
    $("input[name=province]:hidden").val(province);
    $.ajax({
                type: "POST", // HTTP method POST or GET
                url: "<?php echo base_url('jobseeker/edit-resume-post');?>", //Where to make Ajax calls
                dataType:"json", // Data type, HTML, json etc.
                data:$(this).serialize(),
                // mimeType:"multipart/form-data",
                // contentType: false,
                // cache: false,
                // processData:false,
                //data:formdata ? formdata : form.serialize(),//$(this).serialize(), //Form variables
                success:function(response){
                    if(response.status == 'success'){
                        $("#form-apply").addClass('hide');
                        $(".msg-apply").removeClass('hide');
                        $(".msg-apply").append(response.msg);
                        $("#modal-create-document").modal('hide');

                        window.setTimeout(function(){
                            window.location.href= "<?php echo base_url('jobseeker');?>";
                        },200);
                    }
                    else{
                        $(".msg-apply").removeClass('hide');
                        $(".msg-apply").append(response.msg);
                        $(".error-birthday").html(response.error.birthday);
                        $(".error-phone").html(response.error.phone);
                        $(".error-province").html(response.error.province);
                        $(".error-degree").html(response.error.degree);
                        $(".error-education").html(response.error.education);
                        $(".error-address").html(response.error.address);
                        $(".error-experience").html(response.error.experience);
                        $(".error-skill").html(response.error.skill);
                        $(".error-reason-apply").html(response.error.reasonapply);
                        $(".error-salary").html(response.error.salary);
                        $(".token-create-form").empty();
                        var token ='<input type="hidden" name="'+response.csrf.name+'" value="'+response.csrf.hash+'" />';
                        $(".token-create-form").append(token);
                    }
                },
                error:function (xhr, ajaxOptions, thrownError){
                    alert("error");
                    //On error, we alert user
                    //$("#alert-error-contact").removeClass('hide');
                    //alert(thrownError);
                }
                });
});

//});
$(document).ready(function() {
    $("#skill").val('<?php echo nl2br($resume->docon_skill);?>');
    $("#advance").val('<?php echo nl2br($resume->docon_advance);?>');
    $("#wish").val('<?php echo nl2br($resume->docon_wish);?>');
    $("#reason-apply").val('<?php echo nl2br($resume->docon_reason_apply);?>');
     var countrySelect = $('input:radio[name="country"]:checked').val();
     if (countrySelect == '1') {
            $(".select-province-jp").addClass('hide')
            $(".select-province-vn").removeClass('hide');
         }
         else{
            $(".select-province-vn").addClass('hide')
            $(".select-province-jp").removeClass('hide');

         }
    checkValidInput();
    $(".chosen-select-vn").chosen({max_selected_options: 5,no_results_text: "Không tìm thấy tỉnh thành nào"});
    $(".chosen-select-jp").chosen({max_selected_options: 5,no_results_text: "Không tìm thấy tỉnh thành nào"});
});
</script>