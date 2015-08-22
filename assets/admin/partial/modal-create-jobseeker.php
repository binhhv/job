<section ng-controller="jobseekerController">
    <div class="modal-header">
        <h3 class="modal-title">Tạo ứng viên tìm việc</h3>
    </div>
    <div class="modal-body">
            <form name="createJobseekerForm" novalidate>
                <fieldset>
                    <div class="row" show-errors>
                       <!--  <label class="error"
                                ng-show="createJobseekerForm.firstname.$error.maxlength">
                                Your name cannot be longer than 20 characters
                        </label>
                        <div ng-if="createJobseekerForm.password.$error.minlength" class="text-danger">
                            <strong data-ng-bind="error">
                                Mật khẩu phải có tối thiểu 6 ký tự.
                            </strong>
                        </div>
                        <div ng-if="createJobseekerForm.username.$error.required" class="text-danger">
                            <strong data-ng-bind="error">
                                Mật khẩu phải có tối thiểu 6 ký tự.
                            </strong>
                        </div>
                             <div class="form-group">  <div class="text-danger">  <span class="help-block"
                               ng-show="createJobseekerForm.firstname.$error.required">Required</span></div></div> -->
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
                                   <span class="errorMessage" ng-show="createJobseekerForm.email.$dirty && createJobseekerForm.email.$error.unique">
                                        Email đăng ký đã tồn tại.
                                    </span>
                            </div> -->
                            <div class="error text-center"
                                        ng-show="createJobseekerForm.email.$dirty && createJobseekerForm.email.$invalid">
                                    <label class="error alert-danger"
                                        ng-show="createJobseekerForm.email.$error.required">
                                            Email không được để trống
                                    </label>
                                    <label class="error alert-danger"
                                             ng-show="createJobseekerForm.email.$error.email">
                                             Email không hợp lệ.
                                      </label>
                                     <label class="error alert-danger"
                                        ng-show="createJobseekerForm.email.$error.unique">
                                           Email đăng ký đã tồn tại.
                                    </label>

                                  </div>
                             <div class="error text-center"
                                        ng-show="createJobseekerForm.password.$dirty && createJobseekerForm.password.$invalid">
                                    <label class="error alert-danger"
                                        ng-show="createJobseekerForm.password.$error.required">
                                            Mật khẩu không được để trống
                                    </label>
                                    <label class="error alert-danger"
                                            ng-show="createJobseekerForm.password.$error.minlength">
                                            Mật khẩu phải lớn hơn 6 ký tự.
                                    </label>

                                  </div>


                                  <div class="error text-center"
                                        ng-show="createJobseekerForm.firstname.$dirty && createJobseekerForm.firstname.$invalid">
                                    <label class="error alert-danger"
                                        ng-show="createJobseekerForm.firstname.$error.required">
                                            Họ không được để trống.
                                    </label>


                                  </div>

                                  <div class="error text-center"
                                        ng-show="createJobseekerForm.lastname.$dirty && createJobseekerForm.lastname.$invalid">
                                    <label class="error alert-danger"
                                        ng-show="createJobseekerForm.lastname.$error.required">
                                            Tên không được để trống
                                    </label>


                                  </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group col-sm-6">
                                <label class="control-label" >Email</label><label class="text-danger" ng-show="createJobseekerForm.email.$error.required">*</label>
                                <div class="controls">
                                    <input type="email" name="email"  ng-model="jobseeker.account_email" id="email" class="form-control" required  wc-unique="">
                                     <span class="hide-while-in-focus"
     ng-show="createJobseekerForm.email.$error.unique">Username taken!</span>
                                </div>
                            </div>
                             <div class="form-group col-sm-6">
                                <label class="control-label" >Mật khẩu</label><label class="text-danger" ng-show="createJobseekerForm.password.$error.required">*</label>
                                <div class="controls">
                                    <input type="password" name="password" ng-model="jobseeker.account_password" id="password" class="form-control" ng-minlength=6  required>
                                     <p class="help-block" ng-show="createJobseekerForm.email.$error.unique">Username is already taken.</p>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label">Họ </label><label class="text-danger" ng-show="createJobseekerForm.firstname.$error.required">*</label>
                                <div class="controls">
                                    <input type="text" ng-model="jobseeker.account_first_name" id="firstname" name="firstname" class="form-control" required>

                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" >Tên</label><label class="text-danger" ng-show="createJobseekerForm.lastname.$error.required">*</label>
                                <div class="controls">
                                    <input type="text" ng-model="jobseeker.account_last_name" name="lastname" id="lastname" class="form-control" required>
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

                                <button name="save-jobseeker" class="btn btn-success" ng-click="createJobseeker(jobseeker,csrf);ok()" ng-disabled="createJobseekerForm.$invalid">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Huỷ</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
