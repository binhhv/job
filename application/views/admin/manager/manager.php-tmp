<div id="manager-ctrl"  ng-controller="managerController">


<section class="content-header">
          <h1>
           Quản lý quản trị viên
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li>Quản lý người dùng</li>
            <li class="active">Quản trị viên</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content-header">
          <div class="row">

            <div class="col-md-12"><button class="btn btn-primary" ng-click="modalCreateManager('lg')">Tạo quản trị viên</button> &nbsp;
              <button class="btn btn-success" ng-click="reload();" >tải lại dữ liệu</button></div>
          </div>
        </section>
        <section class="content">

          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <div class="col-sm-6 col-xs-12"> <h3 class="box-title">Danh sách quản trị viên website.</h3></div>
                   <div class="col-sm-6 col-xs-12"><div class="box-tools">
                    <div class="input-group search-box" style="width: 150px;">
                      <input type="text" name="table_search" ng-model="search" ng-change="filter()" class="form-control input-sm pull-right" placeholder="tìm kiếm">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>

                  </div></div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <!-- <div class="text-center">Không có dữ liệu</div> -->
                  <div class="text-center" id="div-data-loading">Đang tải dữ liệu</div>
                  <div class="text-center hide" id="div-no-data-loading" ng-show="filteredItems == 0" >Không có dữ liệu</div>
                </div>
                <div class="box-body table-responsive no-padding"  ng-show="filteredItems > 0">
                  <table class="table table-hover table-striped hide" id="managerTable" ng-init="getManagers()">
                    <tr>
                      <th class="text-center">Số TT</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Họ tên</th>
                      <th class="text-center">Trạng thái</th>
                      <th class="text-center">Ngày đăng ký</th>
                      <th class="text-center"></th>
                    </tr>
                    <tr ng-repeat="data in filtered = (pagedItems | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" data-id="{{data.account_id}}">
                      <td class="text-center">{{($index + ((currentPage -1)* entryLimit)) + 1}}</td>
                      <td class="text-center">{{data.account_email}}</td>
                      <td class="text-center">
                          <label><b>{{data.account_first_name}} {{data.account_last_name}}</b></label>

                      </td>
                      <td class="text-center">
  							             <label class="btn btn-xs btn-success" ng-show="data.account_is_disabled == false">hoạt động</label>
                             <label class="btn btn-xs btn-danger" ng-show="data.account_is_disabled == true">ngừng hoạt động</label>
                      </td>
                      <td class="text-center">{{formatDate(data.account_created_at) | date: "dd/MM/yyyy"}}</td>

                      <td class="text-center">

                      <button class="btn btn-xs btn-warning" ng-click="modalUpdate('lg',data)" >sửa</button>
                      <button class="btn btn-xs btn-danger" ng-click="modalDelete('sm',data)">xóa</button>
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
                <pagination total-items="filteredItems" on-select-page="setPage(page)" page="currentPage" max-size="itemsPerPage" class="pagination-sm" items-per-page="entryLimit" boundary-links="true"></pagination>
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
