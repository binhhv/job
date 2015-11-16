	<?php $listJobShow = $this->globals->getRecruitmentShow(1);
$imageRecruitment = $this->globals->getImageBackgroundRecruitment();
$objectImgRecruitment = json_decode($imageRecruitment, true);
if (isset($listJobShow) && count($listJobShow) > 0) {

	$strSlideJob = '';
	$strSlideJobsm = '';
	$strSlideJobxs = '';
	$i = 1;
	$j = 1;
	$k = 1;foreach ($listJobShow as $value) {

		/*----------------------------------------------*/
		//get job to slide new job to screen md
		if ($i % 3 == 1) {
			$strSlideJob .= '<li><div class="row  list-item-new-job">';
		}
		$strSlideJob .= '<div class="col-md-4 text-center p-relative';
		// if ($i % 3 == 1 || $i % 3 == 0) {
		// 	$strSlideJob .= 'hide-job-responsive-760';
		// }
		$strSlideJob .= '">';
		$strSlideJob .= '<a href="' . base_url('job') . '/' . str_replace(' ', '-', $value->rec_title) . '-' . $value->rec_id . '.html' . '" class="item-new-job ">'; //dp-inline-block
		$strSlideJob .= '<div class="title-new-job text-left">';
		$strSlideJob .= '<p class="bg-title-new-job"><label>' . $value->rec_title . '</label>';
		$strSlideJob .= '<small>' . $value->employer_name . '</small>';
		$strSlideJob .= '</p></div>';
		$strSlideJob .= '<img src="' . base_url() . "uploads/config/imgRecruitment/" . $objectImgRecruitment["file_tmp"] . '">';
		$strSlideJob .= '</a></div>';
		if ($i % 3 == 0) {
			$strSlideJob .= '</div></li>';
		}

		/*------------------------------------------------*/

		/*------------------------------------------------*/
		//get job to slide new job to screen sm
		if ($j % 2 == 1) {
			$strSlideJobsm .= '<li><div class="row list-item-new-job">';
		}
		$strSlideJobsm .= '<div class="col-sm-6 text-center p-relative';
		// if ($i % 3 == 1 || $i % 3 == 0) {
		// 	$strSlideJobsm .= 'hide-job-responsive-760';
		// }
		$strSlideJobsm .= '">';
		$strSlideJobsm .= '<a href="' . base_url('job') . '/' . str_replace(' ', '-', $value->rec_title) . '-' . $value->rec_id . '.html' . '" class=" item-new-job">';
		$strSlideJobsm .= '<div class="title-new-job text-left">';
		$strSlideJobsm .= '<p class="bg-title-new-job"><label>' . $value->rec_title . '</label>';
		$strSlideJobsm .= '<small>' . $value->employer_name . '</small>';
		$strSlideJobsm .= '</p></div>';
		$strSlideJobsm .= '<img src="' . base_url() . "uploads/config/imgRecruitment/" . $objectImgRecruitment["file_tmp"] . '">';
		$strSlideJobsm .= '</a></div>';
		if ($j % 2 == 0) {
			$strSlideJobsm .= '</div></li>';
		}
		/*-------------------------------------------------*/

		/*------------------------------------------------*/
		//get job to slide new job to screen xs
		$strSlideJobxs .= '<li><div class="row  list-item-new-job">';
		$strSlideJobxs .= '<div class="col-xs-12 text-center p-relative';
		$strSlideJobxs .= '">';
		$strSlideJobxs .= '<a href="' . base_url('job') . '/' . str_replace(' ', '-', $value->rec_title) . '-' . $value->rec_id . '.html' . '" class=" item-new-job ">';
		$strSlideJobxs .= '<div class="title-new-job text-left">';
		$strSlideJobxs .= '<p class="bg-title-new-job"><label>' . $value->rec_title . '</label>';
		$strSlideJobxs .= '<small>' . $value->employer_name . '</small>';
		$strSlideJobxs .= '</p></div>';
		$strSlideJobxs .= '<img src="' . base_url() . "uploads/config/imgRecruitment/" . $objectImgRecruitment["file_tmp"] . '">';
		$strSlideJobxs .= '</a></div></div></li>';
		/*-------------------------------------------------*/
		$i++;
		$j++;
		$k++;
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
			<!--md-->
			<div class="flexslider-job slide-job-md" >
	            <ul class="slides">

	              <?php echo $strSlideJob;?>

	          	</ul>
	          	<!-- <ul class="slides slide-job-sm">
	          	<?php echo $strSlideJobsm;?>
	          	</ul>
	          	<ul class="slides slide-job-xs">
	          	<?php echo $strSlideJobxs;?>
	            </ul> -->
	        </div>
	        <!--sm-->
	        <div class="flexslider-job slide-job-sm" >
	            <!-- <ul class="slides slide-job-md">

	              <?php echo $strSlideJob;?>

	          	</ul> -->
	          	<ul class="slides">
	          		<?php echo $strSlideJobsm;?>
	          	</ul>
	          	<!-- <ul class="slides slide-job-xs">
	          	<?php echo $strSlideJobxs;?>
	            </ul> -->
	        </div>
	        <!--xs-->
	        <div class="flexslider-job slide-job-xs" >
	            <!-- <ul class="slides slide-job-md">

	              <?php echo $strSlideJob;?>

	          	</ul>
	          	<ul class="slides slide-job-sm">
	          	<?php echo $strSlideJobsm;?>
	          	</ul> -->
	          	<ul class="slides">
	          		<?php echo $strSlideJobxs;?>
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