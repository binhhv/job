
	<div class="container employer-page">
		<div class="row">

			<div class="col-sm-8 col-sm-push-4 no-padding-res">
			<?php if (isset($breadcrumb)) {
	echo $breadcrumb;
}
?>
			<?php if (isset($contentEmployer)) {
	echo $contentEmployer;
}
?>
			</div>
			<div class="col-sm-4 col-sm-pull-8 no-padding-res">
				<div class="row">
					<div class="col-sm-12">
						<?php echo $employer_menu;?>

					</div>
				</div>
			</div>




		</div>
	</div>
	<?php echo $update_account_employer?>
