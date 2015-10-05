<div ng-controller="logoController">
    <div class="modal-header">
        <h3 class="modal-title">Upload Logo  </h3> <!--{{rec.provinceSelected}}-->

    </div>
    <div class="modal-body">
            <form name="logoCreateForm" novalidate>
            <fieldset>
                <div class="row">
                    <div class="col-sm-12">
                            <div class="form-group col-sm-12 no-padding-responsive">

                                <div class="col-sm-12 no-padding-right">
                                <label class="text-danger error-upload">
                                <span>(".jpg", ".jpeg", ".bmp", ".gif", ".png" < 2MB)</span>
                                <span>(kích thước tối thiểu 170x40 px hoặc (170x40 px)x1,2,3,4..., để logo hiển thị chính xác nhất)</span>
                                <span ng-show="fileTypeValidate">file không đúng định dạng</span>
                                <span ng-show ="fileSizeValidate">dung lượng file quá lớn</span>
                                </label>
                                    <label class="control-label" for="logo">Logo Website</label>
                                <div class="controls logo-modal">
                                <!-- <label data-ng-repeat="choice in rec.listCountrys" class="col-sm-6" > -->
                                <div class="col-sm-12 no-padding-child image-preview">
                                  <img id="logo_tmp">
                                  </div>
                                  <div class="col-sm-12 no-padding-child">
                                  <!--  <input class="form-control" type="file" fileread="logo"  /> -->
                                   <input class="form-control" accept="image/*" fileread="logoObject" type="file" name="file" onchange="angular.element(this).scope().uploadFile(this.files)"/>
                                  </div>

                                </div>
                                </div>
                            </div>



                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">
                            <button class="btn btn-success" ng-click="uploadLogo(logo,logoObject)" ng-disabled="logoCreateForm.$invalid || logo.logoName.length <= 0 || disabled_modal || fileTypeValidate || fileSizeValidate">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Đóng</button>
                            </div>
                        </div>
                    </div>
            </fieldset>

            </form>
    </div>
</div>
