<section ng-controller="recruitmentController">
    <div class="modal-header">
        <h3 class="modal-title">Thay đổi vị trí hiển thị tin tuyển dụng</h3>
    </div>
    <div class="modal-body modal-delete">
            <form name="deleteCVForm">
                <fieldset>
                    <div class="row">

                        <div class="col-sm-12">
                         <!-- <label class="control-label" for="firstname">Tin tuyển dụng :</label> -->
                          <div class="controls">
                                      Tin tuyển dụng : <label class="text-danger">({{recruitment.rec_title}})</label>
                            </div>

                        </div>
                        <div class="form-group col-sm-12">
                                <label class="control-label" for="firstname">Vị trí hiển thị tin tuyển dụng</label>
                                <div class="controls">
                                    <label>
                                        <input type="checkbox" ng-model="recruitment.rec_is_show_top" ng-true-value="'1'" ng-false-value="'0'">
                                        Hiển thị trên trang top.
                                    </label>
                                    &nbsp;
                                    <label>
                                        <input type="checkbox" ng-model="recruitment.rec_is_show_another" ng-true-value="'1'" ng-false-value="'0'">
                                        Hiển thị trên trang khác.
                                    </label>
                                </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="editShowRecruitment(recruitment);" ng-disabled="disabled_modal" >Đồng ý</button>
                                <button class="btn btn-warning" ng-click="cancel()" ng-disabled="disabled_modal">Hủy bỏ</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
