	<div class="container job-province">

		<div class="row">
		<!--register-->
		<div class="col-sm-8 col-sm-push-4">


			<div class="col-sm-12 job-province-box">
				<div class="row">
					<div class="col-sm-12 col-md-6 margin-5">
						<span class="text-color-1 title-jobseeker-register"><strong><?php echo lang('m_title_jobseeker_register'); ?></strong></span>
					</div>
					<div class="col-sm-12 col-md-12 margin-5">
						<span class="title-exits-account"> <?php echo lang('js_rg_exist_account'); ?>
							<a href="<?php echo base_url('login') ?>"><?php echo lang('m_login'); ?></a> &nbsp;
                        </span>
					</div>
                    <div class="col-sm-6">
                        <button class=" margin-top-5 btn-employer background-color-2 text-color-2" onclick="location.href='<?php echo base_url('register_ntd'); ?>'">Nhà tuyển dụng đăng ký</button>

                    </div>
                    <div class="col-sm-6 margin-top-5 text-center">
                         <a class=" btn btn-social btn-facebook" href="<?php echo $loginUrl; ?>">
                                  <span class="fa fa-facebook"></span> <?php echo lang('register_facebook'); ?>
                            </a>
                    </div>
				</div>
				<div class="row border-row margin-top-5"></div>
				<div class="row">
					<div class="col-sm-12 margin-top-20">
						 <form role="form" name="uv-register-form" id="uv-register-form" method="post" class="form-horizontal">
                     <fieldset>
                         <div class="row">
                         	<div class="col-sm-10 col-sm-offset-1">
                            <!-- <div class="form-group col-sm-12">
                                <div class="error text-center">
                                    <div class="error text-left" id="message_user">
                                    </div>
                                </div>
                            </div> -->

                            <!-- <div class="col-sm-12"> -->
                                <div class="form-group">
                                     <label class="control-label col-sm-4"><?php echo lang('last_name_re_user'); ?> <span class="colorRed">*</span></label>
                                     <div class="col-sm-8">
                                         <input type="text" class="form-control" name="account_last_name" />
                                     </div>
                                     <div class="col-sm-8 col-sm-offset-4 hide text-right margin-top-5 error-account-last-name">

                                     </div>

                                </div>
                             <!-- </div> -->

                            <!-- <div class="col-sm-12"> -->
                                <div class="form-group">
                                     <label class="control-label col-sm-4"><?php echo lang('first_name_re_user'); ?> <span class="colorRed">*</span></label>
                                     <div class="col-sm-8">
                                         <input type="text" class="form-control" name="account_first_name" />
                                     </div>
                                      <div class="col-sm-8 col-sm-offset-4 hide text-right margin-top-5 error-account-first-name">

                                     </div>
                                </div>
                             <!-- </div> -->



                             <!-- <div class="col-sm-12"> -->
                                <div class="form-group">
                                     <label class="control-label col-sm-4"><?php echo lang('email_re_user'); ?> <span class="colorRed">*</span></label>
                                     <div class="col-sm-8">
                                         <input type="text" class="form-control" name="account_email" />
                                     </div>
                                      <div class="col-sm-8 col-sm-offset-4 hide text-right margin-top-5 error-account-email">

                                     </div>

                                </div>
                             <!-- </div> -->

                             <!-- <div class="col-sm-12"> -->
                                <div class="form-group ">
                                     <label class="control-label col-sm-4"><?php echo lang('password_re_user'); ?> <span class="colorRed">*</span></label>
                                     <div class="col-sm-8">
                                         <input type="password" class="form-control" name="account_password" />
                                     </div>
                                      <div class="col-sm-8 col-sm-offset-4 hide text-right margin-top-5 error-account-password">

                                     </div>
                                </div>
                             <!-- </div> -->


                            <!-- <div class="col-sm-12"> -->
                                <div class="form-group">
                                     <label class="control-label col-sm-4"><?php echo lang('passconf_re_user'); ?> <span class="colorRed">*</span></label>
                                     <div class="col-sm-8">
                                         <input type="password" class="form-control" name="confirm_password" />
                                     </div>
                                      <div class="col-sm-8 col-sm-offset-4 hide text-right margin-top-5 error-account-confirm-password">

                                     </div>

                                </div>
                                <div class="form-group  captcha-box">
								  <label class="control-label col-sm-4"><?php echo lang('m_captcha'); ?><span class="colorRed">*</span></label>
								  	<div class="col-sm-8 captcha ">

								  	</div>
								  	<div class="col-sm-offset-4 col-sm-8 margin-top-5">
								  		<input type="text" name="captcha" class="input-captcha">
								  		<span class="alert alert-danger hide error-captcha"><?php echo lang('m_captcha_invalid') ?></span>
								  		<input type="hidden" name="captcha-reg" >
								  	</div>
							  </div>
                             <!-- </div> -->
                         </div>

                         </div>
                         <div class="row">
                             <div class="col-sm-12">
                              <div class="col-sm-11">
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary"><?php echo lang('btn_register_re_user'); ?></button>
                                </div>
                              </div>


                                <div class="col-sm-12">
                                    <div class="form-group ">
                                        <?php echo str_replace('"%s"', base_url(), lang('m_terms_register')); ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                     </fieldset>
                    <input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?=$csrf['hash'];?>" />
                </form>
					</div>
					<!-- <div class="col-sm-12 margin-top-5"> -->
					<!-- job highlight -->
			<!--<div class="job-hight-light job-province-box  margin-top-10">
				<div class=" text-center background-color-3 margin-bottom-5">
					<h1 class="title-job-hight-light">Việc làm nổi bật</h1>

				</div>
				<?php $listJobShow = $this->globals->getRecruitmentShow(2);
if (isset($listJobShow) && count($listJobShow) > 0) {
	foreach ($listJobShow as $value) {?>
				<div class="item-job-hl">
						<div class="row">
							<div class="col-sm-12">
								<label><span class="btn-warning">qc</span><a href="<?php echo base_url('job') . '/' . str_replace(' ', '-', $value->rec_title) . '-' . $value->rec_id . '.html' ?>">
								<?php echo (strlen($value->rec_title) > 30) ? substr($value->rec_title, 0, 30) . '...' : $value->rec_title; ?>
								</a></label>
								<span><?php echo $value->employer_name; ?></span>
							</div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-tag"></i><?php echo $value->career_name; ?></div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-calendar-o"></i><?php echo date('d/m/Y', strtotime($value->rec_job_time)); ?></div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-money"></i><?php echo $value->salary_value; ?></div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-map-marker"></i><?php echo $value->province_name; ?></div>
						</div>
				</div>
	<?php }
}
?>


			</div> -->
					<!-- </div> -->

					<!--ADWORDS-->
					<div class="row margin-top-20">
						<div class="col-sm-12 ">
							<div  style="background:url(<?php echo base_url() . "assets/main/img/about/parallax-bg-3.jpg" ?>) 50% 0px no-repeat ;">
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
				</div>
			</div>


		</div>
		<!--search and recruitment highlight-->
		<div class="col-sm-4 no-padding-res col-sm-pull-8">
			<!-- <div class="col-sm-12 "> -->
				<div class="job-province-box">
				<?php if (isset($searchHorizontal)) {
	echo $searchHorizontal;
}
?>
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
                     console.log(captcha);
                    (captcha == 0 ) ? $(".error-captcha").removeClass('hide') : null;
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
                    window.location.href = '<?php echo base_url("jobseeker"); ?>'; //redirec to home page jobseeker
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
</script>