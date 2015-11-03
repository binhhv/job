<?php $type = 1?>
  <div id="recruitment-ctrl"  ng-controller="recruitmentController" >

<section class="content-header">
          <h1>

         Tin tuyển dụng nổi bật
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li>Quản lý tin tuyển dụng</li>
            <li class="active">Tin tuyển dụng nổi bật</li>
          </ol>
        </section>


        <section class="content">

          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <div class="row">
                    <div class="col-sm-6 col-xs-12">
                    <h3 class="box-title">
                      <label class="radio-inline"><strong><input ng-model ="typeShow" value="0" type="radio" name="optradio" ng-change='getRecruitmentTypeShow(0)'>Tất cả</strong></label>
                      <label class="radio-inline"><strong><input ng-model ="typeShow" value="1" type="radio" name="optradio" ng-change='getRecruitmentTypeShow(1)'>Trang top</strong></label>
                      <label class="radio-inline"><strong><input ng-model ="typeShow" value="2" type="radio" name="optradio" ng-change='getRecruitmentTypeShow(2)'>Trang khác</strong></label>
                    </h3>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                       <div class="box-tools text-right">
                       <button class="btn btn-sm btn-primary margin-top-res-10" ng-click="openModalAddRecruitmentShow('lg')">thêm tin hiển thị</button>&nbsp;
                       <button class="btn btn-sm btn-danger margin-top-res-10" ng-click="openModalRemoveAllRecruitmentShow('md',typeShow)">xóa tất cả</button> &nbsp;
                    <div class="input-group search-box" style="width: 150px;">
                     <!--  <button class="btn btn-sm btn-danger" style="display: inline-block">Xóa tất cả</button> -->
                      <input type="text" name="table_search"  ng-model="search.$" ng-change="filterHL()" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                    </div>

                  </div>


                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <div class="text-center" id="div-data-loading">Đang tải dữ liệu</div>
                  <div class="text-center hide" id="div-no-data-loading" ng-show="filteredItemsHL == 0" >Không có dữ liệu</div>
                </div>
                <div class="box-body table-responsive no-padding"  ng-show="filteredItemsHL > 0">
                    <table class="table table-hover table-striped hide" id="tableShowRecruitment" ng-init="getRecruitmentShow(typeShow);">
                            <tr>
                              <th>Mã số</th>
                              <th>Tiêu đề tin</th>
                              <!-- <th>Mức lương</th> -->
                              <th class="text-center">Hình thức công việc</th>
                              <?php if ($type == 2) {?> <th class="text-center"> Duyệt tin </th> <?php }
?>
                              <!-- <th class="text-center">Ngày đăng tin</th> -->
                              <?php if ($type == 1 || $type == 3) {?>

                              <th class="text-center">Hình thức</th>
                              <!-- <th class="text-center">Hiển thị</th> -->
                              <th class="text-center">Ứng tuyển</th>
                              <th class="text-center">Xem tin</th>
                              <?php }
?>
                              <th class="text-center"></th>
                            </tr>
                            <tr ng-repeat="data in filteredHL = (pagedItemsHL | filter:search | orderBy : predicate :reverse) | startFrom:(currentPageHL-1)*entryLimitHL | limitTo:entryLimitHL" data-id="{{data.account_id}}">
                              <td>{{data.rec_code}}</td><!--{{($index + ((currentPage -1)* entryLimit)) + 1}}-->
                              <td>{{data.rec_title | cut:true:30:' ...'}}</td>
                              <!-- <td>{{data.salary_value}} </td> -->
                              <td class="text-center">
                                      {{data.fjob_type}} - {{data.jcform_type}}
                              </td>
                              <?php if ($type == 2) {?><td class="text-center">
                                <!-- <label class="btn btn-xs btn-danger" ng-show="data.rec_is_approve == false">đang chờ duyệt</label> -->
                                <label class="btn btn-xs btn-danger" ng-show="data.rec_is_approve == false" ng-click="modalApproveRecruitment('md',data)">duyệt tin</label>
                                <label class="btn btn-xs btn-success" ng-show="data.rec_is_approve == true" disabled>đã duyệt</label>
                              <!-- {{data.account_is_disabled}} -->
                              </td> <?php }
?>

                              <!-- <td class="text-center">{{formatDate(data.rec_created_at) | date: "dd/MM/yyyy"}}</td> -->
                              <?php if ($type == 1 || $type == 3) {?>
                              <td class="text-center">
                                  <label class="btn btn-warning btn-xs" ng-show="data.rec_is_show_top == 0 && data.rec_is_show_another == 0 && data.rec_view >= maxView">hệ thống</label>
                                  <label class="btn btn-danger btn-xs" ng-show="typeShow == 1 && data.rec_is_show_top == 1">admin chọn</label>
                                  <label class="btn btn-danger btn-xs" ng-show="typeShow == 2 && data.rec_is_show_another == 1">admin chọn</label>
                                  <label class="btn btn-danger btn-xs" ng-show="typeShow == 0 && (data.rec_is_show_another == 1 || data.rec_is_show_top == 1)">admin chọn</label>
                                  <small class="edit-show-rec" ng-click="openModalEditShowRecruitment('md',data,1)"><i class="fa fa-pencil-square-o"></i></small>
                              </td>
                              <!-- <td class="text-center">
                                  <label class="btn btn-warning btn-xs" ng-show="data.rec_is_show_top == 0 && data.rec_is_show_another == 0">không</label>
                                  <label class="btn btn-danger btn-xs" ng-show="data.rec_is_show_top == 1">top</label>
                                  <label class="btn btn-primary btn-xs" ng-show="data.rec_is_show_another == 1">trang khác</label>
                                  <small class="edit-show-rec" ng-click="openModalEditShowRecruitment('md',data)"><i class="fa fa-pencil-square-o"></i></small>
                              </td> -->
                              <td class="text-center">
                              <label ng-show="data.numapply == 0"> {{data.numapply}}</label>
                              <button class="btn btn-xs btn-primary btn-numapply" ng-show="data.numapply > 0" ng-click="openModalViewApply('lg',data.rec_id);">{{data.numapply}}</button>

                              </td>
                              <td class="text-center"><strong>{{data.rec_view}}</strong></td>

                              <?php }
?>
                              <td class="text-center">
                              <!-- <label class="btn btn-xs btn-danger" ng-show="data.rec_is_approve == false" ng-click="approveRecruitment(data.rec_id)">duyệt tin</label> -->
                              <button class="btn btn-xs btn-info" ng-click="modalDetailEmployerRecruitment('lg',data.rec_id)" >chi tiết</button>
                              <?php if ($type == 1) {?>
                              <button class="btn btn-xs btn-primary" ng-click="modalDisabledEmployerRecruitment('md',data,1,1)" >hủy tin</button>
                              <?php } else if ($type == 3) {?>
                              <button class="btn btn-xs btn-primary" ng-click="modalDisabledEmployerRecruitment('md',data,0,1)" >đăng tin</button>
                              <?php }
?>
                              <button class="btn btn-xs btn-warning" ng-click="modalUpdateEmployerRecruitment('lg',data,1)" >sửa</button>
                              <button class="btn btn-xs btn-danger" ng-click="modalDeleteRecruitmentShow('md',data,typeShow)" ng-show="data.rec_is_show_another == 1 || data.rec_is_show_top == 1">xóa</button>
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
                <div class="col-md-12" ng-show="filteredItemsHL > 0">
                <pagination total-items="filteredItemsHL"  on-select-page="setPageHL(pageHL)" ng-model="currentPageHL" max-size="itemsPerPageHL" class="pagination-sm" boundary-links="true" items-per-page="entryLimitHL"></pagination>
                    <!-- <pagination total-items="filteredItems" on-select-page="setPage(page)" page="currentPage" max-size="itemsPerPage" class="pagination-sm" items-per-page="entryLimit" boundary-links="true"></pagination> -->
            <!-- <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div> -->
        </div></div>
              </div>
            </div>
          </div>
        </section>
        </div>



