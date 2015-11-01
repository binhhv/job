<section ng-controller="numberRecruitmentController">
    <div class="modal-header">
        <h3 class="modal-title">Thay đổi : {{configRecruitment.config_data_json | convertJson:'content'}}</h3>
    </div>
    <div class="modal-body modal-delete">
            <form name="updateConfigNumRecForm">
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
            </form>
    </div>
</section>
