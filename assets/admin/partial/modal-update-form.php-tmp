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
                                    <input type="text" ng-model="docform.jobseeker_name" id="name" class="form-control" ng-disabled="docform.docon_type == 1">
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
       placeholder="dd/MM/yyyy" min="1950-01-01" max="2013-12-31" required class="form-control" ng-disabled="docform.docon_type == 1"/>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Số điện thoại </label><label class="text-danger" >*</label>
                                <div class="controls">
                                    <input type="text" name="phone" ng-model="docform.docon_phone" id="phone" class="form-control" required ng-disabled="docform.docon_type == 1">
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Email</label><label class="text-danger" >*</label>
                                <div class="controls">
                                    <input type="email" name="phone" ng-model="docform.jobseeker_email" id="phone" class="form-control" ng-disabled="docform.docon_type == 1">
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Trình độ tiếng nhật</label><label class="text-danger">(*)</label>
                                <div class="controls">
                                <select class="form-control" name="docon_map_job_level" id="docon_map_job_level"
      ng-options="option.ljob_level for option in docform.listLevels track by option.ljob_id"
      ng-model="docform.object_level"></select>
                                   <!-- <select name="rec_job_map_level" ng-model="rec.rec_job_map_level" class="form-control">
                                      <option ng-repeat="option in rec.listLevels" value="{{option.ljob_id}}">{{option.ljob_level}}</option>
                                    </select> -->
                                </div>
                            </div>


                            <div class="form-group col-sm-6">
                                <label class="control-label" for="firstname">Việc làm tại  </label><label class="text-danger">(*)</label>
                                <div class="controls">
                                <label data-ng-repeat="choice in docform.listCountries" class="col-sm-6" >
                                  <input  type="radio" ng-change="changeCountry()" name="object_country" ng-model="docform.object_country" ng-value="choice.country_id" />
                                  {{choice.country_name}}
                                </label>
                                <!-- <select ng-change="changeCountry()" name="rec_job_map_country" ng-model="rec.rec_job_map_country" class="form-control">
                                            <option ng-repeat="option in rec.listCountrys" value="{{option.country_id}}">{{option.country_name}}</option>
                                    </select> -->
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="firstname">Tình thành phố</label><label class="text-danger">(*)</label>
                                <div class="controls">
                                   <!-- <ui-select multiple ng-model="rec.provinceSelected" theme="bootstrap" ng-disabled="disabled" sortable="true" close-on-select="false" >
                                        <ui-select-match placeholder="Chọn tỉnh thành...">{{$item.province_name}} </ui-select-match>
                                        <ui-select-choices repeat="province in rec.listProvinces | propsFilter: {name: $select.search, age: $select.search}">
                                          <div ng-bind-html="province.province_name | highlight: $select.search"></div>
                                          <small>

                                            <span ng-bind-html="''+province.province_name | highlight: $select.search"></span>
                                          </small>
                                        </ui-select-choices>
                                      </ui-select> -->
                                     <!--  <ui-select multiple ng-model="rec.provinceSelected" theme="bootstrap" ng-disabled="disabled" sortable="true" close-on-select="false" >
    <ui-select-match placeholder="Chọn tỉnh thành">{{$item.province_name}}</ui-select-match>
    <ui-select-choices repeat="province in listProvinces">
      <div ng-bind-html="province.province_name | highlight: $select.search"></div>

    </ui-select-choices>
  </ui-select> -->
  <ui-select multiple ng-change="changeProvinceCreate()"  ng-model="docform.provinceSelected" theme="bootstrap" ng-disabled="disabled" sortable="true" close-on-select="false" >
    <ui-select-match placeholder="Chọn tỉnh thành">{{$item.province_name}} </ui-select-match>
    <ui-select-choices repeat="province in docform.listProvinces | propsFilter: {province_name: $select.search} " id="select-Province">
      <div ng-bind-html="province.province_name | highlight: $select.search" ></div>

    </ui-select-choices>
  </ui-select>
  <label class="text-danger"> (tối thiểu 1 tỉnh thành và tối đa 5 tỉnh thành)</label>
  <!-- <oi-select
                oi-options="item.province_name for item in rec.listProvinces track by item.province_id"
                ng-model="rec.provinceSelected"
                multiple
                placeholder="Select"
                ></oi-select> -->
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
                                <select class="form-control" name="docon_healthy" id="docon_healthy"
      ng-options="option.healthy_type for option in docform.listHealthy track by option.healthy_id"
      ng-model="docform.object_docon_healthy"></select>
                                <!-- <select name="docon_healthy" ng-model="docform.docon_healthy" class="form-control">
                                  <option ng-repeat="option in docform.listHealthy" value="{{option.healthy_id}}">{{option.healthy_type}}</option>
                                </select> -->
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
                                <label class="control-label" for="suburb">Nguyện vọng</label>
                                <div class="controls">
                                <textarea name="message" name="advance" ng-model="docform.docon_wish" id="advance" class="form-control" tabindex="3" rows="3" cols="50" ></textarea>
                                    <!-- <input type="text" name="advance" ng-model="docform.docon_advance" id="advance" class="form-control" required> -->
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
                                <button class="btn btn-success" ng-click="updateForm(docform)" ng-disabled="updateFormForm.$invalid || disabled_modal || docform.provinceSelected.length == 0">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Đóng</button>
                            </div>
                        </div>
                    </div>
            </fieldset>

            </form>
    </div>
</section>
