<div class="row">
		<div class="col-lg-12 col-sm-12 col-md-12" style="position:relative">
			<div class="flexslider" >
	              <ul class="slides">
	              	<?php
//var_dump($slides);
foreach ($slides as $value) {?>
	              			<li><a href="#"><img src="<?php echo base_url() . 'assets/main/img/slide/' . $value;?>" alt="slider" /></a></li>
	              		<?php }
?>

	               <!--  <li><a href="gallery-single.htm"><img src="<?php echo base_url();?>assets/common/img/gallery/bg1.jpg" alt="slider" /></a></li>
	                <li><a href="gallery-single.htm"><img src="<?php echo base_url();?>assets/common/img/gallery/bg2.jpg" alt="slider" /></a></li>
	                <li><a href="gallery-single.htm"><img src="<?php echo base_url();?>assets/common/img/gallery/bg3.jpg" alt="slider" /></a></li>
	                <li><a href="gallery-single.htm"><img src="<?php echo base_url();?>assets/common/img/gallery/bg4.jpg" alt="slider" /></a></li>
	                <li><a href="gallery-single.htm"><img src="<?php echo base_url();?>assets/common/img/gallery/bg5.jpg" alt="slider" /></a></li> -->
	              </ul>
	        </div>
	          	 <span class="sologan">
	          	 <span><h4>Chúng tôi đang có <strong>651</strong> tin tuyển dụng trong hôm nay</h4>.</span>
	              	 	<button class="btn btn-info" >Đăng tin</button>
	              	 	<button class="btn btn-danger">Tìm việc</button>
	             </span>
		</div>
	</div>