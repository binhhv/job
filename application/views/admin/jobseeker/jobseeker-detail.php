
  <div ng-controller="detailJobseekerController">


<section class="content-header">
          <h1>
            <a href="<?php echo base_url('admin/jobseeker');?>" class="btn btn-primary">Quay về trang quản lý người tìm việc</a>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li>Quản lý người dùng</li>
            <li class=""><a href="<?php echo base_url('admin/jobseeker')?>">Người tìm việc</a></li>
            <li class="active"><?php
if (isset($jobseeker)) {
	echo $jobseeker[0]->account_first_name . ' ' . $jobseeker[0]->account_last_name;
}
?></li>
          </ol>
        </section>

        <section class="invoice" >
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> <?php
if (isset($jobseeker)) {
	echo $jobseeker[0]->account_first_name . ' ' . $jobseeker[0]->account_last_name;
} else {
	echo 'Jobseeker'
	;
}
?>
                <small class="pull-right">Ngày đăng ký: <?php echo date('d/m/Y', strtotime($jobseeker[0]->account_created_at));?></small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-6 invoice-col">
             <b>Trạng thái:</b> <?php
if ($jobseeker[0]->account_is_disabled) {?>
  <label class="btn btn-xs btn-danger">ngừng hoạt động</label>
                   <?php } else {?>
<label class="btn btn-xs btn-success">đang hoạt động</label>
                   <?php }
?><br>
              <b>Email:</b> <?php echo $jobseeker[0]->account_email?><br>
              <b>Họ tên:</b> <?php echo $jobseeker[0]->account_first_name . ' ' . $jobseeker[0]->account_last_name;?><br>
            </div><!-- /.col -->
            <div class="col-sm-6 invoice-col">
              <b>Số lượng cv:</b> <?php echo $jobseeker[0]->numcv?><br>
              <b>Số lượng hồ sơ:</b> <?php echo $jobseeker[0]->numdocon?><br>
              <b>Số lượng tin tuyển dụng đã ứng tuyển:</b> <?php echo $jobseeker[0]->numapp?>
            </div><!-- /.col -->
          </div><!-- /.row -->





        </section><!-- /.content -->
        <section class="invoice">

          <div class="row">
            <div class="col-xs-12">
              <div class="row">
            <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Danh sách cv đã gửi</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Danh sách hồ sơ đã tạo</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Danh sách tin tuyển dụng đã ứng tuyển</a></li>
                  <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                      <?php if (count($cvJobseeker) == 0) {?>

                      <div class="row">
                        <div class="col-md-12 text-center"><b>Không có CV nào.</b></div>
                      </div>
                      <?php } else {
	?>
                      <div class="item-cv">
                        <div class="row ">
                        <div class="col-md-4 col-xs-4 "><b>Số thứ tự</b></div>
                          <div class="col-md-4 col-xs-4"><b>Tên file</b></div>
                          <div class="col-md-4 col-xs-4 "><b>Ngày tạo</b></div>
                        </div>
                    </div>
	<?php $index = 1;
	foreach ($cvJobseeker as $cv) {?>
                      <div class="item-cv">
                        <div class="row">
                          <div class="col-md-4 col-xs-4 "><?php echo $index;?></div>
                          <div class="col-md-4 col-xs-4"><a href=""><?php echo $cv->doccv_file_name;?></a></div>
                          <div class="col-md-4 col-xs-4 "><?php echo date('d/m/Y', strtotime($cv->doccv_created_at));?></div>

                        </div>
                    </div>
                    <?php	$index++;}
}
?>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                         <?php if (count($docJobseeker) == 0) {?>

                      <div class="row">
                        <div class="col-md-12 text-center"><b>Không có hồ sơ nào được tạo.</b></div>
                      </div>
                      <?php } else {
	?>
                      <div class="item-doc">
                        <div class="row ">
                        <div class="col-md-3 col-xs-6 "><b>Số thứ tự</b></div>
                          <div class="col-md-3 col-xs-6 "><b>Ngày tạo</b></div>
                          <div class="col-md-3 col-xs-6 "><b>Ngày chỉnh sửa</b></div>
                          <div class="col-md-3 col-xs-6"><b></b></div>
                        </div>
                    </div>
  <?php $index = 1;
	foreach ($docJobseeker as $doc) {?>
                      <div class="item-doc">
                        <div class="row">
                          <div class="col-md-3 col-xs-6 "><?php echo $index;?></div>
                          <div class="col-md-3 col-xs-6 "><?php echo date('d/m/Y', strtotime($doc->docon_created_at));?></div>
                          <div class="col-md-3 col-xs-6 "><?php echo date('d/m/Y', strtotime($doc->docon_update_at));?></div>
                          <div class="col-md-3 col-xs-6 "><button class="btn btn-primary btn-xs" ng-click="modalDocument('lg','<?php echo $doc->docon_id;?>')">xem chi tiết</button></div>
                        </div>
                    </div>
                    <?php $index++;}
}
?>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    <?php if (count($recApp) == 0) {?>

                      <div class="row">
                        <div class="col-md-12 text-center"><b>chưa có danh sách tin tuyển dụng ứng tuyển.</b></div>
                      </div>
                      <?php } else {
	?>
                      <div class="item-doc">
                        <div class="row ">
                        <div class="col-md-1 col-xs-6 "><b>Số thứ tự</b></div>
                          <div class="col-md-4 col-xs-6 "><b>Tin tuyển dụng</b></div>
                          <div class="col-md-4 col-xs-6 "><b>Nhà tuyển dụng</b></div>
                          <div class="col-md-3 col-xs-6 "><b>Ngày ứng tuyển</b></div>
                        </div>
                    </div>
  <?php $index = 1;
	foreach ($recApp as $rec) {?>
                      <div class="item-doc">
                        <div class="row">
                          <div class="col-md-1 col-xs-6 "><?php echo $index;?></div>
                          <div class="col-md-4 col-xs-6 "><?php echo $rec->rec_title?></div>
                          <div class="col-md-4 col-xs-6 "><?php echo '<b>' . $rec->name . '</b>' . '<br>' . $rec->address;?></div>
                          <div class="col-md-3 col-xs-6 "><?php echo date('d/m/Y', strtotime($rec->recapp_created_at));?></div>
                        </div>
                    </div>
                    <?php $index++;}
}
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
