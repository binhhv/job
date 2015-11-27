
  <div id="blog-ctrl"  ng-controller="blogCategoryController">


<section class="content-header">
          <h1>
           Danh mục blog
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Danh mục blog</li>

          </ol>
        </section>

        <!-- Main content -->
        <section class="content-header">
          <div class="row">

            <div class="col-md-12">
              <button class="btn btn-primary pull-right reload-province" ng-click="reloadBlogCategory();" >tải lại dữ liệu</button></div>
          </div>
        </section>

        <section class="content">

          <div class="row">
            <div class="col-xs-12">
              <div class="box province-box">
                <div class="box-header">
                  <div class="col-sm-6 col-xs-12">  <a class="btn btn-sm btn-info" href="javascript:void(0)" ng-click="openModalCreateBlogCategory('md')">tạo mới danh mục</a></div>
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
                  <table class="table table-hover table-striped hide" id="blogCategoryTable" ng-init="getBlogCategory();">
                    <tr>
                      <th class="text-center">Danh mục</th>
                      <th class="text-center">Số blog</th>
                      <th class="text-center">Ngày tạo</th>

                      <th class="text-center"></th>
                    </tr>
                    <tr ng-repeat="data in filtered = (pagedItems | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                      <td class="text-center">{{data.cblog_name}}</td><!--{{($index + ((currentPage -1)* entryLimit)) + 1}}-->
                      <td class="text-center">{{data.numBlog}}</td>
                      <td class="text-center">{{formatDate(data.cblog_created_at)}}</td>


                      <td class="text-center">
                      <button class="btn btn-xs btn-warning" ng-click="openModalUpdateBlogCategory('md',data)" >sửa</button>
                      <button class="btn btn-xs btn-danger" ng-click="openModalDeleteBlogCategory('md',data)">xóa</button>
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
