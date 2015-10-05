
  <div id="career-ctrl"  ng-controller="contactFormController">


<section class="content-header">
          <h1>
           Danh mục hình thức liên hệ
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Hình thức liên hệ</li>

          </ol>
        </section>

        <!-- Main content -->
        <section class="content-header">
          <div class="row">

            <div class="col-md-12">
              <button class="btn btn-primary pull-right reload-province" ng-click="reloadContactForm();" >tải lại dữ liệu</button></div>
          </div>
        </section>

        <section class="content">

          <div class="row">
            <div class="col-xs-12">
              <div class="box province-box">
                <div class="box-header">
                  <div class="col-sm-6 col-xs-12">  <button class="btn btn-sm btn-info" ng-click="openModalCreateContactForm('md')">tạo mới</button></div>
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
                  <table class="table table-hover table-striped hide" id="contactFormTable" ng-init="getContactForm();">
                    <tr>
                      <th class="text-center">Hình thức liên hệ</th>

                      <th class="text-center">Ngày tạo</th>

                      <th class="text-center"></th>
                    </tr>
                    <tr ng-repeat="data in filtered = (pagedItems | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                      <td class="text-center">{{data.contact_form_type}}</td><!--{{($index + ((currentPage -1)* entryLimit)) + 1}}-->

                      <td class="text-center">{{formatDate(data.contact_form_created_at) | date: "dd/MM/yyyy"}}</td>


                      <td class="text-center">
                      <button class="btn btn-xs btn-warning" ng-click="openModalUpdateContactForm('md',data)" >sửa</button>
                      <button class="btn btn-xs btn-danger" ng-click="openModalDeleteContactForm('md',data)">xóa</button>
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
