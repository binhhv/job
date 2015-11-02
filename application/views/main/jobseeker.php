<div class="container">
<div class="row ">
<div class="col-md-8 col-sm-8 col-xs-12 jobseeker-bg">
	<img class="img-responsive" src="<?php echo base_url();?>assets/main/img/job/image-jobseeker.png">
	</div>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<div class="row">
			<div class="col-sm-12 ">
			<div class="jobseeker-box">
			<div class="col-sm-12 jobseeker-title-box">
				<h5 class="jobseeker-title"><?php echo lang('jobseeker_title');?> </h5>
				<div class="border-bottom-title border-color-1"></div>
			</div>
			<div class="col-sm-12">
				<button class="btn-jobseeker background-color-1 text-color-1" data-toggle="modal" data-target="#registerModal"><?php echo lang('jobseeker_register');?></button>
			</div>
			<div class="col-sm-12">
			<?php if ($user != null) {?>
<button class="btn-jobseeker background-color-2 text-color-2" data-toggle="modal" data-target="#createcv_onlineModel"><?php echo lang('jobseeker_create_cv_online');?></button>
				<?php } else {?>
			<button class="btn-jobseeker background-color-2 text-color-2" data-toggle="modal" data-target="#redirectLoginModal"><?php echo lang('jobseeker_create_cv_online');?></button>
<?php }
?>


			</div>
			<div class="col-sm-12">
				<button class="btn-jobseeker background-color-3 text-color-2"  data-toggle="modal" data-target="#uploadcvModel"><?php echo lang('jobseeker_create_cv');?></button>
			</div>
			</div>
		</div>
		</div>
	</div>
</div>
</div>

<!-- check login -->
<script>


</script>