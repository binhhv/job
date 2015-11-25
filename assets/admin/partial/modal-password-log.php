<section ng-controller="logController">
   <!--  <div class="modal-header">
        <h3 class="modal-title">Tạo mới danh mục ngành nghề.</h3>
    </div> -->
    <div class="modal-body">
            <form name="createCareerForm" novalidate>
                <fieldset>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group col-sm-12">
                                <div class="controls">
                                    <input type="text" ng-model="career.career_name" id="career_name" class="form-control" required>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="createCareer(career)" ng-disabled="createCareerForm.$invalid">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Hủy</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
