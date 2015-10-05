
    <div class="container employer-page">
        <div class="row">
            <div class="col-sm-4 col-sm-push-8">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="info-employer row">
                                <div class="col-sm-3 col-xs-3">
                                    <?php if (isset($employerInfo->employer_logo) && isset($employerInfo->employer_logo_tmp)) {?>
                                        <img src="<?php echo base_url() . 'uploads/logo/' . $employerInfo->employer_id . '/' . $employerInfo->employer_logo_tmp?>" class="logo-employer">
                                    <?php } else {?>
                                        <img src="<?php echo base_url()?>uploads/common/logo.png" class="logo-employer">
                                    <?php }

?>
                                </div>
                                <div class="col-sm-9 col-xs-9">
                                    <label class="employer-name"><?php echo $employerInfo->employer_name;?></label>
                                    <span class="employer-detail-info"><strong>
                                    <?php
switch ($employerInfo->account_map_role) {
case 2:
	# code...
	echo 'Quản trị';
	break;

default:
	# code...
	echo 'Nhân viên';
	break;
}
?> </strong>
                                    </span>
                                    <a class="employer-logout" href="<?php echo base_url('logout')?>"><i class="fa fa-sign-out"></i>Đăng xuất</a>
                                </div>

                            </div>

                            <div class="row-employer row employer-tools">
                                <div class="col-sm-12 employer-box-header text-center background-color-3">
                                    <h5 class="employer-tools-title">Nhà tuyển dụng</h5>
                                    <!-- <div class="border-bottom-title border-color-3"></div> -->
                                </div>
                                <div class="col-sm-12 employer-line"></div>
                                <div class="col-sm-12 employer-tools-item">
                                    <a href=""><i class="fa fa-user"></i>&nbsp;Quản lý tài khoản</a>
                                </div>
                                <div class="col-sm-12 employer-line"></div>
                                <?php if ($employerInfo->account_map_role == 2) {?>
                                <div class="col-sm-12 employer-tools-item">
                                    <a href=""><i class="fa fa-users"></i>&nbsp;Quản lý nhân viên</a>
                                </div>
                                <div class="col-sm-12 employer-line"></div>
                                <?php }
?>
                                <div class="col-sm-12 employer-tools-item">
                                    <a href="<?php echo site_url('employer/employer/recruitment_active')?>"><i class="fa fa-suitcase"></i>&nbsp;Quản lý tin tuyển dụng</a>
                                </div>
                                <div class="col-sm-12 employer-line"></div>
                                <div class="col-sm-12 employer-tools-item">
                                    <a href="#create_recruitmentModel"  data-toggle="modal"><i class="fa fa-pencil-square-o"></i>&nbsp;Đăng tin tuyển dụng</a>
                                </div>
                                <div class="col-sm-12 employer-line"></div>
                                <div class="col-sm-12 employer-tools-item">
                                    <a href=""><i class="fa fa-file-text-o"></i>&nbsp;Tìm kiếm hồ sơ ứng viên</a>
                                </div>
                                <div class="col-sm-12 employer-line"></div>
                                <div class="col-sm-12 employer-tools-item">
                                    <a href=""><i class="fa fa-pencil-square-o"></i>&nbsp;Đăng tin tuyển dụng</a>
                                </div>
                                <div class="col-sm-12 employer-line"></div>

                            </div>

                            <div class="row-employer row employer-tools">
                                <div class="col-sm-12 employer-tools-item">
                                    <a href=""><i class="fa fa-bars"></i>&nbsp;Hồ sơ theo ngành nghề</a>
                                </div>
                                <div class="col-sm-12 employer-line"></div>
                                <div class="col-sm-12 employer-tools-item">
                                    <a href=""><i class="fa fa-map-marker"></i>&nbsp;Hồ sơ theo tỉnh thành</a>
                                </div>
                                <div class="col-sm-12 employer-line"></div>

                            </div>

                            <div class="row-employer row employer-tools">
                                <div class="col-sm-12 employer-box-header background-color-2 text-center">
                                    <h5 class="employer-tools-title">Liên hệ quảng cáo</h5>
                                    <!-- <div class="border-bottom-title border-color-1"></div> -->
                                </div>
                                <div class="col-sm-12 employer-line"></div>
                                <div class="col-sm-12 employer-tools-item text-center">
                                    <h5><i class="fa fa-phone"></i>&nbsp;XXXXXXXXXXXX</h5>
                                </div>
                                <div class="col-sm-12 employer-line"></div>


                            </div>


                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-8 col-sm-pull-4">
            <div class="card">
                <div class="row-employer row">
                    <div class="col-sm-12">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Mã số</th>
                                    <th>Tiêu đề tin</th>
                                    <th>Mức lương</th>
                                    <th>Hình thức công việc</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày đăng tin</th>
                                    <th>Số lượng ứng tuyển</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($arr_rec)) {
	foreach ($arr_rec as $rows): ?>
                                <tr>
                                    <td><?php echo $rows->rec_code;?></td>
                                    <td><?php echo $rows->rec_title;?></td>
                                    <td><?php echo $rows->rec_salary;?></td>
                                    <td><?php echo $rows->jcform_type;?></td>
                                    <td><?php echo $rows->rec_is_approve;?></td>
                                    <td><?php echo $rows->rec_created_at;?></td>
                                    <td><?php echo $rows->numapply;?></td>
                                    <td class="center">
                                        <a href="<?php echo site_url('make/viewMake/');?>"><span>chi tiết</span></a>
                                        <a href="<?php echo site_url('make/editMake/');?>"><span>sửa</span></a>
                                        <a  href="<?php echo site_url('make/deleteMake/');?>" onClick="return confirm('Are you sure to delete this make ?');"><span>xóa</span></a>

                                    </td>
                                </tr>
                            <?php endforeach;}

?>
                            </tbody>
                        </table>
                    </div>
                </div>

        </div>
</div>
        <?php echo $update_imfomation_employer?>
    <?php echo $update_contact_employer?>
    <?php echo $update_account_employer?>
    <?php echo $recruitment?>

<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
