<?php
if (isset($cvs)) {
	foreach ($cvs as $value) {?>
		<div class="col-sm-12">
			<label>
				<input type="radio" name="cvuser" value="<?php echo $value->doccv_id ?>">
				<?php echo $value->doccv_code ?>

			</label>
			&nbsp;(<a class="download-cv" href="<?php echo base_url() . 'downloadcv/' . $value->doccv_map_user . '/' . $value->doccv_file_tmp . '/' . $value->doccv_file_name . '/1' ?>"><?php echo lang('job_download_cv'); ?></a>)
		</div>
		<?php }

	if (count($cvs) < 3) {
		?>
		<div class="col-sm-12">
		<label><input type="radio" name="cvuser" value="-1"><?php echo lang('job_upload_cv'); ?></label><label class="text-danger">(doc|docx|pdf)</label>

		<input type="file" class="form-control hide file-cv" name="cv" id="cv">
		<label class="text-danger error-file hide"></label>
		</div>
<?php }
	?>
<?php } else {
	echo lang('job_ms_no_cv') . '<a href="#" onclick="openModalCreateDocon" >' . lang('job_upload_cv') . '</a>';
}
?>
<script type="text/javascript">
	$('input:radio[name="cvuser"]').change(function(){
			$.ajax({
		        url: '<?php echo base_url() . "job/getToken" ?>',
		        type: "get",
		        dataType:'json',
		        success: function(data){
		        	$(".token").empty();
		        	var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
		        	$(".token").append(token);
		           //document.write(data); just do not use document.write
		           //console.log(data);
		          // callback(data);
		           //console.log(data.name);
		        }
		  });
		 if ($(this).val() == '-1') {
		 	$(".file-cv").removeClass('hide');
		 }
		 else{
		 	$(".file-cv").addClass('hide');

		 }
	});
</script>
