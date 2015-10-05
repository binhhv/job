
  <div id="logo-ctrl"  ng-controller="logoController">


<section class="content-header">
          <h1>
           Quản lý logo website
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Logo</li>

          </ol>
        </section>

        <!-- Main content -->
        <section class="content-header">
          <div class="row">

            <div class="col-md-12">
              <button class="btn btn-primary pull-right reload-province" ng-click="reloadLogo();" >tải lại dữ liệu</button></div>
          </div>
        </section>

        <section class="content">

          <div class="row">
            <div class="col-xs-12">
              <div class="box province-box">
                <div class="box-header">
                  <div class="col-sm-6 col-xs-12">  <button class="btn btn-sm btn-info" ng-click="openModalUploadLogo('md')">upload logo mới</button></div>
                   <div class="col-sm-6 col-xs-12">

                   <div class="box-tools">
                    <div class="input-group search-box" style="width: 150px;">
                      <input type="text" name="table_search" ng-model="search.config_data_json" ng-change="filter()" class="form-control input-sm pull-right" placeholder="tìm kiếm">
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
                <div id="logoDiv" class="box-body no-padding hide"  ng-show="filteredItems > 0" ng-init="getLogo()">
                  <div class="logo-box">
                    <div class="row">
                    <div class="col-sm-12">
                      <ul class="list-group">
    <li>
        <div class="panel panel-default">
            <div class="panel-body">
            <!--ng-class="{'logo-active':data.config_is_active == 1}"-->
                <div class="col-sm-3 col-xs-6 panel-more1" ng-repeat ="data in filtered = (pagedItems | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                  <img ng-show="data.config_is_active == 1" class="icon-checked" src="<?php echo base_url()?>assets/admin/dist/img/icons/icon_checked.png">
                  <div class="item-box" >
                    <div class="text-center">
                      <img class="item-logo" ng-src="{{base_url}}uploads/config/logo/{{data.config_data_json | jsonFile:false}}" />
                    </div>
                      <br />

                      <div class="span-name-logo text-center">
                        <span><strong>{{data.config_data_json | jsonFile:true | cut:true:20:' ...' }}</strong></span>
                      </div>
                      <div class="span-active-logo">
                        <button class="btn btn-primary btn-xs" ng-class="{'disabled':data.config_is_active == 1}" ng-click="openModalActiveDelete('md',0,data)">sử dụng</button>
                        <button class="btn btn-danger btn-xs" ng-class="{'disabled':data.config_is_active == 1}" ng-click="openModalActiveDelete('md',1,data)">xóa</button>
                      </div>
                    </div>
                </div>


            </div>
            <div class="box-footer clearfix text-right" >
                <div class="col-md-12" ng-show="filteredItems > 0">
                <pagination total-items="filteredItems"  on-select-page="setPage(page)" ng-model="currentPage" max-size="itemsPerPage" class="pagination-sm" boundary-links="true" items-per-page="entryLimit"></pagination>

        </div></div>
        </div>
    </li>

</ul>
  </div>
                    </div>
                  </div>
                </div>


              </div><!-- /.box -->

            </div>
          </div>
        </section>
        </div>
