<div class="row"  >
	<div class="col-md-12">
		<section class="content-header">
          <h1>
           Upload CV
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li>Quản lý dữ liệu</li>
            <li class="active">CV ứng viên</li>
          </ol>
        </section>
		<form name="uploadCVForm" action="<?php echo base_url('admin/document/upload');?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="row">

                        <div class="col-sm-12">
                         <div class="form-group col-sm-12">
                                <label class="control-label" for="suburb">THÔNG TIN ỨNG VIÊN</label>
                                <div class="controls">
                                    <hr>
                                </div>
                            </div>
                               <div class="form-group col-sm-6">
                                <label class="control-label" >Họ tên</label><label class="text-danger">*</label>
                                <div class="controls">
                                <input type="text" value="<?php if (isset($data['jobseeker_name'])) {echo $data['jobseeker_name'];}
?>" name="jobseeker_name" id="jobseeker_name" class="form-control" required >
                                </div>
                                 <span class="text-danger"><?php if (isset($error['jobseeker_name'])) {echo $error['jobseeker_name'];}
?>
                                </span>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" >Email</label> <label class="text-danger">*</label>
                                <div class="controls">
                                <input type="email" value="<?php if (isset($data['jobseeker_mail'])) {echo $data['jobseeker_mail'];}
?>" name="jobseeker_mail" id="jobseeker_mail" class="form-control" required >
                                </div>
                                 <span class="text-danger"><?php if (isset($error['jobseeker_mail'])) {echo $error['jobseeker_mail'];}
?>
                                </span>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" >Số điện thoại</label><label class="text-danger" >*</label>
                                <div class="controls">
                                    <input type="text" value="<?php if (isset($data['jobseeker_phone'])) {echo $data['jobseeker_phone'];}
?>"  name="jobseeker_phone"  id="jobseeker_phone" class="form-control" required >
                                </div>
                                <span class="text-danger"><?php if (isset($error['jobseeker_phone'])) {echo $error['jobseeker_phone'];}
?>
                                </span>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="suburb">FILE UPLOAD</label>
                                <div class="controls">
                                    <hr>
                                </div>
                            </div>
                             <div class="form-group col-sm-6">
                                <label class="control-label" >Chọn file upload</label><label class="text-danger" >(định dạng file .doc, .docx, .pdf )</label>

                                <div class="controls">
                                     <input required class="form-control" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"  type="file" name="file" />
                                <!-- <input class="form-control" type="file" ng-file-select="onFileSelect($files)" /> -->
                                </div>

                                <span class="text-danger"><?php if (isset($error['file'])) {echo $error['file'];}
?></span>
                            </div>

                            <div class="form-group col-sm-12">
                                <label class="text-danger">*</label> bắt buộc.
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group text-center">
                            	<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                <button class="btn btn-success" id="uploadcv" >Upload</button>
                                <!-- <button class="btn btn-warning" ng-click="cancel()" ng-disabled="disabled_modal">Hủy bỏ</button> -->
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
	</div>
</div>

<script type="text/javascript">
$("#uploadcv").click(function(){
	//$this.attr("disabled", true);
	alert("123123");
});
</script>