
   <h1>Upload File</h1>
   <form method="post" action="" id="upload_file" enctype="multipart/form-data">
      <label>Title</label>
      <input type="text" name="title" id="title"/>

      <label>File</label>
      <input type="file" name="ufile" id="ufile"/>

      <input type="submit" name="submit" id="submit" value="Submit" />
      <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?=$csrf['hash'];?>" />
   </form>
   <h2>Files</h2>
   <div id="files"></div>

<script>
	//refresh_files();//Show ra list cac file da upload

	$(document).ready(function(){
		var cct = $("input[name=csrf_test_name]").val();
		//xu ly upload file
		$("#submit").click(function(){
			$.ajaxFileUpload({
				type: "POST",
				url : "<?php echo base_url();?>uploadcv/upload_file",
				secureuri : false,
				fileElementId : "ufile",
				dataType :"json",
				data : {"title" : $("#title").val(),  'csrf_test_name': cct},
				success : function(data, status){
					if(data.status != "error"){
						$("#files").html("<p>Loading....</p>");
						//refresh_files();
						$("#title").val("");
					}
					alert(data.msg);
				}
			});
			return false;
		}); //finish upload file
	})
</script>

