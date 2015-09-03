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
       <div id="main">
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