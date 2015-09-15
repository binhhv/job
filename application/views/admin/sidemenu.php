<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url();?>assets/admin/dist/img/supportonline/icon_black.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $email?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <!-- <li class="header">MAIN NAVIGATION</li> -->
            <li class="treeview"><a href="<?php echo base_url('')?>"><i class="fa fa-home"></i> <span>allSHIGOTO Page</span></a></li>
            <li class="<?php if (isset($selected) && $selected == 'recruitmentManager') {echo 'active';}
?> treeview">
              <a href="#">
                <i class="fa fa-newspaper-o"></i>
                <span>Quản lý tin tuyển dụng</span>
                <!-- <span class="label label-primary pull-right">4</span> -->
              </a>
              <ul class="treeview-menu">
              <li <?php if (isset($sub) && $sub == 'recruitmentCreate') {
	echo "class=\"active\"";
}
?>><a href="<?php echo base_url('admin/recruitment');?>"><i class="fa fa-circle-o"></i>Tạo tin tuyển dụng</a></li>
                <li <?php if (isset($sub) && $sub == 'recruitmentActive') {
	echo "class=\"active\"";
}
?>><a href="<?php echo base_url('admin/recruitment/recruitment-active');?>"><i class="fa fa-circle-o"></i> Tin tuyển dụng đã đăng</a></li>
                <li <?php if (isset($sub) && $sub == 'recruitmentApprove') {
	echo "class=\"active\"";
}
?>><a href="<?php echo base_url('admin/recruitment/recruitment-approve');?>"><i class="fa fa-circle-o"></i> Tin tuyển dụng chờ duyệt</a></li>
                <li <?php if (isset($sub) && $sub == 'recruitmentDisabled') {
	echo "class=\"active\"";
}
?>><a href="<?php echo base_url('admin/recruitment/recruitment-disabled');?>"><i class="fa fa-circle-o"></i> Tin tuyển dụng hết hạn</a></li>
                <!-- <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li> -->
              </ul>
            </li>
            <li class="<?php if (isset($selected) && $selected == 'userManager') {echo 'active';}
?> treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Quản lý người dùng</span>
                <!-- <span class="label label-primary pull-right">4</span> -->
              </a>
              <ul class="treeview-menu">
                <li <?php if (isset($sub) && $sub == 'jobseeker') {
	echo "class=\"active\"";
}
?>>
                  <a href="<?php echo base_url('admin/jobseeker');?>"><i class="fa fa-circle-o"></i> Người tìm việc</a>
                  <!-- <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul> -->
                </li>
                <li <?php if (isset($sub) && $sub == 'employer') {
	echo "class=\"active\"";
}
?>><a href="<?php echo base_url('admin/employer');?>"><i class="fa fa-circle-o"></i> Nhà tuyển dụng</a></li>

               <?php if (isset($role) && $role == '1') {
	?>
                    <li <?php if (isset($sub) && $sub == 'manager') {
		echo "class=\"active\"";
	}
	?> ><a href="<?php echo base_url('admin/manager');?>"><i class="fa fa-circle-o"></i> Quản trị viên</a></li>
               <?php }
?>

              </ul>
            </li>
             <li class="<?php if (isset($selected) && $selected == 'documentManager') {echo 'active';}
?> treeview">
              <a href="#">
                <i class="fa fa-database"></i> <span>Quản lý dữ liệu</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li <?php if (isset($sub) && $sub == 'doccv') {
	echo "class=\"active\"";
}
?> ><a href="<?php echo base_url('admin/document/cv');?>"><i class="fa fa-circle-o"></i>CV ứng viên</a></li>
<!-- <li <?php if (isset($sub) && $sub == 'doccvad') {
	echo "class=\"active\"";
}
?> ><a href="<?php echo base_url('admin/document/cv-store');?>"><i class="fa fa-circle-o"></i>CV lưu trữ</a></li> -->
                <li <?php if (isset($sub) && $sub == 'docon') {
	echo "class=\"active\"";
}
?> ><a href="<?php echo base_url('admin/document/form');?>"><i class="fa fa-circle-o"></i>Hồ sơ ứng viên</a></li>

<!-- <li <?php if (isset($sub) && $sub == 'doconad') {
	echo "class=\"active\"";
}
?> ><a href="<?php echo base_url('admin/document/form-store');?>"><i class="fa fa-circle-o"></i>Hồ sơ lưu trữ</a></li> -->
              </ul>
            </li>
            <!-- <li>
              <a href="pages/widgets.html">
                <i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">new</small>
              </a>
            </li> -->
            <li class="<?php if (isset($selected) && $selected == 'comingsoon') {echo 'active';}
?> treeview">
              <a href="<?php echo base_url('admin/category')?>">
                <i class="fa fa-files-o"></i>
                <span>Quản lý danh mục</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             <!--  <ul class="treeview-menu">

                <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i>Tỉnh/thành phố</a></li>
                <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Sức khỏe</a></li>
                <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i>Hình thức công việc </a></li>
                <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i>Trình độ năng lực </a></li>
                <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i>Phúc lợi</a></li>
                <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i>Ứng viên lưu trữ</a></li>
              </ul> -->
            </li>
            <li class="<?php if (isset($selected) && $selected == 'comingsoon') {echo 'active';}
?> treeview">
              <a href="<?php echo base_url('admin/setup')?>">
                <i class="fa fa-cogs"></i>
                <span>Thiết lập website</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <!-- <ul class="treeview-menu">
                <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> Thiết lập quảng cáo</a></li>
                <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Thay đổi hình ảnh slide</a></li>
                <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Thay đổi logo</a></li>
                <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Thay đổi tiêu đề website</a></li>
                <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Thay đổi footer</a></li>
                <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Thay đổi trang giới thiệu</a></li>
              </ul> -->
            </li>
            <!-- <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Forms</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Tables</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
              </ul>
            </li>
            <li>
              <a href="pages/calendar.html">
                <i class="fa fa-calendar"></i> <span>Calendar</span>
                <small class="label pull-right bg-red">3</small>
              </a>
            </li>
            <li>
              <a href="pages/mailbox/mailbox.html">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <small class="label pull-right bg-yellow">12</small>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Examples</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Multilevel</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                    <li>
                      <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
              </ul>
            </li>
            <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li> -->
            <li class="<?php if (isset($selected) && $selected == 'contact') {echo 'active';}
?> treeview"><a href="<?php echo base_url('admin/contact')?>"><i class="fa fa-envelope"></i> <span>Hộp thư liên hệ</span></a></li>
            <li><a href="<?php echo base_url('admin/logout')?>"><i class="fa fa-sign-out"></i> &nbsp;<span>Đăng xuất</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>