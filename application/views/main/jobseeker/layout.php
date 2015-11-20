	<div class="container job-province">

		<div class="row">
		<!--register-->
		<div class="col-sm-9 col-sm-push-3">


    <?php if (isset($contentJobseeker)) {
	echo $contentJobseeker;
}
?>


		</div>
		<!--search and recruitment highlight-->
		<div class="col-sm-3 no-padding-res col-sm-pull-9">
			<!-- <div class="col-sm-12 "> -->
				<div class="job-province-box">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-12">
                            <span class="border-vertical text-color-1"></span>
                            <span class="text-color-1 title-jobseeker-register"><strong><?php echo lang('m_account'); ?></strong></span>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row "><div class="col-sm-12"><div class="border-row"></div></div></div> -->
                    <div class="row">
                        <div class="col-sm-12 account-box">
                            <table class="no-margin-bottom">
                                <tr>
                                    <td width="70"><img class="avartar-default-account" src="<?php echo base_url(); ?>assets/main/img/default/avatar.png"></td>
                                    <td class="valign-bottom"> <span class="lh-20 dp-block"><?php if (isset($user)) {
	echo $user['firstname'] . ' ' . $user['lastname'];
}
?></span> <span class="lh-20 dp-block text-right"><a class="btn btn-xs btn-danger" href="<?php echo base_url('logout') ?>"><?php echo lang('hd_logout'); ?></a></span></td>
                                </tr>
                            </table>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-12">
                            <span class="border-vertical text-color-1"></span>
                            <span class="text-color-1 title-jobseeker-register"><strong><?php echo lang('m_resume'); ?></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 margin-bottom-10">
                        <div class="col-sm-12 "><button class="btn btn-sm btn-primary btn-resume btn-create-resume"><i class="fa fa-pencil-square-o"></i><?php echo lang('job_create_resume_online'); ?></button></div>
                            <div class="col-sm-12"><button class="btn btn-sm btn-primary btn-resume btn-upload-resume"><i class="fa fa-cloud-upload"></i><?php echo lang('job_create_resume_upload'); ?></button></div>
                        </div>
                    </div>
                    <!--  <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-12">
                            <span class="border-vertical text-color-1"></span>
                            <span class="text-color-1 title-jobseeker-register"><strong>Quản lý</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="row "><div class="col-sm-12"><div class="border-row-1"></div></div></div> -->

			    </div>
                <?php $listCareer = $this->globals->getTagJob();
if (isset($listCareer) && count($listCareer) > 0) {
	?>
                <div class="job-province-box margin-top-10">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-12">
                            <span class="border-vertical text-color-1"></span>
                            <span class="text-color-1 title-jobseeker-register"><strong><?php echo lang('job_title_tag_job'); ?></strong></span>
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
<?php	}
	?>

                    </div>

                </div>
                <?php }
?>

		</div>

		<!--adwords-->
		</div>

	</div>




        <!--modal create resume-->
        <!-- <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-create-resume" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content content-create-resume">

            </div>
         </div>
        </div> -->

