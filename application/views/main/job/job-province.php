	<div class="container job-province">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="job-province-alert text-center">
				<?php if (isset($listJob) && count($listJob) > 0) {?>
					Có <span class="text-danger num-job-province"><?php echo count($listJob);?></span> việc làm tại <?php echo $province->province_name;?>
				<?php } else {?>
					Không có công việc nào.
				<?php }
?>
				</div>
			</div>

			<?php if (isset($listJob)) {
	foreach ($listJob as $value) {?>
				<div class="col-sm-8 col-sm-offset-2">
				<div class="job-province-item " onclick="location.href='<?php echo base_url('job') . '/' . str_replace(' ', '-', $value->rec_title) . '-' . $value->recmp_map_rec . '.html'?>'">
					<div class="row">
						<div class="col-sm-6">

							<label class="title"><?php echo $value->rec_title;?></label>
							<label class="data"><?php echo $value->employer_name;?></label>
						</div>
						<div class="col-sm-4">
							<label class="title">ngành nghề</label>
							<label class="data"><?php echo $value->career_name;?></label>
						</div>
						<div class="col-sm-2">
							<label class="title">mức lương</label>
							<label class="data"><?php echo $value->rec_salary;?></label>
						</div>
					</div>
				</div>
			</div>
				<?php }
}
?>
		</div>
	</div>