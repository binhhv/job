<section ng-controller="provinceController">
    <div class="modal-header">
        <h3 class="modal-title">Xóa {{province.province_type}}: {{province.province_name}}</h3>
    </div>
    <div class="modal-body modal-delete">
            <form name="deleteCVForm">
                <fieldset>
                    <div class="row">
                        <div class="col-sm-12 text-danger">
                            Mọi thông tin liên quan đến tỉnh/thành phố như tin tuyển dụng, nhà tuyển dụng, ... có thể bị thay đổi.
                        </div>
                        <div class="col-sm-12">
                           Bạn có muốn xóa tỉnh/thành phố này không  ?
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="deleteProvince(province);" ng-disabled="disabled_modal" >Xóa</button>
                                <button class="btn btn-warning" ng-click="cancel()" ng-disabled="disabled_modal">Hủy bỏ</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
