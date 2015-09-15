<div ng-controller="recruitmentController">
    <div class="modal-header">
        <h3 class="modal-title">Sửa tin tuyển dụng  </h3> <!--{{rec.provinceSelected}}-->
        <h5>Các trường <label class="text-danger">(*)</label> là bắt buộc</h5>
    </div>
    <div class="modal-body">
            <form name="employerUpdateRecruitmentForm" novalidate>
            <fieldset>
                <div class="row">
                    <div class="col-sm-12">
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="firstname">Tiêu đề</label><label class="text-danger">(*)</label>
                                <div class="controls">
                                    <input type="text" class="form-control" ng-model="rec.rec_title" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                             <label class="control-label" for="suburb">Ngành nghề</label><label class="text-danger">(*)</label>
                                <div class="controls">
                                <select class="form-control" name="rec_job_map_career" id="rec_job_map_career"
      ng-options="option.career_name for option in rec.listCareers track by option.career_id"
      ng-model="rec.object_career"></select>

                                </div>
                                <!-- <label class="control-label" for="surname">Nghề nghiệp </label><label class="text-danger" >*</label>
                                <div class="controls">
                                    <input type="text" name="career" ng-model="docform.docon_career" id="career" class="form-control" required>
                                </div> -->
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="firstname">Việc làm tại  </label><label class="text-danger">(*)</label>
                                <div class="controls">
                                <label data-ng-repeat="choice in rec.listCountrys" class="col-sm-6" >
                                  <input  type="radio" ng-change="changeCountry()" name="rec_job_map_country" ng-model="rec.rec_job_map_country" ng-value="choice.country_id" />
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
  <ui-select multiple ng-change="changeProvince()"  ng-model="rec.provinceSelected" theme="bootstrap" ng-disabled="disabled" sortable="true" close-on-select="false" >
    <ui-select-match placeholder="Chọn tỉnh thành">{{$item.province_name}} </ui-select-match>
    <ui-select-choices repeat="province in rec.listProvinces " id="select-Province">
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
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="firstname">Phúc lợi</label>
                                <div class="controls" style="background: #f2f9f2">
                                <!-- {{rec.welfares}} -->
                                    <!-- <div ng-repeat="item in rec.welfares">
                                        <i ng-class="item.iconwelfare"></i> &nbsp; {{item.titlewelfare}}
                                    </div> -->
                                        <div ng-repeat="option in rec.listWelfares" >
                                          <div class="action-checkbox">
                                           <input id="{{option.welfare_id}}" type="checkbox" value="{{option.welfare_id}}" ng-checked="rec.welfareSelected.indexOf(option.welfare_id) > -1" ng-click="toggleSelection(option.welfare_id)" />
                                           <label for="{{option.welfare_title}}"></label>
                                           {{option.welfare_title}}
                                          </div>
                                         </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="surname">Mức lương </label><label class="text-danger">(*)</label>
                                <div class="controls">
                                   <!-- <input type="text" class="form-control" ng-model="rec.rec_salary" required> -->
                                  <select class="form-control" name="rec_map_salary" id="rec_map_salary"
      ng-options="option.salary_value for option in rec.listSalaries track by option.salary_id"
      ng-model="rec.object_salary"></select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="suburb">MÔ TẢ CÔNG VIỆC</label>
                                <div class="controls">
                                    <hr>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="surname">Nội dung công việc</label><label class="text-danger">(*)</label>
                                <div class="controls">
                                <textarea name="rec_job_content" ng-model="rec.rec_job_content" id="rec_job_content" class="form-control" tabindex="3" rows="5" cols="50" required></textarea>
                                    <!-- <input type="text" name="skill" ng-model="docform.docon_skill" id="skill" class="form-control" required> -->
                                </div>


                            </div>
                             <div class="form-group col-sm-12">
                                <label class="control-label" for="surname">Chế độ hậu đãi </label><label class="text-danger">(*)</label>
                                <div class="controls">
                                <textarea  name="rec_job_regimen" ng-model="rec.rec_job_regimen" id="rec_job_regimen" class="form-control" tabindex="3" rows="5" cols="50" required></textarea>

                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Thời gian làm việc</label><label class="text-danger">(*)</label>
                                <div class="controls">
                                <input type="date" id="rec_job_time" name="rec_job_time" ng-model="rec.rec_job_time"
                                 placeholder="dd/MM/yyyy" min="1950-01-01" max="2015-12-31" required class="form-control" />

                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <label class="control-label" for="suburb">YÊU CẦU CÔNG VIỆC</label>
                                <div class="controls">
                                    <hr>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="surname">Yêu cầu bắt buộc</label><label class="text-danger">(*)</label>
                                <div class="controls">
                                <textarea  name="rec_job_require" ng-model="rec.rec_job_require" id="rec_job_require" class="form-control" tabindex="3" rows="5" cols="50" required></textarea>

                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="suburb">Điều kiện/Ưu tiên</label><label class="text-danger">(*)</label>
                                <div class="controls">
                                   <textarea  name="rec_job_priority" ng-model="rec.rec_job_priority" id="rec_job_priority" class="form-control" tabindex="3" rows="5" cols="50" required></textarea>


                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Hình thức công việc </label><label class="text-danger">(*)</label>
                                <div class="controls">
                                   <div class="col-sm-12 no-padding">
                                        <!-- <select name="rec_job_map_form" ng-model="rec.rec_job_map_form" class="form-control">
                                            <option ng-repeat="option in rec.listForms" value="{{option.fjob_id}}">{{option.fjob_type}}</option>
                                        </select> -->
                                        <select class="form-control" name="rec_job_map_form" id="rec_job_map_form"
      ng-options="option.fjob_type for option in rec.listForms track by option.fjob_id"
      ng-model="rec.object_form"></select>
                                   </div>
                                   <div class="col-sm-12 margin-top-10 no-padding">
                                   <select class="form-control" name="rec_job_map_form_child" id="rec_job_map_form_child"
      ng-options="option.jcform_type for option in rec.listFormChilds track by option.jcform_id"
      ng-model="rec.object_form_child"></select>
                                         <!-- <select name="rec_job_map_form_child" ng-model="rec.rec_job_map_form_child" class="form-control">
                                            <option ng-repeat="option in rec.listFormChilds" value="{{option.jcform_id}}">{{option.jcform_type}}</option>
                                        </select> -->
                                   </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Trình độ tiếng nhật</label><label class="text-danger">(*)</label>
                                <div class="controls">
                                <select class="form-control" name="rec_job_map_level" id="rec_job_map_level"
      ng-options="option.ljob_level for option in rec.listLevels track by option.ljob_id"
      ng-model="rec.object_level"></select>
                                   <!-- <select name="rec_job_map_level" ng-model="rec.rec_job_map_level" class="form-control">
                                      <option ng-repeat="option in rec.listLevels" value="{{option.ljob_id}}">{{option.ljob_level}}</option>
                                    </select> -->
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="suburb">THÔNG TIN LIÊN HỆ </label>
                                <div class="controls">
                                    <hr>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Người liên hệ</label><label class="text-danger">(*)</label>
                                <div class="controls">
                                    <input type="text" class="form-control" ng-model ="rec.rec_contact_name" name="rec_contact_name" id="rec_contact_name" required>

                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Email</label><label class="text-danger">(*)</label>
                                <div class="controls">
                                    <input type="email" class="form-control" ng-model ="rec.rec_contact_email" name="rec_contact_email" id="rec_contact_email" required>

                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Địa chỉ</label><label class="text-danger">(*)</label>
                                <div class="controls">
                                    <input type="text" class="form-control" ng-model ="rec.rec_contact_address" name="rec_contact_address" id="rec_contact_address" required>


                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Điện thoại</label><label class="text-danger">(*)</label>
                                <div class="controls">
                                 <input type="text" class="form-control" ng-model ="rec.rec_contact_phone" name="rec_contact_phone" id="rec_contact_phone" required>



                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Di động</label>
                                <div class="controls">
                                 <input type="text" class="form-control" ng-model ="rec.rec_contact_mobile" name="rec_contact_mobile" id="rec_contact_mobile">

                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Hình thức liên hệ</label><label class="text-danger">(*)</label>
                                <div class="controls">
                                    <!-- <select name="rec_contact_form" ng-model="rec.object_contact_form" class="form-control">
                                      <option ng-repeat="option in rec.listContactForms" value="{{option.contact_form_id}}">{{option.contact_form_type}}</option>
                                    </select> -->
                                     <select class="form-control" name="rec_contact_form" id="rec_contact_form"
      ng-options="option.contact_form_type for option in rec.listContactForms track by option.contact_form_id"
      ng-model="rec.object_contact_form"></select>

                                </div>
                            </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">
                            <button class="btn btn-success" ng-click="updateEmployerRecruitment(rec)" ng-disabled="employerUpdateRecruitmentForm.$invalid || rec.provinceSelected.length == 0 || disabled_modal">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Đóng</button>
                            </div>
                        </div>
                    </div>
            </fieldset>

            </form>
    </div>
</div>
