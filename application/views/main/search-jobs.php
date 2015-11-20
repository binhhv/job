<div class="row">
		<div class="col-sm-12 col-md-12 col-xs-12">
			<div class="search-box-2">
			<div class=" text-center background-color-3 margin-bottom-5">
					<h1 class="title-search-horizontal"><?php echo lang('s_title'); ?></h1>
					<!-- <div class="border-bottom-title border-color-1"></div> -->
				</div>
				<div class="row search-box-content">
					<div class="col-sm-12 col-md-12 col-xs-12">
					<form role="form" id="sform">
				<div class="content-search-detail-box">

					  <div class="form-group col-sm-12 col-md-12 col-xs-12">
					    <input <?php if ($keyWord != "all") {
	echo 'value="' . $keyWord . '"';
}
?> name="key-word" id="key-word" placeholder="<?php echo lang('s_keyword'); ?>" type="text" class="form-control"  style="height: 39px;">
					  </div>
					  <div class="form-group col-sm-12 col-md-12 col-xs-12">
					  	<label><?php echo lang('s_title_province'); ?>:</label>
					   	<select class="fomr-control" name="province" id="province">
					   		<option value="-1"><?php echo lang('s_chose_province'); ?></option>
					   		<?php if (isset($province)) {
	foreach ($province as $value) {
		?>
					   				<option <?php if (isset($keyArr[0]) && array_values($keyArr[0])[0] == $value->province_id) {
			echo 'selected';
		}
		?> value="<?php echo $value->province_id; ?>"><?php echo $value->province_name; ?></option>
					   			<?php }
}
?>
					   	</select>
					  </div>
					  <div class="form-group col-sm-12 col-md-12 col-xs-12">
					  <label><?php echo lang('s_title_career'); ?>:</label>
					   	<select class="fomr-control" name="career" id="career">
					   		<option value="-1"><?php echo lang('s_chose_career'); ?></option>
					   		<?php if (isset($career)) {
	foreach ($career as $value) {
		?>
					   				<option <?php if (isset($keyArr[5]) && array_values($keyArr[5])[0] == $value->career_id) {
			echo 'selected';
		}
		?> value="<?php echo $value->career_id; ?>"><?php echo $value->career_name; ?></option>
					   			<?php }
}
?>
					   	</select>
					  </div>
					  <div class="form-group col-sm-12 col-md-12 col-xs-12">
					  <label><?php echo lang('s_title_salary'); ?>:</label>
					   	<select class="fomr-control" name="salary" id="salary">
					   		<option value="-1"><?php echo lang('s_chose_salary'); ?></option>
					   		<?php if (isset($salary)) {
	foreach ($salary as $value) {
		?>
					   				<option <?php if (isset($keyArr[1]) && array_values($keyArr[1])[0] == $value->salary_id) {
			echo 'selected';
		}
		?> value="<?php echo $value->salary_id; ?>"><?php echo $value->salary_value; ?></option>
					   			<?php }
}
?>
					   	</select>
					  </div>
					  <div class="form-group col-sm-12 col-md-12 col-xs-12">
					  <label><?php echo lang('s_title_sex'); ?>:</label>
					  <?php if (isset($keyArr[2])) {$valueSex = array_values($keyArr[2])[0];} else { $valueSex = -1;}
?>
					   	<select class="fomr-control" name="sex" id="sex">

					   		<option  <?php if ($valueSex == -1) {
	echo 'selected';
}
?>  value="-1"><?php echo lang('s_chose_sex'); ?></option>
					   		<option <?php if ($valueSex == 1) {
	echo 'selected';
}
?> value="1"><?php echo lang('s_male'); ?></option>
					   		<option <?php if ($valueSex == 0) {
	echo 'selected';
}
?> value="0"><?php echo lang('s_female'); ?></option>
					   	</select>
					  </div>
					  <div class="form-group col-sm-12 col-md-12 col-xs-12">
					  <label><?php echo lang('s_title_level'); ?>:</label>
					   	<select class="fomr-control" name="level" id="level">
					   		<option value="-1"><?php echo lang('s_chose_level'); ?></option>
					   		<?php if (isset($level)) {
	foreach ($level as $value) {
		?>
					   				<option <?php if (isset($keyArr[3]) && array_values($keyArr[3])[0] == $value->ljob_id) {
			echo 'selected';
		}
		?> value="<?php echo $value->ljob_id; ?>"><?php echo $value->ljob_level; ?></option>
					   			<?php }
}
?>
					   	</select>
					  </div>
					  <div class="form-group col-sm-12 col-md-12 col-xs-12">
					  <label><?php echo lang('s_title_type_job'); ?>:</label>
					   	<select class="fomr-control" id="type-job" name="type-job">
					   		<option value="-1"><?php echo lang('s_chose_type_job'); ?></option>
					   		<?php if (isset($jobform) && isset($jobformchild)) {
	foreach ($jobform as $valueForm) {
		foreach ($jobformchild as $valueFromChild) {
			?>
										<option <?php if (isset($keyArr[4]) && array_values($keyArr[4])[0] == ($valueForm->fjob_id . '-' . $valueFromChild->jcform_id)) {
				echo 'selected';
			}
			?> value="<?php echo $valueForm->fjob_id . '-' . $valueFromChild->jcform_id; ?>"><?php echo $valueForm->fjob_type . '-' . $valueFromChild->jcform_type; ?></option>
					   			<?php }}
}
?>
					   	</select>
					  </div>



				</div>
				<div class="footer-search-detail-box text-center">
					<button type="button" class="button-custom-search" id="btnSearch"><strong><?php echo lang('s_button'); ?></strong></button>
				</div>
				</form>

					</div>
					<div class="col-sm-3 col-md-3 col-xs-12 text-left">
							 <!-- <button class="btn btn-warning">Gửi CV cho chúng tôi</button> -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
	$(document).ready(function(){
	$("input").keypress(function(event) {
	    if (event.which == 13) {
	    	event.preventDefault();
	    	$("#btnSearch").click();
	    }
	});
	});


	$("#btnSearch").on("click",function(event){
		 event.preventDefault();
		 //alert("123123");
		 var keyWord = $("input[name='key-word']").val();
		 var provinceID = $("#province option:selected" ).val();
		 var provinceText = $("#province option:selected" ).text();
		 var salaryJobID = $("#salary option:selected" ).val();
		 var salaryJobText = $("#salary option:selected" ).text();
		 var sexID = $("#sex option:selected" ).val();
		 var sexText = $("#sex option:selected" ).text();
		 var levelJobID = $("#level option:selected" ).val();
		 var levelJobText = $("#level option:selected" ).text();
		 var typeJobID = $("#type-job option:selected" ).val();
		 var typeJobText = $("#type-job option:selected" ).text();
		 var careerID = $("#career option:selected" ).val();
		 var careerText = $("#career option:selected" ).text();

		 var query = "";
		 var queryKeyWord ="";
		 var parameter="";
		 var link="";
		 if(keyWord.length > 0){
		 	queryKeyWord+=keyWord.replace(' ','-');
		 }
		 else{
		 	queryKeyWord += 'all';
		 }
		 if(provinceID != '-1'){
		 	query +=provinceText ;
		 	parameter +='p'+provinceID;
		 }
		 if(salaryJobID !='-1'){
		 	query +=salaryJobText ;
		 	parameter +='s'+salaryJobID;
		 }
		 if(sexID !='-1'){
		 	query +=sexText ;
		 	parameter +='x'+sexID;
		 }
		 if(levelJobID !='-1'){
		 	query +=levelJobText;
		 	parameter +='l'+levelJobID;
		 }
		 if(typeJobID !='-1'){
		 	query +=typeJobText ;
		 	parameter +='t'+typeJobID;
		 }
		 if(careerID !='-1'){
		 	query +=careerText ;
		 	parameter +='c'+careerID;
		 }
		 if(parameter.length <= 0){
		 	link+=queryKeyWord;
		 }
		 else{
		 	link +=queryKeyWord+'_'+query + '_'+parameter;
		 }
		 //alert(query + '_'+parameter);

		 link = link.replace(/ /g,"-").replace(/[&\/\\#,+()$~%.'":*?<>{}]/g,'-');
		 //alert(link);
		 var route = "<?php echo $routeUrl; ?>";
		 window.open(route +link,'_self');

		 //alert(keyWord);
	});
	</script>