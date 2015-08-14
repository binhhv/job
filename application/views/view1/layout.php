<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--Load head for website-->
    <?php echo $head; ?>
</head>
<body>
      <!--Content website-->
      <div id="page" class="">
       <header id="header" class="site-header">
          <?php echo $header; ?>
       </header>
       <div id="main">
          <div class="container">
            <?php echo $content; ?>
          </div>
       </div>
       <footer id="footer">
          <?php echo $footer; ?>
       </footer>
      </div>

</body>
</html>