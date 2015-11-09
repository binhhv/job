<div class="col-sm-12 job-province-box no-padding">
<?php if (isset($numResumeUpload) && $numResumeUpload < 3) {
	?>
	<div class="modal-header">
                <!-- <button type="button" class="close"
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button> -->
                <h4 class="modal-title" id="myModalLabel">
                  Upload hồ sơ
                   <button class="btn btn-primary pull-right" onclick="location.href='<?php echo base_url('jobseeker');?>'"><i class="fa fa-reply"></i> Trang ứng viên</button>
                </h4>
                <!-- <label >Các trường</label><label class="text-danger">(*)</label> là bắt buộc. -->
            </div>
    <div class="modal-body">

                <form class="form-horizontal" role="form" method="post" id="form-upload-form">
                	<div class="form-group">
                		<label class="col-sm-12 text-center alert-danger error-upload-resume hide"></label>
                	</div>
                  <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="inputEmail3">Chọn file</label>
                    <div class="col-sm-8">
                       <div class="fileupload">
												<!-- <input type="file" class="form-control hide file-cv" name="cv" id="cv"> -->
												<!-- <span class="btn btn-success fileinput-button">
											        <i class="glyphicon glyphicon-plus"></i>
											        <span>Select files...</span> -->
											        <!-- The file input field used as target for the file upload widget -->
											   <input id="fileupload" type="file" name="files" >
											    <!-- </span>
											    <br> -->
											    <br>
											    <!-- The global progress bar -->
											    <div id="progress" class="progress">
											        <div class="progress-bar progress-bar-success"></div>
											    </div>
											    <!-- The container for the uploaded files -->
											    <div id="files" class="files hide"></div>
											    <div class="files-name"></div>
											    <input type="hidden" name="file-name">
							            <input type="hidden" name="file-tmp">
												</div>


                    </div>
                    <div class="col-sm-8 col-sm-offset-2">
                    	<label class="text-danger error-file hide"></label>
                    </div>
                </div>
                 <div class="form-group">
                  	  <div class="col-sm-12 text-left">
								*Nhấp chọn "Upload hồ sơ", tôi đã đọc và đồng ý với các <a class="a-term" href="<?php echo base_url('about/term');?>">Thỏa thuận sử dụng</a>.
							</div>
                      <div class="col-sm-12 text-right">
                      <input type="hidden" name="province">
                      <div class="token">

                         <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?php echo $csrf['hash'];?>" /></div>

                            <button type="submit" class="btn btn-primary btn-create-form-apply">
                                Upload hồ sơ.
                            </button>
                      </div>
                  </div>
            </form>
        </div>
        <?php } else {?>
<div class="row">
                <!-- <button type="button" class="close"
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button> -->
                <div class="col-sm-12 text-center margin-top-10"><span class="text-center"><strong>Bạn đã upload tối đa 3 hồ sơ trên website. Vui lòng xóa bớt hồ sơ hiện có.</strong></span></div>
                <div class="col-sm-12 text-left margin-top-10">
                	<button class="btn btn-primary " onclick="location.href='<?php echo base_url('jobseeker');?>'"><i class="fa fa-reply"></i> Trang ứng viên</button>
                </div>
            </div>
        <?php }
?>
</div>