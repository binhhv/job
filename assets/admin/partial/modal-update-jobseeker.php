<section ng-controller="jobseekerController">
    <div class="modal-header">
        <h3 class="modal-title">Chỉnh sửa: {{jobseeker.account_first_name}} {{jobseeker.account_last_name}}</h3>
    </div>
    <div class="modal-body">
            <form name="updatejobseekerForm">
                <fieldset>
                    <div class="row">
                        <div data-ng-show="error" class="text-danger">
                            <strong data-ng-bind="error"></strong>
                        </div>
                        <div class="form-group">
                            <div data-ng-show="error" class="text-center text-danger">
                                <div class="alert alert-danger" role="alert">
                                    <strong data-ng-bind="error"></strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="firstname">Mã số</label>
                                <div class="controls">
                                    <input type="text" ng-model="jobseeker.account_id" id="accountid" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="firstname">Email</label>
                                <div class="controls">
                                    <input type="text" ng-model="jobseeker.account_email" id="email" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Họ </label>
                                <div class="controls">
                                    <input type="text" ng-model="jobseeker.account_first_name" id="firstname" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Tên</label>
                                <div class="controls">
                                    <input type="text" ng-model="jobseeker.account_last_name" id="lastname" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="country">Mật khẩu</label>
                                <div class="controls">
                                    <input type="password" ng-model="jobseeker.account_password" id="password" class="form-control">
                                    <label class="text-danger">( Nhập mật khẩu mới nếu bạn muốn thay đổi)</label>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="country">Trạng thái</label>
                                <div class="controls">

                                    <button class="btn btn-xs btn-success margin-top-10" ng-disabled="jobseeker.account_is_disabled == 0" ng-click="setDisabled(0);"> hoạt động</button> &nbsp;
                                    <button class="btn btn-xs btn-danger margin-top-10" ng-disabled="jobseeker.account_is_disabled == 1" ng-click="setDisabled(1);">ngưng hoạt động</button>
                                    <!-- <label> <input type="checkbox" ng-model="jobseeker.account_is_disabled" id="isdisabled" >
                                             <span ng-if="jobseeker.account_is_disabled">
                                                hoạt động
                                             </span>
                                             <span ng-if="!jobseeker.account_is_disabled">
                                               ngưng hoạt động
                                             </span>
                                    </label> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="updateJobseeker(jobseeker);ok()" ng-disabled="updatejobseekerForm.$invalid">Update & Close</button>
                                <button class="btn btn-warning" ng-click="cancel()">Cancel</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
