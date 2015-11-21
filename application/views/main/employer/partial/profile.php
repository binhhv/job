 <div class="col-sm-12 clear mb_20 margin-top-10">
             <span class="border-vertical text-color-1"></span>
            <span class="text-color-1 title-jobseeker-register"><strong><?php echo lang('title_profile_account_em'); ?></strong></span>
        </div>
<div class="col-sm-12">
     <div class="row invoice-info">
    <div class="col-sm-6 invoice-col">

      <p><b><?php echo lang('m_email'); ?>:</b> <?php echo $employerInfo->user['email']; ?><br></p>
      <p><b><?php echo lang('job_form_name'); ?>:</b> <?php echo $employerInfo->account_first_name . ' ' . $employerInfo->account_last_name; ?>
      <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-profile-account"><i class="fa fa-pencil-square-o"></i></button>
      </p>

    </div>
    <div class="col-sm-6 invoice-col">
      <p><b><?php echo lang('m_password'); ?>:</b> ***************** <br></p>
      <p><b><?php echo lang('em_num_rec_post'); ?>:</b> <?php echo $employerInfo->numRecruitmentAccount; ?></p>
    </div><!-- /.col -->
   <!--  <div class="col-sm-12 margin-top-10">

    </div> -->
  </div><!-- /.row -->
</div>