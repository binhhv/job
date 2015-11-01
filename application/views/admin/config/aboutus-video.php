
  <div id="site-ctrl" ng-controller="videoController" >


<section class="content-header">
          <h1>
          Video giới thiệu.
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">video</li>

          </ol>
        </section>

        <!-- Main content -->
        <!-- <section class="content-header">
          <div class="row">

            <div class="col-md-12">
              <button class="btn btn-primary pull-right reload-province" ng-click="reloadTitleSite(1);" >tải lại dữ liệu</button></div>
          </div>
        </section> -->

        <section class="content">

          <div class="row">
            <div class="col-xs-12">
              <div class="box province-box">

               <!--  <div class="box-header">
                  <div class="col-sm-12 col-xs-12">  <button class="btn btn-sm btn-info" ng-click="openModalUploadVideo('md')">upload video</button></div>

                </div>-->

                <div class="box-body  no-padding">
                  <div class="col-sm-12 dp-table">
                    <div class="col-sm-12 margin-top-10">
                                <form method="post" id="fjobseekerMail">

                        <div class="col-sm-10 token hide">
                          <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?php echo $csrf['hash'];?>" />
                        </div>
                       <span class="btn btn-success fileinput-button">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Chọn file...</span>
                            <!-- The file input field used as target for the file upload widget -->
                            <input id="fileupload" type="file" name="files[]" multiple>
                            </span> <span class="error-upload-video text-danger">(.mp4 | .flv | .avi | .wmv &lt; 40 MB)</span>
                        <br>
                        <br>
                        <!-- The global progress bar -->
                        <div id="progress" class="progress">
                            <div class="progress-bar progress-bar-success"></div>
                        </div>
                        <!-- The container for the uploaded files -->
                        <div id="files" class="files"></div></form>
                    </div>

                  </div>

                </div>


              </div><!-- /.box -->


              <div class="box province-box">


                <div class="box-body table-responsive no-padding">
                  <div class="text-center" id="div-data-loading">Đang tải dữ liệu</div>
                  <div class="text-center hide" id="div-no-data-loading" ng-show="filteredItems == 0" >Không có dữ liệu</div>
                </div>
                <div id="logoDiv" class="box-body no-padding hide"  ng-show="filteredItems > 0" ng-init="getVideos()">
                  <div class="logo-box">
                    <div class="row">
                    <div class="col-sm-12">
                      <ul class="list-group">
                      <li>
                          <div class="panel panel-default">
                              <div class="panel-body">
                              <!--ng-class="{'logo-active':data.config_is_active == 1}"-->
                                  <div class="col-sm-4 col-xs-6 panel-more1" ng-repeat ="data in filtered = (pagedItems | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                                    <img ng-show="data.config_is_active == 1" class="icon-checked" src="<?php echo base_url()?>assets/admin/dist/img/icons/icon_checked.png">
                                    <div class="item-box" >
                                      <div class="text-center">
                                      <!-- {{data.config_data_json | convertJson:'file_tmp'}} -->
                                        <video class="item-logo video-viewer" controls ng-src="{{getIframeSrc(data)}}">

                                         </video>
                                      </div>
                                        <br />
                                        <div class="span-name-logo text-center">
                                        <a target="_blank" href="{{base_url}}uploads/config/video/{{data.config_data_json | convertJson:'file_tmp'}}"><span><strong>{{data.config_data_json | convertJson:'file_name' }}</strong></span></a>
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


              <!-- /.box -->

            </div>

            </div>
          </div>
        </section>
        </div>
