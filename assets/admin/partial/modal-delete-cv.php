<section ng-controller="documentController">
    <div class="modal-header">
        <h3 class="modal-title">Xóa: {{cv.doccv_file_name}}</h3>
    </div>
    <div class="modal-body">
            <form name="deleteCVForm">
                <fieldset>
                    <div class="row">

                        <div class="col-sm-12">
                           Bạn có muốn xóa cv {{cv.doccv_file_name}} ?
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="deleteCV(cv);" ng-disabled="disabled_modal" >Xóa</button>
                                <button class="btn btn-warning" ng-click="cancel()" ng-disabled="disabled_modal">Hủy bỏ</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
