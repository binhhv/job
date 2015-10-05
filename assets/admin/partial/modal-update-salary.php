<section ng-controller="salaryController">
    <div class="modal-header">
        <h3 class="modal-title">Chỉnh sửa danh mục mức lương.</h3>
    </div>
    <div class="modal-body">
            <form name="updateSalaryForm" novalidate>
                <fieldset>
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="salary_value">Mức lương</label>
                                <div class="controls">
                                    <input type="text" ng-model="salary.salary_value" id="salary_value" class="form-control" required>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12">
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="salary_type">Loại tiền</label>
                                <div class="controls">
                                    <input type="text" ng-model="salary.salary_type" id="salary_type" class="form-control" required>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="updateSalary(salary)" ng-disabled="updateSalaryForm.$invalid">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Hủy</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
