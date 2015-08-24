<section ng-controller="documentController">
    <div class="modal-header">
        <h3 class="modal-title">Thông tin hồ sơ</h3>
    </div>
    <div class="modal-body">
            <form name="updateFormForm" novalidate>
            <fieldset>
                <div class="row">
                    <div class="col-sm-12">
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="firstname">Họ tên</label>
                                <div class="controls">
                                    <input type="text" ng-model="docform.jobseeker_name" id="name" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="firstname">Ngày sinh</label><label class="text-danger" >*</label>
                                <div class="controls">

                                      <!-- <input type="date" value="{{ docform.docon_birthday | date: 'yyyy-MM-dd' }}" name="birthday" id="birthday" name="input" ng-model="docform.docon_birthday"
        min="1950-01-01" max="2015-07-31" required /> -->
           <!-- <input type="date" id="exampleInput" name="input" ng-model="docform.birthday"
       placeholder="yyyy-MM-dd" min="2013-01-01" max="2013-12-31" required /> -->
          <input type="date" id="docon_birthday" name="docon_birthday" ng-model="docform.docon_birthday"
       placeholder="dd/MM/yyyy" min="1950-01-01" max="2013-12-31" required class="form-control" />
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Số điện thoại </label><label class="text-danger" >*</label>
                                <div class="controls">
                                    <input type="text" name="phone" ng-model="docform.docon_phone" id="phone" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Email</label><label class="text-danger" >*</label>
                                <div class="controls">
                                    <input type="email" name="phone" ng-model="docform.account_email" id="phone" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Nghề nghiệp </label><label class="text-danger" >*</label>
                                <div class="controls">
                                    <input type="text" name="career" ng-model="docform.docon_career" id="career" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Bằng cấp/Giấy chứng nhận</label><label class="text-danger" >*</label>
                                <div class="controls">
                                    <input type="text" name="degree" ng-model="docform.docon_degree" id="degree" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Học vấn </label><label class="text-danger" >*</label>
                                <div class="controls">
                                    <input type="text" name="education" ng-model="docform.docon_education" id="education" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Nơi ở hiện tại</label><label class="text-danger" >*</label>
                                <div class="controls">
                                    <input type="text" name="address" ng-model="docform.docon_address" id="address" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Kinh nghiệm </label><label class="text-danger" >*</label>
                                <div class="controls">
                                    <input type="text" name="experience" ng-model="docform.docon_experience" id="experience" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Tình trạng sức khỏe </label>
                                <div class="controls">
                                <!--  <select  class="form-control" ng-model="docform.docon_healthy" ng-options="template.value as template.name for template in docform.listHealthy">
              </select> -->
                                <!-- <select ng-model="docform.docon_healthy"
                                        ng-init="docform.docon_healthy = docform.docon_healthy || options[0].healthy_id"
                                        ng-options="option.healthy_type as option.healthy_type for option in docform.listHealthy">
                                </select> -->
                                <select name="docon_healthy" ng-model="docform.docon_healthy" class="form-control">
                                  <option ng-repeat="option in docform.listHealthy" value="{{option.healthy_id}}">{{option.healthy_type}}</option>
                                </select>
                                    <!-- <input type="text" name="healthy" ng-model="docform.docon_healthy" id="healthy" class="form-control" required> -->
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="suburb">Sở thích/Kỹ năng đặc biệt</label><label class="text-danger" >*</label>
                                <div class="controls">
                                <textarea name="message" name="skill" ng-model="docform.docon_skill" id="skill" class="form-control" tabindex="3" rows="3" cols="50" required></textarea>
                                    <!-- <input type="text" name="skill" ng-model="docform.docon_skill" id="skill" class="form-control" required> -->
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <label class="control-label" for="suburb">Lý do ứng tuyển</label><label class="text-danger" >*</label>
                                <div class="controls">
                                <textarea name="message" name="apply" ng-model="docform.docon_reason_apply" id="apply" class="form-control" tabindex="3" rows="3" cols="50" required></textarea>
                                    <!-- <input type="text" name="apply" ng-model="docform.docon_reason_apply" id="apply" class="form-control" required> -->
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="suburb">Mức lương </label><label class="text-danger" >*</label>
                                <div class="controls">
                                    <input type="text" name="salary" ng-model="docform.docon_salary" id="salary" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="suburb">Vấn đề khác</label>
                                <div class="controls">
                                <textarea name="message" name="advance" ng-model="docform.docon_advance" id="advance" class="form-control" tabindex="3" rows="3" cols="50" ></textarea>
                                    <!-- <input type="text" name="advance" ng-model="docform.docon_advance" id="advance" class="form-control" required> -->
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="control-label">Các trường <label class="text-danger" >(*)</label> là bắt buộc</div>
                            </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">
                                <button class="btn btn-success" ng-click="updateForm(docform)" ng-disabled="updateFormForm.$invalid">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Đóng</button>
                            </div>
                        </div>
                    </div>
            </fieldset>

            </form>
    </div>
</section>
