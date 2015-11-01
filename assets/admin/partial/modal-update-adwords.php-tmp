<section ng-controller="adwordsController">
    <div class="modal-header">
        <h3 class="modal-title">Chỉnh sửa nội dung quảng cáo.</h3>
    </div>
    <div class="modal-body">
            <form name="updateAdwordForm" novalidate>
                <fieldset>
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="adword_title">Tiêu đề</label>
                                <div class="controls">
                                    <input type="text" ng-model="adword.title" id="adword_title" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <label class="control-label" for="adword_type">Loại quảng cáo</label>
                                <div class="controls">
                                <textarea name="adword_type" ng-model="adword.type" id="adword_type" class="form-control" tabindex="3" rows="3" cols="50" required></textarea>
                                    <!-- <input type="text" ng-model="adword.type" id="adword_type" class="form-control" required> -->
                                </div>
                            </div>


                            <div class="form-group col-sm-6">
                                <label class="control-label" for="adword_view">Số lượt xem/tháng</label>
                                <div class="controls">
                                    <input type="text" ng-model="adword.view" id="adword_view" class="form-control" required>
                                </div>
                            </div>


                            <div class="form-group col-sm-6">
                                <label class="control-label" for="adword_highlight">Tặng tin đăng tuyển ở vị trí highlight</label>
                                <div class="controls">
                                    <input type="text" ng-model="adword.highlight" id="adword_highlight" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <label class="control-label" for="adword_expDate"> Tặng thêm thời hạn sử dụng</label>
                                <div class="controls">
                                    <input type="text" ng-model="adword.expDate" id="adword_expDate" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <label class="control-label" for="adword_price">Mức phí (USD/tháng)</label>
                                <div class="controls">
                                    <input type="text" ng-model="adword.price" id="adword_price" class="form-control" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="updateAdword(adword)" ng-disabled="updateAdwordForm.$invalid">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Hủy</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
