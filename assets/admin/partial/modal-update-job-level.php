<section ng-controller="levelController">
    <div class="modal-header">
        <h3 class="modal-title">Sửa thông tin</h3>
    </div>
    <div class="modal-body">
            <form name="updateLevelForm" novalidate>
                <fieldset>
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="ljob_level">Trình độ/Năng lực</label>
                                <div class="controls">
                                    <input type="text" ng-model="jobLevel.ljob_level" id="ljob_level" class="form-control" required>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="updateLevel(jobLevel)" ng-disabled="updateLevelForm.$invalid">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Hủy</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
