<div class="card">
	<div class="row-employer row">
		<div class="col-sm-12">
		<div class="col-sm-12 clear mb_20 margin-top-10">
                                <!-- <span class="fwb fs20 txt-color-363636"><?php echo lang('title_depoyer_re_depl'); ?></span> -->
                                 <span class="border-vertical text-color-1"></span>
                                <span class="text-color-1 title-jobseeker-register"><strong><?php echo lang('title_re_depl_update'); ?></strong></span>
                            </div>
                             <form enctype="multipart/form-data" role="form" name="employer-update-form" id="employer-update-form" method="post">
			<div class="col-sm-12">
			<div class="form-group col-sm-12 error-em-info hide">
                                 <div class="error text-center">
                                    <div class="error text-left" id="message_update_empoyer">
                                    </div>
                                </div>

                            </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_name_re_depl'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="employer_name" value="<?php echo $employerInfo->employer_name; ?>" />
                                    </div>
                                    <div class="col-sm-12 text-danger error-employer-name"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_size_re_depl'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <!-- <select class="form-control" name="employer_size" id="employer_size">
                                            <option value="0">Chọn quy mô doanh nghiệp</option>
                                            <option value="1">Ít hơn 10 nhân viên</option>
                                            <option value="2">Từ 10 đến 24 nhân viên</option>
                                            <option value="3">Từ 25 đến 50 nhân viên</option>
                                        </select> -->
                                         <input type="text" class="form-control" name="employer_size" value="<?php echo $employerInfo->employer_size; ?>"/>
                                    </div>
                                    <div class="col-sm-12 text-danger error-employer-size"></div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_phone_re_depl'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="employer_phone" value="<?php echo $employerInfo->employer_phone; ?>"/>
                                    </div>
                                    <div class="col-sm-12 text-danger error-employer-phone"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_fax_re_depl'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                         <input type="text" class="form-control" name="employer_fax" value="<?php echo $employerInfo->employer_fax; ?>"/>
                                    </div>
                                    <div class="col-sm-12 text-danger error-employer-fax"></div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_about_re_depl'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                        <textarea type="text" class="form-control" name="employer_about" value="<?php echo $employerInfo->employer_about; ?>"  rows="3"><?php echo nl2br($employerInfo->employer_about) ?> </textarea>
                                    </div>
                                    <div class="col-sm-12 text-danger error-employer-about"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_address_re_depl'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                          <textarea type="text" class="form-control" name="employer_address" value="<?php echo $employerInfo->employer_address; ?>" rows="3"><?php echo nl2br($employerInfo->employer_address) ?></textarea>
                                    </div>
                                    <div class="col-sm-12 text-danger error-employer-address"></div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_map_province_re_depl'); ?><span class="colorRed">*</span></label>
                                    <div class="controls">
                                    <label><input type="radio" value="1" <?php if ($employerInfo->employer_map_country == 1) {echo 'checked="true"';}
?>  name="country">Việt Nam</label> &nbsp;
                                    <label><input type="radio" value="2" <?php if ($employerInfo->employer_map_country == 2) {echo 'checked="true"';}
?> name="country">Nhật Bản</label>
                                    </div>
                                    <div class="controls">
                                        <select class="form-control province_vn" name="employer_map_province_vn" id="employer_map_province_vn">
                                            <!-- <option value="0">Chọn quy tỉnh thành</option> -->
                                            <?php if (isset($provinceVN)) {
	foreach ($provinceVN as $rows): ?>
                                                <option <?php if ($rows->province_id == $employerInfo->employer_map_province) {
		echo 'selected';
	}
	?> value="<?php echo $rows->province_id ?>"><?php echo $rows->province_name ?></option>
                                            <?php endforeach?> <?php }
?>
                                        </select>
                                        <select class="form-control province_jp hide" name="employer_map_province_jp" id="employer_map_province_jp">
                                            <!-- <option value="0">Chọn quy tỉnh thành</option> -->
                                            <?php if (isset($provinceJP)) {
	foreach ($provinceJP as $rows): ?>
                                                <option <?php if ($rows->province_id == $employerInfo->employer_map_province) {
		echo 'selected';
	}
	?> value="<?php echo $rows->province_id ?>"><?php echo $rows->province_name ?></option>
                                            <?php endforeach?> <?php }
?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo lang('employer_website_re_depl'); ?></label>
                                    <div class="controls"><label>&nbsp;</label></div>
                                    <div class="controls">
                                         <input type="text" class="form-control" name="employer_website" value="<?php echo $employerInfo->employer_website; ?>" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-12">
                                    <label class="control-label"><?php echo lang('employer_logo_re_depl'); ?></label>
                                    <div class="controls">
                                        <!-- <div class="display_block btn-big pos_relactive w170 floatLeft"> -->
                                            <input id="fileuploadEdit" type="file" name="files" >
                                            <!-- <span class="icon_upload_file"></span><?php echo lang('label_choose_file'); ?> -->
                                        <!-- </div> -->
                                        <div id="progress" class="progress">
                                                    <div class="progress-bar progress-bar-success"></div>
                                                </div>
                                                <!-- The container for the uploaded files -->
                                                <div id="files" class="files hide"></div>
                                                <div class="files-name"></div>
                                                <input type="hidden" name="file-name">
                                        <input type="hidden" name="file-tmp">
                                        <div class="col-sm-12">
                                             <label class="text-danger error-file hide"></label>
                                        </div>
                                        <!-- <span class="select_file_note floatLeft txt-color-363636" id="note_file_select">(Chưa chọn file nào)</span> -->
                                    </div>
                                    <div class="col-sm-12 text-danger error-employer-logo"></div>

                                </div>
                                <div class="col-sm-12 note_size_photo clearfix font12 italic" id="error_giayphepkinhdoanh">(<?php echo lang('m_file_type'); ?> .jpg .gif .png, <?php echo lang('m_file_size'); ?> &lt;<=2MB)</div>
                            </div>
                            <div class="col-sm-12 text-right">
                            	<div class="form-group col-sm-12"><button class="btn btn-primary"><?php echo lang('em_change_info'); ?></button></div>
                            </div>
                            <input type="hidden" name="employer_id" value="<?php echo $employerInfo->employer_id; ?>" />
                    <input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?php echo $csrf['hash']; ?>" />
                        </form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("input:radio[name=country]").change(function(){
            if($(this).val() == 1){
                $(".province_vn").removeClass('hide');
                $(".province_jp").addClass('hide');
            }
            else if($(this).val() == 2){
                $(".province_vn").addClass('hide');
                $(".province_jp").removeClass('hide');
            }
      });

	$(function(){
		if($("input:radio[name=country]:selected").val() == 1){
			 $(".province_vn").removeClass('hide');
                $(".province_jp").addClass('hide');
		}
		else{
			$(".province_vn").addClass('hide');
                $(".province_jp").removeClass('hide');
		}
	var url = base_website +'uploads/do_upload';
        $('#fileuploadEdit').fileupload({
           add: function(e, data) {
                var uploadErrors = [];
                var acceptFileTypes = /(\.|\/)(gif|jpe?g|png)$/i;
                console.log(JSON.stringify(data));
                //var filename = $('#fileupload').val();
                console.log('filename'+data.originalFiles[0]['name']);
                $(".files-name").empty().append(data.originalFiles[0]['name']);
                $("input[name=file-name]:hidden").val(data.originalFiles[0]['name']);
                var ext = data.originalFiles[0]['name'].split('.').pop().toLowerCase();
          // if($.inArray(ext, ['doc','docx','pdf']) == -1) {
          //     alert('invalid extension!');
          // }
                if($.inArray(ext, ['gif','jpg','jpeg','png']) == -1) {
                    uploadErrors.push('File không đúng định dạng.');
                }
                // if(data.originalFiles[0]['size'].length && data.originalFiles[0]['size'] > 5000000) {
                //     uploadErrors.push('Kích thước file quá lớn.');
                // }
                if(uploadErrors.length > 0) {
                    var errormsg = uploadErrors.join("\n");
                    $('.error-file').empty();
                    $('.error-file').removeClass('hide');
                    $('.error-file').append(errormsg);
                } else {
                    data.submit();
                }
          },
            url: url,
            dataType: 'json',
            done: function (e, data) {
                $.each(data.result.files, function (index, file) {
                  $("#files").empty();
                  $('.error-file').empty();
                    $('<p/>').text(file.name).appendTo('#files');
                    $("input[name=file-tmp]:hidden").val(file.name);
                    getTokenEditInfo(addTokenInputEditInfo);
                    //$("#btn-apply").attr("disabled",false);
                });
                //$(".files-name").append(filename);
            },

            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    //});
  $('#fileuploadEdit').change(function() {
      var filename = $('#fileuploadEdit').val();
      ///console.log('filename'+filename);
      //$(".files-name").append(filename);
  //       var ext = $('#fileupload').val().split('.').pop().toLowerCase();
    // if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
    //     alert('invalid extension!');
    // }
    // else{

    // }
   // $("input[name=file-name]:hidden").val(filename);
       //alert(filename);
    });
    $('#fileuploadEdit').on("click", function(){
      //alert("123123");
       //var filename = $(this).val();
       //alert(filename);
      $.ajax({
        url: base_website+'job/getToken',
        type: "get",
        dataType:'json',
        success: function(data){
        	console.log(data);
        	$('input:hidden[name="csrf_test_name"]').val(data.hash);
          //alert(data.hash);
          //$(".token").empty();
         // var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
          //$(".token").append(token);
           //document.write(data); just do not use document.write
           //console.log(data);
           //callback(data);
           //console.log(data.name);
        }
      });
     });
})

var getTokenEditInfo = function(callback){
    	 $.ajax({
        url: base_website +'job/getToken',
        type: "get",
        dataType:'json',
        success: function(data){
        	//$(".token").empty();
        	//var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
        	//$(".token").append(token);
           //document.write(data); just do not use document.write
           //console.log(data);
           callback(data);
           //console.log(data.name);
        }
      });
    };

    function addTokenInputEditInfo(data){
    	console.log('token' +data);
    	$('input:hidden[name="csrf_test_name"]').val(data.hash);
    		//$(".token").empty();
        	//var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
        	//$(".token").append(token);
    }
</script>