	<div class="container job-province">

		<div class="row">
		<div class="col-sm-4 col-sm-push-8">
			<!-- <div class="col-sm-12 "> -->
				<div class="job-province-box">
				<?php if (isset($searchHorizontal)) {
	echo $searchHorizontal;
}
?>
			</div>
		<!-- </div> -->
		</div>
		<div class="col-sm-8 col-sm-pull-4">

		<!-- <div class="col-sm-12"> -->
				<div class="job-province-alert text-center">
				<?php if (isset($listJob) && count($listJob) > 0) {?>
				<h1 class="numjob-province-title">Tìm thấy&nbsp;<label> <?php echo $numjob;?></label> việc làm </h1>
					<div class="border-bottom-title border-color-1"></div>
					<!-- Có <span class="text-danger num-job-province"><?php echo count($listJob);?></span> việc làm tại <?php echo $province->province_name;?> -->
				<?php } else {?>
					Không tìm thấy việc làm nào.
				<?php }
?>
				</div>
			<!-- </div> -->
			<div class="job-province-box <?php if (!isset($listJob) || count($listJob) <= 0) {
	echo 'hide';
}
?>">
			<?php if (isset($listJob)) {
	//var_dump($listJob);
	foreach ($listJob as $value) {?>
				<!-- <div class="col-sm-12"> -->
				<div class="job-province-item" onclick="location.href='<?php echo base_url('job') . '/' . str_replace(' ', '-', $value->rec_title) . '-' . $value->recmp_map_rec . '.html'?>'">
					<div class="row">
						<div class="col-sm-6  col-xs-12">

							<label class="title text-color-3"><strong><?php echo (strlen($value->rec_title) > 30) ? substr($value->rec_title, 0, 30) . '...' : $value->rec_title;?></strong></label>
							<label class="data"><?php echo $value->employer_name;?></label>
						</div>
						<div class="col-sm-4 col-xs-6">
							<label class="title"><i class="fa fa-tag"></i>&nbsp;<?php echo $value->career_name;?></label>
							<label class="data"><i class="fa fa-money"></i>&nbsp;<?php echo $value->salary_value;?></label>
						</div>
						<div class="col-sm-2 col-xs-6">
							<label class="title"><i class="fa fa-calendar-o"></i>&nbsp;<?php echo date('d/m/Y', strtotime($value->rec_job_time));?></label>
							<label class="data"><i class="fa fa-map-marker"></i>&nbsp;<?php echo $value->province_name;?></label>
						</div>
					</div>
				</div>
				<div class="job-line-province-item"></div>
			<!-- </div> -->
				<?php }
	?>

	<div class="text-center job-province-item ">
		<?php if (isset($pagination)) {
		echo $pagination;
	}
	?>
	</div>

<?php }
?>


	</div>
	</div>

		</div>
	</div>