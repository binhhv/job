
  <div id="recruitment-ctrl"  ng-controller="recruitmentHLController" >

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
                      <label class="radio-inline"><strong><input ng-model ="typeShow" value="0" type="radio" name="optradio">Tất cả</strong></label>
                      <label class="radio-inline"><strong><input ng-model ="typeShow" value="1" type="radio" name="optradio">Trang top</strong></label>
                      <label class="radio-inline"><strong><input ng-model ="typeShow" value="2" type="radio" name="optradio">Trang khác</strong></label>
                    </h3>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                       <div class="box-tools text-right">
                       <button class="btn btn-sm btn-primary margin-top-res-10">thêm tin hiển thị</button>&nbsp;
                       <button class="btn btn-sm btn-danger margin-top-res-10">xóa tất cả</button> &nbsp;
                    <div class="input-group search-box" style="width: 150px;">
                     <!--  <button class="btn btn-sm btn-danger" style="display: inline-block">Xóa tất cả</button> -->
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                    </div>

                  </div>


                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th>Mã số</th>
                      <th>Tiêu đề tin</th>
                      <th>Nhà tuyển dụng</th>
                      <th>Hình thức</th>
                      <th>Lượt xem</th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td>0<span class="label label-success">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        <th><button class="btn btn-primary btn-xs">Chi tiết</button> &nbsp;<button class="btn btn-danger btn-xs">Xóa</button>  </th>
                    </tr>
                    <tr>
                      <td>219</td>
                      <td>Alexander Pierce</td>
                      <td>11-7-2014</td>
                      <td><span class="label label-warning">Pending</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        <th></th>
                    </tr>
                    <tr>
                      <td>657</td>
                      <td>Bob Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="label label-primary">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        <th></th>
                    </tr>
                    <tr>
                      <td>175</td>
                      <td>Mike Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="label label-danger">Denied</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        <th></th>
                    </tr>
                  </tbody></table>
                </div><!-- /.box-body -->
              </div>
            </div>
          </div>
        </section>
        </div>



