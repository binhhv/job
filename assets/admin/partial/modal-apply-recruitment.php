<section ng-controller="recruitmentController">
    <div class="modal-header">
        <h3 class="modal-title">Danh sách ứng viên ứng tuyển</h3>
    </div>
    <div class="modal-body modal-delete">

            <div class="box-body table-responsive no-padding" >
                  <table class="table table-hover table-striped " id="applyRecruitmentTable" >
                    <tr>
                      <th>Số TT</th>
                      <th>Email</th>
                      <th>Họ tên</th>
                      <th class="text-center">Ngày ứng tuyển</th>
                      <th class="text-center">Hình thức</th>
                      <th class="text-center">

                      </th>
                    </tr>
                    <tr ng-repeat="data in listApply">
                      <td>{{$index + 1}}</td>
                      <td>{{data.account_email}}</td>
                      <td>{{data.account_first_name}} {{data.account_last_name}}</td>
                      <td class="text-center">
                        {{formatDate(data.recapp_created_at) | date: "dd/MM/yyyy"}}
                      <!-- {{data.account_is_disabled}} -->
                      </td>
                      <td class="text-center">
                        <label class="btn btn-xs btn-success" ng-show="data.recapp_doc_type == 1">Gửi cv</label>
                        <label class="btn btn-xs btn-primary" ng-show="data.recapp_doc_type == 2">Gửi hồ sơ</label>
                      </td>
                      <td class="text-center">

                      <label ng-show="data.recapp_doc_type == 1"><a style="cursor: pointer" ng-click="downloadCV(data);">{{data.doccv_file_name}}</a></label>
                        <label class="btn btn-xs btn-primary" ng-show="data.recapp_doc_type == 2" ng-click="viewDocumentOnline(data.docon_id)">xem hồ sơ</label>
                      </td>

                    </tr>
                  </table>
                </div>


            <div class="col-sm-12 text-center">
                <button class="btn btn-warning" ng-click="cancel();">Đóng</button>
            </div>
    </div>
</section>
