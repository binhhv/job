<section ng-controller="employerController">
    <div class="modal-header">
        <h3 class="modal-title">Xóa: {{employer.employer_name}} </h3>
    </div>
    <div class="modal-body modal-delete">
            <form name="deleteEmployerForm">
                <fieldset>
                    <div class="row">
                        <div class="col-sm-12">
                            Mọi thông tin cũng như tất cả tin tuyển dụng của {{employer.employer_name}} sẽ bị xóa hết.
                        </div>
                        <div class="col-sm-12">
                            Bạn có muốn xóa ?

                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="deleteEmployer(employer);" ng-disabled="disabled_modal" >Xóa</button>
                                <button class="btn btn-warning" ng-click="cancel()" ng-disabled="disabled_modal">Hủy bỏ</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
