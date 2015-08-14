<!-- <div class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 text-center">
				<ul class="menu-language">
					<li>Tiếng việt &nbsp;<i class="fa fa-angle-down"></i>
						<ul>
							<li>
								<a href="#">Tiếng việt</a>
							</li>
							<li>
								<a href="#">English</a>
							</li>
							<li>
								<a href="#">Japanese</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">Register</a>
					</li>
					<li>
						<a href="#">Login</a>
					</li>
			
				</ul>
			</div>
		</div>
	</div>
</div> -->

<!-- <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li> 
        <li><a href="#">Page 3</a></li> 
      </ul>
    </div>
  </div>
</nav>
 -->
 <!-- <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" >
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li> 
        <li><a href="#">Page 3</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
 -->
<div class="site-header">
<div class="container">
 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <!-- <a class="navbar-brand" href="#">WebSiteName</a> -->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">JOB7VN <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Mục đích</a></li>
            <li><a href="#">Tiêu chí</a></li>
            <li><a href="#">Facebook JOB7VN</a></li>
            <li><a href="#">Cơ cấu tổ chức</a></li>
          </ul>
        </li>
        <li><a href="#">Tìm kiếm</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Việc làm <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Việc làm miền Bắc</a></li>
            <li><a href="#">Việc làm miền Trung</a></li>
            <li><a href="#">Việc làm miền Nam</a></li>
          </ul>
        </li>
        <li><a href="#">Contact us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tiếng việt <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Tiếng việt</a></li>
            <li><a href="#">English</a></li>
            <li><a href="#">Japanese</a></li>
          </ul>
        </li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Register</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
	</div>
	</div>
<div class="image-cover">
	<div class="container">
		<img src="<?php echo base_url().'assets/view2/img/cover/cover2.jpg'; ?>">
	</div>
</div>
<div class="search-box">
		<div class="container">
			<div class="row">
			<div class="col-sm-4 col-md-4 col-xs-12">
				<div class="logo">
					<img src="<?php echo base_url().'assets/view2/img/logo/logo.jpg' ?>">
					<h1 class="title-page">JOB7VN</h1>
				</div>
				
			</div>
			<div class="col-sm-8col-md-8 col-lg-8 col-xs-12 text-right">
			<div class="search-box">
				<div class="search-box-content">
					<form class="form-inline" role="form">
						
					  <div class="form-group ">
					    <input type="email" class="form-control" id="email" placeholder="Nhập từ khóa">
					  </div>
					  <div class="form-group ">
					    	<select class="form-control select-address input-large" data-width="100%">
					    		<option value="-1">Chọn địa điểm</option>
					    		<option value="-1">Hồ chí minh</option>
					    	</select>
					  </div>
					  <div class="form-group ">
					    	<select class="form-control select-address input-large" data-width="100%">
					    		<option value="-1">Chọn trình độ</option>
					    		<option value="-1">Hồ chí minh</option>
					    	</select>
					  </div>
					  <!-- <div class="form-group col-sm-3 col-md-3 col-xs-12">
					    <label for="pwd">Cấp bậc:</label>
					    <select class="form-control select-rank">
					    		<option value="-1">Tất cả</option>
					    		<option value="-1">Nhân viên</option>
					    		<option value="-1">Mới tốt nghiệp</option>
					    </select>
					  </div> -->
					  <div class="form-group ">
					  		<button type="submit" class="btn btn-danger btn-search">Tìm kiếm</button>
					  </div>
					 
					</form>
				</div>
			</div>
		</div>
	</div>
		</div>
</div>
<hr>
<!-- <div class="navbar-xs">
   <div class="navbar-primary">
       <nav class="navbar navbar-static-top" role="navigation">
         
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-8">
                 <span class="sr-only">Toggle navigation</span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Brand</a>
          </div>
       
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-8">
              <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Home</a></li>
                  <li><a href="#">Link</a></li>
                   <li><a href="#">Link</a></li>
              </ul>
          </div>
      </nav>
  </div>
</div> -->