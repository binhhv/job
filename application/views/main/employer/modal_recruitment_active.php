  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="recruitment_activeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Tin tuyển dụng đã đăng</h4>
        </div>
        <div class="modal-body">
<div class="table-responsive box-body no-padding">
        <table id="recruitment_active_tb" class="table table-striped nowrap" cellspacing="0">
          <thead>
            <tr>
              <th>Mã số</th>
              <th>Tiêu đề tin</th>
              <th>Mức lương</th>
              <th id="row_jcform_type_th">Hình thức công việc</th>
              <th id="row_rec_is_approve_th">Trạng thái</th>
              <th id="row_rec_created_at_th">Ngày đăng tin</th>
              <th id="row_numapply_th">Số lượng ứng tuyển</th>
              <th id="row_action_th"></th>
            </tr>
          </thead>
          <tbody>
          <?php if (!empty($arr_rec)) {
	foreach ($arr_rec as $rows): ?>
              <tr>
                  <td><?php echo $rows->rec_code;?></td>
                  <td><?php echo $rows->rec_title;?></td>
                  <td><?php echo $rows->rec_salary;?></td>
                  <td id="row_jcform_type"><?php echo $rows->jcform_type;?></td>
                  <td id="row_rec_is_approve"><?php echo $rows->rec_is_approve;?></td>
                  <td id="row_rec_created_at"><?php $create_date = strtotime($rows->rec_created_at);
	echo date('d-m-Y', $create_date)?></td>
                  <td id="row_numapply"><?php echo $rows->numapply;?></td>
                  <td id="row_action" class="center">

                      <a class="btn btn-xs btn-info" href="<?php echo site_url('make/viewMake/');?>"><span>chi tiết</span></a>
                      <a class="btn btn-xs btn-warning" href="<?php echo site_url('make/editMake/');?>"><span>sửa</span></a>
                      <a  class="btn btn-xs btn-danger" href="<?php echo site_url('make/deleteMake/');?>" onClick="return confirm('Are you sure to delete this make ?');"><span>xóa</span></a>

                  </td>
              </tr>
               <?php endforeach;}

?>
                            </tbody>
        </table>
      </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<script>
$('#recruitment_activeModal').on('shown.bs.modal', function() {
    $(this).find('.modal-dialog').css({
        width: 'auto',
        height: 'auto',
        'max-height': '100%'
    });
    $('#recruitment_active_tb').DataTable({
        "bSort": false
    });
});
</script>