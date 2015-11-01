<?php $slidesPage = $this->globals->getSlidePage();?>
<div class="row <?php if (!isset($slidesPage) && count($slidesPage) <= 0) {
	echo 'hide';
}
?>">
		<div class="col-lg-12 col-sm-12 col-md-12" style="position:relative">
			<div class="flexslider" >
	              <ul class="slides">
	              	<?php
//var_dump($slides);

foreach ($slidesPage as $value) {
	$jsonValue = json_decode($value->config_data_json, true);
	// echo $jsonValue['file_name']?>
	              			<li><a href="#"><img src="<?php echo base_url() . 'uploads/config/slide/' . $jsonValue['file_tmp'];?>" alt="slider" /></a></li>
	              		<?php }
?>

	               <!--  <li><a href="gallery-single.htm"><img src="<?php echo base_url();?>assets/common/img/gallery/bg1.jpg" alt="slider" /></a></li>
	                <li><a href="gallery-single.htm"><img src="<?php echo base_url();?>assets/common/img/gallery/bg2.jpg" alt="slider" /></a></li>
	                <li><a href="gallery-single.htm"><img src="<?php echo base_url();?>assets/common/img/gallery/bg3.jpg" alt="slider" /></a></li>
	                <li><a href="gallery-single.htm"><img src="<?php echo base_url();?>assets/common/img/gallery/bg4.jpg" alt="slider" /></a></li>
	                <li><a href="gallery-single.htm"><img src="<?php echo base_url();?>assets/common/img/gallery/bg5.jpg" alt="slider" /></a></li> -->
	              </ul>
	        </div>
	        <!-- <div class="custom-navigation">
		          <a href="#" class="flex-prev">Prev</a>

		          <a href="#" class="flex-next">Next</a>
		        </div> -->
	          	 <span class="sologan">
	          	 	<div class="text-slide">
	          	 		<div><label class="num-job-slide"><strong>768</strong></label>&nbsp;<label class="title-job-slide">công việc</label></div>
	          	 		<div><label style="display: block;color:#fff;font-size:15px;text-transform: none">đang chờ bạn ứng tuyển</label></div>
	          	 		<div> <button class="btn-apply-slide" >ỨNG TUYỂN NGAY</button></div>
	          	 	</div>

	          	 <!-- <button class="btn btn-info"><strong>Tìm việc</strong></button> -->
	             </span>
		</div>
	</div>