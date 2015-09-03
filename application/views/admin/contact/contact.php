<div ng-controller="contactController">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Hộp thư
            <small>13 tin liên hệ</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Hộp thư liên hệ</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">

            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><button class="btn btn-success" ng-click="reloadContact();" >tải lại hộp thư</button></h3>
                  <div class="box-tools pull-right">
                    <div class="has-feedback">
                      <input type="text" class="form-control input-sm" ng-model="search.$" ng-change="filter()" placeholder="tìm kiếm">
                      <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-controls">
                    <!-- Check all button -->

                  </div>
                  <div class="box-body table-responsive no-padding">
                  <!-- <div class="text-center">Không có dữ liệu</div> -->
                  <div class="text-center" id="div-data-loading">Đang tải dữ liệu</div>
                  <div class="text-center hide" id="div-no-data-loading" ng-show="filteredItems == 0" >Không có dữ liệu</div>
                </div>
                  <div class="table-responsive mailbox-messages" ng-show="filteredItems > 0">
                    <table class="table table-hover table-striped hide" id="contactTable" ng-init="getContacts()">
                      <tbody>
                        <tr>
                          <!-- <th class="text-center">STT</th> -->
                           <th >Email</th>
                          <th class="text-center">Tiêu đề</th>
                          <!-- <th class="text-center">Họ tên</th> -->

                          <th class="text-center">Xem</th>
                          <th class="text-center">Trả lời</th>
                          <th class="text-center">Ngày gửi</th>
                          <th></th>
                        </tr>
                        <tr ng-repeat="data in filtered = (pagedItems | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" >
                         <!--  <td class="text-center">{{($index + ((currentPage -1)* entryLimit)) + 1}}</td> -->
                          <td >{{data.cont_email}}</td>
                          <td class="text-center">{{data.cont_subject}}</td>
                          <!-- <td class="text-center">{{data.cont_name}}</td> -->

                          <td class="text-center">{{data.cont_view}}</td>
                          <td class="text-center">{{data.cont_reply}}</td>
                          <td class="text-center">{{formatDate(data.cont_created_at) | date: "dd/MM/yyyy"}}</td>
                          <td class="text-center">
                              <button class="btn btn-success btn-xs" ng-click="openModalRead('lg',data)">Đọc</button>
                              <button class="btn btn-primary btn-xs" ng-click="openModalReply('lg',data)">Trả lời</button>
                              <button class="btn btn-danger btn-xs" ng-click="openModalDelete('md',data)">Xóa</button>
                          </td>
                        </tr>

                      </tbody>
                    </table><!-- /.table -->
                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                  <div class="mailbox-controls text-right">
                     <pagination total-items="filteredItems"  on-select-page="setPage(page)" ng-model="currentPage" max-size="itemsPerPage" class="pagination-sm" boundary-links="true" items-per-page="entryLimit"></pagination>
                  </div>
                </div>
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>