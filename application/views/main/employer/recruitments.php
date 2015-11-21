
<div class="card">

	<div class="row-employer row ">
		<div class="col-sm-12 clear mb_20 margin-top-10">
            <p><span class="border-vertical text-color-1"></span>
            <span class="text-color-1 title-jobseeker-register"><strong><?php echo lang('title_manager_recruitments_em'); ?></strong></span>
            <a href="<?php echo base_url('employer/create-recruitment'); ?>" class="btn btn-sm btn-primary pull-right"><?php echo lang('m_title_post_recruitment'); ?></a></p>
        </div>
         <div class="col-sm-12 loading-recruitments-em">
		    <img class="img-responsive" style="margin: 0 auto;" src="<?php echo base_url(); ?>assets/main/img/default/load.gif">
		  </div>
		<div class="col-sm-12 content-recruitments-em hide">
		    <?php $this->load->view('main/employer/partial/recruitments', array('listRecruitment' => $listRecruitment, 'employerInfo' => $employerInfo));?>
		</div>

    </div>

</div>
<!--modal delete recruitment-->
<div class="modal fade" id="modal-delete-recruitment-em" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
           <form method="post" id="fdelete-recruitment-em" role="form">
            <div class="modal-body">

                <input type="hidden" name="idRec" value="">
                <input type="hidden" name="idUser" value="0">
                <div class="token hide">
                </div>
              <?php echo lang('em_confirm_delete_rec'); ?>
            </div>
            <div class="modal-footer">
                <a  class="btn btn-danger" data-dismiss="modal"><?php echo lang('m_cancel'); ?></a>
                <button type="submit" class="btn btn-primary btn-ok"><?php echo lang('m_delete'); ?></button>
            </div>
            </form>
        </div>
    </div>
</div>
