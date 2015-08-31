<div ng-controller="employerController">
    <div class="modal-header">
        <h3 class="modal-title">Tạo nhà tuyển dụng  </h3> <!--{{rec.provinceSelected}}-->
        <h5>Các trường <label class="text-danger">(*)</label> là bắt buộc</h5>
    </div>
    <div class="modal-body">
            <form name="employerCreateForm" novalidate>
            <fieldset>
                <div class="row">
                    <div class="col-sm-12">
                            <div class="form-group col-sm-12 no-padding-responsive">
                              <div class="col-sm-6 no-padding">
                                <label class="control-label" for="firstname">Nhà tuyển dụng</label><label class="text-danger">(*)</label>
                                <div class="controls">
                                    <input type="text" class="form-control" ng-model="employer.employer_name" required>
                                </div>
                                <label class="control-label" for="firstname">Người đại diện<label class="text-danger">(*)</label></label>
                                <div class="controls">
                                <div class="row">
                                  <div class="col-sm-6 col-xs-12">
                                    <input placeholder="Họ" type="text" class="form-control" ng-model="employer.employer_admin_first_name" required>
                                  </div>
                                  <div class="col-sm-6 col-xs-12 ">
                                    <input placeholder="Tên" type="text" class="form-control" ng-model="employer.employer_admin_last_name" required>
                                  </div>
                                </div>

                                </div>
                                <label class="control-label" for="firstname">Email</label><label class="text-danger">(*)</label>&nbsp;<label class="text-danger"  ng-show="employerCreateForm.email.$error.unique" >
                                           Email đăng ký đã tồn tại.</label>
                                <div class="controls">
                                    <input name="email" type="email" class="form-control" ng-model="employer.employer_admin_email" wc-unique="" required>
                                </div>
                                </div>
                                <div class="col-sm-6 no-padding-right">
                                <label class="text-danger error-upload">
                                <span>(".jpg", ".jpeg", ".bmp", ".gif", ".png" < 2MB)</span>
                                <span ng-show="fileTypeValidate">file không đúng định dạng</span>
                                <span ng-show ="fileSizeValidate">dung lượng file quá lớn</span>
                                </label>
                                    <label class="control-label" for="firstname">Logo nhà tuyển dụng</label>
                                <div class="controls logo-modal">
                                <!-- <label data-ng-repeat="choice in rec.listCountrys" class="col-sm-6" > -->
                                <div class="col-sm-12 no-padding-child image-preview">
                                  <img ng-src="{{employer.pathWebsite}}uploads/logo/{{employer.employer_id}}/{{employer.employer_logo_tmp}}"  id="employer_logo_tmp">

                                  </div>
                                  <div class="col-sm-12 no-padding-child">
                                  <!--  <input class="form-control" type="file" fileread="logo"  /> -->
                                   <input class="form-control" accept="image/*" fileread="logo" type="file" name="file" onchange="angular.element(this).scope().uploadFile(this.files)"/>
                                  </div>
                                  <!-- <input  type="radio" ng-change="changeCountry()" name="rec_job_map_country" ng-model="rec.rec_job_map_country" ng-value="choice.country_id" />
                                  {{choice.country_name}} -->
                                <!-- </label> -->
                                <!-- <select ng-change="changeCountry()" name="rec_job_map_country" ng-model="rec.rec_job_map_country" class="form-control">
                                            <option ng-repeat="option in rec.listCountrys" value="{{option.country_id}}">{{option.country_name}}</option>
                                    </select> -->
                                </div>
                                </div>
                            </div>
                             <div class="form-group col-sm-6">
                                <label class="control-label" for="firstname">Trụ sở tại</label><label class="text-danger">(*)</label>
                                <div class="controls">
                                <label data-ng-repeat="choice in employer.listCountrys" class="col-sm-6" >
                                  <input  type="radio" ng-change="changeCountryUpdateEmployer()" name="employer_map_country" ng-model="employer.employer_map_country" ng-value="choice.country_id" />
                                  {{choice.country_name}}
                                </label>
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
  <!-- <ui-select multiple ng-change="changeProvince()"  ng-model="rec.provinceSelected" theme="bootstrap" ng-disabled="disabled" sortable="true" close-on-select="false" >
    <ui-select-match placeholder="Chọn tỉnh thành">{{$item.province_name}} </ui-select-match>
    <ui-select-choices repeat="province in rec.listProvinces " id="select-Province">
      <div ng-bind-html="province.province_name | highlight: $select.search" ></div>

    </ui-select-choices>
  </ui-select>
  <label class="text-danger"> (tối thiểu 1 tỉnh thành và tối đa 5 tỉnh thành)</label> -->
  <!-- <oi-select
                oi-options="item.province_name for item in rec.listProvinces track by item.province_id"
                ng-model="rec.provinceSelected"
                multiple
                placeholder="Select"
                ></oi-select> -->
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="firstname">Tỉnh/thành phố</label>
                                <div class="controls" style="background: #f2f9f2">
                                <select class="form-control" name="employer_map_province" id="employer_map_province"
      ng-options="option.province_name for option in employer.listProvinces track by option.province_id"
      ng-model="employer.provinceSelected"></select>
                                <!-- {{rec.welfares}} -->
                                    <!-- <div ng-repeat="item in rec.welfares">
                                        <i ng-class="item.iconwelfare"></i> &nbsp; {{item.titlewelfare}}
                                    </div> -->
                                        <!-- <div ng-repeat="option in rec.listWelfares" >
                                          <div class="action-checkbox">
                                           <input id="{{option.welfare_id}}" type="checkbox" value="{{option.welfare_id}}" ng-checked="rec.welfareSelected.indexOf(option.welfare_id) > -1" ng-click="toggleSelection(option.welfare_id)" />
                                           <label for="{{option.welfare_title}}"></label>
                                           {{option.welfare_title}}
                                          </div>
                                         </div> -->

                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="firstname">Địa chỉ</label><label class="text-danger">(*)</label>
                                <div class="controls">
                                <input type="text" class="form-control" ng-model="employer.employer_address" required>
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
  <!-- <ui-select multiple ng-change="changeProvince()"  ng-model="rec.provinceSelected" theme="bootstrap" ng-disabled="disabled" sortable="true" close-on-select="false" >
    <ui-select-match placeholder="Chọn tỉnh thành">{{$item.province_name}} </ui-select-match>
    <ui-select-choices repeat="province in rec.listProvinces " id="select-Province">
      <div ng-bind-html="province.province_name | highlight: $select.search" ></div>

    </ui-select-choices>
  </ui-select>
  <label class="text-danger"> (tối thiểu 1 tỉnh thành và tối đa 5 tỉnh thành)</label> -->
  <!-- <oi-select
                oi-options="item.province_name for item in rec.listProvinces track by item.province_id"
                ng-model="rec.provinceSelected"
                multiple
                placeholder="Select"
                ></oi-select> -->
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Số điện thoại </label><label class="text-danger">(*)</label>
                                <div class="controls">
                                   <input type="text" class="form-control" ng-model="employer.employer_phone" required only-digits ng-maxlength="11" ng-minlenght="10">
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="suburb">THÔNG TIN NHÀ TUYỂN DỤNG</label>
                                <div class="controls">
                                    <hr>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="surname">Quy mô </label><label class="text-danger">(*)</label>
                                <div class="controls">
                                <input type="text" name="employer_size" ng-model="employer.employer_size" id="employer_size" class="form-control"  required />
                                    <!-- <input type="text" name="skill" ng-model="docform.docon_skill" id="skill" class="form-control" required> -->
                                </div>


                            </div>
                             <div class="form-group col-sm-12">
                                <label class="control-label" for="surname">Giới thiệu</label><label class="text-danger">(*)</label>
                                <div class="controls">
                                <textarea  name="employer_about" ng-model="employer.employer_about" id="employer_about" class="form-control" tabindex="3" rows="5" cols="50" required></textarea>

                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Fax</label><label class="text-danger">(*)</label>
                                <div class="controls">
                                <input class="form-control" type="text" name="employer_fax" id="employer_fax" ng-model="employer.employer_fax" />

                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Website</label><label class="text-danger">(*)</label>
                                <div class="controls">
                                <input type="text" id="employer_website" name="employer_website" class="form-control" ng-model="employer.employer_website" />

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
                                    <input type="text" class="form-control" ng-model ="employer.employer_contact_name" name="employer_contact_name" id="employer_contact_name" required>

                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Email</label><label class="text-danger">(*)</label>
                                <div class="controls">
                                    <input type="email" class="form-control" ng-model ="employer.employer_contact_email" name="employer_contact_email" id="employer_contact_email" required>

                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Điện thoại</label><label class="text-danger">(*)</label>
                                <div class="controls">
                                 <input type="text" class="form-control" ng-model ="employer.employer_contact_phone" name="employer_contact_phone" id="employer_contact_phone" required only-digits ng-maxlength="11" ng-minlenght="10">



                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Di động</label>
                                <div class="controls">
                                 <input type="text" class="form-control" ng-model ="employer.employer_contact_mobile" name="employer_contact_mobile" id="employer_contact_mobile" only-digits ng-maxlength="11" ng-minlenght="10">

                                </div>
                            </div>

                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">
                            <button class="btn btn-success" ng-click="createEmployer(employer,logo)" ng-disabled="employerCreateForm.$invalid || disabled_modal || fileTypeValidate || fileSizeValidate">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Đóng</button>
                            </div>
                        </div>
                    </div>
            </fieldset>

            </form>
    </div>
</div>
