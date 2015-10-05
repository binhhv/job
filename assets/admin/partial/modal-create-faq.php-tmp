<section ng-controller="faqController">
    <div class="modal-header">
        <h3 class="modal-title">Tạo mới faq.</h3>
    </div>
    <div class="modal-body">
            <form name="createFAQForm" novalidate>
                <fieldset>
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="faq_question">Câu hỏi</label>
                                <div class="controls">
                                    <input type="text" ng-model="faq.faq_question" id="faq_question" class="form-control" required>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12">
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="faq_answer">Trả lời</label>
                                <div class="controls">
                                    <textarea name="faq_answer" ng-model="faq.faq_answer" id="faq_answer" class="form-control" tabindex="3" rows="3" cols="50" required></textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="createFAQ(faq)" ng-disabled="createFAQForm.$invalid">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Hủy</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
