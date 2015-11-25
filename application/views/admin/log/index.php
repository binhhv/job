<div id="employer-ctrl"  ng-controller="logController">


<section class="content-header">
          <h1>
           Lịch sử thao tác
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Lịch sử thao tác</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content-header">
          <div class="row">

            <div class="col-md-12">
              <button class="btn btn-success" ng-click="reload();" >tải lại dữ liệu</button></div>
          </div>
        </section>
        <section class="content">

          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <div class="col-sm-6 col-xs-12"> <h3 class="box-title">Danh sách các thao tác</h3></div>
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
                  <table class="table table-hover table-striped hide" id="logTable" ng-init="getLogs()">
                    <tr>
                      <th class="text-center">Mã số</th>
                      <th class="text-center">Thao tác</th>
                      <th class="text-center">Nội dung</th>
                      <th class="text-center">Người dùng</th>
                      <th class="text-center">Ngày thao tác</th>
                      <th class="text-center"></th>
                    </tr>
                    <tr ng-repeat="data in filtered = (pagedItems | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" >
                      <td class="text-center"><b>{{data.log_code}}</b></td>
                      <td class="text-center">
                        <label class="btn btn-primary btn-xs" ng-show="data.log_type == 1">Đăng nhập</label>
                        <label class="btn btn-danger btn-xs" ng-show="data.log_type == 3"> Xóa</label>
                        <label class="btn btn-warning btn-xs" ng-show="data.log_type == 2">Sửa đổi</label>
                        <label class="btn btn-info btn-xs" ng-show="data.log_type == 4">Ứng tuyển</label>
                      </td>
                      <td class="text-center">{{data.log_content | cut:true:50:' ...'}}</td>
                      <td class="text-center"><a href="javascript:void(0)">{{data.account_email}}</a></td>
                      <td class="text-center">{{data.log_create_at}}</td>
                      <td class="text-center"></td>
                    </tr>
                  </table>
                </div>
                <div class="box-footer clearfix text-right" >
                <div class="col-md-12" ng-show="filteredItems > 0">
                <pagination total-items="filteredItems"  on-select-page="setPage(page)" ng-model="currentPage" max-size="itemsPerPage" class="pagination-sm" boundary-links="true" items-per-page="entryLimit"></pagination>

        </div></div>
              </div><!-- /.box -->

            </div>
          </div>
        </section>
        </div>
