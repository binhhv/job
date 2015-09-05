
<div ng-controller="contactController">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Hồ sơ ứng viên : <?php echo $documentData->jobseeker_name?>
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Hồ sơ ứng viên</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">

            <div class="col-md-12">
              <div class="box box-primary">

                <div class="box-body no-padding">

                        <form name="updatedocumentJobseekerForm">
            <fieldset>
                <div class="row">
                    <div class="col-sm-12">
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="firstname">Họ tên</label>
                                <div class="controls" >
                                    <?php echo $documentData->jobseeker_name?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="firstname">Ngày sinh</label>
                                <div class="controls">
                                    <?php echo $documentData->docon_birthday?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Số điện thoại </label>
                                <div class="controls">
                                    <?php echo $documentData->docon_phone?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Email</label>
                                <div class="controls">
                                   <?php echo $documentData->jobseeker_email?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Trình độ/Năng lực</label>
                                <div class="controls">
                                    <?php echo $documentData->ljob_level?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Địa điểm làm việc</label>
                                <div class="controls">
                                   <?php echo $documentData->province?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Nghề nghiệp </label>
                                <div class="controls">
                                    <?php echo $documentData->career_name?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Bằng cấp/Giấy chứng nhận</label>
                                <div class="controls">
                                      <?php echo $documentData->docon_degree?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Học vấn </label>
                                <div class="controls">
                                     <?php echo $documentData->docon_education?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Nơi ở hiện tại</label>
                                <div class="controls">
                                    <?php echo $documentData->docon_address?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Kinh nghiệm </label>
                                <div class="controls">
                                     <?php echo $documentData->docon_experience?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Sở thích/Kỹ năng đặc biệt</label>
                                <div class="controls">
                                    <?php echo $documentData->docon_skill?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Tình trạng sức khỏe </label>
                                <div class="controls">
                                    <?php echo $documentData->healthy_type?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Lý do ứng tuyển</label>
                                <div class="controls">
                                    <?php echo $documentData->docon_reason_apply?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Mức lương </label>
                                <div class="controls">
                                     <?php echo $documentData->docon_salary?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Vấn đề khác</label>
                                <div class="controls">
                                    <?php echo $documentData->docon_advance?>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="suburb">Nguyện vọng</label>
                                <div class="controls">
                                     <?php echo $documentData->docon_wish?>
                                </div>
                            </div>
                        </div>
                </div>

            </fieldset>

            </form>

                </div><!-- /.box-body -->

              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>



