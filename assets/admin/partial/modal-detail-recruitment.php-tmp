<section ng-controller="recruitmentController">
    <div class="modal-header">
        <h3 class="modal-title">Chi tiết tin tuyển dụng</h3>
    </div>
    <div class="modal-body">
            <form name="employerDetailRecruitment">
            <fieldset>
                <div class="row">
                    <div class="col-sm-12">
                            <div class="form-group col-sm-12 text-center">
                                <!-- <label class="control-label" for="firstname">Họ tên</label> -->
                                <div class="controls" ng-model="documentJobseeker.name">
                                <h4><b>{{rec.rec_title}}</b></h4>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 ">
                                <label class="control-label" for="firstname">Ngành nghề : {{rec.career_name}}</label>

                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="firstname">Địa điểm làm việc : {{rec.country_name}}</label>
                                <div class="controls">
                                    <b>Tỉnh/Thành phố </b>
                                <ul ng-repeat="item in rec.provinces">
                                    <li>{{item.nameprovince}}</li>
                                </ul>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="firstname">Phúc lợi</label>
                                <div class="controls" style="background: #f2f9f2">
                                <!-- {{rec.welfares}} -->
                                    <div ng-show="rec.welfares === null || rec.welfares.length <= 0">
                                             Không có.
                                    </div>
                                    <div ng-repeat="item in rec.welfares">
                                        <i ng-class="item.iconwelfare"></i> &nbsp; {{item.titlewelfare}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="surname">Mức lương </label>
                                <div class="controls">
                                    {{rec.rec_salary}}
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="suburb">MÔ TẢ CÔNG VIỆC</label>
                                <div class="controls">
                                    <hr>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="surname">Nội dung công việc</label>
                                <div class="controls">
                                    {{rec.rec_job_content}}
                                </div>
                            </div>
                             <div class="form-group col-sm-12">
                                <label class="control-label" for="surname">Chế độ hậu đãi </label>
                                <div class="controls">
                                {{rec.rec_job_regimen}}
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Thời gian làm việc</label>
                                <div class="controls">
                                    {{formatDate(rec.rec_job_time) | date: "dd/MM/yyyy"}}
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <label class="control-label" for="suburb">YÊU CẦU CÔNG VIỆC</label>
                                <div class="controls">
                                    <hr>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="surname">Yêu cầu bắt buộc</label>
                                <div class="controls">
                                    {{rec.rec_job_require}}
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="suburb">Điều kiện/Ưu tiên</label>
                                <div class="controls">
                                    {{rec.rec_job_priority}}
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="surname">Hình thức công việc </label>
                                <div class="controls">
                                    {{rec.fjob_type}} - {{rec.jcform_type}}
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Trình độ tiếng nhật</label>
                                <div class="controls">
                                    {{rec.ljob_level}}
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="suburb">THÔNG TIN LIÊN HỆ </label>
                                <div class="controls">
                                    <hr>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Người liên hệ</label>
                                <div class="controls">
                                    {{rec.rec_contact_name}}
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Email</label>
                                <div class="controls">
                                    {{rec.rec_contact_email}}
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Địa chỉ</label>
                                <div class="controls">
                                    {{rec.rec_contact_address}}
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Điện thoại</label>
                                <div class="controls">
                                    {{rec.rec_contact_phone}}
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Di động</label>
                                <div class="controls">
                                    {{rec.rec_contact_mobile}}
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="suburb">Hình thức liên hệ</label>
                                <div class="controls">
                                    {{rec.contact_form_type}}
                                </div>
                            </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">
                                <button class="btn btn-warning" ng-click="cancel()">Đóng</button>
                            </div>
                        </div>
                    </div>
            </fieldset>

            </form>
    </div>
</section>
