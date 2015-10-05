<section ng-controller="welfareController">
    <div class="modal-header">
        <h3 class="modal-title">Tạo mới danh mục phúc lợi.</h3>
    </div>
    <div class="modal-body">
            <form name="createWelfareForm" novalidate>
                <fieldset>
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="welfare_title">Tiêu đề</label>
                                <div class="controls">
                                    <input type="text" ng-model="welfare.welfare_title" id="welfare_title" class="form-control" required>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12">
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="welfare_title">Icons</label>
                                <div class="controls">
                                    <label class="welfare-icon" ng-repeat="icon in welfare.icons">
                                        <input type="radio" ng-model="welfare.welfare_icon" ng-value="icon.icon_content">
                                        &nbsp;<i ng-class="icon.icon_content"></i>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="createWelfare(welfare)" ng-disabled="createWelfareForm.$invalid">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Hủy</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
