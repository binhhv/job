<section ng-controller="formController">
    <div class="modal-header">
        <h3 class="modal-title">Tạo mới hình thức công việc.</h3>
    </div>
    <div class="modal-body">
            <form name="createFormForm" novalidate>
                <fieldset>
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="fjob_type">Hình thức</label>
                                <div class="controls">
                                    <input type="text" ng-model="jobForm.fjob_type" id="fjob_type" class="form-control" required>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="createForm(jobForm)" ng-disabled="createFormForm.$invalid">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Hủy</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
