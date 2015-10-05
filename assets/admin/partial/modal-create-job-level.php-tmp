<section ng-controller="levelController">
    <div class="modal-header">
        <h3 class="modal-title">Tạo mới trình độ/năng lực.</h3>
    </div>
    <div class="modal-body">
            <form name="createLevelForm" novalidate>
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

                                <button class="btn btn-success" ng-click="createLevel(jobLevel)" ng-disabled="createLevelForm.$invalid">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Hủy</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
