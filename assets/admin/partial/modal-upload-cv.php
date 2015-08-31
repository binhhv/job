<section ng-controller="documentController">
    <div class="modal-header">
        <h3 class="modal-title">Upload CV cho ứng viên</h3>
    </div>
    <div class="modal-body modal-delete">
            <form name="uploadCVForm">
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
                                <label class="control-label" >Họ tên</label><label class="text-danger" ng-show="createManagerForm.email.$error.required">*</label>
                                <div class="controls">
                                <input type="text" name="name" ng-model="cv.jobseeker_name" id="phone" class="form-control" required >
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" >Email</label>
                                <div class="controls">
                                <input type="email" name="jobseeker_mail" ng-model="cv.jobseeker_mail" id="jobseeker_mail" class="form-control" required >
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" >Số điện thoại</label><label class="text-danger" ng-show="createManagerForm.email.$error.required">*</label>
                                <div class="controls">
                                    <input type="text" only-digits name="jobseeker_phone" ng-model="cv.jobseeker_phone" id="jobseeker_phone" class="form-control" required >
                                </div>
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
                                     <input required class="form-control" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" fileread="filecv" type="file" name="file" onchange="angular.element(this).scope().uploadFile(this.files)"/>
                                <!-- <input class="form-control" type="file" ng-file-select="onFileSelect($files)" /> -->
                                </div>

                                <span ng-show="cv.fileTypeValidate">file không đúng định dạng</span>
                            </div>

                            <div class="form-group col-sm-12">
                                <label class="text-danger">*</label> bắt buộc.
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="uploadCV(cv);" ng-disabled="uploadCVForm.$invalid || disabled_modal || cv.fileTypeValidate" >Upload</button>
                                <button class="btn btn-warning" ng-click="cancel()" ng-disabled="disabled_modal">Hủy bỏ</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>

