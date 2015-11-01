<div ng-controller="memberController">
    <div class="modal-header">
        <h3 class="modal-title">Thêm thành viên mới </h3> <!--{{rec.provinceSelected}}-->

    </div>
    <div class="modal-body">
            <form name="memberCreateForm" novalidate>
            <fieldset>
                <div class="row">
                    <div class="col-sm-12 dp-table">
                        <div class="col-sm-6 dp-table-cell">
                            <div class="col-sm-12">
                                <label class="control-label" for="member_name">Họ tên</label>
                                <div class="controls">
                                    <input type="text" ng-model="member.name" id="member_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="control-label" for="member_position">Chức vụ</label>
                                <div class="controls">
                                    <input type="text" ng-model="member.position" id="member_position" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="control-label" for="member_email">Email</label>
                                <div class="controls">
                                    <input type="email" ng-model="member.mail" id="member_email" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="control-label" for="member_phone">Số điện thoại</label>
                                <div class="controls">
                                    <input type="text" ng-model="member.phone" id="member_phone" class="form-control" only-digits>
                                </div>
                            </div>
                            <div class="col-sm-12">

                                <div class="controls margin-top-10">
                                   <label> <input type="checkbox" ng-model="member.isActive" id="member_active"  > Hiển thị trên website</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 dp-table-cell v-align-top">
                            <div class="form-group col-sm-12 no-padding-responsive">

                                <div class="col-sm-12 no-padding-right">
                                <label class="text-danger error-upload">
                                <span>(".jpg", ".jpeg", ".bmp", ".gif", ".png" < 2MB)</span>

                                <span ng-show="fileTypeValidate">file không đúng định dạng</span>
                                <span ng-show ="fileSizeValidate">dung lượng file quá lớn</span>
                                </label>
                                    <label class="control-label" for="logo">Ảnh đại diện</label>
                                <div class="controls logo-modal">
                                <!-- <label data-ng-repeat="choice in rec.listCountrys" class="col-sm-6" > -->
                                <div class="col-sm-12 no-padding-child image-preview">
                                  <img id="logo_tmp">
                                  </div>
                                  <div class="col-sm-12 no-padding-child">
                                  <!--  <input class="form-control" type="file" fileread="logo"  /> -->
                                   <input class="form-control" accept="image/*" fileread="avatarMemberObject" type="file" name="file" onchange="angular.element(this).scope().uploadAvatarMember(this.files)"/>
                                  </div>

                                </div>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">
                            <button class="btn btn-success" ng-click="createMember(member,avatarMemberObject)" ng-disabled="memberCreateForm.$invalid || member.avatarName.length <= 0 || disabled_modal || fileTypeValidate || fileSizeValidate">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Đóng</button>
                            </div>
                        </div>
                    </div>
            </fieldset>

            </form>
    </div>
</div>
