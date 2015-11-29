<div class="container">
<div class="row employer-box">
	<div class="col-sm-9 col-xs-12">
		<div class="row">
			<div class="col-sm-12 employer-padding-left">
			<div class="employer-title-box">
				<h5 class="employer-title"><?php echo lang('employer_title'); ?></h5>
				<div class="border-bottom-title border-color-3"></div>
			</div>
			</div>
			<div class="col-sm-12">
			<button class="btn-employer background-color-2 text-color-2
			<?php if (!isset($user)) {echo 'btn-employer-register-top';} else if ($user['role'] == 2 || $user['role'] == 3) {echo 'btn-employer-profile-top';}
?>
			"><?php echo lang('employer_register'); ?></button>&nbsp; <!-- data-toggle="modal" data-target="#employer_registerModal"-->
			<button class="btn-employer background-color-4 text-color-3 <?php if (!isset($user)) {
	echo 'btn-create-recruit-not-login';
} else if ($user['role'] == 2 || $user['role'] == 3) {echo 'btn-create-recruit-login';}
?>" ><?php echo lang('employer_recruitment'); ?></button>&nbsp; <!--data-toggle="modal" data-target="#create_recruitmentModel"-->
			<button class="btn-employer background-color-3 text-color-2" onclick="location.href='<?php echo ('adwords') ?>'"><?php echo lang('employer_contact_advertising'); ?></button>
			</div>
		</div>
	</div>
	<div class="col-sm-3 image-employer-box">
		<img src="<?php echo base_url(); ?>assets/main/img/employer/image-employer.png">
	</div>
</div>
</div>

<!-- Modal login require create recruitment-->
<div id="modal-login-create-recruit" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  background-color-3">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-color-2">allSHIGOTO - 日本語を理解出来るコミユニテイ</h4>
      </div>
      <div class="modal-body">
		<div class="text-danger">
		  <?php echo lang('m_title_require_create_rec') ?>
		</div>
      </div>

    </div>

  </div>
</div>