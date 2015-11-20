<?php
if (isset($docs)) {
	foreach ($docs as $value) {?>
		<div class="col-sm-12">
			<label>
				<input type="radio" name="docuser" value="<?php echo $value->docon_id ?>">
				<?php echo $value->docon_code ?>

			</label>
			&nbsp;(<span class="view-doc" data-id="<?php echo $value->docon_id ?>"><?php echo lang('job_view_resume_online'); ?></span>)
		</div>
		<?php }

	if (count($docs) < 3) {
		?>
		<div class="col-sm-12">
		<label>
			<input type="radio" name="docuser" value="-1" data-id="<?php echo $value->docon_id ?>"><?php echo lang('job_create_resume_online'); ?>

		</label>
		<!-- <a class="create-doc-user" href="#" onclick="openModalCreateDocon" >Tạo hồ sơ mới</a> -->
		</div>
		<div class="col-sm-10 token hide"></div>
		<!-- <div class="col-sm-12 hide">
			<div id="token-name"></div>
			<div id="token-hash"></div>
		</div> -->
<?php }
	?>
<?php } else {
	echo lang('job_ms_no_resume') . '<a href="#" onclick="openModalCreateDocon" >' . lang('job_create_resume_online') . '</a>';
}
?>
<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-document" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content content-document">

    </div>
 </div>
</div>
<script type="text/javascript">
	 $(".view-doc").on("click",function(){
    	//alert("123123");
    	var id = $(this).data('id');
    	 $.ajax({
        url: '<?php echo base_url() . "job/getDetailDoc/" ?>'+id,
        type: "get",
        dataType:'html',
        success: function(data){
           //document.write(data); just do not use document.write
           //console.log(data);
           $(".content-document").empty();
           $(".content-document").append(data);
            var h = document.documentElement.clientHeight;//window.innerHeight;
    		h = (h*70)/100;
    		var top = $(".title-job-scroll").height();
    		$(".modal-content").css({"height":h,"overflow":"auto","margin-top":top + 20});
           $('#modal-document').modal('show');
           //console.log(data.name);
           //alert(data);
        }
      });
    });

	 $('input:radio[name="docuser"]').change(function(){
	 	//alert("123123");
			$.ajax({
		        url: '<?php echo base_url() . "job/getToken" ?>',
		        type: "get",
		        dataType:'json',
		        success: function(data){
		        	//$("#token-name").empty();
		        	$(".token").empty();
		        	var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
		        	$(".token").append(token);
		        	//alert(token);
		        	//$("#token-hash").val(data);
		           //document.write(data); just do not use document.write
		           //console.log(data);
		          // callback(data);
		           //console.log(data);
		        },
		        error:function (xhr, ajaxOptions, thrownError){
					alert(thrownError);
					//On error, we alert user
					//$("#alert-error-contact").removeClass('hide');
					//alert(thrownError);
				}
		  });
		 if ($(this).val() == '-1') {
		 	var id = $(this).data('id');
		    	 $.ajax({
		        url: '<?php echo base_url() . "job/getCreateForm/" ?>'+id,
		        type: "get",
		        dataType:'html',
		        success: function(data){
		           //document.write(data); just do not use document.write
		           //console.log(data);
		           $(".content-create-document").empty();
		           $(".content-create-document").append(data);
		            var h = document.documentElement.clientHeight;//window.innerHeight;
		    		h = (h*70)/100;
		    		var top = $(".title-job-scroll").height();
		    		$(".modal-content").css({"height":h,"overflow":"auto","margin-top":top + 20});
		           $('#modal-create-document').modal('show');
		           //console.log(data.name);
		           //alert(data);
		        }
		      });
		 }

	});
$('#modal-create-document').on('hidden.bs.modal', function () {
  // do something…
 $('input:radio[name="docuser"]').attr("checked",false);
})


</script>

<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-create-document" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content content-create-document">

    </div>
 </div>
</div>

