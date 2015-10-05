<section class="content" ng-controller="mailJobseekerController">
<section class="content-header">
          <h1>
           Gửi mail cho ứng viên
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="">Hộp thư</li>
            <li class="active">Gửi mail</li>

          </ol>
        </section>
        <br>
          <div class="row">
            <div class="col-md-4">
               <div class="box-tools" style="display: inline-block">
                    <div class="input-group search-box" style="width: 100%;">
                      <input type="text" name="table_search" ng-model="search.$" ng-change="filter()" class="form-control input-sm pull-right" placeholder="tìm kiếm">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                       <div class="input-group-btn">
                        <button class="btn btn-sm btn-default" ng-click="reloadMailJobseeker()"><i class="fa fa-refresh"></i></button>
                      </div>
                    </div>

                  </div>
              <div class="box box-solid">
                <!-- <div class="box-header with-border">
                  <h3 class="box-title">Folders</h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div> -->
                <!-- <div class="box-body no-padding">

                </div><!-- /.box-body -->
                 <div class="box-body table-responsive no-padding"  ng-show="filteredItems > 0">
                  <table class="table table-hover table-striped hide" id="mailJobseekerTable" ng-init="getMailJobseeker();">
                    <tr>
                    <th class="text-center"></th>
                      <th class="text-center">Email Ứng viên</th>
                    </tr>
                    <tr ng-repeat="data in filtered = (pagedItems | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                    <td class="text-center">
                          <img ng-click="selectedEmail(data,0)" ng-show="data.active == 1" class="icon-checked-mail" src="<?php echo base_url()?>assets/admin/dist/img/icons/icon_checked.png">
                          <img ng-click="selectedEmail(data,1)" ng-show="data.active == 0" class="icon-checked-mail" src="<?php echo base_url()?>assets/admin/dist/img/icons/icon_unchecked.png">
                    </td>
                      <td class="text-left">({{data.firstname | cut:true:10:' ...'}} {{data.lastname | cut:true:10:' ...'}}){{data.email | cut:true:20:' ...'}}</td><!--{{($index + ((currentPage -1)* entryLimit)) + 1}}-->
                    </tr>


                  </table>
                </div>
                <div class="box-footer clearfix text-right" >
                <div class="col-md-12" ng-show="filteredItems > 0">
                <pager total-items="filteredItems" ng-model="currentPage"></pager>
                <!-- <pagination total-items="filteredItems"  on-select-page="setPage(page)" ng-model="currentPage" max-size="itemsPerPage" class="pagination-sm" boundary-links="true" items-per-page="entryLimit"></pagination> -->

            </div>
              </div>
              </div><!-- /. box -->

            </div><!-- /.col -->
            <div class="col-md-8">
              <form method="post" id="fjobseekerMail">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Soạn email</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <div class="col-sm-10 token hide">
                          <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?php echo $csrf['hash'];?>" />
                        </div>
                  <div class="form-group" >
                  <button class="btn btn-sm btn-primary" ng-click="addMailTo();"><i class="fa fa-plus"></i></button>
                  </div>
                  <div class="form-group" id="input-mail-to">
                    <div class="item-mail-to" ng-repeat="mail in arrMailto">
                        <img  ng-click="removeInputMail(mail,$event);"  class="icon-deleted-mail" src="<?php echo base_url()?>assets/admin/dist/img/icons/icon_deleted.png">
                        <input ng-disabled="mail.mailto.length > 0" type="email" ng-value ="mail.mailtofull" class="form-control margin-top-5 mail-to" placeholder="To:" ng-model="mail.mailtofull" >
                    </div>

                  </div>
                  <div class="form-group">
                    <input class="form-control" name="subject" placeholder="Subject:">
                  </div>
                  <div class="form-group">
                      <!--text editor-->
                      <!-- <textarea id="txtEditor"></textarea> -->
                       <textarea name="comments" id="comments" cols="60" rows="18"></textarea>
                  </div>
                  <div class="form-group">
                  <!-- <input type="file" name="attachment"> -->
                    <div class="row">
                      <div class="col-sm-12">
                      <!-- <i class="fa fa-paperclip"></i> Attachment
                      <input type="file" name="attachment"> -->
                          <span class="btn btn-primary fileinput-button">
                              <i class="glyphicon glyphicon-plus"></i>
                              <span>Attach files...</span>
                              <!-- The file input field used as target for the file upload widget -->
                              <input id="fileupload" type="file" name="files[]" multiple>
                          </span>
                          <br>
                          <br>
                          <!-- The global progress bar -->
                          <div id="progress" class="progress">
                              <div class="progress-bar progress-bar-primary"></div>
                          </div>
                          <!-- The container for the uploaded files -->
                          <div id="files" class="files"></div>
                        </div>
                    </div>
                    <p class="help-block">Max. 32MB</p>
                  </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-8">
                      <div id="progressMail" class="progress">
                              <div class="progress-bar progress-bar-primary"></div>
                          </div>
                    </div>
                    <div class="col-sm-4">
                       <div class="pull-right">
                    <!-- <button class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button> -->
                          <button type="submit" class="btn btn-primary" id="submit-send-mail"><i class="fa fa-envelope-o"></i> Send</button>
                      </div>

                    </div>
                  </div>

                  <!-- <button class="btn btn-default"><i class="fa fa-times"></i> Discard</button> -->
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
            </form>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->