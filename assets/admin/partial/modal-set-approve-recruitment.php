<section ng-controller="recruitmentController">
    <div class="modal-header">
        <h3 class="modal-title">Duyệt tin tuyển dụng</h3>
    </div>
    <div class="modal-body modal-delete">
            <form name="deleteCVForm">
                <fieldset>
                    <div class="row">

                        <div class="col-sm-12">
                        Bạn có muốn duyệt tin tuyển dụng <label class="text-danger">({{recruitment.rec_title}})</label> ?
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="approveRecruitment(recruitment);" ng-disabled="disabled_modal" >Đồng ý</button>
                                <button class="btn btn-warning" ng-click="cancel()" ng-disabled="disabled_modal">Hủy bỏ</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
