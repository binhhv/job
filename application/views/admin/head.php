 <title>Admin | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="refresh" content="1200;url=<?php echo base_url('admin/logout') ?>">
    <!-- Bootstrap 3.3.5 -->

    <!-- for FF, Chrome, Opera -->
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/favicons/favicon-32x32.png" sizes="32x32">

    <!-- for IE -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/favicons/favicon.ico" >
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/favicons/favicon.ico"/>


    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/style-responsive.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/angularjs/lib/loading-bar.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/angularjs/lib/select/dist/select.css">

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/angular-ui/0.4.0/angular-ui.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css">

    <?php
if (isset($styles)) {
	foreach ($styles as $style) {?>
     <link rel="stylesheet" href="<?php echo base_url() . $style; ?>">

    <?php }
}
?>
    <script type="text/javascript">
    var pathWebsite = "<?php echo base_url(); ?>";
    </script>

