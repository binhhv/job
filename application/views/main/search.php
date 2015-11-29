<div class="row">
		<div class="col-sm-12 col-md-12 col-xs-12">
			<div class="search-box-2">
			<div class=" text-center title-search-box-2">
					<h1 class=""><?php echo lang('s_title'); ?></h1>
					<div class="border-bottom-title border-color-1"></div>
				</div>
				<div class="row search-box-content">
					<div class="col-sm-12 col-md-12 col-xs-12">
						<!-- <form class="form-inline" role="form">

					  <div class="form-group ">
					    <input type="email" class="form-control" id="email" placeholder="Nhập từ khóa">
					  </div>
					  <div class="form-group ">
					    	<select class="form-control select-address input-large" data-width="100%">
					    		<option value="-1">Chọn địa điểm</option>
					    		<option value="-1">Hồ chí minh</option>
					    	</select>
					  </div>
					  <div class="form-group ">
					    	<select class="form-control select-address input-large" data-width="100%">
					    		<option value="-1">Chọn năng lực tiếng nhật</option>
					    		<option value="-1">N3</option>
					    	</select>
					  </div>
					  <div class="form-group ">
					  		<button type="submit" class="btn btn-danger btn-search">Tìm kiếm</button>
					  </div>

					</form> -->

					<form role="form" id="formSearch" method="get">
				<div class="content-search-detail-box">

					  <div class="form-group col-sm-6 col-md-6 col-xs-12">
					    <input type="text" class="form-control" name="key-word" id="key-word" placeholder="<?php echo lang('s_keyword'); ?>" style="height: 39px;">
					  </div>
					  <div class="form-group col-sm-6 col-md-6 col-xs-12">
					   	<select class="fomr-control" name="province" id="province">
					   		<option value="-1"><?php echo lang('s_chose_province'); ?></option>
					   		<?php if (isset($province)) {
	foreach ($province as $value) {?>
					   				<option value="<?php echo $value->province_id; ?>"><?php echo $value->province_name; ?></option>
					   			<?php }
}
?>
					   	</select>
					  </div>
					  <div class="form-group col-sm-6 col-md-6 col-xs-12">
					   	<select class="fomr-control" name="salary" id="salary">
					   		<option value="-1"><?php echo lang('s_chose_salary'); ?></option>
					   		<?php if (isset($salary)) {
	foreach ($salary as $value) {?>
					   				<option value="<?php echo $value->salary_id; ?>"><?php echo $value->salary_value; ?></option>
					   			<?php }
}
?>
					   	</select>
					  </div>
					  <div class="form-group col-sm-6 col-md-6 col-xs-12">
					   	<select class="fomr-control" name="sex" id="sex">
					   		<option value="-1"><?php echo lang('s_chose_sex'); ?></option>
					   		<option value="1"><?php echo lang('s_male'); ?></option>
					   		<option value="0"><?php echo lang('s_female'); ?></option>
					   	</select>
					  </div>
					  <div class="form-group col-sm-6 col-md-6 col-xs-12">
					   	<select class="fomr-control" name="level" id="level">
					   		<option value="-1"><?php echo lang('s_chose_level'); ?></option>
					   		<?php if (isset($level)) {
	foreach ($level as $value) {?>
					   				<option value="<?php echo $value->ljob_id; ?>"><?php echo $value->ljob_level; ?></option>
					   			<?php }
}
?>
					   	</select>
					  </div>
					  <div class="form-group col-sm-6 col-md-6 col-xs-12" >
					   	<select class="fomr-control" id="type-job" name="type-job">
					   		<option value="-1"><?php echo lang('s_chose_type_job'); ?></option>
					   		<?php if (isset($jobform) && isset($jobformchild)) {
	foreach ($jobform as $valueForm) {
		foreach ($jobformchild as $valueFromChild) {?>
										<option value="<?php echo $valueForm->fjob_id . '-' . $valueFromChild->jcform_id; ?>"><?php echo $valueForm->fjob_type . '-' . $valueFromChild->jcform_type; ?></option>
					   			<?php }}
}
?>
					   	</select>
					  </div>



				</div>
				<div class="footer-search-detail-box text-center">
					<button type="submit" class="button-custom-search" id="btnSearch"><strong><?php echo lang('s_button'); ?></strong></button>
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
		 if(parameter.length <= 0){
		 	link+=queryKeyWord;
		 }
		 else{
		 	link +=queryKeyWord+'_'+query + '_'+parameter;
		 }

		 link = link.replace(/ /g,"-");
		 window.open('<?php echo base_url("search"); ?>'+'/'+link,'_self');

		 //alert(keyWord);
	});
	</script>