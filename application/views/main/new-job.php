	<?php $listJobShow = $this->globals->getRecruitmentShow(1);
$imageRecruitment = $this->globals->getImageBackgroundRecruitment();
$objectImgRecruitment = json_decode($imageRecruitment, true);
if (isset($listJobShow) && count($listJobShow) > 0) {

	$strSlideJob = '';
	$i = 1;foreach ($listJobShow as $value) {
		if ($i % 3 == 1) {
			$strSlideJob .= '<li><div class="row  list-item-new-job">';
		}
		$strSlideJob .= '<div class="col-sm-4 col-xs-12 text-center ';
		if ($i % 3 == 1 || $i % 3 == 0) {
			$strSlideJob .= 'hide-job-responsive-760';
		}
		$strSlideJob .= '">';
		$strSlideJob .= '<a href="' . base_url('job') . '/' . str_replace(' ', '-', $value->rec_title) . '-' . $value->rec_id . '.html' . '" class=" item-new-job dp-inline-block">';
		$strSlideJob .= '<span class="title-new-job text-left">';
		$strSlideJob .= '<label>' . $value->rec_title . '</label>';
		$strSlideJob .= '<small>' . $value->employer_name . '</small>';
		$strSlideJob .= '</span>';
		$strSlideJob .= '<img src="' . base_url() . "uploads/config/imgRecruitment/" . $objectImgRecruitment["file_tmp"] . '">';
		$strSlideJob .= '</a></div>';
		if ($i % 3 == 0) {
			$strSlideJob .= '</div></li>';
		}

		$i++;
	}

	?>

	<div class="row">
		<div class="col-sm-12 text-center">
			<h1 class="title-new-job">VIỆC LÀM HOT</h1>
			<div class="border-bottom-title border-color-2"></div>
		</div>
	</div>
	<div class="container">

<div class="row slide-new-job">
		<div class="col-lg-12 col-sm-12 col-md-12" style="position:relative">
			<div class="flexslider-job" >
	              <ul class="slides">

	              <?php echo $strSlideJob;?>
	              			<!-- <li>
	              				<div class="row  list-item-new-job">
	              					<div class="col-sm-4 col-xs-12 text-center">
	              					<a href="#" class=" item-new-job dp-inline-block">
	              					<span class="title-new-job text-left">
	              						<label>ádasd</label>
	              						<small>ádasdsd</small>
	              					</span>
	              					<img src="<?php echo base_url() . 'uploads/config/imgRecruitment/' . $objectImgRecruitment['file_tmp'];?>">
	              					</a></div>


	              					<div class="col-sm-4 col-xs-6 hide-job-responsive-760">
	              					<div class=" item-new-job">
	              					<img src="<?php echo base_url();?>assets/main/img/job/new-job-item.png">
	              					</div></div>
	              					<div class="col-sm-4 col-xs-6 hide-job-responsive-760">
	              					<div class=" item-new-job">
	              					<img src="<?php echo base_url();?>assets/main/img/job/new-job-item.png">
	              					</div></div>
	              				</div>
	              			</li> -->
	              			<!-- <li>
	              				<div class="row  list-item-new-job">
	              					<div class="col-sm-4 col-xs-12">
	              					<div class=" item-new-job">
	              					<img src="<?php echo base_url();?>assets/main/img/job/new-job-item.png">
	              					</div></div>
	              					<div class="col-sm-4 col-xs-6 hide-job-responsive-760">
	              					<div class=" item-new-job">
	              					<img src="<?php echo base_url();?>assets/main/img/job/new-job-item.png">
	              					</div></div>
	              					<div class="col-sm-4 col-xs-6 hide-job-responsive-760">
	              					<div class=" item-new-job">
	              					<img src="<?php echo base_url();?>assets/main/img/job/new-job-item.png">
	              					</div></div>
	              				</div>
	              			</li>
	              			<li>
	              				   <div class="row  list-item-new-job">
	              					<div class="col-sm-4 col-xs-12">
	              					<div class=" item-new-job">
	              					<img src="<?php echo base_url();?>assets/main/img/job/new-job-item.png">
	              					</div></div>
	              					<div class="col-sm-4 col-xs-6 hide-job-responsive-760">
	              					<div class=" item-new-job">
	              					<img src="<?php echo base_url();?>assets/main/img/job/new-job-item.png">
	              					</div></div>
	              					<div class="col-sm-4 col-xs-6 hide-job-responsive-760">
	              					<div class=" item-new-job">
	              					<img src="<?php echo base_url();?>assets/main/img/job/new-job-item.png">
	              					</div></div>
	              				</div>
	              			</li>
	              			<li>
	              				      <div class="row  list-item-new-job">
	              					<div class="col-sm-4 col-xs-12">
	              					<div class=" item-new-job">
	              					<img src="<?php echo base_url();?>assets/main/img/job/new-job-item.png">
	              					</div></div>
	              					<div class="col-sm-4 col-xs-6 hide-job-responsive-760">
	              					<div class=" item-new-job">
	              					<img src="<?php echo base_url();?>assets/main/img/job/new-job-item.png">
	              					</div></div>
	              					<div class="col-sm-4 col-xs-6 hide-job-responsive-760">
	              					<div class=" item-new-job">
	              					<img src="<?php echo base_url();?>assets/main/img/job/new-job-item.png">
	              					</div></div>
	              				</div>
	              			</li> -->

	               <!--  <li><a href="gallery-single.htm"><img src="<?php echo base_url();?>assets/common/img/gallery/bg1.jpg" alt="slider" /></a></li>
	                <li><a href="gallery-single.htm"><img src="<?php echo base_url();?>assets/common/img/gallery/bg2.jpg" alt="slider" /></a></li>
	                <li><a href="gallery-single.htm"><img src="<?php echo base_url();?>assets/common/img/gallery/bg3.jpg" alt="slider" /></a></li>
	                <li><a href="gallery-single.htm"><img src="<?php echo base_url();?>assets/common/img/gallery/bg4.jpg" alt="slider" /></a></li>
	                <li><a href="gallery-single.htm"><img src="<?php echo base_url();?>assets/common/img/gallery/bg5.jpg" alt="slider" /></a></li> -->
	              </ul>
	        </div>
	        <div class="custom-navigation">
		          <a href="#" class="flex-prev">
		          	<img src="<?php echo base_url()?>assets/main/img/job/arrow-left.png">
		          </a>

		          <a href="#" class="flex-next">
		          <img src="<?php echo base_url()?>assets/main/img/job/arrow-right.png">
		          </a>
		        </div>

	</div>
	</div></div>

	<?php }
?>