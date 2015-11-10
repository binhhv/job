<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/favicons/favicon-32x32.png" sizes="32x32">

    <!-- for IE -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>assets/favicons/favicon.ico" >
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/favicons/favicon.ico"/>
<?php if (isset($user)) {?>
<meta http-equiv="refresh" content="1200;url=<?php echo base_url('logout')?>"><?php }
?>
 <title><?php
if (isset($title) && strlen($title) > 0) {
	echo $title;
} else {
	echo $this->globals->getTitlePage();
}

?></title>
        <meta name="Robots" content="index, follow">
        <meta name="Description" content="ALLSHIGOTO là 1 cộng đồng nhân sự tiếng Nhật giữa người tìm việc và nhà tuyển dụng. ">
        <meta name="Keywords" content="việc làm,viec lam,tìm việc làm,tuyển dụng, tim viec lam, tuyen dung">
        <meta name="format-detection" content="telephone=no">
        <link rel="canonical" href="http://www.allshigoto.com">

        <meta property="og:image" content="<?php echo base_url();?>assets/main/img/header/allSHIGOTO.png">
        <meta property="og:title" content="Việc làm tiếng nhật tại Việt Nam và Nhật Bản">
        <meta property="og:type" content="website">
        <meta property="og:url" content="http://www.allshigoto.com">
        <meta property="og:description" content="ALLSHIGOTO là 1 cộng đồng nhân sự tiếng Nhật giữa người tìm việc và nhà tuyển dụng. ">

<!-- CSS
================================================== -->
<!-- <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'> -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/main/bootstrap/dist/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/main/css/modal/bootstrap-dialog.min.css"> -->

<!-- <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat"> -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/main/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/main/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/main/css/responsive-style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/main/css/style4189.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/main/flexslider/flexslider.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/main/bootstrap/dist/css/bootstrap-select.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/main/flexslider/flexslider-job.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/dataTables.bootstrap.min.css">
 <?php
if (isset($styleJob)) {
	foreach ($styleJob as $style) {?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . $style;?>">
  <?php }
}
?>
 <?php
if (isset($styleOption)) {
	foreach ($styleOption as $style) {?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . $style;?>">
  <?php }
}
?>



<!-- <link rel="stylesheet" href="<?php echo base_url()?>/assets/common/css/bootstrap-responsive.css"> -->
<!-- <link rel="stylesheet" href="<?php echo base_url()?>/assets/common/css/prettyPhoto.css" />
<link rel="stylesheet" href="<?php echo base_url()?>/assets/common/css/flexslider.css" />
<link rel="stylesheet" href="<?php echo base_url()?>/assets/common/css/custom-styles.css">
<link rel="stylesheet" href="<?php echo base_url()?>/assets/common/css/styles.css">
<link rel="stylesheet" href="<?php echo base_url()?>/assets/common/css/styles-responsive.css"> -->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" href="css/style-ie.css"/>
<![endif]-->
<!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- Favicons
================================================== -->
<!-- <link rel="shortcut icon" href="<?php echo base_url()?>/assets/common/img/favicon.ico">
<link rel="apple-touch-icon" href="<?php echo base_url()?>/assets/common/img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url()?>/assets/common/img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url()?>/assets/common/img/apple-touch-icon-114x114.png"> -->

<!-- JS
================================================== -->
<!-- <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->

<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<script src="<?php echo base_url()?>/assets/main/js/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>/assets/main/flexslider/jquery.flexslider.js"></script>
<script src="<?php echo base_url()?>/assets/main/js/job7vn.js"></script>

<script src="<?php echo base_url()?>/assets/main/js/cookies/jquery.cookie.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
 <!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>-->
 <!--<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>-->
 <script src="<?php echo base_url()?>/assets/main/js/jquery.placeholder.min.js"></script>
<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>

<script src="<?php echo base_url()?>/assets/main/js/employer/job7vn_employer.js"></script>
<script src="<?php echo base_url()?>/assets/main/js/job7vn-register.js"></script>
<script src="<?php echo base_url()?>/assets/main/js/dobPicker.min.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?php echo base_url()?>/assets/main/bootstrap/dist/js/bootstrap-select.js"></script>
<script src="<?php echo base_url()?>/assets/main/js/upload/ajaxfileupload.js"></script>
<script src="<?php echo base_url()?>/assets/main/js/fix-modal-show.js"></script>
<script src="<?php echo base_url()?>/assets/main/js/facebook-load.js"></script>
 <!-- <script src="<?php echo base_url()?>/assets/main/js/map/markerwithlabel.js"></script>-->
 <script type="text/javascript" src="<?php echo base_url()?>/assets/main/js/common.js"></script>
 <?php
if (isset($scriptJob)) {
	foreach ($scriptJob as $script) {?>
    <script src="<?php echo base_url() . $script;?>"></script>
  <?php }
}
?>
<!--<script src="<?php echo base_url()?>/assets/main/js/jquery4a80.js"></script>-->
<!-- <script src="<?php echo base_url()?>/assets/common/js/jquery.prettyPhoto.js"></script>
<script src="<?php echo base_url()?>/assets/common/js/jquery.flexslider.js"></script>
<script src="<?php echo base_url()?>/assets/common/js/jquery.custom.js"></script>
<script src="<?php echo base_url()?>/assets/common/js/b-scripts.js"></script>-->
<!-- Fullsized calendars -->
<script type="text/javascript">

// $(document).ready(function () {

//     $("#btn-blog-next").click(function () {
//       $('#blogCarousel').carousel('next')
//     });
//      $("#btn-blog-prev").click(function () {
//       $('#blogCarousel').carousel('prev')
//     });

//      $("#btn-client-next").click(function () {
//       $('#clientCarousel').carousel('next')
//     });
//      $("#btn-client-prev").click(function () {
//       $('#clientCarousel').carousel('prev')
//     });

// });

//  $(window).load(function(){

//     $('.flexslider').flexslider({
//         animation: "slide",
//         slideshow: true,
//         start: function(slider){
//           $('body').removeClass('loading');
//         }
//     });
// });
 $(function(){

    $('.flexslider').flexslider({
        animation: "slide",
        slideshow: true,
        start: function(slider){
          $('body').removeClass('loading');
           $('.sologan').show();
        },
        // direction:false,
        // controlsContainer: $(".custom-controls-container"),
        // customDirectionNav: $(".custom-navigation a")
    });

    $('.flexslider-job').flexslider({
        animation: "slide",
        slideshow: true,
        start: function(slider){

        },
        // direction:false,
        // controlsContainer: $(".custom-controls-container"),
        customDirectionNav: $(".custom-navigation a")
    });

    $('.flexslider-partner').flexslider({
        animation: "slide",
        slideshow: true,
        start: function(slider){

        },

        // controlsContainer: $(".custom-controls-container"),
        customDirectionNav: $(".custom-navigation-partner a")
    });

   //$('.sologan').show('slow').delay(10000).show('slow');
});
 </script>
<!--[if IE 8]>
    <style>.site-branding{float:none;}
    .site-primary-navigation{
      margin-top:-30px;
    }
    .sologan{
      width:100%;
    }
    .toggle-menu{
      margin-top:-20px;
    }
    footer{
      margin-bottom:-20px;
    }
    #page{
    margin-bottom:-86px;
    }
    </style>
    <script>
    $(document).ready(function(){
    $('input, textarea').placeholder();
     $('ul#menu-main-menu').each(function() {
          var taga = $(this).find('li');
          if(taga.find('ul').length){
              var w =(taga.find('a').width());

              taga.find('ul.sub-menu').css('margin-left',-w);
          }
      });
    });
    </script>
<![endif]-->
<script>
  var base_website = "<?php echo base_url();?>";
</script>
	</head>
	<body>
		<h1>tesst</h1>
		<script type="text/javascript">

	var arr = {};
	$(function(){
		for(var i = 0; i< 50; i ++){
			arr[i] =  Math.random() < 0.5 ? 0 : 1;
		}

		console.log(arr);

		for(var k in arr){
			if(arr[k] == 1){
				console.log(k);
			}
		}
	})
</script>
	</body>
	</html>


