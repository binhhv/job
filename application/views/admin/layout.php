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
                    <h4>  <i class="icon fa fa-check"></i> Thông báo!</h4>
                   Sửa đổi thành công !!!!
  </div>

  <div class="alert alert-success alert-dismissable alert-message-delete hide">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i> Thông báo!</h4>
                  Xóa thành công !!!!
  </div>

  <div class="alert alert-success alert-dismissable alert-message-create hide">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i> Thông báo!</h4>
                  Thêm thành công !!!!
  </div>

    <div class="alert alert-danger alert-dismissable alert-message-errors hide">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i> Thông báo!</h4>
                  Đã có lỗi nghiêm trọng xảy ra.
  </div>

   <div class="alert alert-success alert-dismissable alert-message-setRoleEmployer hide">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i> Thông báo!</h4>
                 Chuyển quyền thành công.
  </div>
  <div class="alert alert-primary alert-dismissable alert-message-approve hide">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i> Thông báo!</h4>
                Duyệt tin thành công.
  </div>

  <div class="alert alert-primary alert-dismissable alert-message-sendmail hide">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i> Thông báo!</h4>
               Gửi thành công.
  </div>
   </div>
 </div>
    </div><!-- ./wrapper -->


  <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url();?>assets/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/angularjs/lib/angular.min.js"></script>
     <script src="<?php echo base_url();?>assets/admin/angularjs/lib/angular-animate.min.js"></script>
     <script src="<?php echo base_url();?>assets/admin/angularjs/lib/angular-sanitize.min.js"></script>
      <script src="<?php echo base_url();?>assets/admin/angularjs/lib/angular-strap.min.js"></script>
       <script src="<?php echo base_url();?>assets/admin/angularjs/lib/angular-strap.tpl.min.js"></script>
       <script src="<?php echo base_url();?>assets/admin/angularjs/lib/angular-nl2br.min.js"></script>

       <!--lib advance angularjs-->
       <!--<script src="http://pc035860.github.io/angular-highlightjs/angular-highlightjs.min.js"></script>
        <script src="<?php echo base_url();?>assets/admin/angularjs/lib/oi/select.min.js"></script>
        <script src="<?php echo base_url();?>assets/admin/angularjs/lib/oi/select-tpls.min.js"></script>

        <script src="<?php echo base_url();?>assets/admin/angularjs/lib/src/module.js"></script>
        <script src="<?php echo base_url();?>assets/admin/angularjs/lib/src/directives.js"></script>
        <script src="<?php echo base_url();?>assets/admin/angularjs/lib/src/filters.js"></script>
        <script src="<?php echo base_url();?>assets/admin/angularjs/lib/src/services.js"></script>-->
        <!--lib select-->
         <script src="<?php echo base_url();?>assets/admin/angularjs/lib/select/dist/select.js"></script>
    <script src="<?php echo base_url();?>assets/admin/angularjs/lib/ui-bootstrap-tpls-0.13.3.min.js"></script>
     <!--<script src="<?php echo base_url();?>assets/admin/angularjs/lib/ui-bootstrap-tpls-0.10.0.min.js"></script>-->
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
    <!--<script src="<?php echo base_url();?>assets/admin/dist/js/pages/dashboard2.js"></script>-->
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>assets/admin/dist/js/demo.js"></script>
     <script src="<?php echo base_url();?>assets/admin/angularjs/lib/loading-bar.js"></script>
      <script src="<?php echo base_url();?>assets/admin/angularjs/app.js"></script>


      <script type="text/javascript">
  var config ={
    base_url:'<?php echo base_url();?>'
  }
</script>
<script src="<?php echo base_url();?>assets/admin/dist/js/admin.js"></script>


     <?php
if (isset($scripts)) {
	foreach ($scripts as $script) {?>
    <script src="<?php echo base_url() . $script;?>"></script>
	<?php }
}
?>
     <!--<script src="<?php echo base_url();?>assets/admin/angularjs/app.js"></script>
     <script src="<?php echo base_url();?>assets/admin/angularjs/service/appservice.js"></script>-->
<script>
$(window).load(function() {
/** this is come when complete page is fully loaded, including all frames, objects and images **/
var h = window.innerHeight;//$(window).height();
    h = (h*75)/100;// (h > 300) ? h-100 : h;
       // $( "<style>.modal-body {height:'"+h+"px'; overflow:auto;}</style>" ).appendTo( "head" )
    $('<style type="text/css">.modal-body {max-height:'+h+'px; overflow:auto;}</style>').appendTo($('head'));
});
$( window ).resize(function() {
  var h = window.innerHeight;//$(window).height();
  h = (h*75)/100;//(h > 300) ? h-100 : h;
       // $( "<style>.modal-body {height:'"+h+"px'; overflow:auto;}</style>" ).appendTo( "head" )
  $('<style type="text/css">.modal-body {max-height:'+h+'px; overflow:auto;}</style>').appendTo($('head'));

});

</script>


  </body>
</html>
