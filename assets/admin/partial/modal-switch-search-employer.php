<section ng-controller="employerController">
    <div class="modal-header">
        <h3 class="modal-title">
            Tìm kiếm hồ sơ ứng viên.
        </h3>
    </div>
    <div class="modal-body modal-delete">
            <form name="activeDeleteLogoForm">
                <fieldset>
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group col-sm-6">
                                <label class="control-label" >Trạng thái</label>
                                <div class="controls">
                                    <img class="pointer" ng-click="switchSearch(employer);" ng-src="{{getSwitchImage(1)}}" ng-show="employer.employer_is_search_rs == 1">
                                    <img class="pointer" ng-click="switchSearch(employer);" ng-src="{{getSwitchImage(0)}}" ng-show="employer.employer_is_search_rs == 0">
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" >Thời gian</label>
                                <div class="controls">
                                    <input ng-change="setDateExpSearch(employer)" class="form-control input-datepicker" type="text" b-datepicker ng-model="employer.employer_exp_search_rs" />
                                    <button type="button" class="btn btn-datepicker" data-toggle="datepicker"> <i class="glyphicon glyphicon-calendar"></i></button>
                                </div>
                            </div>

                        </div>
                         <!-- <div class="col-md-6">
                            <p class="input-group">
                              <input type="text" class="form-control" uib-datepicker-popup="{{format}}" ng-model="dt" is-open="status.opened" min-date="minDate" max-date="maxDate" datepicker-options="dateOptions" date-disabled="disabled(date, mode)" ng-required="true" close-text="Close" />
                              <span class="input-group-btn">
                                <button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
                              </span>
                            </p>
                        </div> -->

                    </div>

                    <div class="row margin-top-10">
                        <div class="col-sm-12">
                            <div class="form-group text-right">
                                <button class="btn btn-success" ng-click="changeSwitchSearch(employer);" ng-disabled="disabled_modal" >Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()" ng-disabled="disabled_modal">Hủy bỏ</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
