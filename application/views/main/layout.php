<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--Load head for website-->
    <?php echo $head;?>
</head>
<body>
      <!--Content website-->
    <ul class="share-btn-wrp">
        <li class="facebook button-wrap">Facebook</li>
        <li class="youtube button-wrap">Youtube</li>

    </ul>
    <a href="#" class="scrollToTop"></a>
      <div id="page" class="">
       <header id="header" class="site-header">
          <?php echo $header;?>
       </header>
       <div class="container-fluid no-padding">
            <?php echo $slide;?>
       </div>
        <div class="container-fluid no-padding">
          <div class="container">
            <?php echo $search;?>
          </div>
       </div>
        <div class="container-fluid no-padding new-job">
            <?php echo $newjob;?>
       </div>
        <div class="container-fluid jobseeker">
            <?php echo $jobseeker;?>
       </div>
       <div class="container-fuild employer">
          <?php echo $employer;?>
       </div>
       <div id="main" style="display: none;">
          <div class="container">
            <?php echo $content;?>
          </div>
       </div>
       <footer id="footer">
          <?php echo $footer;?>
       </footer>
      </div>

</body>
</html>