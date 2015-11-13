 <div class="col-sm-12 loading-accounts-em">
    <img class="img-responsive" style="margin: 0 auto;" src="<?php echo base_url();?>assets/main/img/default/load.gif">
  </div>
<div class="col-sm-12 content-accounts-em hide">
    <?php $this->load->view('main/employer/partial/accounts', array('employerInfo' => $employerInfo));?>
</div>

 <!--modal confirm delete account employer -->
  <div class="modal fade" id="modal-delete-account-em" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
           <form method="post" id="fdelete-account-em" role="form">
            <div class="modal-body">

                <input type="hidden" name="idUser" value="">
                <div class="token hide">
                </div>
               Bạn có muốn xóa tài khoản đã chọn không ?
            </div>
            <div class="modal-footer">
                <a  class="btn btn-danger" data-dismiss="modal">Hủy</a>
                <button type="submit" class="btn btn-primary btn-ok">Xóa</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--modal confirm block account employer -->
  <div class="modal fade" id="modal-disable-account-em" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="fdisable-account-em" role="form">
            <div class="modal-body">
                <input type="hidden" name="idUser" value="">
                <div class="token hide">
                </div>
               Bạn có muốn khóa tài khoản đã chọn không ?
            </div>
            <div class="modal-footer">
                <a type="submit" class="btn btn-danger" data-dismiss="modal">Hủy</a>
                <button type="submit" class="btn btn-primary btn-ok">Khóa</button>
            </div>
          </form>
        </div>
    </div>
</div>

<!--modal confirm unblock account employer -->
  <div class="modal fade" id="modal-enable-account-em" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
             <form method="post" id="fenable-account-em" role="form">
            <div class="modal-body">
              <input type="hidden" name="idUser" value="">
                <div class="token hide">
                </div>
               Bạn có muốn mở khóa tài khoản đã chọn không ?
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-danger" data-dismiss="modal">Hủy</a>
                <button type="submit" class="btn btn-primary btn-ok">Mở khóa</button>
            </div>
          </form>
        </div>
    </div>
</div>
<!--modal create account employer-->
 <div class="modal fade" id="modal-account-em" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content content-modal-account-em">
        </div>
    </div>
</div>

