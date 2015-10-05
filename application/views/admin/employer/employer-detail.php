
  <div >


<section class="content-header">
          <h1>
            <a href="<?php echo base_url('admin/employer');?>" class="btn btn-primary">Quay về trang quản lý nhà tuyển dụng</a>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li>Quản lý người dùng</li>
            <li class=""><a href="<?php echo base_url('admin/employer')?>">Nhà tuyển dụng</a></li>
            <li class="active"><?php
if (isset($employer)) {
	echo $employer->employer_name;
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
if (isset($employer)) {
	echo $employer->employer_name;
} else {
	echo 'employer'
	;
}
?>
                <small class="pull-right">Ngày đăng ký: <?php echo date('d/m/Y', strtotime($employer->employer_created_at));?></small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info employer-info">
            <div class="col-sm-3 invoice-col">
              <div class="col-sm-12 p-relative">
                <?php if (isset($employer->employer_logo) && file_exists('uploads/logo/' . $employer->employer_id . '/' . $employer->employer_logo_tmp)) {?>
                  <img class="img-responsive" src="<?php echo base_url() . 'uploads/logo/' . $employer->employer_id . '/' . $employer->employer_logo_tmp?>" alt="<?php echo $employer->employer_name?>" />
                  <?php } else {?>
                  <img class="img-responsive" src="<?php echo base_url();?>uploads/common/logo.png" alt="<?php echo $employer->employer_name?>" />
                 <?php }
?>
              </div>
            </div><!-- /.col -->
            <div class="col-sm-9 invoice-col">
              <div class="col-md-6 col-sm-6 col-xs-12">

                 <b>Địa chỉ :</b> <?php echo $employer->employer_address;?><br>
                 <b>Tỉnh/Thành phố :</b> <?php echo $employer->province_name?><br>
                 <b>Số điện thoại :</b> <?php echo $employer->employer_phone?><br>
                 <b>Quy mô :</b> <?php echo $employer->employer_size?><br>

                 <b>Website :</b> <?php echo $employer->employer_website?><br>
               </div>
               <div class="col-md-6 col-sm-6 col-xs-12">
                  <b>Quản trị nhà tuyển dụng : </b> <?php echo $employer->account_email;?><br>
                 <b>Người liên hệ :</b> <?php echo $employer->employer_contact_name?><br>
                 <b>Email gười liên hệ :</b> <?php echo $employer->employer_contact_email?><br>
                 <b>Điện thoại liên hệ:</b> <?php echo $employer->employer_contact_phone?><br>
                 <b>Di động liên hệ:</b> <?php echo $employer->employer_contact_mobile?><br>
               </div>
               <div class="col-sm-12 col-xs-12 border-top-1">
                  <b>Giới thiệu :</b> <?php echo $employer->employer_about?><br>
               </div>
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
                  <li class="active"><a href="#tab_1" data-toggle="tab">Danh sách người dùng</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Danh sách tin tuyển dụng đã đăng</a></li>
                  <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1" ng-controller="employerUserController">

                      <div class="box no-box-shadow">
                        <div class="box-header">
                         <div class="col-sm-6 col-xs-12">
                           <button class="btn btn-success" ng-click="modalCreateEmployerUser('lg','<?php echo $employer->employer_id?>','<?php echo $employer->employer_name;?>');">tạo người dùng</button>&nbsp;
                           <button class="btn btn-info" ng-click="reloadEmployerUser('<?php echo $employer->employer_id?>')">tải lại dữ liệu</button>
                         </div>
                           <div class="col-sm-6 col-xs-12"><div class="box-tools">
                            <div class="input-group search-box" style="width: 150px;">
                              <input type="text" name="table_search" ng-model="search" ng-change="filter()" class="form-control input-sm pull-right" placeholder="tìm kiếm">
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                              </div>
                            </div>

                          </div>
                        </div><!-- /.box-header -->
                      </div>
                        <div class="box-body table-responsive no-padding">
                          <div class="text-center" id="div-data-loading">Đang tải dữ liệu</div>
                          <div class="text-center hide" id="div-no-data-loading" ng-show="filteredItems == 0" >Không có dữ liệu</div>
                        </div>
                        <div class="box-body table-responsive no-padding"  ng-show="filteredItems > 0">
                          <table class="table table-hover table-striped hide" id="employerUserTable" ng-init="getEmployerUsers('<?php echo $employer->employer_id?>')">
                            <tr>
                              <th>Mã số</th>
                              <th>Email</th>
                              <th>Họ tên</th>
                              <th class="text-center">Loại người dùng</th>
                              <th class="text-center">Trạng thái</th>
                              <th class="text-center">Quyền quản trị</th>
                              <th class="text-center">Ngày đăng ký</th>
                              <th class="text-center"></th>
                            </tr>

                            <tr ng-repeat="data in filtered = (pagedItems | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" data-id="{{data.account_id}}">
                              <td>{{data.account_code}}</td><!--{{($index + ((currentPage -1)* entryLimit)) + 1}}-->
                              <td>{{data.account_email}}</td>
                              <td>{{data.account_first_name}} {{data.account_last_name}}</td>
                              <td class="text-center">
                                <label class="btn btn-xs btn-success" ng-show="data.account_map_role == 2">quản trị</label>
                                <label class="btn btn-xs btn-primary" ng-show="data.account_map_role == 3">người dùng</label>
                              </td>
                              <td class="text-center">
                                <label class="btn btn-xs btn-success" ng-show="data.account_is_disabled == false">hoạt động</label>
                                <label class="btn btn-xs btn-danger" ng-show="data.account_is_disabled == true">ngừng hoạt động</label>
                              <!-- {{data.account_is_disabled}} -->
                              </td>
                              <td class="text-center">
                                  <button class="btn btn-warning btn-xs"  ng-disabled ="exitsAdmin" ng-click = "setRoleAdminEmployer('<?php echo $employer->employer_id?>',data)">chuyển quyền quản trị</button>
                              </td>
                              <td class="text-center">{{formatDate(data.account_created_at) | date: "dd/MM/yyyy"}}</td>

                              <td class="text-center">

                              <button class="btn btn-xs btn-warning" ng-click="modalUpdateEmployerUser('lg',data)" >sửa</button>
                              <button class="btn btn-xs btn-danger" ng-click="modalDeleteEmployerUser('sm',data)">xóa</button>
                              </td>
                            </tr>
                            <!-- <tr>
                              <td>183</td>
                              <td>John Doe</td>
                              <td>11-7-2014</td>
                              <td><span class="label label-success">Approved</span></td>
                              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr> -->

                          </table>
                        </div>
                            <div class="box-footer clearfix text-right" >
                            <div class="col-md-12" ng-show="filteredItems > 0">
                            <pagination total-items="filteredItems"  on-select-page="setPage(page)" ng-model="currentPage" max-size="itemsPerPage" class="pagination-sm" boundary-links="true" items-per-page="entryLimit"></pagination>
                                <!-- <pagination total-items="filteredItems" on-select-page="setPage(page)" page="currentPage" max-size="itemsPerPage" class="pagination-sm" items-per-page="entryLimit" boundary-links="true"></pagination> -->
                        <!-- <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div> -->
                    </div></div>
                <!-- <div class="box-footer clearfix text-right"  ng-show="filteredItems > 0"> -->
                  <!-- <div pagination=""  page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div> -->
                 <!--  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                  </ul> -->
                <!-- </div> -->
                <!-- <div ng-model="message"></div> -->
                <!-- /.box-body -->
              </div><!-- /.box -->
              <!-- <div class="box" ng-show="filteredItems == 0">
                <div class="text-center">Không có dữ liệu</div>
              </div> -->


                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="tab_3" ng-controller="employerRecruitmentController">

                      <div class="box no-box-shadow">
                        <div class="box-header">
                          <div class="col-sm-6 col-xs-12">
                           <button class="btn btn-success" ng-click="modalCreateEmployerRecruitment('lg','<?php echo $employer->employer_id?>','<?php echo $country->country_id;?>')">tạo tin tuyển dụng</button>&nbsp;
                           <button class="btn btn-info" ng-click="reloadEmployerRecruitment('<?php echo $employer->employer_id?>')">tải lại dữ liệu</button>
                         </div>
                           <div class="col-sm-6 col-xs-12"><div class="box-tools">
                            <div class="input-group search-box" style="width: 150px;">
                              <input type="text" name="table_search" ng-model="search" ng-change="filter()" class="form-control input-sm pull-right" placeholder="tìm kiếm">
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                              </div>
                            </div>

                          </div>
                        </div>
                        </div><!-- /.box-header -->

                        <div class="box-body table-responsive no-padding">
                          <div class="text-center" id="div-data-loading-rec">Đang tải dữ liệu</div>
                          <div class="text-center hide" id="div-no-data-loading-rec" ng-show="filteredItems == 0" >Không có dữ liệu</div>
                        </div>
                        <div class="box-body table-responsive no-padding"  ng-show="filteredItems > 0">
                          <table class="table table-hover table-striped hide" id="employerRecruitmentTable" ng-init="getEmployerRecruitments('<?php echo $employer->employer_id?>')">
                            <tr>
                              <th>Mã số</th>
                              <th>Tiêu đề tin</th>
                              <th>Mức lương</th>
                              <th class="text-center">Hình thức công việc</th>
                              <th class="text-center">Trạng thái</th>
                              <th class="text-center">Ngày đăng tin</th>
                              <th class="text-center">Số lượng ứng tuyển</th>
                              <th class="text-center"></th>
                            </tr>
                            <tr ng-repeat="data in filtered = (pagedItems | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" data-id="{{data.account_id}}">
                              <td>{{data.rec_code}}</td><!--{{($index + ((currentPage -1)* entryLimit)) + 1}}-->
                              <td>{{data.rec_title | cut:true:20:' ...'}}</td>
                              <td>{{data.salary_value}} </td>
                              <td class="text-center">
                                      {{data.fjob_type}} - {{data.jcform_type}}
                              </td>
                              <td class="text-center">
                                <!-- <label class="btn btn-xs btn-danger" ng-show="data.rec_is_approve == false">đang chờ duyệt</label> -->
                                <label class="btn btn-xs btn-danger" ng-show="data.rec_is_approve == false" ng-click="modalApproveRecruitment('md',data)">duyệt tin</label>
                                <label class="btn btn-xs btn-success" ng-show="data.rec_is_approve == true" disabled>đã duyệt</label>
                              <!-- {{data.account_is_disabled}} -->
                              </td>

                              <td class="text-center">{{formatDate(data.rec_created_at) | date: "dd/MM/yyyy"}}</td>
                              <td class="text-center">{{data.numapply}}</td>
                              <td class="text-center">
                              <!-- <label class="btn btn-xs btn-danger" ng-show="data.rec_is_approve == false" ng-click="approveRecruitment(data.rec_id)">duyệt tin</label> -->
                              <button class="btn btn-xs btn-info" ng-click="modalDetailEmployerRecruitment('lg',data.rec_id)" >chi tiết</button>
                              <button class="btn btn-xs btn-warning" ng-click="modalUpdateEmployerRecruitment('lg',data)" >sửa</button>
                              <button class="btn btn-xs btn-danger" ng-click="modalDeleteEmployerRecruitment('md',data)">xóa</button>
                              </td>
                            </tr>
                            <!-- <tr>
                              <td>183</td>
                              <td>John Doe</td>
                              <td>11-7-2014</td>
                              <td><span class="label label-success">Approved</span></td>
                              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr> -->

                          </table>
                        </div>
                            <div class="box-footer clearfix text-right" >
                            <div class="col-md-12" ng-show="filteredItems > 0">
                             <pagination total-items="filteredItems"  on-select-page="setPage(page)" ng-model="currentPage" max-size="itemsPerPage" class="pagination-sm" boundary-links="true" items-per-page="entryLimit"></pagination>
                                <!-- <pagination total-items="filteredItems" on-select-page="setPage(page)" page="currentPage" max-size="itemsPerPage" class="pagination-sm" items-per-page="entryLimit" boundary-links="true"></pagination> -->
                        <!-- <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div> -->
                    </div></div>
                <!-- <div class="box-footer clearfix text-right"  ng-show="filteredItems > 0"> -->
                  <!-- <div pagination=""  page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div> -->
                 <!--  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                  </ul> -->
                <!-- </div> -->
                <!-- <div ng-model="message"></div> -->
                <!-- /.box-body -->
              </div><!-- /.box -->
              <!-- <div class="box" ng-show="filteredItems == 0">
                <div class="text-center">Không có dữ liệu</div>
              </div> -->


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
