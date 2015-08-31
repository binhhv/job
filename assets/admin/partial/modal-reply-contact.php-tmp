<section ng-controller="contactController">
    <div class="modal-header">
        <h3 class="modal-title">Trả lời</h3>
    </div>
    <div class="modal-body">
            <form name="updateFormForm" novalidate>
            <fieldset>
                <div class="row">
                    <div class="col-sm-12">
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="firstname">To</label>
                                <div class="controls">
                                    <input type="text" ng-model="contact.cont_email" id="name" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <label class="control-label" for="surname">Tiêu đề </label><label class="text-danger" >*</label>
                                <div class="controls">
                                    <input type="text" name="phone" ng-model="contact.subjectRep" id="phone" class="form-control" required ng-disabled="docform.docon_type == 1">
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <label class="control-label" for="suburb">Nội dung</label><label class="text-danger" >*</label>
                                <div class="controls">
                                <textarea name="messageRep" name="skill" ng-model="contact.messageRep" id="messageRep" class="form-control" tabindex="3" rows="5" cols="50" required></textarea>
                                    <!-- <input type="text" name="skill" ng-model="docform.docon_skill" id="skill" class="form-control" required> -->
                                </div>
                            </div>


                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">
                                <button class="btn btn-success" ng-click="replyContact(contact)" ng-disabled="contactForm.$invalid || disabled_modal ">Gủi</button>
                                <button class="btn btn-warning" ng-click="cancel()">Đóng</button>
                            </div>
                        </div>
                    </div>
            </fieldset>

            </form>
    </div>
</section>
