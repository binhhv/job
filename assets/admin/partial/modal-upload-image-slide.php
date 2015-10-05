<div ng-controller="slideController">
    <div class="modal-header">
        <h3 class="modal-title">Upload slide hình ảnh  </h3> <!--{{rec.provinceSelected}}-->

    </div>
    <div class="modal-body">
            <form name="slideCreateForm" novalidate>
            <fieldset>
                <div class="row">
                    <div class="col-sm-12">
                            <div class="form-group col-sm-12 no-padding-responsive">

                                <div class="col-sm-12 no-padding-right">
                                <label class="text-danger error-upload">
                                <span>(".jpg", ".jpeg", ".bmp", ".gif", ".png" < 2MB)</span>

                                <span ng-show="fileTypeValidate">file không đúng định dạng</span>
                                <span ng-show ="fileSizeValidate">dung lượng file quá lớn</span>
                                </label>
                                    <label class="control-label" for="logo">Slide hình ảnh</label>
                                <div class="controls logo-modal">
                                <!-- <label data-ng-repeat="choice in rec.listCountrys" class="col-sm-6" > -->
                                <div class="col-sm-12 no-padding-child image-preview">
                                  <img id="logo_tmp">
                                  </div>
                                  <div class="col-sm-12 no-padding-child">
                                  <!--  <input class="form-control" type="file" fileread="logo"  /> -->
                                   <input class="form-control" accept="image/*" fileread="slideObject" type="file" name="file" onchange="angular.element(this).scope().uploadFileSlide(this.files)"/>
                                  </div>

                                </div>
                                </div>
                            </div>



                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">
                            <button class="btn btn-success" ng-click="uploadSlide(typeOption,slide,slideObject)" ng-disabled="slideCreateForm.$invalid || slide.slideName.length <= 0 || disabled_modal || fileTypeValidate || fileSizeValidate">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Đóng</button>
                            </div>
                        </div>
                    </div>
            </fieldset>

            </form>
    </div>
</div>
