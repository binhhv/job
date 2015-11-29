<?php if (isset($blogPagination) && count($blogPagination) > 0) {
	foreach ($blogPagination as $key => $value) {?>
<div class="job-province-box blog-box">
				<h3 class="blog-title">
					<a href="<?php echo base_url('blog') . '/' . str_replace(' ', '-', $value->blog_title) . '-' . $value->blog_id; ?>"><?php echo $value->blog_title; ?></a>
				</h3>
				<h4 class="blog-created">
					 <b>Ngày đăng</b> : <?php echo date('d/m/Y', strtotime($value->blog_created_at)); ?>
				</h4>
				<hr>
				<div class="blog-content">
					<div class="col-sm-4 blog-content-left">
						<img class="blog-image img-responsive" src="<?php echo base_url() . 'uploads/blog/' . $value->blog_id . '/' . $value->blog_image_tmp; ?>">
					</div>
					<div class="col-sm-8 bog-content-right">
						<b><?php echo (strlen($value->blog_introduce) > 200) ? substr($value->blog_introduce, 0, 200) . '...' : $value->blog_introduce; ?></b>
					</div>
				</div>
				<div class="clear"></div>
				<div class="blog-footer text-right">
					<a href="<?php echo base_url('blog') . '/' . str_replace(' ', '-', $value->blog_title) . '-' . $value->blog_id; ?>" class="btn btn-primary"><?php echo lang('m_read_more'); ?></a>
				</div>
</div>
<?php }
} else {?>
	<div class="text-center job-province-box blog-box">
		<?php echo lang('blog_no_blog'); ?>
	</div>
 <?php }
?>
	<?php if (isset($pagination) && strlen($pagination) > 0) {?>
<div class="text-center job-province-box blog-box">

	<?php echo $pagination; ?>

</div>
<?php }
?>