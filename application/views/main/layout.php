<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- <meta property="fb:app_id" content="1672938849618450"/>
    <meta property="fb:admins" content="100002246826429"/> -->
    <!--Load head for website-->
    <?php echo $head; ?>
</head>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=1672938849618450";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

      <!--Content website-->
   <!--  <ul class="share-btn-wrp">
        <li class="facebook button-wrap"></li>
        <li class="youtube button-wrap">Youtube</li>
        <li class="button-wrap">
          <span class="sp-facebook"><i class="fa fa-facebook"></i></span>
        </li>

    </ul> -->
    <a href="#" class="social-position ">
      <span class="sp-facebook"><i class="fa fa-facebook"></i></span>
    </a>
    <a href="#" class="social-position ">
      <span class="sp-youtube"><i class="fa fa-youtube-play"></i></span>
    </a>
    <a href="#" class="scrollToTop"></a>
    <?php if (isset($supportOnline)) {
	//echo $supportOnline;
}
?>
<?php
include 'support-online.php';
?>
      <div id="page" class="">
       <header id="header" class="site-header">
          <?php echo $header; ?>
       </header>
       <div id="main-page" <?php if (isset($isGray) && $isGray) {
	echo 'class="bg-gray-page"';
}
?>>
          <?php if (isset($content)) {
	echo $content;
}
?>
       </div>

       <footer id="footer">
          <?php echo $footer; ?>
       </footer>

       <!--modal advance-->
       <!--modal chose register-->
        <!-- Trigger the modal with a button -->
        <!-- <button type="button" class="btn btn-info btn-lg" >Open Modal</button> -->

        <!-- Modal register -->
        <div id="modalTypeRegister" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header background-color-3">
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                <h4 class="modal-title text-color-2"><?php echo lang('p_register'); ?></h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-6 margin-top-10">
                    <div class="col-sm-12 text-center icon-register-jobseeker">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="col-sm-12 text-center">
                      <button class="btn-jobseeker background-color-1 text-color-1" onclick="location.href='<?php echo base_url('register_uv'); ?>'"><?php echo lang('p_register_jobseeker'); ?></button>
                    </div>
                  </div>
                  <div class="col-sm-6 margin-top-10">
                      <div class="col-sm-12 text-center icon-register-employer">
                       <i class="fa fa-briefcase"></i>
                    </div>
                    <div class="col-sm-12 text-center">
                      <button class="btn-employer background-color-2 text-color-2" onclick="location.href='<?php echo base_url('register_ntd'); ?>'"><?php echo lang('p_register_employer'); ?></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
              <div class="row">
                <div class="col-sm-8 text-left">
                  <span class="hotline-modal">allSHIGOTO - 日本語を理解出来るコミユニテイ</span>
                  <small class="hotline-modal"><?php echo lang('m_hotline'); ?>: 01212 049 149</small>
                </div>
                <div class="col-sm-4 text-right">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo lang('m_close'); ?></button>
                </div>
              </div>

              </div>
            </div>

          </div>
        </div>

        <!--end modal type register-->
      </div>

</body>
</html>