<?php if (isset($blogCurrent) && count($blogCurrent) > 0) {
	?>
	<div class="job-hight-light job-province-box">
				<div class="job-province-box">


<div class=" text-center background-color-3 margin-bottom-5 fix-blog-category">
	<h1 class="title-job-hight-light"><?php echo lang('blog_title_current') ?></h1>

</div>
<?php foreach ($blogCurrent as $key => $value) {?>
<div class="row blog-box blog-category">
	<div class="col-sm-4"><a href="<?php echo base_url('blog') . '/' . str_replace(' ', '-', $value->blog_title) . '-' . $value->blog_id; ?>">
		<img  src="<?php echo base_url() . 'uploads/blog/' . $value->blog_id . '/' . $value->blog_image_tmp; ?>" class="img-responsive blog-category-image">
		</a>
	</div>
	<div class="col-sm-8">
		<a href="<?php echo base_url('blog') . '/' . str_replace(' ', '-', $value->blog_title) . '-' . $value->blog_id; ?>" class="title-blog-category"><?php echo (strlen($value->blog_title) > 60) ? substr($value->blog_title, 0, 60) . '...' : $value->blog_title; ?></a>
		<p class="content-blog-category"><?php echo (strlen($value->blog_introduce) > 100) ? substr($value->blog_introduce, 0, 100) . '...' : $value->blog_introduce; ?></p>
	</div>
</div>
<?php }
	?>
				</div>

			</div>
<?php }
?>