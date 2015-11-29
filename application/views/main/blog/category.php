<ul class="tags">
<?php if (isset($blogCategory)) {
	foreach ($blogCategory as $key => $value) {?>
		<li><a href="<?php echo base_url('blog/category') . '/' . str_replace(' ', '-', $value->cblog_name) . '-' . $value->cblog_id; ?>"><?php echo $value->cblog_name . '(' . $value->numBlog . ')'; ?></a></li>
	<?php }
}
?>


</ul>