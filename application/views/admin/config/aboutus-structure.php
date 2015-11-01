
  <div id="management-ctrl"  ng-controller="memberController">


<section class="content-header">
          <h1>
           Đại diện ban quan trị
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Đại diện ban quản trị</li>

          </ol>
        </section>

        <!-- Main content -->
        <section class="content-header">
          <div class="row">

            <div class="col-md-12">
              <button class="btn btn-primary pull-right reload-province" ng-click="reloadMember();" >tải lại dữ liệu</button></div>
          </div>
        </section>

        <section class="content">

          <div class="row">
            <div class="col-xs-12">
              <div class="box province-box">
                <div class="box-header">
                  <div class="col-sm-12 col-xs-12">  <label class="">Hiện có 4 thành viên được hiển thị trên website</label></div>
                  <div class="col-sm-12">
                      <button class="btn btn-md btn-primary" ng-click="addPosition('md');"><i class="fa fa-plus"></i> Thêm vị trí</button>
                  </div>
                </div>

                <div class="row-member box-body hide" ng-show="membersActive.length > 0">
                  <div class="bg-gray box-member">
                    <div class="row">
                      <div class="col-sm-4 col-md-3 col-xs-6 margin-top-5" ng-repeat="item in membersActive" data-item="member-{{item.config_id}}">
                          <div class="member">
                            <img ng-click="deleteMemberPosition(item);" class="icon-slide-selected" src="{{base_url}}assets/admin/dist/img/icons/icon_deleted.png" data-pin-nopin="true">
                            <div class="avatar">
                                <img class="img-responsive circleBase circle-avatar" ng-src="{{base_url}}uploads/config/member/{{item.config_data_json | convertJson:'file_tmp'}}" > <!-- src="<?php echo base_url()?>uploads/config/member/sida1.jpg">-->
                            </div>
                            <div class="position">
                              <!-- <span class="name-member text-center margin-top-10">{{item.config_data_json | convertJson:'name'}}</span>
                              <span class="position-member text-center">{{item.config_data_json | convertJson:'position'}}</span> -->
                              <div class="action-member text-center">
                                <!-- <button class="btn btn-danger btn-sm" ng-click="deleteMemberPosition(item)"><i class="fa fa-trash"></i> xóa vị trí</button> -->
                                <button class="btn btn-warning btn-sm" ng-click="changeMemberPosition('md',item)"><i class="fa fa-user"></i> thay đổi thành viên</button>
                              </div>
                            </div>
                          </div>
                      </div>
                       <!-- <div class="col-sm-3 col-xs-12 margin-top-5"> <div class="member">123</div></div>
                        <div class="col-sm-3 col-xs-12 margin-top-5"> <div class="member">123</div></div>
                         <div class="col-sm-3 col-xs-12 margin-top-5"> <div class="member">123</div></div> -->
                    </div>
                  </div>
                </div>
              </div><!-- /.box -->
            </div>
            <div class="col-xs-12">
              <div class="box province-box">
                <div class="box-header">
                  <div class="col-sm-6 col-xs-12">  <button class="btn btn-sm btn-info" ng-click="openModalCreateMember('md')">Tạo thành viên mới</button></div>
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

                <div class="no-padding ">
                  <div class="text-center" id="div-data-loading">Đang tải dữ liệu</div>
                  <div class="text-center hide" id="div-no-data-loading" ng-show="filteredItems == 0" >Không có dữ liệu</div>
                </div>
                <div class="box-body table-responsive "  ng-show="filteredItems > 0">
                  <table class="table table-hover table-striped hide" id="memberTable" ng-init="getMembers();">
                    <tr>
                      <th class="text-center"></th>
                      <th class="text-center">Họ tên</th>
                      <th class="text-center">Chức vụ</th>
                      <th class="text-center"></th>
                    </tr>
                    <tr ng-repeat="data in filtered = (pagedItems | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                      <td class="text-center">
                          <img class="item-logo img-responsive member-avatar" ng-src="{{base_url}}uploads/config/member/{{data.config_data_json | convertJson:'file_tmp'}}" />
                      </td>

                      <td class="text-center">{{data.config_data_json | convertJson:'name'}}</td><!--{{($index + ((currentPage -1)* entryLimit)) + 1}}-->
                      <td class="text-center">{{data.config_data_json | convertJson:'position'}}</td>


                      <td class="text-center">
                      <!-- <button class="btn btn-xs btn-warning" ng-click="selectedTitleSite(data)" >chọn</button> -->
                      <button class="btn btn-xs btn-warning" ng-click="openModalEditMember('md',data)">Sửa</button>
                      <button ng-show="data.config_is_active == 0" class="btn btn-xs btn-danger" ng-click="openModalDeleteMember('md',data)">Xóa</button>
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
