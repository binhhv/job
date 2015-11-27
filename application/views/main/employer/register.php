	<div class="container job-province">

		<div class="row">
		<!--register-->
		<div class="col-sm-9 col-sm-push-3 ">


			<div class="col-sm-12 job-province-box">

				<div class="row">
					<div class="col-sm-12 col-md-12 margin-5">
						<span class="text-color-1 title-jobseeker-register"><strong><?php echo lang('em_title_register'); ?></strong></span>
					</div>
					<div class="col-sm-12 col-md-12 margin-5">
						<span class="title-exits-account"> <?php echo lang('js_rg_exist_account'); ?>
							<a href="<?php echo base_url('login') ?>"><?php echo lang('hd_login') ?></a> &nbsp;  <button class="btn-employer background-color-2 text-color-2" onclick="location.href='<?php echo base_url('register_uv'); ?>'"><?php echo lang('m_title_jobseeker_register'); ?></button>
						</span>
					</div>
				</div>
				<div class="row border-row"></div>
				<div class="row">
					<div class="col-sm-12 margin-top-20">
                            <form enctype="multipart/form-data" role="form" name="femployer-register" id="femployer-register" method="post">
                    <fieldset>
                         <div class="row">

                            <!--  <div class="form-group col-sm-12">
                                <div class="error text-center">
                                    <div class="error text-left" id="message_empoyer">
                                    </div>
                                </div>

                            </div> -->
                            <div class="col-sm-12 clear mb_20">
                                <span class="border-vertical text-color-1"></span>
                                <span class="text-color-1 title-jobseeker-register"><strong><?php echo lang('title_register_re_depl'); ?></strong></span>
                                <!-- <span class="fwb fs20 txt-color-363636"><?php echo lang('title_register_re_depl'); ?></span> -->
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('email_re_user'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="account_email" />
                                    </div>
                                    <div class="col-sm-12 text-danger error-account-email"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('password_re_user'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="password" class="form-control" name="account_password" />
                                    </div>
                                    <div class="col-sm-12 text-danger error-account-password"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('passconf_re_user'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="password" class="form-control" name="confirm_password" />
                                    </div>
                                    <div class="col-sm-12 text-danger error-account-confirm-password"></div>
                                </div>
                            </div>
                            <div class="col-sm-12 clear mb_20">
                                <!-- <span class="fwb fs20 txt-color-363636"><?php echo lang('title_depoyer_re_depl'); ?></span> -->
                                 <span class="border-vertical text-color-1"></span>
                                <span class="text-color-1 title-jobseeker-register"><strong><?php echo lang('title_depoyer_re_depl'); ?></strong></span>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_name_re_depl'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="employer_name" />
                                    </div>
                                    <div class="col-sm-12 text-danger error-employer-name"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_size_re_depl'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <!-- <select class="form-control" name="employer_size" id="employer_size">
                                            <option value="0">Chọn quy mô doanh nghiệp</option>
                                            <option value="1">Ít hơn 10 nhân viên</option>
                                            <option value="2">Từ 10 đến 24 nhân viên</option>
                                            <option value="3">Từ 25 đến 50 nhân viên</option>
                                        </select> -->
                                         <input type="text" class="form-control" name="employer_size" />
                                    </div>
                                    <div class="col-sm-12 text-danger error-employer-size"></div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_phone_re_depl'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="employer_phone" />
                                    </div>
                                    <div class="col-sm-12 text-danger error-employer-phone"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_fax_re_depl'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                         <input type="text" class="form-control" name="employer_fax" />
                                    </div>
                                    <div class="col-sm-12 text-danger error-employer-fax"></div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_about_re_depl'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <textarea type="text" class="form-control" name="employer_about" rows="3"> </textarea>
                                    </div>
                                    <div class="col-sm-12 text-danger error-employer-about"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_address_re_depl'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                          <textarea type="text" class="form-control" name="employer_address"  rows="3"> </textarea>
                                    </div>
                                    <div class="col-sm-12 text-danger error-employer-address"></div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_map_province_re_depl'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <div class="row">
                                            <label class="col-sm-6"><input type="radio" value="1" checked="true" name="country">Việt Nam</label>
                                            <label class="col-sm-6"><input type="radio" value="2" name="country">Nhật Bản</label>
                                        </div>
                                    </div>
                                    <div class="controls">
                                        <select class="form-control province_vn" name="employer_map_province_vn" id="employer_map_province_vn">
                                            <!-- <option value="0">Chọn quy tỉnh thành</option> -->
                                            <?php if (isset($provinceVN)) {foreach ($provinceVN as $rows): ?>
                                                <option value="<?php echo $rows->province_id ?>"><?php echo $rows->province_name ?></option>
                                            <?php endforeach?> <?php }
?>
                                        </select>
                                        <select class="form-control province_jp hide" name="employer_map_province_jp" id="employer_map_province_jp">
                                            <!-- <option value="0">Chọn quy tỉnh thành</option> -->
                                            <?php if (isset($provinceJP)) {foreach ($provinceJP as $rows): ?>
                                                <option value="<?php echo $rows->province_id ?>"><?php echo $rows->province_name ?></option>
                                            <?php endforeach?> <?php }
?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_website_re_depl'); ?></label>
                                    <div class="controls"><label>&nbsp;</label></div>
                                    <div class="controls">
                                         <input type="text" class="form-control" name="employer_website" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('employer_logo_re_depl'); ?></label>
                                    <div class="controls">
                                        <!-- <div class="display_block btn-big pos_relactive w170 floatLeft"> -->
                                        <input id="fileupload" type="file" name="files"  >
                                            <!-- Chọn file đính kèm <span class="icon_upload_file"></span> -->
                                        <!-- </div> -->
                                        <div id="progress" class="progress margin-top-5">
                                                    <div class="progress-bar progress-bar-success"></div>
                                                </div>
                                                <!-- The container for the uploaded files -->
                                                <div id="files" class="files hide"></div>
                                                <div class="files-name"></div>
                                                <input type="hidden" name="file-name">
                                        <input type="hidden" name="file-tmp">
                                        <div class="col-sm-12">
                                             <label class="text-danger error-file hide"></label>
                                        </div>
                                        <!-- <span class="select_file_note floatLeft txt-color-363636" id="note_file_select">(Chưa chọn file nào)</span> -->
                                    </div>
                                    <div class="col-sm-12 text-danger error-employer-logo"></div>

                                </div>
                                <div class="col-sm-12 note_size_photo clearfix font12 italic" id="error_giayphepkinhdoanh">(<?php echo lang('m_file_tyoe') ?> .jpg .gif .png, <?php echo lang('m_file_size'); ?> &lt;<=2MB)</div>
                            </div>


                            <div class="col-sm-12 clear mb_20">
                                <!-- <span class="fwb fs20 txt-color-363636"><?php echo lang('title_user_re_depl'); ?></span> -->
                                 <span class="border-vertical text-color-1"></span>
                                <span class="text-color-1 title-jobseeker-register"><strong><?php echo lang('title_user_re_depl'); ?></strong></span>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_contact_name_re_depl'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="employer_contact" />
                                    </div>
                                    <div class="col-sm-12 text-danger error-employer-contact"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_contact_email_re_depl'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                         <input type="text" class="form-control" name="employer_contact_email" />
                                    </div>
                                    <div class="col-sm-12 text-danger error-employer-contact-email"></div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_contact_phone_re_depl'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="employer_contact_phone" />
                                    </div>
                                    <div class="col-sm-12 text-danger error-employer-contact-phone"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_contact_mobile_re_depl'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                         <input type="text" class="form-control" name="employer_contact_mobile" />
                                    </div>
                                    <div class="col-sm-12 text-danger error-employer-contact-mobile"></div>
                                </div>
                            </div>

                            <div class="col-sm-12 clear mb_20">
                                <span class="border-vertical text-color-1"></span>
                                <span class="text-color-1 title-jobseeker-register"><strong>Captcha</strong></span>
                                <!-- <span class="fwb fs20 txt-color-363636"><?php echo lang('title_register_re_depl'); ?></span> -->
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                    <!-- <label class="control-label"><?php echo lang('email_re_user'); ?><span class="colorRed">*</span></label> -->
                                    <!-- <div class="controls"> -->
                                    <div class="col-sm-6">
                                        <div class="captcha " style="display: inline-block;padding-top: 5px;"></div> &nbsp;
                                        <input type="text" name="captcha" class="input-captcha form-control margin-top-5" style="display: inline-block;height: 32px;">
                                    </div>
                                    <div class="col-sm-6 controls">
                                        <!-- <input type="text" name="captcha" class="input-captcha form-control"> -->
                                        <span class="hide error-captcha text-danger"><?php echo lang('invalid-captcha') ?></span>
                                        <input type="hidden" name="captcha-reg" >
                                    </div>

                                    <!-- </div> -->
                                </div>
                            </div>

                         </div>

                          <div class="row">
                             <div class="col-sm-12">
                                <div class="form-group text-right">
                                     <button type="submit" class="btn btn-primary"><?php echo lang('btn_register_re_user'); ?></button>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <?php echo str_replace('"%s"', base_url(), lang('m_terms_register')); ?>
                            </div>
                        </div>
                    </fieldset>
                    <div class="token hide"><input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?=$csrf['hash'];?>" /></div>

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
                        <a href="<?php echo base_url('search') . '/' . 'all_' . $careerReg . '_c' . $value->career_id; ?>"><?php echo $value->career_name ?> <span class="text-color-3">
                        <?php if ($value->numJob > 0) {?>(<?php echo $value->numJob; ?>) <?php }
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
                            <div  style="background:url(<?php echo base_url() . "assets/main/img/about/parallax-bg-3.jpg" ?>) 50% 0px no-repeat ;">
                                <div class="ads-search-job">
                                    <div class="row">
                                                <div class="col-md-8">
                                                    <h1 class="title text-center"><?php echo lang('m_title_contact_adwords') ?></h1>
                                                    <!-- <p class="text-center">&nbsp;</p> -->
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="text-center">
                                                        <a href="http://localhost/job/adwords" class="btn btn-default btn-lg"><?php echo lang('m_button_contact_adwords') ?></a>
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
	$("#femployer-register").submit(function(event) {
        event.preventDefault();
        //if(!checkCaptcha()){
	 				//$(".error-captcha").removeClass('hide');
	 				//getCaptcha();
	 	//}else{
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: base_website + "employer/register-employer", //Where to make Ajax calls
            dataType: "json", // Data type, HTML, json etc.
            data: $(this).serialize(), //Form variables
            success: function(response) {
                // var objs = $.parseJSON(response);

                var status = response.status;
                console.log(status);
                if (status == 'errvalid') {

                	//$(".error-captcha").empty()
                	$(".error-captcha").addClass('hide')
                	//$(".error-account-last-name").empty();
                	//$(".error-account-first-name").empty();
                	$(".error-account-email").empty();
                	$(".error-account-password").empty();
                	$(".error-account-confirm-password").empty();
                    $(".error-employer-name").empty();
                    $(".error-employer-size").empty();
                    $(".error-employer-phone").empty();
                    $(".error-employer-fax").empty();
                    $(".error-employer-about").empty();
                    $(".error-employer-address").empty();
                    $(".error-employer-contact").empty();
                    $(".error-employer-contact-email").empty();
                    $(".error-employer-contact-phone").empty();
                    $(".error-employer-contact-mobile").empty();


                    var account_email = response.content.account_email;//(typeof response.content.account_email === 'undefined' || response.content.account_email === null) ? response.content.account_email :'';
                    var account_password = response.content.account_password;//(typeof response.content.account_password === 'undefined' || response.content.account_password === null) ? response.content.account_password : '';
                    var confirm_password = response.content.confirm_password;//(typeof response.content.confirm_password === 'undefined' || response.content.confirm_password === null) ? response.content.confirm_password : '';
                    var employer_name = response.content.employer_name;//(typeof response.content.employer_name === 'undefined' || response.content.employer_name === null) ? response.content.employer_name : '';
                    var employer_size = response.content.employer_size;//(typeof response.content.employer_size === 'undefined' || response.content.employer_size === null) ? response.content.employer_size : '';
                    var employer_phone = response.content.employer_phone;//(typeof response.content.employer_phone === 'undefined' || response.content.employer_phone === null) ? response.content.employer_phone : '';
                    var employer_fax = response.content.employer_fax;//(typeof response.content.employer_fax === 'undefined' || response.content.employer_fax === null) ? response.content.employer_fax : '';
                    var employer_about = response.content.employer_about;//(typeof response.content.employer_about === 'undefined' || response.content.employer_about === null) ? response.content.employer_about : '';
                    var employer_address = response.content.employer_address;//(typeof response.content.employer_address === 'undefined' || response.content.employer_address === null) ? response.content.employer_address : '';
                    // var employer_map_province = response.content.employer_map_province;
                    var employer_contact = response.content.employer_contact ;//(typeof response.content.employer_contact === 'undefined' || response.content.employer_contact === null) ? response.content.employer_contact : '';
                    var employer_contact_email = response.content.employer_contact_email;//(typeof response.content.employer_contact_email === 'undefined' || response.content.employer_contact_email === null) ? response.content.employer_contact_email : '';
                    var employer_contact_phone = response.content.employer_contact_phone;//(typeof response.content.employer_contact_phone === 'undefined' || response.content.employer_contact_phone === null) ? response.content.employer_contact_phone : '';
                    var employer_contact_mobile = response.content.employer_contact_mobile;//(typeof response.content.employer_contact_mobile === 'undefined' || response.content.employer_contact_mobile === null) ? response.content.employer_contact_mobile :'';
                    // var employer_name = response.content.employer_name;
                    // var employer_name = response.content.employer_name;
                    // var account_first_name = response.content.account_first_name;
                    // var account_last_name = response.content.account_last_name;
                    var captcha = response.content.captcha;//(typeof response.content.captcha === 'undefined' || response.content.captcha === null) ? response.content.captcha : '';
                    var csrf_name = response.content.name;
                    var csrf_hash = response.content.hash;

                    // (account_last_name.length  > 0) ? $(".error-account-last-name").removeClass('hide').append(account_last_name) : null;
                    // (account_first_name.length  > 0) ? $(".error-account-first-name").removeClass('hide').append(account_first_name) : null;

                    (account_email.length  > 0) ? $(".error-account-email").removeClass('hide').append(account_email) : null;
                    (account_password.length  > 0) ? $(".error-account-password").removeClass('hide').append(account_password) : null;
                    (confirm_password.length  > 0) ? $(".error-account-confirm-password").removeClass('hide').append(confirm_password) : null;
                    (employer_name.length  > 0) ? $(".error-employer-name").removeClass('hide').append(employer_name) : null;
                    (employer_size.length  > 0) ? $(".error-employer-size").removeClass('hide').append(employer_size) : null;
                    (employer_phone.length  > 0) ? $(".error-employer-phone").removeClass('hide').append(employer_phone) : null;
                    (employer_fax.length  > 0) ? $(".error-employer-fax").removeClass('hide').append(employer_fax) : null;
                    (employer_about.length  > 0) ? $(".error-employer-about").removeClass('hide').append(employer_about) : null;
                    (employer_address.length  > 0) ? $(".error-employer-address").removeClass('hide').append(employer_address) : null;
                    (employer_contact.length  > 0) ? $(".error-employer-contact").removeClass('hide').append(employer_contact) : null;
                    (employer_contact_email.length  > 0) ? $(".error-employer-contact-email").removeClass('hide').append(employer_contact_email) : null;
                    (employer_contact_phone.length  > 0) ? $(".error-employer-contact-phone").removeClass('hide').append(employer_contact_phone) : null;
                    (employer_contact_mobile.length  > 0) ? $(".error-employer-contact-mobile").removeClass('hide').append(employer_contact_mobile) : null;
                    console.log(captcha);
                    (captcha == 0) ? $(".error-captcha").removeClass('hide') : null;
                    // $('#message_user').text("");
                    // $('#message_user').append(account_last_name);
                    // $('#message_user').append(account_first_name);
                    // $('#message_user').append(account_email);
                    // $('#message_user').append(account_password);
                    // $('#message_user').append(confirm_password);

                    //$(".alert-danger").css('margin','0');
                   // $('input[name="csrf_test_name"]').val(csrf_hash);
                   getToken(addTokenInput);
                    getCaptcha();
                } else if (status == 'success') {
                    //$('#message_user').text("");
                    //$('#registerModal').modal('hide')
                    window.location.href = '<?php echo base_url("employer"); ?>'; //redirec to home page jobseeker
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
		//}
    })
})

	function getCaptcha(){
      	$.ajax({
        url: '<?php echo base_url() . "captcha/createCaptcha" ?>',
        type: "get",
        dataType:'json',
        success: function(data){
        	//$(".captcha-box").removeClass('hide');
        	$(".captcha").empty();
        	$(".captcha").append('<img src="<?php echo base_url() . "captcha/" ?>'+data['filename']+'" >');
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
      $("input:radio[name=country]").change(function(){
            if($(this).val() == 1){
                $(".province_vn").removeClass('hide');
                $(".province_jp").addClass('hide');
            }
            else if($(this).val() == 2){
                $(".province_vn").addClass('hide');
                $(".province_jp").removeClass('hide');
            }
      });

      var getToken = function(callback){
         $.ajax({
        url: base_website +'job/getToken',
        type: "get",
        dataType:'json',
        success: function(data){
            $(".token").empty();
            //var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
            //$(".token").append(token);
           //document.write(data); just do not use document.write
           //console.log(data);
           callback(data);
           //console.log(data.name);
        }
      });
    };

    function addTokenInput(data){
            $(".token").empty();
            var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
            $(".token").append(token);
    }
</script>