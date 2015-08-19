
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php
if (isset($titlePage)) {
	echo $titlePage;
} else {
	echo "JOB7VN Group";
}
?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- CSS
================================================== -->
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url()?>assets/main/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="<?php echo base_url();?>assets/main/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/main/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/main/css/responsive-style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/main/css/style4189.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/main/flexslider/flexslider.css">
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo base_url()?>/assets/main/js/bootstrap.js"></script>
<script src="<?php echo base_url()?>/assets/main/flexslider/jquery.flexslider.js"></script>
<script src="<?php echo base_url()?>/assets/main/js/job7vn.js"></script>
 <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
<!--<script src="<?php echo base_url()?>/assets/main/js/jquery4a80.js"></script>-->
<!-- <script src="<?php echo base_url()?>/assets/common/js/jquery.prettyPhoto.js"></script>
<script src="<?php echo base_url()?>/assets/common/js/jquery.flexslider.js"></script>
<script src="<?php echo base_url()?>/assets/common/js/jquery.custom.js"></script>
<script src="<?php echo base_url()?>/assets/common/js/b-scripts.js"></script>-->
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
        direction:false,
    });

   //$('.sologan').show('slow').delay(10000).show('slow');
});
 </script>
<!--[if IE 8]>
    <style>.site-branding{float:none;}
    .site-primary-navigation{
      margin-top:-30px;
    }

    </style>
    <script>
    $(document).ready(function(){
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