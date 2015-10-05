<section ng-controller="healthController">
    <div class="modal-header">
        <h3 class="modal-title">Tạo mới danh mục.</h3>
    </div>
    <div class="modal-body">
            <form name="createHealthForm" novalidate>
                <fieldset>
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="healthy_type">Loại</label>
                                <div class="controls">
                                    <input type="text" ng-model="health.healthy_type" id="healthy_type" class="form-control" required>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="createHealth(health)" ng-disabled="createHealthForm.$invalid">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Hủy</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
