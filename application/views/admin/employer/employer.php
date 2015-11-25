<div id="employer-ctrl"  ng-controller="employerController">


<section class="content-header">
          <h1>
           Quản lý nhà tuyển dụng
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li>Quản lý người dùng</li>
            <li class="active">Nhà tuyển dụng</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content-header">
          <div class="row">

            <div class="col-md-12"><button class="btn btn-primary" ng-click="modalCreateEmployer('lg','<?php echo $country->country_id; ?>')">Tạo nhà tuyển dụng</button> &nbsp;
              <button class="btn btn-success" ng-click="reload();" >tải lại dữ liệu</button></div>
          </div>
        </section>
        <section class="content">

          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <div class="col-sm-6 col-xs-12"> <h3 class="box-title">Danh sách nhà tuyển dụng</h3></div>
                   <div class="col-sm-6 col-xs-12"><div class="box-tools">
                    <div class="input-group search-box" style="width: 150px;">
                      <input type="text" name="table_search" ng-model="search" ng-change="filter()" class="form-control input-sm pull-right" placeholder="tìm kiếm">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>

                  </div></div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding" ng-show="filteredItems == 0">
                  <div class="text-center">Không có dữ liệu</div>
                </div>
                <div class="box-body table-responsive no-padding"  ng-show="filteredItems > 0">
                  <table class="table table-hover table-striped hide" id="employerTable" ng-init="getEmployers()">
                    <tr>
                      <th class="text-center">Mã số</th>
                      <th class="text-center">Logo</th>
                      <th class="text-center">Tên nhà tuyển dụng</th>
                      <th class="text-center">Số điện thoại</th>
                      <th class="text-center">Người liên hệ</th>
                      <th class="text-center">Tìm kiếm hồ sơ </th>
                      <!-- <th class="text-center">Số tin tuyển dụng</th> -->
                      <th class="text-center"></th>
                    </tr>
                    <tr ng-repeat="data in filtered = (pagedItems | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" data-id="{{data.account_id}}">
                      <td class="text-center">{{data.employer_code}}</td><!--{{$index + 1}}-->
                      <td class="text-center"><img class="logo-small" ng-src ="<?php echo base_url(); ?>uploads/logo/{{data.employer_id}}/{{data.employer_logo_tmp}}" alt="logo employer"></td>
                      <td class="text-center">
                      <label><b>{{data.employer_name}}</b></label>
                      <label class="text-muted">{{data.employer_address}}</label>
                      </td>
                      <td class="text-center">
  							{{data.employer_phone}}
                      </td>
                      <td class="text-center">{{data.employer_contact_name}}</td>
                      <td class="text-center">
                          <img class="pointer" ng-click="modalSwitchSearch('md',data)" src="<?php echo base_url() ?>assets/admin/dist/img/icons/switch_on.png" ng-show="data.employer_is_search_rs == 1 && checkCompareDate(data.employer_exp_search_rs) == 1 ">
                          <img class ="pointer" ng-click="modalSwitchSearch('md',data);" src="<?php echo base_url() ?>assets/admin/dist/img/icons/switch_off.png" ng-show="data.employer_is_search_rs == 0 || checkCompareDate(data.employer_exp_search_rs) == 0 ">
                      </td>
                      <!-- <td class="text-center">{{data.numrecs}}</td> -->
                      <td class="text-center">
                      <button class="btn btn-xs btn-primary" ng-click="openDetailEmployer(data,'<?php echo base_url("admin/employer/detail/"); ?>')">chi tiêt</button>
                      <button class="btn btn-xs btn-warning" ng-click="modalUpdateEmployer('lg',data)" >sửa</button>
                      <button class="btn btn-xs btn-danger" ng-click="modalDelete('md',data)">xóa</button>
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
            </div>
          </div>
        </section>
        </div>
