<section ng-controller="managerController">
    <div class="modal-header">
        <h3 class="modal-title">Xóa: {{manager.account_first_name}} {{manager.account_last_name}} {{manager.account_id}}</h3>
    </div>
    <div class="modal-body">
            <form name="updatejobseekerForm">
                <fieldset>
                    <div class="row">

                        <div class="col-sm-12">
                            Bạn có muốn xóa {{manager.account_first_name}} {{manager.account_last_name}} ?
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="deleteManager(manager);" >Xóa</button>
                                <button class="btn btn-warning" ng-click="cancel()">Hủy bỏ</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
