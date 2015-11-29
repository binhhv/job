
  <div id="blog-ctrl"  ng-controller="blogController">


<section class="content-header">
          <h1>
           Quản lý danh sách blog
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Danh sách blog</li>

          </ol>
        </section>

        <!-- Main content -->
        <section class="content-header">
          <div class="row">

            <div class="col-md-12">
              <button class="btn btn-primary pull-right reload-province" ng-click="reloadBlog();" >tải lại dữ liệu</button></div>
          </div>
        </section>

        <section class="content">

          <div class="row">
            <div class="col-xs-12">
              <div class="box province-box">
                <div class="box-header">
                  <div class="col-sm-6 col-xs-12">  <a class="btn btn-sm btn-info" href="<?php echo base_url('admin/blog/create') ?>">tạo mới blog</a></div>
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
                  <table class="table table-hover table-striped hide" id="blogTable" ng-init="getBlog();">
                    <tr>
                      <th class="text-center">Mã số</th>
                      <th class="text-center">Tiêu đề</th>
                      <th class="text-center">Hình</th>
                      <th class="text-center">Trạng thái</th>
                      <th class="text-center">Người đăng</th>
                      <th class="text-center">Ngày tạo</th>

                      <th class="text-center"></th>
                    </tr>
                    <tr ng-repeat="data in filtered = (pagedItems | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                      <td class="text-center"><b>{{data.blog_code}}</b></td><!--{{($index + ((currentPage -1)* entryLimit)) + 1}}-->
                      <td class="text-center"><a href="<?php echo base_url('admin/blog/detail/') . '/' ?>{{data.blog_id}}">{{data.blog_title | cut:true:50:' ...'}}</a></td>
                      <td class="text-center">
                          <img ng-src="{{getImageBlogSrc(data)}}" class="img-responsive img-blog">
                      </td>
                      <td class="text-center">
                        <label class="btn btn-xs btn-primary" ng-show="data.blog_is_active == 1">Đang đăng</label>
                        <label class="btn btn-xs btn-warning" ng-show="data.blog_is_active == 0 && data.blog_is_draft == 1">Lưu</label>
                      </td>
                      <td class="text-center"><a><b>{{data.account_email}}</b></a></td>
                      <td class="text-center">{{formatDate(data.blog_created_at)}}</td>


                      <td class="text-center">
                      <button class="btn btn-xs btn-info" ng-click="openModalDisabledBlog('md',data)" ng-show="data.blog_is_active == 1 && data.blog_map_account == <?php echo $user['id'] ?>">Gỡ blog</button>
                      <!-- <button class="btn btn-xs btn-primary"  ng-show="data.blog_is_active == 0 && data.blog_is_draft == 1">Đăng blog</button> -->
                      <a ng-show="data.blog_map_account == <?php echo $user['id'] ?>" class="btn btn-xs btn-warning" href="<?php echo base_url('admin/blog/edit') ?>/{{data.blog_id}}" >sửa</a>
                      <button ng-show="data.blog_map_account == <?php echo $user['id'] ?>" class="btn btn-xs btn-danger" ng-click="openModalDeleteBlog('md',data)">xóa</button>
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
