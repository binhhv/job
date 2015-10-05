<section ng-controller="contactFormController">
    <div class="modal-header">
        <h3 class="modal-title">Tạo mới hình thức liên hệ.</h3>
    </div>
    <div class="modal-body">
            <form name="createContactFormForm" novalidate>
                <fieldset>
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="contact_form_type">Hình thức liên hệ</label>
                                <div class="controls">
                                    <input type="text" ng-model="contactform.contact_form_type" id="contact_form_type" class="form-control" required>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="createContactForm(contactform)" ng-disabled="createContactFormForm.$invalid">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Hủy</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
