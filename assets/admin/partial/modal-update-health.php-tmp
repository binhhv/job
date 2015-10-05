<section ng-controller="healthController">
    <div class="modal-header">
        <h3 class="modal-title">Sửa thông tin</h3>
    </div>
    <div class="modal-body">
            <form name="updateHealthForm" novalidate>
                <fieldset>
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="firstname">Loại</label>
                                <div class="controls">
                                    <input type="text" ng-model="health.healthy_type" id="healthy_type" class="form-control" required>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="updateHealth(health)" ng-disabled="updateHealthForm.$invalid">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Hủy</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
