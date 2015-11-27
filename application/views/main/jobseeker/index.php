<div class="col-sm-12 job-province-box no-padding">
            <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-12">
                            <span class="border-vertical text-color-1"></span>
                            <span class="text-color-1 title-jobseeker-register"><strong><?php echo lang('js_title_my_info'); ?></strong></span>
                            </div>
                        </div>
                    </div>
                     <section class="invoice" >
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">

            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-6 invoice-col">
              <b><?php echo lang('m_email'); ?>:</b> <?php echo $jobseeker[0]->account_email ?><br>
              <b><?php echo lang('job_form_name'); ?>:</b> <?php echo $jobseeker[0]->account_first_name . ' ' . $jobseeker[0]->account_last_name; ?><br>
              <b><?php echo lang('m_password'); ?>:</b> *****************
            </div>
            <div class="col-sm-6 invoice-col">
              <b><?php echo lang('js_num_cv'); ?>:</b> <?php echo $jobseeker[0]->numcv ?><br>
              <b><?php echo lang('js_num_resume'); ?>:</b> <?php echo $jobseeker[0]->numdocon ?><br>
              <b><?php echo lang('js_num_job_apply'); ?>:</b> <?php echo $jobseeker[0]->numapp ?>
            </div><!-- /.col -->
            <div class="col-sm-12 margin-top-10">
            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalChangePassword"><i class="fa fa-pencil-square-o"></i> &nbsp; <?php echo lang('js_title_change_password'); ?></button>
            </div>
          </div><!-- /.row -->





        </section><!-- /.content -->
        <section class="invoice">

          <div class="row">
            <div class="col-xs-12">
              <div class="row">
            <div class="col-md-12 no-padding">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab"><b><?php echo lang('m_resume_upload'); ?></b></a></li>
                  <li><a href="#tab_2" data-toggle="tab"><b><?php echo lang('m_resume_online'); ?></b></a></li>
                  <li><a href="#tab_3" data-toggle="tab"><b><?php echo lang('js_history_apply'); ?></b></a></li>
                  <!-- <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> -->
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                      <?php if (count($cvJobseeker) == 0) {?>

                      <div class="row">
                        <div class="col-md-12 text-center"><b><?php echo lang('js_no_cv'); ?>.</b></div>
                      </div>
                      <?php } else {
	?>
                      <div class="item-cv">
                        <div class="row ">
                        <div class="col-sm-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th><?php echo lang('m_code'); ?></th>
                                    <th><?php echo lang('js_cv_col_file'); ?></th>
                                    <th><?php echo lang('js_cv_col_upload'); ?></th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                 <?php $index = 1;
	//var_dump($cvJobseeker);
	foreach ($cvJobseeker as $cv) {?>
                      <tr>
                          <td ><?php echo $cv->doccv_code; ?></td>
                          <td ><a href="<?php echo base_url() . 'downloadcv/' . $user["id"] . '/' . $cv->doccv_file_tmp . '/' . $cv->doccv_file_name . '/' . $cv->doccv_type; ?>" class="download-cv"><?php echo $cv->doccv_file_name; ?></a></td>
                          <td ><?php echo date('d/m/Y', strtotime($cv->doccv_created_at)); ?></td>
                          <td><button data-href="<?php echo base_url('jobseeker') . '/delete-resume-upload/' . $cv->doccv_id; ?>" data-toggle="modal" data-target="#confirm-delete-resume-upload" class="btn btn-xs btn-danger" ><?php echo lang('m_delete'); ?></button></td>
                       </tr>
                    <?php $index++;}
	?>


                                </tbody>
                            </table>
                        </div>

                        <!-- <div class="col-md-4 col-xs-4 "><b>Mã số</b></div>
                          <div class="col-md-4 col-xs-6"><b>Tên file</b></div>
                          <div class="col-md-4 col-xs-2 "><b>Ngày tạo</b></div> -->
                        </div>
                    </div>
                    <?php }
?>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                         <?php if (count($docJobseeker) == 0) {?>

                      <div class="row">
                        <div class="col-md-12 text-center"><b><?php echo lang('js_no_resume'); ?>.</b></div>
                      </div>
                      <?php } else {
	?>
                      <div class="item-doc">
                        <div class="row ">
                          <div class="col-sm-12 table-responsive">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th><?php echo lang('m_code'); ?></th>
                                  <th><?php echo lang('js_rs_col_create'); ?></th>
                                  <th><?php echo lang('js_rs_col_edit'); ?></th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php $index = 1;
	foreach ($docJobseeker as $doc) {?>
                      <tr>
                          <td><?php echo $doc->docon_code; ?></td>
                          <td><?php echo date('d/m/Y', strtotime($doc->docon_created_at)); ?></td>
                          <td><?php echo date('d/m/Y', strtotime($doc->docon_update_at)); ?></td>
                          <td><button class="btn btn-primary btn-xs" onclick="viewResume(<?php echo $doc->docon_id ?>)"><?php echo lang('m_view_detail'); ?></button>
                          &nbsp;<button class="btn btn-xs btn-info" onclick="editResume(<?php echo $doc->docon_id ?>)"><?php echo lang('m_edit'); ?></button>&nbsp;
                          <button class="btn btn-xs btn-danger" data-href="<?php echo base_url('jobseeker') . '/delete-resume-online/' . $doc->docon_id; ?>" data-toggle="modal" data-target="#confirm-delete-resume-online"><?php echo lang('m_delete'); ?></button></td>
                        </tr>
                    <?php $index++;}
	?>


                              </tbody>
                            </table>
                          </div>
                        <!-- <div class="col-md-3 col-xs-6 "><b>Mã số</b></div>
                          <div class="col-md-3 col-xs-6 "><b>Ngày tạo</b></div>
                          <div class="col-md-3 col-xs-6 "><b>Ngày chỉnh sửa</b></div>
                          <div class="col-md-3 col-xs-6"><b></b></div>
                        </div> -->
                    <!-- </div> -->
                  </div>
                </div>
                <?php }
?>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    <?php if (count($recApp) == 0) {?>

                      <div class="row">
                        <div class="col-md-12 text-center"><b><?php echo lang('js_no_job_apply'); ?>.</b></div>
                      </div>
                      <?php } else {
	?>
                      <div class="item-doc">
                        <div class="row ">
                          <div class="col-sm-12 table-responsive">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th><?php echo lang('m_code'); ?></th>
                                <th><?php echo lang('m_recruitment'); ?></th>
                                <th><?php echo lang('js_job_col_date_apply'); ?></th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $index = 1;
	foreach ($recApp as $rec) {?>
                     <tr>
                          <td><?php echo $rec->rec_code; ?></td>
                          <td><a class="view-recruitment" href="<?php echo base_url('job') . '/' . str_replace(' ', '-', $rec->rec_title) . '-' . $rec->rec_id . '.html' ?>">
                <?php echo (strlen($rec->rec_title) > 30) ? substr($rec->rec_title, 0, 30) . '...' : $rec->rec_title; ?>
                </a></td>
                          <td><?php echo date('d/m/Y', strtotime($rec->recapp_created_at)); ?></td>
                          <td><button data-href="<?php echo base_url('jobseeker') . '/delete-recruitment/' . $rec->rec_id; ?>" data-toggle="modal" data-target="#confirm-delete-recruitment" class="btn btn-xs btn-danger" ><?php echo lang('m_delete'); ?></button></td>
                        </tr>
                    <?php $index++;}
	?>


                            </tbody>
                          </table>
                          </div>
                        <!-- <div class="col-md-1 col-xs-6 "><b>Mã số</b></div>
                          <div class="col-md-4 col-xs-6 "><b>Tin tuyển dụng</b></div>
                          <div class="col-md-4 col-xs-6 "><b>Nhà tuyển dụng</b></div>
                          <div class="col-md-3 col-xs-6 "><b>Ngày ứng tuyển</b></div> -->
                        </div>
                    </div>
<?php }
?>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->


          </div>
              <!-- <div class="box" ng-show="filteredItems == 0">
                <div class="text-center">Không có dữ liệu</div>
              </div> -->
            </div>
          </div>
        </section>
			</div>
            <div class="col-sm-12 no-padding">

                <div class="job-hight-light job-province-box  margin-top-10">
                <div class=" text-center background-color-3 margin-bottom-5">
                    <h1 class="title-job-hight-light"><?php echo lang('job_title_highlight'); ?></h1>

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
            </div>
            </div>


             <!--modal change password-->
    <div id="modalChangePassword" class="modal fade" role="dialog">
          <div class="modal-dialog ">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header background-color-3">
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                <h4 class="modal-title text-color-2"><?php echo lang('js_title_change_password'); ?></h4>
              </div>
              <div class="modal-body">
                <div class="row">
                <form role="form" name="change-password-form" id="change-password-form" method="post" class="form-horizontal">
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
                               <!--  <div class="form-group">
                                     <label class="control-label col-sm-5"><?php echo lang('m_old_password'); ?> <span class="colorRed">*</span></label>
                                     <div class="col-sm-7">
                                         <input type="password" class="form-control" name="old-password" />
                                     </div>
                                     <div class="col-sm-7 col-sm-offset-5 hide text-right margin-top-5 error-old-password">

                                     </div>

                                </div> -->
                             <!-- </div> -->

                            <!-- <div class="col-sm-12"> -->
                                <div class="form-group">
                                     <label class="control-label col-sm-5"><?php echo lang('m_new_password'); ?> <span class="colorRed">*</span></label>
                                     <div class="col-sm-7">
                                         <input type="password" class="form-control" name="new-password" />
                                     </div>
                                      <div class="col-sm-7 col-sm-offset-5 hide text-right margin-top-5 error-new-password">

                                     </div>
                                </div>
                             <!-- </div> -->



                             <!-- <div class="col-sm-12"> -->
                                <div class="form-group">
                                     <label class="control-label col-sm-5"><?php echo lang('m_confirm_password'); ?> <span class="colorRed">*</span></label>
                                     <div class="col-sm-7">
                                         <input type="password" class="form-control" name="confirm-password" />
                                     </div>
                                      <div class="col-sm-7 col-sm-offset-5 hide text-right margin-top-5 error-confirm-password">

                                     </div>

                                </div>
                             <!-- </div> -->


                                <div class="form-group  captcha-box">
                                  <label class="control-label col-sm-5"><?php echo lang('m_captcha'); ?><span class="colorRed">*</span></label>
                                    <div class="col-sm-7 captcha ">

                                    </div>
                                    <div class="col-sm-offset-5 col-sm-7 margin-top-5">
                                        <input type="text" name="captcha" class="input-captcha">

                                        <input type="hidden" name="captcha-reg" >
                                    </div>
                                    <div class="col-sm-7 col-sm-offset-5 margin-top-5">
                                      <span class="alert alert-danger hide error-captcha"><?php echo lang('m_captcha_invalid') ?></span>
                                    </div>
                              </div>
                             <!-- </div> -->
                         </div>

                         </div>
                         <div class="row">
                             <div class="col-sm-12">
                              <div class="col-sm-11">
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary"><?php echo lang('m_change'); ?></button>&nbsp;
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo lang('m_close'); ?></button>
                                </div>
                              </div>


                               <!--  <div class="col-sm-12">
                                    <div class="form-group ">
                                        *Nhấp chọn "ĐăngTin"đồng nghĩa với việc tôi đã đọc và đồng ý với các <a class="a-term" href="<?php echo base_url('about/term'); ?>">Thỏa thuận sử dụng</a>.
                                    </div>
                                </div> -->

                            </div>
                        </div>
                     </fieldset>
                    <div class="col-sm-10 token hide">

                     </div>
                </form>
                </div>
              </div>
              <!-- <div class="modal-footer">
              <div class="row">

                <div class="col-sm-12 text-right">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
              </div>

              </div> -->
            </div>

          </div>
        </div>


        <!--modal confirm delete recruitment -->
        <div class="modal fade" id="confirm-delete-recruitment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
               <?php echo lang('js_ms_confirm_delete_rec'); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo lang('m_cancel'); ?></button>
                <a class="btn btn-primary btn-ok"><?php echo lang('m_delete'); ?></a>
            </div>
        </div>
    </div>
</div>

 <!--modal confirm delete resume upload -->
        <div class="modal fade" id="confirm-delete-resume-upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
               <?php echo lang('js_ms_confirm_delete_cv'); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo lang('m_cancel'); ?></button>
                <a class="btn btn-primary btn-ok"><?php echo lang('m_delete'); ?></a>
            </div>
        </div>
    </div>
</div>

<!--modal confirm delete resume online -->
        <div class="modal fade" id="confirm-delete-resume-online" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
              <?php echo lang('js_ms_confirm_delete_rs'); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo lang('m_cancel'); ?></button>
                <a class="btn btn-primary btn-ok"><?php echo lang('m_delete'); ?></a>
            </div>
        </div>
    </div>
</div>

 <!--modal view resume  -->
        <div class="modal fade" id="modal-view-resume" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content content-view-resume">

           <!--  <div class="modal-body">
               Bạn có muốn xóa file này không ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                <a class="btn btn-primary btn-ok">Xóa</a>
            </div> -->
        </div>
    </div>
</div>

<!--modal edit resume  -->
        <div class="modal fade" id="modal-edit-resume" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content content-edit-resume">

           <!--  <div class="modal-body">
               Bạn có muốn xóa file này không ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                <a class="btn btn-primary btn-ok">Xóa</a>
            </div> -->
        </div>
    </div>
</div>
