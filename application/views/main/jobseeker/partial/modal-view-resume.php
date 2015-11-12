 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h3 class="modal-title">Hồ sơ<label class="btn btn-default"><strong><?php echo $resume->docon_code;?></strong></label></h3>
    </div>
    <div class="modal-body">
            <form name="updatedocumentJobseekerForm">
            <fieldset>
                <div class="row">
                    <div class="col-sm-12">
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="firstname">Họ tên</label>
                                <div class="controls" ng-model="documentJobseeker.name">
                                    <?php echo $resume->jobseeker_name?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="firstname">Ngày sinh</label>
                                <div class="controls">
                                    <?php echo date('d/m/Y', strtotime($resume->docon_birthday));?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Số điện thoại </label>
                                <div class="controls">
                                    <?php echo $resume->docon_phone?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Email</label>
                                <div class="controls">
                                    <?php echo $resume->jobseeker_email?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Trình độ/Năng lực</label>
                                <div class="controls">
                                    <?php echo $resume->ljob_level?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Địa điểm làm việc</label>
                                <div class="controls">
                                    <?php echo $resume->province?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Nghề nghiệp </label>
                                <div class="controls">
                                    <?php echo $resume->career_name?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Bằng cấp/Giấy chứng nhận</label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_degree);?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Học vấn </label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_education);?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Nơi ở hiện tại</label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_address);?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Kinh nghiệm </label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_experience);?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Sở thích/Kỹ năng đặc biệt</label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_skill);?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Tình trạng sức khỏe </label>
                                <div class="controls">
                                    <?php echo $resume->healthy_type?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Lý do ứng tuyển</label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_reason_apply);?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Mức lương </label>
                                <div class="controls">
                                    <?php echo $resume->docon_salary?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Vấn đề khác</label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_advance);?>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="suburb">Nguyện vọng</label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_wish);?>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">
                                <button class="btn btn-warning" data-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
            </fieldset>

            </form>
    </div>