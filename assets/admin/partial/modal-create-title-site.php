<section ng-controller="titleSiteController">
    <div class="modal-header">
        <h3 class="modal-title">Tạo mới tiêu đề site.</h3>
    </div>
    <div class="modal-body">
            <form name="createTitleSiteForm" novalidate>
                <fieldset>
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="config_content">Tiêu đề</label>
                                <div class="controls">
                                    <input type="text" ng-model="site.config_content" id="config_content" class="form-control" required>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="createTitleSite(site)" ng-disabled="createTitleSiteForm.$invalid">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Hủy</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
