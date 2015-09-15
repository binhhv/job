<header class="main-header">

        <!-- Logo -->
        <a href="<?php echo base_url('admin');?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success notify-num-contact"></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu ul-notify-contact">

                    </ul>
                  </li>
                  <li class="footer"><a href="<?php echo base_url('admin/contact');?>">Xem tất cả liên hệ </a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning notify-num-support"></span>
                </a>
                <ul class="dropdown-menu">

                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu ul-notify-support">

                    </ul>
                  </li>
                  <li class="footer"><a href="<?php echo base_url('admin/support')?>">Xem tất cả tin nhắn</a></li>
                </ul>
              </li>

              <!-- User Account: style can be found in dropdown.less -->
             <li>
              <a href="<?php echo base_url('admin/logout');?>"><i class="fa fa-sign-out"></i> &nbsp;Đăng xuất</a>
              </li>
              <!-- Control Sidebar Toggle Button -->
             <!--  <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li> -->
            </ul>
          </div>
          <!--<div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less
              <li>
              <a href="<?php echo base_url('admin/logout');?>"><i class="fa fa-sign-out"></i> &nbsp;Đăng xuất</a>
              </li>
              <!-- Control Sidebar Toggle Button
             <!-- <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>-->

        </nav>
      </header>

