
<?php
$today = date("Y-m-d");
$expire = $employerInfo->employer_exp_search_rs; //from db

$today_time = strtotime($today);
$expire_time = strtotime($expire);

?>
<div class="card">
	<div class="row-employer row ">
		<div class="col-sm-12 clear mb_20 margin-top-10">
            <p><span class="border-vertical text-color-1"></span>
            <span class="text-color-1 title-jobseeker-register"><strong><?php echo lang('title_search_resume_em'); ?></strong></span>
            </p>
        </div>
         <div class="col-sm-12 search-rs-box bg-search-rs">
		  <?php if ($employerInfo->employer_is_search_rs && $expire_time > $today_time) {
	?>
		  <form>

			  	<div class="col-sm-6 margin-top-10">
			  		<input type="text" name="key-word" class="form-control w-100" placeholder="<?php echo lang('s_keyword'); ?>">
			  	</div>
			  	<div class="col-sm-6 margin-top-10">
			  		<select class="form-control" name="career" id="career">
			  			<option value="-1"><?php echo lang('s_chose_career'); ?></option>
			  			<?php if (isset($listCareer)) {
		foreach ($listCareer as $key => $value) {?>
		<option value="<?php echo $value->career_id; ?>"><?php echo $value->career_name; ?></option>
			  				<?php }
	}
	?>
			  		</select>
			  	</div>
			  	<div class="col-sm-6 margin-top-10">
			  		<select class="form-control" name="level" id="level">
			  			<option value="-1"><?php echo lang('s_chose_level'); ?></option>
			  			<?php if (isset($listLevel)) {
		foreach ($listLevel as $key => $value) {?>
		<option value="<?php echo $value->ljob_id; ?>"><?php echo $value->ljob_level; ?></option>
			  				<?php }
	}
	?>
			  		</select>
			  	</div>
			  	<div class="col-sm-6 margin-top-10">
			  		<select class="form-control" name="province" id="province">
			  			<option value="-1"><?php echo lang('s_chose_province'); ?></option>
			  				<?php if (isset($listProvince)) {
		foreach ($listProvince as $key => $value) {?>
		<option value="<?php echo $value->province_id; ?>"><?php echo $value->province_name; ?></option>
			  				<?php }
	}
	?>
			  		</select>
			  	</div>
			  	<div class="col-sm-12 text-right margin-top-10">
			  		<button class="btn btn-primary padding-lr-20" id="btnSearch"><?php echo lang('s_button'); ?></button>
			  	</div>

		  </form>
<?php } else {?>
	<div class="col-sm-12 text-center">
		<?php echo lang('em_no_service_search_resume'); ?>
	</div>
<?php }
?>
		 </div>
    </div>

</div>

<!-- <div class="card">
	<div class="row-employer row ">
		<div class="col-sm-12 clear mb_20 margin-top-10">
            <p><span class="border-vertical text-color-1"></span>
            <span class="text-color-1 title-jobseeker-register"><strong><?php echo lang('title_result_search_resume_em'); ?></strong></span>
            </p>
        </div>
         <div class="col-sm-12 search-rs-box bg-search-rs">
		  	có 15 resume đc tìm thấy
		 </div>
    </div>

</div>
 -->
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
		 var levelJobID = $("#level option:selected" ).val();
		 var levelJobText = $("#level option:selected" ).text();
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
		 if(levelJobID !='-1'){
		 	query +=levelJobText;
		 	parameter +='l'+levelJobID;
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
		 window.open('<?php echo base_url("employer/resume/search"); ?>'+'/'+link,'_self');

		 //alert(keyWord);
	});
	function replaceReg(strReg){
		var reg = [' ','*', '?', '(', ')', '+', '\'', "\"", '_', "=",'/'];
		for (var i = reg.length - 1; i >= 0; i--) {
			strReg = strReg.replace(reg[i],'-');
		};
		return strReg;
	}
</script>