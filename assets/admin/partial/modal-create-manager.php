<section ng-controller="managerController">
    <div class="modal-header">
        <h3 class="modal-title">Tạo quản trị viên</h3>
    </div>
    <div class="modal-body">
            <form name="createManagerForm" novalidate>
                <fieldset>
                    <div class="row" show-errors>
                       <!--  <label class="error"
                                ng-show="createManagerForm.firstname.$error.maxlength">
                                Your name cannot be longer than 20 characters
                        </label>
                        <div ng-if="createManagerForm.password.$error.minlength" class="text-danger">
                            <strong data-ng-bind="error">
                                Mật khẩu phải có tối thiểu 6 ký tự.
                            </strong>
                        </div>
                        <div ng-if="createManagerForm.username.$error.required" class="text-danger">
                            <strong data-ng-bind="error">
                                Mật khẩu phải có tối thiểu 6 ký tự.
                            </strong>
                        </div>
                             <div class="form-group">  <div class="text-danger">  <span class="help-block"
                               ng-show="createManagerForm.firstname.$error.required">Required</span></div></div> -->
                        <!--  <p class="help-block" ng-show="signup_form.username.$error.required">Username is required.</p>
                        <p class="help-block" ng-if="signup_form.username.$error.minlength">Must be at least 5 characters.</p>
                        <p class="help-block" ng-show="signup_form.username.$error.unique">Username is already taken.</p> -->
                        <!-- <div class="form-group">
                            <div class="text-center text-danger">
                                <div class="alert alert-danger" role="alert">
                                    <strong >

                                    </strong>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-sm-12">
                            <!-- <div class="form-group text-center">
                                   <span class="errorMessage" ng-show="createManagerForm.email.$dirty && createManagerForm.email.$error.unique">
                                        Email đăng ký đã tồn tại.
                                    </span>
                            </div> -->
                            <div class="error text-center"
                                        ng-show="createManagerForm.email.$dirty && createManagerForm.email.$invalid">
                                    <label class="error alert-danger"
                                        ng-show="createManagerForm.email.$error.required">
                                            Email không được để trống
                                    </label>
                                    <label class="error alert-danger"
                                             ng-show="createManagerForm.email.$error.email">
                                             Email không hợp lệ.
                                      </label>
                                     <label class="error alert-danger"
                                        ng-show="createManagerForm.email.$error.unique">
                                           Email đăng ký đã tồn tại.
                                    </label>

                                  </div>
                             <div class="error text-center"
                                        ng-show="createManagerForm.password.$dirty && createManagerForm.password.$invalid">
                                    <label class="error alert-danger"
                                        ng-show="createManagerForm.password.$error.required">
                                            Mật khẩu không được để trống
                                    </label>
                                    <label class="error alert-danger"
                                            ng-show="createManagerForm.password.$error.minlength">
                                            Mật khẩu phải lớn hơn 6 ký tự.
                                    </label>

                                  </div>


                                  <div class="error text-center"
                                        ng-show="createManagerForm.firstname.$dirty && createManagerForm.firstname.$invalid">
                                    <label class="error alert-danger"
                                        ng-show="createManagerForm.firstname.$error.required">
                                            Họ không được để trống.
                                    </label>


                                  </div>

                                  <div class="error text-center"
                                        ng-show="createManagerForm.lastname.$dirty && createManagerForm.lastname.$invalid">
                                    <label class="error alert-danger"
                                        ng-show="createManagerForm.lastname.$error.required">
                                            Tên không được để trống
                                    </label>


                                  </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group col-sm-6">
                                <label class="control-label" >Email</label><label class="text-danger" ng-show="createManagerForm.email.$error.required">*</label>
                                <div class="controls">
                                    <input type="email" name="email"  ng-model="manager.account_email" id="email" class="form-control" required  wc-unique="">
                                    <!--  <span class="hide-while-in-focus"
     ng-show="createManagerForm.email.$error.unique">Username taken!</span> -->
                                </div>
                            </div>
                             <div class="form-group col-sm-6">
                                <label class="control-label" >Mật khẩu</label><label class="text-danger" ng-show="createManagerForm.password.$error.required">*</label>
                                <div class="controls">
                                    <input type="password" name="password" ng-model="manager.account_password" id="password" class="form-control" ng-minlength=6  required>
                                     <!-- <p class="help-block" ng-show="createManagerForm.email.$error.unique">Username is already taken.</p> -->
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label">Họ </label><label class="text-danger" ng-show="createManagerForm.firstname.$error.required">*</label>
                                <div class="controls">
                                    <input type="text" ng-model="manager.account_first_name" id="firstname" name="firstname" class="form-control" required>

                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" >Tên</label><label class="text-danger" ng-show="createManagerForm.lastname.$error.required">*</label>
                                <div class="controls">
                                    <input type="text" ng-model="manager.account_last_name" name="lastname" id="lastname" class="form-control" required>
                                    <input type="hidden" ng-model="csrf.csrf_name">
                                    <input type="hidden" ng-model="csrf.csrf_hash">
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="text-danger">*</label> bắt buộc.
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button name="save-manager" class="btn btn-success" ng-click="createManager(manager,csrf);" ng-disabled="createManagerForm.$invalid">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Huỷ</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
