
  <div id="province-ctrl"  ng-controller="provinceController">


<section class="content-header">
          <h1>
           Danh mục Tỉnh/Thành phố
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Tỉnh/Thành phố</li>

          </ol>
        </section>

        <!-- Main content -->
        <section class="content-header">
          <div class="row">

            <div class="col-md-12" ng-init="getCountry()">
            <!-- <input type="radio" name="country" value="1" ng-change="changeCountry(1)" ng-model="country" ng-value="2">
            <input type="radio" name="country" value="2" ng-change="changeCountry(2)"ng-model="country" ng-value="1">
               -->
               <?php
if (isset($countries)) {
	foreach ($countries as $value) {
		?>
              <label  class="col-sm-2" >
                    <input  type="radio"  ng-change="changeCountry(country)" name="country" ng-model="country" ng-value="<?php echo $value->country_id?>" />
                    <?php echo $value->country_name?>
              </label>
                <?php }
}
?>
              <button class="btn btn-primary pull-right reload-province" ng-click="reloadProvince();" >tải lại dữ liệu</button></div>
          </div>
        </section>

        <section class="content">

          <div class="row">
            <div class="col-xs-12">
              <div class="box province-box">
                <div class="box-header">
                  <div class="col-sm-6 col-xs-12">  <button class="btn btn-sm btn-info" ng-click="openModalCreateProvince('md')">tạo tỉnh thành</button></div>
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
                  <table class="table table-hover table-striped hide" id="provinceTable">
                    <tr>
                      <th>Tên</th>
                      <th>Tỉnh/Thành phố</th>
                      <th>Vùng miền</th>
                      <th class="text-center">Kinh độ/Vĩ độ</th>

                      <th class="text-center"></th>
                    </tr>
                    <tr ng-repeat="data in filtered = (pagedItems | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                      <td>{{data.province_name}}</td><!--{{($index + ((currentPage -1)* entryLimit)) + 1}}-->
                      <td>{{data.province_type}}</td>
                      <td>{{data.region_name}}</td>
                      <td class="text-center">
                        {{data.province_long_lat}}
                      </td>

                      <td class="text-center">
                      <button class="btn btn-xs btn-warning" ng-click="modalUpdateProvince('md',data)" >sửa</button>
                      <button class="btn btn-xs btn-danger" ng-click="modalDeleteProvince('md',data)">xóa</button>
                      </td>
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
