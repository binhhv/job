<!DOCTYPE html>
<html ng-app="myApp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php echo $head;?>
  </head>
  <body class="hold-transition skin-blue-light sidebar-mini">

    <div class="wrapper">

      <?php echo $header;?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php echo $sidemenu;?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
      <?php echo $content;?>
      </div><!-- /.content-wrapper -->

      <?php echo $footer;?>
         <div class="row">
   <div class="col-md-12">
      <div class="alert alert-success alert-dismissable alert-message hide">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i> Alert!</h4>
                   Sửa đổi thành công !!!!
  </div>

  <div class="alert alert-success alert-dismissable alert-message-delete hide">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i> Alert!</h4>
                  Xóa thành công !!!!
  </div>

  <div class="alert alert-success alert-dismissable alert-message-create hide">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i> Alert!</h4>
                  Thêm thành công !!!!
  </div>

   </div>
 </div>
    </div><!-- ./wrapper -->


  <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url();?>assets/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/angularjs/lib/angular.min.js"></script>
     <script src="<?php echo base_url();?>assets/admin/angularjs/lib/angular-animate.min.js"></script>
      <script src="<?php echo base_url();?>assets/admin/angularjs/lib/angular-strap.min.js"></script>
       <script src="<?php echo base_url();?>assets/admin/angularjs/lib/angular-strap.tpl.min.js"></script>

    <script src="<?php echo base_url();?>assets/admin/angularjs/lib/ui-bootstrap-tpls-0.10.0.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url();?>assets/admin/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>assets/admin/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>assets/admin/dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url();?>assets/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url();?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo base_url();?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="<?php echo base_url();?>assets/admin/plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url();?>assets/admin/dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>assets/admin/dist/js/demo.js"></script>
     <script src="<?php echo base_url();?>assets/admin/angularjs/lib/loading-bar.js"></script>
     <script src="<?php echo base_url();?>assets/admin/angularjs/app.js"></script>
     <script src="<?php echo base_url();?>assets/admin/angularjs/service/appservice.js"></script>

  </body>
</html>
