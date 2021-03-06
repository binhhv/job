<section class="content-header">
          <h1>
            ALLSHIGOTO

          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
         <section class="content">
         <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php if (isset($numRecruitment)) {echo $numRecruitment;} else {echo '0';}
?></h3>
                  <p>Công việc</p>
                </div>
                <div class="icon">
                  <i class="fa fa-newspaper-o"></i>
                </div>

              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php if (isset($numEmployer)) {echo $numEmployer;} else {echo '0';}
?></h3>
                  <p>Nhà tuyển dụng</p>
                </div>
                <div class="icon">
                  <i class="fa fa-suitcase"></i>
                </div>

              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php if (isset($numJobseeker)) {echo $numJobseeker;} else {echo '0';}
?></h3>
                  <p>Ứng viên</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>

              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>Hơn <?php if (isset($numDoc)) {echo $numDoc;} else {echo '0';}
?></h3>
                  <p>CV và hồ sơ</p>
                </div>
                <div class="icon">
                  <i class="fa fa-file"></i>
                </div>

              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <div class="row">
         <div class="col-sm-8">
           <div class="box box-success chart-recruitment">
                <div class="box-header with-border">
                  <h3 class="box-title">Biểu đồ tin tuyển dụng</h3>
                  <div class="box-tools pull-right">

                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="barChart" style="height:280px"></canvas>
                  </div>
                  <div class="text-center">
                    <span><label class="chart-note-employer"></label> tin tuyển dụng</span>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
         </div>
         <div class="col-sm-4">

           <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Những tin tuyển dụng đăng gần đây</h3>
                  <div class="box-tools pull-right">

                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <?php if (isset($recentRecruitment)) {
	foreach ($recentRecruitment as $value) {?>
                      <li class="item">

                      <div class="product-info">
                        <a href="javascript::;" class="product-title">
                        <?php echo (strlen($value->rec_title) > 30) ? substr($value->rec_title, 0, 30) . '...' : $value->rec_title;?>
                        <span class="label  pull-right" style="color:#000;"><?php echo date('d/m/Y', strtotime($value->rec_created_at));?></span>
                        </a>

                        <span class="product-description">
                          <?php echo $value->employer_name;?>
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <?php }
}
?>
                  </ul>
                </div><!-- /.box-body -->

              </div><!-- /.box -->
         </div>
        </div>
          <div class="row">
         <div class="col-sm-8">
           <div class="box box-success chart-recruitment">
                <div class="box-header with-border">
                  <h3 class="box-title">Biểu đồ ứng viên và nhà tuyển dụng</h3>
                  <div class="box-tools pull-right">

                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="barChartUE" style="height:280px"></canvas>
                  </div>
                  <div class="text-center">
                  <span><label class="chart-note-jobseeker"></label>  ứng viên</span> &nbsp;
                  <span><label class="chart-note-employer"></label> nhà tuyển dụng</span>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
         </div>
         <div class="col-sm-4">

           <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Ứng viên và nhà tuyển dụng mới</h3>
                  <div class="box-tools pull-right">

                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <?php if (isset($recentUser)) {
	foreach ($recentUser as $value) {
		?>
                      <li class="item">

                      <div class="product-info">
                        <a href="javascript::;" class="product-title">
                        <?php if (isset($value->employer_name)) {
			echo (strlen($value->employer_name) > 30) ? substr($value->employer_name, 0, 30) . '...' : $value->employer_name;
		} else {
			echo $value->account_first_name . ' ' . $value->account_last_name;
		}
		?>
                        <span class="label  pull-right" style="color:#000;"><?php echo date('d/m/Y', strtotime($value->account_created_at));?></span>
                        </a>

                        <span class="product-description">
                          <?php if (isset($value->employer_name)) {
			echo $value->account_first_name . ' ' . $value->account_last_name;
		} else {
			echo $value->account_email;
		}
		?>
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <?php }
}
?>
                  </ul>
                </div><!-- /.box-body -->

              </div><!-- /.box -->
         </div>
        </div>
        </section>
