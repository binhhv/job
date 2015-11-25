<div class="col-sm-12 job-province-box no-padding">
<?php if (isset($numResumeOnline) && $numResumeOnline < 3) {
	?>
	<div class="modal-header">
                <!-- <button type="button" class="close"
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button> -->
                <h4 class="modal-title" id="myModalLabel">
                   <?php echo lang('job_form_title'); ?>
                   <button class="btn btn-primary pull-right" onclick="location.href='<?php echo base_url('jobseeker'); ?>'"><i class="fa fa-reply"></i> <?php echo lang('js_title_my_page'); ?></button>
                </h4>
                <label ><?php echo lang('m_title_field') ?></label><label class="text-danger">(*)</label> <?php echo lang('m_title_field_require'); ?>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                <form class="form-horizontal" role="form" method="post" id="form-create-form-apply">
                  <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"<?php echo lang('job_form_name'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"
                        id="name" placeholder="<?php echo lang('job_form_name'); ?>" name="name" disabled="true" value="<?php echo $user['firstname'] . $user['lastname']; ?>" />
                        <input type="hidden" name="idjobseeker" value="<?php echo $user['id']; ?>">

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label"
                          for="inputPassword3" ><?php echo lang('job_form_birthday'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <div class="row">
                        <div class="col-sm-3">
                            <input type="text" name="date" placeholder="<?php echo lang('m_day'); ?>" class="form-control margin-top-5 date" value="1">
                        </div>
                         <div class="col-sm-3">
                             <select name="month" class="form-control margin-top-5">
                                    <option value="1">1</option>
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
                                    <option value="12">12</option>

                             </select>
                         </div>
                          <div class="col-sm-4">
                              <input class="form-control margin-top-5 year" type="text" name="year" placeholder="<?php echo lang('m_year'); ?>" value="1980">
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
                        id="phone" placeholder="<?php echo lang('job_form_phone'); ?>" name="phone" />
                    </div>
                    <div class="col-sm-offset-4 col-sm-8 text-danger error-phone"></div>
                  </div>


                  <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('m_email'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control"
                        id="email" placeholder="<?php echo lang('m_email'); ?>" name="email" disabled="true" value="<?php echo $user['email']; ?>" />
                    </div>
                  </div>

                <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('job_form_level'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <select class="form-control" name="level">
                            <?php if (isset($listLevel)) {
		foreach ($listLevel as $value) {?>
    <option value="<?php echo $value->ljob_id ?>"><?php echo $value->ljob_level; ?></option>
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

		foreach ($listCountry as $key => $value) {
			//$index = current($listCountry);?>
    <label><input type="radio" name="country" value="<?php echo $value->country_id ?>"><?php echo $value->country_name; ?></label>
                                    <?php }
	}
	?>
                            </div>
                            <div class="col-sm-12 select-province-vn hide">
                                <select data-placeholder="<?php echo lang('s_chose_province'); ?>"  multiple class="chosen-select-vn form-control province-vn " tabindex="11" >
                                        <option value=""></option>
                                        <?php if (isset($listProvinceVN)) {
		foreach ($listProvinceVN as $value) {?>
                                                <option value="<?php echo $value->province_id ?>"><?php echo $value->province_name; ?></option>
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
		foreach ($listProvinceJP as $value) {?>
                                                <option value="<?php echo $value->province_id ?>"><?php echo $value->province_name; ?></option>
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
		foreach ($listCareer as $value) {?>
    <option value="<?php echo $value->career_id ?>"><?php echo $value->career_name; ?></option>
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
                        id="email" placeholder="<?php echo lang('job_form_degree'); ?>" name="degree" />
                    </div>
                    <div class="col-sm-offset-4 col-sm-8 text-danger error-degree"></div>
                  </div>


                  <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('job_form_education'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"
                        id="email" placeholder="<?php echo lang('job_form_education'); ?>" name="education" />
                    </div>
                    <div class="col-sm-offset-4 col-sm-8 text-danger error-education"></div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('job_form_current_address'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"
                        id="email" placeholder="<?php echo lang('job_form_current_address'); ?>" name="address" />
                    </div>
                    <div class="col-sm-offset-4 col-sm-8 text-danger error-address"></div>
                  </div>

                  <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('job_form_experience'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"
                        id="email" placeholder="<?php echo lang('job_form_experience'); ?>" name="experience" />
                    </div>
                    <div class="col-sm-offset-4 col-sm-8 text-danger error-experience"></div>
                  </div>
                   <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('job_form_skill'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <textarea placeholder="<?php echo lang('job_form_skill'); ?>" name="skill"  id="skill" class="form-control" tabindex="3" rows="3" cols="50" ></textarea>
                    </div>
                    <div class="col-sm-offset-4 col-sm-8 text-danger error-skill"></div>
                  </div>

                   <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('job_form_healthy'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <select class="form-control" name="healthy">
                            <?php if (isset($listHealthy)) {
		foreach ($listHealthy as $value) {?>
    <option value="<?php echo $value->healthy_id ?>"><?php echo $value->healthy_type; ?></option>
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
                         <textarea placeholder="<?php echo lang('job_form_reason_apply'); ?>" name="reason-apply"  id="reason-apply" class="form-control" tabindex="3" rows="3" cols="50" ></textarea>
                    </div>
                    <div class="col-sm-offset-4 col-sm-8 text-danger error-reason-apply"></div>
                  </div>

                   <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('s_title_salary'); ?><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"
                        id="email" placeholder="<?php echo lang('s_title_salary'); ?>" name="salary" />
                    </div>
                    <div class="col-sm-offset-4 col-sm-8 text-danger error-salary"></div>
                  </div>

                   <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('job_form_advance'); ?></label>
                    <div class="col-sm-8">
                           <textarea placeholder="<?php echo lang('job_form_advance'); ?>" name="advance"  id="advance" class="form-control" tabindex="3" rows="3" cols="50" ></textarea>
                    </div>
                  </div>

                   <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3"><?php echo lang('job_form_wish'); ?></label>
                    <div class="col-sm-8">
                         <textarea  name="wish"  placeholder="<?php echo lang('job_form_wish'); ?>" id="wish" class="form-control" tabindex="3" rows="3" cols="50" ></textarea>
                    </div>
                  </div>
                  <div class="form-group  captcha-box">
								  <label class="control-label col-sm-4"><?php echo lang('m_captcha') ?><span class="colorRed">*</span></label>
								  	<div class="col-sm-8 captcha ">

								  	</div>
								  	<div class="col-sm-offset-4 col-sm-8 margin-top-5">
								  		<input type="text" name="captcha" class="input-captcha">
								  		<span class="alert alert-danger hide error-captcha"><?php echo lang('m_captcha_invalid') ?></span>
								  		<input type="hidden" name="captcha-reg" >
								  	</div>
							  </div>
                  <div class="form-group">
                  	  <div class="col-sm-12 text-left">
								<?php echo str_replace('"%s"', base_url(), lang('m_terms_create_resume')); ?>
							</div>
                      <div class="col-sm-12 text-right">
                      <input type="hidden" name="province">
                      <div class="token-create-form">

                         <input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?php echo $csrf['hash']; ?>" /></div>

                            <button type="submit" class="btn btn-primary btn-create-form-apply">
                                <?php echo lang('job_form_title'); ?>
                            </button>
                      </div>
                  </div>


                </form>






            </div>

            <?php } else {?>
<div class="row">
                <!-- <button type="button" class="close"
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button> -->
                <div class="col-sm-12 text-center margin-top-10"><span class="text-center"><strong><?php echo lang('js_ms_more_resume'); ?></strong></span></div>
                <div class="col-sm-12 text-left margin-top-10">
                	<button class="btn btn-primary " onclick="location.href='<?php echo base_url('jobseeker'); ?>'"><i class="fa fa-reply"></i> <?php echo lang('js_title_my_page'); ?></button>
                </div>
            </div>
<?php }
?>
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
                url: "<?php echo base_url() . 'jobseeker/create-resume'; ?>", //Where to make Ajax calls
                dataType:"json", // Data type, HTML, json etc.
                data:$(this).serialize(),
                // mimeType:"multipart/form-data",
                // contentType: false,
                // cache: false,
                // processData:false,
                //data:formdata ? formdata : form.serialize(),//$(this).serialize(), //Form variables
                success:function(response){
                	$(".error-captcha").addClass('hide')
                    if(response.status == 'success'){
                        $("#form-apply").addClass('hide');
                        $(".msg-apply").removeClass('hide');
                        $(".msg-apply").append(response.msg);
                       // $("#modal-create-document").modal('hide');
                       window.location.href='<?php echo base_url("jobseeker") ?>';
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
                        var captcha = response.error.captcha;


                        console.log(response.error);
                    	(captcha.length > 0) ? $(".error-captcha").removeClass('hide') : null;
                        $(".token-create-form").empty();
                        var token ='<input type="hidden" name="'+response.csrf.name+'" value="'+response.csrf.hash+'" />';
                        $(".token-create-form").append(token);
                        getCaptcha('captcha');
                    }
                },
                error:function (xhr, ajaxOptions, thrownError){
                    //alert(thrownError);
                    //On error, we alert user
                    //$("#alert-error-contact").removeClass('hide');
                    //alert(thrownError);
                }
                });
});

//});
$(document).ready(function() {
    checkValidInput();
    $(".chosen-select-vn").chosen({max_selected_options: 5,no_results_text: "Không tìm thấy tỉnh thành nào"});
    $(".chosen-select-jp").chosen({max_selected_options: 5,no_results_text: "Không tìm thấy tỉnh thành nào"});
});
</script>
