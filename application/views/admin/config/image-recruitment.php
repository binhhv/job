
  <div id="slide-ctrl"  ng-controller="imageRecruitmentController">


<section class="content-header">
          <h1>
           Quản lý hình ảnh tin tuyển dụng
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Hình ảnh tin tuyển dụng</li>

          </ol>
        </section>

        <!-- Main content -->
        <!-- <section class="content-header">
          <div class="row">

            <div class="col-md-12">
              <button class="btn btn-primary pull-right reload-province" ng-click="reloadSlide();" >tải lại dữ liệu</button></div>
          </div>
        </section> -->

        <section class="content">

          <div class="row">
            <div class="col-xs-12">
              <div class="box hide" id="imageRecActive" ng-show="imageRecActive.length  > 0">
                <div class="box-body" >
                    <div class="slide-box-selected">
                      <div class="row" >
                       <div class="col-sm-4 col-xs-6" ng-repeat="data in imageRecActive">
                          <div class="item-slide-selected">
                            <a class="a-item-slide-selected">
                               <img ng-click="removeImageRec(data);"  class="icon-slide-selected" src="<?php echo base_url()?>assets/admin/dist/img/icons/icon_deleted.png">
                              <img class="img-item-slide" ng-src="{{getImageRecSrc(data)}}" >
                            </a>
                          </div>
                       </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="box province-box">
                <div class="box-header">
                  <div class="col-sm-6 col-xs-12">
                       <button class="btn btn-primary btn-sm reload-province" ng-click="reloadImageRec();" >tải lại dữ liệu</button>
                      <button class="btn btn-sm btn-info" ng-click="openModalUploadImageRec('md')">upload hình ảnh </button>
                  </div>
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
               <div class="box-body table-responsive no-padding"  ng-show="filteredItems > 0">
                  <table class="table table-hover table-striped hide" id="imageRecTable" ng-init="getImageRec();">
                    <tr>
                      <th class=""></th>
                      <th class="">File name</th>

                      <th class="">Ngày tạo</th>

                      <th class="text-center"></th>
                    </tr>
                    <tr ng-repeat="data in filtered = (pagedItems | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                      <td class="">
                        <img class="td-item-logo" ng-src="{{getImageRecSrc(data)}}" />
                        </td><!--{{($index + ((currentPage -1)* entryLimit)) + 1}}-->
                      <td class="">  <span><strong>{{data.config_data_json | jsonFile:true | cut:true:20:' ...' }}</strong></span></td>
                      <td class="">{{formatDate(data.config_created_at) | date: "dd/MM/yyyy"}}</td>


                      <td class="text-center">
                      <button class="btn btn-xs btn-warning" ng-click="selectedImageRec(data)" ng-disabled="data.config_is_active == 1 || data.disabledAction">Chọn</button>
                      <button class="btn btn-xs btn-danger" ng-click="openModalDeleteImageRec('md',data)" ng-disabled="data.config_is_active == 1 || data.disabledAction">xóa</button>
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
