<section ng-controller="memberController">
    <div class="modal-header">
        <h3 class="modal-title">Chọn thành viên</h3>
    </div>
    <div class="modal-body modal-delete">
            <form name="deleteCVForm">
                <fieldset>
                    <div class="row" ng-show="members.length <= 0">
                        <div class="col-sm-12">
                            <label class="alert text-danger">Không có thành viên nào để chọn</label>
                        </div>
                    </div>
                    <div class="row margin-bottom">
                        <div class="col-sm-8"></div>
                        <div class="col-sm-4">
                            <input type="text" name="table_search" ng-model="search.$" ng-change="filter()" class="form-control input-sm pull-right" placeholder="tìm kiếm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 row-choice-member" ng-repeat="data in filtered = (members | filter:search )">
                            <div class="col-sm-3 margin-top-5 tb-cell"><img class="item-logo img-responsive member-avatar" ng-src="{{base_url}}uploads/config/member/{{data.config_data_json | convertJson:'file_tmp'}}" /></div>
                            <div class="col-sm-3 margin-top-5 tb-cell">{{data.config_data_json | convertJson:'name'}}</div>
                            <div class="col-sm-3 margin-top-5 tb-cell">{{data.config_data_json | convertJson:'position'}}</div>
                            <div class="col-sm-3 margin-top-5 tb-cell" ng-show="addOrChange == 0"><button class="btn btn-xs btn-danger" ng-click="choiceMember(data)" ng-disabled="disabled_modal">Chọn</button></div>
                            <div class="col-sm-3 margin-top-5 tb-cell" ng-show="addOrChange == 1"><button class="btn btn-xs btn-danger" ng-click="changeMember(memberChange,data)" ng-disabled="disabled_modal">Chọn</button></div>
                        </div>


                    </div>

                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <!-- <button class="btn btn-success" ng-click="deleteCV(cv);" ng-disabled="disabled_modal" >Xóa</button> -->
                                <button class="btn btn-warning" ng-click="cancel()" ng-disabled="disabled_modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
