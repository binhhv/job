
  <div id="number-recruitment-ctrl"  ng-controller="numberRecruitmentController">


<section class="content-header">
          <h1>
            Quản lý số tin tuyển dụng hiển thị
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Số tin tuyển dụng</li>

          </ol>
        </section>

        <!-- Main content -->
        <section class="content-header">
          <div class="row">

            <div class="col-md-12">
              <button class="btn btn-primary pull-right reload-province" ng-click="reloadConfigNumRecruitment();" >tải lại dữ liệu</button></div>
          </div>
        </section>

        <section class="content">

          <div class="row">
            <div class="col-xs-12">
              <div class="box province-box">
                <div class="box-header">
                  <div class="col-sm-6 col-xs-12"> <h4>Nội dung chỉnh sửa.</h4>  </div>
                   <div class="col-sm-6 col-xs-12">

                   <div class="box-tools">
                    <div class="input-group search-box" style="width: 150px;">
                      <input type="text" name="table_search" ng-model="search.$" ng-change="filter()" class="form-control input-sm pull-right" placeholder="tìm kiếm">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>

                  </div></div>
                </div><!-- /.box-header -->

                <div class="box-body table-responsive no-padding">
                  <div class="text-center" id="div-data-loading">Đang tải dữ liệu</div>
                  <div class="text-center hide" id="div-no-data-loading" ng-show="filteredItems == 0" >Không có dữ liệu</div>
                </div>
                <div class="box-body table-responsive no-padding"  ng-show="filteredItems > 0">
                  <table class="table table-hover table-striped hide" id="configRecruitmentTable" ng-init="getConfigNumRecruitment();">
                    <tr>
                      <th class="text-center">Nội dung</th>
                      <th class="text-center">Số lượng</th>
                      <th class="text-center">Ngày chỉnh sửa</th>
                      <th class="text-center"></th>
                    </tr>
                    <tr ng-repeat ="data in filtered = (configRecruitments | filter:search)">
                      <td class="text-center">
                       {{data.config_data_json | convertJson:'content'}}
                      </td>

                      <td class="text-center">{{data.config_data_json | convertJson:'number'}}</td><!--{{($index + ((currentPage -1)* entryLimit)) + 1}}-->
                      <td class="text-center">{{data.config_data_json | convertJson:'updated_at' | formatDateFilter }}</td>


                      <td class="text-center">
                      <!-- <button class="btn btn-xs btn-warning" ng-click="selectedTitleSite(data)" >chọn</button> -->
                      <button class="btn btn-xs btn-danger" ng-click="openModalEditNumRecruitment('md',data)">thay đổi</button>
                      </td>
                    </tr>


                  </table>
                </div>


              </div><!-- /.box -->

            </div>
          </div>
        </section>
        </div>
