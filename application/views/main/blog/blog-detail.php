<div class="job-province-box blog-box">
				<h3 class="blog-title">
					<a><?php echo $blogDetail->blog_title; ?></a>
				</h3>
				<h4 class="blog-created">
					 <b><?php echo lang('blog_created_at'); ?></b> : <?php echo date('d/m/Y', strtotime($blogDetail->blog_created_at)); ?>
				</h4>
				<hr>
				<div class="blog-content">
					<!-- <div class="col-sm-4 blog-content-left">
						<img class="blog-image img-responsive" src="<?php echo base_url() ?>assets/main/img/adwords/img-adwords-1.jpg">
					</div>
					<div class="col-sm-8 bog-content-right">
						abc abc abc
					</div> -->
				<b><?php echo $blogDetail->blog_introduce; ?></b><br>

				<?php echo $blogDetail->blog_content; ?>
				</div>
				<!-- <div class="clear"></div>
				<div class="blog-footer text-right">
					<button class="btn btn-primary">Doc tiep</button>
				</div> -->
</div>