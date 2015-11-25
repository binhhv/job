<section ng-controller="adminController">
    <div class="modal-header">
        <h3 class="modal-title">Thay đổi mật khẩu</h3>
    </div>
    <div class="modal-body modal-delete">
            <!-- <form name="updateConfigNumRecForm">
                <fieldset>
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="configRecruitment_number">Số lượng</label>
                                <div class="controls">
                                    <input type="text" ng-model="configRecruitment.number" id="configRecruitment_number" class="form-control" required only-digits>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="updateConfigNumRecruitment(configRecruitment)" ng-disabled="updateConfigNumRecForm.$invalid || disabled_modal">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Hủy</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form> -->
            <form class="form-horizontal" role="form" name="formChangePassword">
              <div class="form-group">
                <label class="control-label col-sm-4" for="email">Mật khẩu mới</label>
                <div class="col-sm-8">
                   <input class="form-control" ng-model="admin.password" data-ng-class="{'ng-invalid':formChangePassword.confirmPassword.$error.match}" password-validate="" required="" type="password" id="password"  />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4" for="pwd">Nhập lại mật khẩu</label>
                <div class="col-sm-8">
                  <input ng-model="admin.passwordConfirm" type="password" data-match="admin.password" name="confirmPassword" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <div class="text-danger col-sm-8 col-sm-offset-4 text-right" ng-show="formChangePassword.confirmPassword.$error.pwd"><b>Mật khẩu tối thiểu 8 ký tự và ít nhất 1 chữ số .</b></div>
                <div class="text-danger col-sm-8 col-sm-offset-4 text-right" ng-show="formChangePassword.confirmPassword.$error.match"><b>Mật khẩu không trùng.</b></div>

              </div>

            </form>

            <!-- <form name="myForm" >
                <div class="control-group">
                    <label class="control-label" for="inputPassword">Password</label>
                    <div class="controls">
                        <input ng-model="admin.password" data-ng-class="{'ng-invalid':myForm.confirmPassword.$error.match}" password-validate="" required="" type="password" id="password" placeholder="Password" />
                    </div>
                </div>
                <br />
                <input ng-model="user.passwordConfirm" type="password" data-match="admin.password" name="confirmPassword" class="form-control" placeholder = "Confirm Password"/>
                <br />
                <div ng-show="myForm.confirmPassword.$error.match">Passwords do not match!</div>
                <div ng-show="myForm.confirmPassword.$error.pwd">Password strength!</div>
                <br/>
                {{user | json}}
            </form> -->
    </div>
    <div class="modal-footer">
        <div class="row">
            <div class="col-sm-12 text-right">
                <button class="btn btn-primary" ng-click="changePassword(admin)" ng-disabled="formChangePassword.confirmPassword.$error.pwd || formChangePassword.confirmPassword.$error.match || admin.password.length <= 0 || admin.passwordConfirm.length <= 0 ">Thay đổi</button>
                <button class="btn btn-danger" ng-click="cancel();">Đóng</button>
            </div>
        </div>
    </div>
</section>
