	<div class="container job-province">

		<div class="row">
		<!--register-->
		<div class="col-sm-9 col-sm-push-3 ">


			<div class="col-sm-12 job-province-box">
				<div class="row">
					<div class="col-sm-12 col-md-12 margin-5">
						<span class="text-color-1 title-jobseeker-register"><strong>Nhà tuyển dụng đăng ký tài khoản</strong></span>
					</div>
					<div class="col-sm-12 col-md-12 margin-5">
						<span class="title-exits-account"> Bạn đã có tài khoản ?
							<a href="<?php echo base_url('login')?>">Đăng nhập</a> &nbsp;  <button class="btn-employer background-color-2 text-color-2" onclick="location.href='<?php echo base_url('register_uv');?>'">Người tìm việc đăng ký</button>
						</span>
					</div>
				</div>
				<div class="row border-row"></div>
				<div class="row">
					<div class="col-sm-12 margin-top-20">
                            <form role="form" name="create_recruitment-form" id="create_recruitment-form" method="post">
                    <fieldset>
                        <div class="row">
                             <div class="form-group col-sm-12">
                                 <div class="error text-center">
                                        <div class="error text-left" id="message_recruitment">
                                        </div>
                                </div>
                            </div>

                            <!--register content-->
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
                                             <?php foreach ($arr_Salary as $row) {?>
                                                <option value="<?php echo $row->salary_id;?>"><?php echo $row->salary_value . " " . $row->salary_type;?></option>
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
        <div class="col-sm-3 col-sm-pull-9 no-padding-res">
            <?php $listCareer = $this->globals->getTagJob();
if (isset($listCareer) && count($listCareer) > 0) {
	?>
                <div class="job-province-box margin-top-10">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-12">
                            <span class="border-vertical text-color-1"></span>
                            <span class="text-color-1 title-jobseeker-register"><strong>Việc làm theo ngành</strong></span>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row "><div class="col-sm-12"><div class="border-row"></div></div></div> getTagJob-->
                    <div class="row list-tag-job" >
                        <?php foreach ($listCareer as $value) {
		$keyRegex = array('*', '?', '(', ')', '/', '+', '\'', "\"", '_', "=", ' ');
		$careerReg = str_replace($keyRegex, "-", trim($value->career_name));
		?>
                        <div class="col-sm-12 item-tag-job">
                        <a href="<?php echo base_url('search') . '/' . 'all_' . $careerReg . '_c' . $value->career_id;?>"><?php echo $value->career_name?> <span class="text-color-3">
                        <?php if ($value->numJob > 0) {?>(<?php echo $value->numJob;?>) <?php }
		?>
                        </span></a>
                        </div>
<?php }
	?>

                    </div>

                </div>
                <?php }
?>
        </div>
		<!--search and recruitment highlight-->

        <!--ADWORDS-->
                    <div class="col-sm-12 margin-top-10 no-padding-left-res">
                        <div class="col-sm-12 no-padding">
                            <div  style="background:url(<?php echo base_url() . "assets/main/img/about/parallax-bg-3.jpg"?>) 50% 0px no-repeat ;">
                                <div class="ads-search-job">
                                    <div class="row">
                                                <div class="col-md-8">
                                                    <h1 class="title text-center">Liên hệ quảng cáo</h1>
                                                    <!-- <p class="text-center">&nbsp;</p> -->
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="text-center">
                                                        <a href="http://localhost/job/adwords" class="btn btn-default btn-lg">Liên hệ</a>
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
		<!--adwords-->
		</div>

	</div>

<script type="text/javascript">
$(function(){
	getCaptcha();
	$("#uv-register-form").submit(function(event) {
        event.preventDefault();
        //if(!checkCaptcha()){
	 				//$(".error-captcha").removeClass('hide');
	 				//getCaptcha();
	 	//}else{
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: base_website + "register/insertAccount", //Where to make Ajax calls
            dataType: "json", // Data type, HTML, json etc.
            data: $(this).serialize(), //Form variables
            success: function(response) {
                // var objs = $.parseJSON(response);

                var status = response.status;
                if (status == 'errvalid') {
                	//$(".error-captcha").empty()
                	$(".error-captcha").addClass('hide')
                	$(".error-account-last-name").empty();
                	$(".error-account-first-name").empty();
                	$(".error-account-email").empty();
                	$(".error-account-password").empty();
                	$(".error-account-confirm-password").empty();

                    var account_email = response.content.account_email;
                    var account_password = response.content.account_password;
                    var confirm_password = response.content.confirm_password;
                    var account_first_name = response.content.account_first_name;
                    var account_last_name = response.content.account_last_name;
                    var captcha = response.content.captcha;
                    var csrf_name = response.content.name;
                    var csrf_hash = response.content.hash;
                    (account_last_name.length  > 0) ? $(".error-account-last-name").removeClass('hide').append(account_last_name) : null;
                    (account_first_name.length  > 0) ? $(".error-account-first-name").removeClass('hide').append(account_first_name) : null;
                    (account_email.length  > 0) ? $(".error-account-email").removeClass('hide').append(account_email) : null;
                    (account_password.length  > 0) ? $(".error-account-password").removeClass('hide').append(account_password) : null;
                    (confirm_password.length  > 0) ? $(".error-account-confirm-password").removeClass('hide').append(confirm_password) : null;
                    (captcha.length > 0) ? $(".error-captcha").removeClass('hide') : null;
                    // $('#message_user').text("");
                    // $('#message_user').append(account_last_name);
                    // $('#message_user').append(account_first_name);
                    // $('#message_user').append(account_email);
                    // $('#message_user').append(account_password);
                    // $('#message_user').append(confirm_password);

                    $(".alert-danger").css('margin','0');
                    $('input[name="csrf_test_name"]').val(csrf_hash);
                    getCaptcha();
                } else if (status == 'success') {
                    //$('#message_user').text("");
                    //$('#registerModal').modal('hide')
                    window.location.href = '<?php echo base_url();?>'; //redirec to home page jobseeker
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                //alert(thrownError);
            }
        });
		//}
    })
})

	function getCaptcha(){
      	$.ajax({
        url: '<?php echo base_url() . "captcha/createCaptcha"?>',
        type: "get",
        dataType:'json',
        success: function(data){
        	//$(".captcha-box").removeClass('hide');
        	$(".captcha").empty();
        	$(".captcha").append('<img src="<?php echo base_url() . "captcha/"?>'+data['filename']+'" >');
        	$('input:hidden[name=captcha-reg]').val(data['word']);
        	//console.log(data);
        	//alert(data.hash);
        	//$(".token").empty();
        	//var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
        	//$(".token").append(token);
           //document.write(data); just do not use document.write
           //console.log(data);
           //callback(data);
           //console.log(data.name);
        }
      });
      }
      function checkCaptcha(){
      	var result = true;
      	var captcha = $('input[name=captcha]').val();
      	if(captcha.length <= 0){
      		result = false;
      	}
      	else{
      		if(captcha != $('input:hidden[name=captcha-reg]').val()){
      			result = false;
      		}
      	}
      	return result;
      }
</script>