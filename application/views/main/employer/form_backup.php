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
                                     <label class="control-label col-sm-4"><?php echo lang('last_name_re_user');?> <span class="colorRed">*</span></label>
                                     <div class="col-sm-8">
                                         <input type="text" class="form-control" name="account_last_name" />
                                     </div>
                                     <div class="col-sm-8 col-sm-offset-4 hide text-right margin-top-5 error-account-last-name">

                                     </div>

                                </div>
                             <!-- </div> -->

                            <!-- <div class="col-sm-12"> -->
                                <div class="form-group">
                                     <label class="control-label col-sm-4"><?php echo lang('first_name_re_user');?> <span class="colorRed">*</span></label>
                                     <div class="col-sm-8">
                                         <input type="text" class="form-control" name="account_first_name" />
                                     </div>
                                      <div class="col-sm-8 col-sm-offset-4 hide text-right margin-top-5 error-account-first-name">

                                     </div>
                                </div>
                             <!-- </div> -->



                             <!-- <div class="col-sm-12"> -->
                                <div class="form-group">
                                     <label class="control-label col-sm-4"><?php echo lang('email_re_user');?> <span class="colorRed">*</span></label>
                                     <div class="col-sm-8">
                                         <input type="text" class="form-control" name="account_email" />
                                     </div>
                                      <div class="col-sm-8 col-sm-offset-4 hide text-right margin-top-5 error-account-email">

                                     </div>

                                </div>
                             <!-- </div> -->

                             <!-- <div class="col-sm-12"> -->
                                <div class="form-group ">
                                     <label class="control-label col-sm-4"><?php echo lang('password_re_user');?> <span class="colorRed">*</span></label>
                                     <div class="col-sm-8">
                                         <input type="password" class="form-control" name="account_password" />
                                     </div>
                                      <div class="col-sm-8 col-sm-offset-4 hide text-right margin-top-5 error-account-password">

                                     </div>
                                </div>
                             <!-- </div> -->


                            <!-- <div class="col-sm-12"> -->
                                <div class="form-group">
                                     <label class="control-label col-sm-4"><?php echo lang('passconf_re_user');?> <span class="colorRed">*</span></label>
                                     <div class="col-sm-8">
                                         <input type="password" class="form-control" name="confirm_password" />
                                     </div>
                                      <div class="col-sm-8 col-sm-offset-4 hide text-right margin-top-5 error-account-confirm-password">

                                     </div>

                                </div>
                                <div class="form-group  captcha-box">
								  <label class="control-label col-sm-4">Captcha<span class="colorRed">*</span></label>
								  	<div class="col-sm-8 captcha ">

								  	</div>
								  	<div class="col-sm-offset-4 col-sm-8 margin-top-5">
								  		<input type="text" name="captcha" class="input-captcha">
								  		<span class="alert alert-danger hide error-captcha"><?php echo lang('invalid-captcha')?></span>
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
                                    <button type="submit" class="btn btn-primary"><?php echo lang('btn_register_re_user');?></button>
                                </div>
                              </div>


                                <div class="col-sm-12">
                                    <div class="form-group ">
                                        *Nhấp chọn "ĐăngTin"đồng nghĩa với việc tôi đã đọc và đồng ý với các <a class="a-term" href="<?php echo base_url('about/term');?>">Thỏa thuận sử dụng</a>.
                                    </div>
                                </div>

                            </div>
                        </div>
                     </fieldset>
                    <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                </form>