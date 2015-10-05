<section ng-controller="formController">
    <div class="modal-header">
        <h3 class="modal-title">Xóa </h3>
    </div>
    <div class="modal-body modal-delete">
            <form name="deleteFormForm">
                <fieldset>
                    <div class="row">
                        <div class="col-sm-12 text-danger">
                            Mọi thông tin liên quan đến tin tuyển dụng có thể bị thay đổi.
                        </div>
                        <div class="col-sm-12">
                            Bạn có muốn xóa  không ?
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="deleteForm(jobForm);" ng-disabled="disabled_modal" >Xóa</button>
                                <button class="btn btn-warning" ng-click="cancel()" ng-disabled="disabled_modal">Hủy bỏ</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>