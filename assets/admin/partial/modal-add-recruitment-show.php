<section ng-controller="recruitmentController">
    <div class="modal-header">
        <h3 class="modal-title">Thêm tin tuyển dụng hiển thị</h3>
    </div>
    <div class="modal-body modal-delete">
            <form name="activeDeleteLogoForm">
                <fieldset>
                    <div class="row">

                        <div class="col-sm-12">

                            <div class="box-header">
                              <div class="row">

                                <div class="col-sm-12 col-xs-12">
                                   <div class="box-tools text-right">

                                <div class="input-group search-box" style="width: 150px;">
                                 <!--  <button class="btn btn-sm btn-danger" style="display: inline-block">Xóa tất cả</button> -->
                                  <input type="text" name="table_search"  ng-model="search.$" ng-change="filterShow()" class="form-control input-sm pull-right" placeholder="Search">
                                  <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                  </div>
                                </div>
                              </div>
                                </div>

                              </div>


                            </div><!-- /.box-header -->
                            <div class="box">
                                <div class="box-body table-responsive no-padding">
                                  <div class="text-center" id="div-data-loading-recruitment-show">Đang tải dữ liệu</div>
                                  <div class="text-center hide" id="div-no-data-loading" ng-show="filteredItemsShow == 0" >Không có dữ liệu</div>
                                </div>
                                <div class="box-body table-responsive no-padding"  ng-show="filteredItemsShow > 0">
                                    <table class="table table-hover table-striped hide" id="recruitmentShowTable" ng-init="getRecruitmentShowModal();">
                                            <tr>
                                              <th>Mã số</th>
                                              <th>Tiêu đề tin</th>
                                              <th >Nhà tuyển dụng</th>
                                              <th class="text-center"></th>
                                            </tr>
                                            <tr ng-repeat="data in filtered = (pagedItemsShow | filter:search | orderBy : predicate :reverse) | startFrom:(currentPageShow-1)*entryLimitShow | limitTo:entryLimitShow" data-id="{{data.account_id}}">
                                              <td>{{data.rec_code}}</td><!--{{($index + ((currentPage -1)* entryLimit)) + 1}}-->
                                              <td>{{data.rec_title | cut:true:30:' ...'}}</td>
                                              <!-- <td>{{data.salary_value}} </td> -->
                                              <td>{{data.employer_name}}</td>
                                              <td class="text-center">
                                                 <button class="btn btn-xs btn-danger" ng-click="addRecruitmentShow(data,1)" ng-disabled="data.rec_is_show_top == 1">top</button>
                                                 <button class="btn btn-xs btn-primary" ng-click="addRecruitmentShow(data,2)" ng-disabled="data.rec_is_show_another == 1">trang khác</button>
                                                 <button class="btn btn-xs btn-primary" ng-click="addRecruitmentShow(data,0)" ng-disabled="data.rec_is_show_top == 1 && data.rec_is_show_another == 1">tất cả</button>
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
                                <div class="col-md-12" ng-show="filteredItemsShow > 0">
                                <pagination total-items="filteredItemsShow"  on-select-page="setPageShow(pageShow)" ng-model="currentPageShow" max-size="itemsPerPage" class="pagination-sm" boundary-links="true" items-per-page="entryLimitShow"></pagination>
                                    <!-- <pagination total-items="filteredItems" on-select-page="setPage(page)" page="currentPage" max-size="itemsPerPage" class="pagination-sm" items-per-page="entryLimit" boundary-links="true"></pagination> -->
                            <!-- <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div> -->
                                </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <!-- <button class="btn btn-success" ng-click="activeDeleteVideo(video);" ng-disabled="disabled_modal" >Đóng</button> -->
                                <button class="btn btn-warning" ng-click="ok()" ng-disabled="disabled_modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
