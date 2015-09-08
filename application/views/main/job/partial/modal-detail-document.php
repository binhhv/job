            <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title">Thông tin hồ sơ <label class="btn btn-default"><?php echo $doc->docon_code;?></label></h3>
            </div>
            <div class="modal-body">
                    <form name="updatedocumentJobseekerForm">
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-12">
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="firstname">Họ tên</label>
                                        <div class="controls" ng-model="documentJobseeker.name">
                                            <?php echo $doc->jobseeker_name;?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="firstname">Ngày sinh</label>
                                        <div class="controls">
                                            <?php echo date('d/m/Y', strtotime($doc->docon_birthday));?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="surname">Số điện thoại </label>
                                        <div class="controls">
                                            <?php echo $doc->docon_phone;?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="suburb">Email</label>
                                        <div class="controls">
                                            <?php echo $doc->jobseeker_email;?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="surname">Trình độ/Năng lực</label>
                                        <div class="controls">
                                            <?php echo $doc->ljob_level;?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="surname">Địa điểm làm việc</label>
                                        <div class="controls">
                                            <?php echo $doc->province;?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="surname">Nghề nghiệp </label>
                                        <div class="controls">
                                            <?php echo $doc->career_name;?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="suburb">Bằng cấp/Giấy chứng nhận</label>
                                        <div class="controls">
                                            <?php echo $doc->docon_degree;?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="surname">Học vấn </label>
                                        <div class="controls">
                                            <?php echo $doc->docon_education;?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="suburb">Nơi ở hiện tại</label>
                                        <div class="controls">
                                            <?php echo $doc->docon_address;?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="surname">Kinh nghiệm </label>
                                        <div class="controls">
                                            <?php echo $doc->docon_experience;?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="suburb">Sở thích/Kỹ năng đặc biệt</label>
                                        <div class="controls">
                                            <?php echo $doc->docon_skill;?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="surname">Tình trạng sức khỏe </label>
                                        <div class="controls">
                                            <?php echo $doc->healthy_type;?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="suburb">Lý do ứng tuyển</label>
                                        <div class="controls">
                                            <?php echo $doc->docon_reason_apply;?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="suburb">Mức lương </label>
                                        <div class="controls">
                                            <?php echo $doc->docon_salary;?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="suburb">Vấn đề khác</label>
                                        <div class="controls">
                                            <?php echo $doc->docon_advance;?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="control-label" for="suburb">Nguyện vọng</label>
                                        <div class="controls">
                                            <?php echo $doc->docon_wish;?>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group text-center">
                                         <button type="button" class="btn btn-warning" data-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                    </fieldset>

                    </form>
            </div>