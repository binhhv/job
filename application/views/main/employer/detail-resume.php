
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
			  		<input type="text" name="key-word" class="form-control w-100" placeholder="<?php echo lang('s_keyword'); ?>" value="<?php if (isset($keyWord) && $keyWord != "all") {echo $keyWord;}
	?>">
			  	</div>
			  	<div class="col-sm-6 margin-top-10">
			  		<select class="form-control" name="career" id="career">
			  			<option value="-1"><?php echo lang('s_chose_career'); ?></option>
			  			<?php if (isset($listCareer)) {
		foreach ($listCareer as $key => $value) {
			?>
		<option <?php if (isset($keyArr[0]) && array_values($keyArr[2])[0] == $value->career_id) {
				echo 'selected';
			}
			?> value="<?php echo $value->career_id; ?>"><?php echo $value->career_name; ?></option>
			  				<?php }
	}
	?>
			  		</select>
			  	</div>
			  	<div class="col-sm-6 margin-top-10">
			  		<select class="form-control" name="level" id="level">
			  			<option value="-1"><?php echo lang('s_chose_level'); ?></option>
			  			<?php if (isset($listLevel)) {
		foreach ($listLevel as $key => $value) {
			?>
		<option <?php if (isset($keyArr[0]) && array_values($keyArr[1])[0] == $value->ljob_id) {
				echo 'selected';
			}
			?> value="<?php echo $value->ljob_id; ?>"><?php echo $value->ljob_level; ?></option>
			  				<?php }
	}
	?>
			  		</select>
			  	</div>
			  	<div class="col-sm-6 margin-top-10">
			  		<select class="form-control" name="province" id="province">
			  			<option value="-1"><?php echo lang('s_chose_province'); ?></option>
			  				<?php if (isset($listProvince)) {
		foreach ($listProvince as $key => $value) {
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

<div class="card">
<?php if ($resume->docon_is_delete_user == 1) {?>
	<div class="row-employer row ">
		<div class="col-sm-12 clear margin-top-10 text-center">
			<?php echo lang('em_resume_not_found'); ?>
		</div>
	</div>
	<?php } else {
	?>
	<div class="row-employer row ">
		<div class="col-sm-12 clear margin-top-10">
            <p><span class="border-vertical text-color-1"></span>
            <span class="text-color-1 title-jobseeker-register"><strong><?php echo lang('title_detail_resume_em'); ?></strong></span>
            <?php if ($resume->existStore == 0) {?><button data-href="<?php echo base_url('employer/resume') . '/store-resume/' . $resume->docon_id; ?>" data-toggle="modal" data-target="#confirm-store-resume" class="btn btn-warning pull-right"><?php echo lang('em_save_resume'); ?></button> <?php }
	?>
            </p>
        </div>
         <div class="col-sm-12 search-rs-box no-padding-top">
         	<div class="row">
                    <div class="col-sm-12">
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="firstname"><?php echo lang('job_form_name'); ?></label>
                                <div class="controls" ng-model="documentJobseeker.name">
                                    <?php echo $resume->jobseeker_name ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="firstname"><?php echo lang('job_form_birthday'); ?></label>
                                <div class="controls">
                                    <?php echo date('d/m/Y', strtotime($resume->docon_birthday)); ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname"><?php echo lang('job_form_phone'); ?> </label>
                                <div class="controls">
                                    <?php echo $resume->docon_phone ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb"><?php echo lang('m_email'); ?></label>
                                <div class="controls">
                                    <?php echo $resume->jobseeker_email ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname"><?php echo lang('job_form_level'); ?></label>
                                <div class="controls">
                                    <?php echo $resume->ljob_level ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname"><?php echo lang('job_form_work_at'); ?></label>
                                <div class="controls">
                                    <?php echo $resume->province ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname"><?php echo lang('s_tite_career'); ?> </label>
                                <div class="controls">
                                    <?php echo $resume->career_name ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb"><?php echo lang('job_form_degree'); ?></label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_degree); ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname"><?php echo lang('job_form_education'); ?> </label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_education); ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb"><?php echo lang('job_form_current_address'); ?></label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_address); ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname"><?php echo lang('job_form_experience'); ?> </label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_experience); ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb"><?php echo lang('job_form_skill'); ?></label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_skill); ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname"><?php echo lang('job_form_healthy'); ?> </label>
                                <div class="controls">
                                    <?php echo $resume->healthy_type ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb"><?php echo lang('job_form_reason_apply'); ?></label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_reason_apply); ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb"><?php echo lang('s_title_salary'); ?> </label>
                                <div class="controls">
                                    <?php echo $resume->docon_salary ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb"><?php echo lang('job_form_advance'); ?></label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_advance); ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="suburb"><?php echo lang('job_form_wish'); ?></label>
                                <div class="controls">
                                    <?php echo nl2br($resume->docon_wish); ?>
                                </div>
                            </div>
                        </div>
                </div>

		 </div>
    </div>
    <?php }
?>
</div>
 <!--modal confirm store resume -->
        <div class="modal fade" id="confirm-store-resume" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
              <?php echo lang('em_confirm_save_resume'); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo lang('m_cancel'); ?></button>
                <a class="btn btn-primary btn-ok"><?php echo lang('m_save'); ?></a>
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