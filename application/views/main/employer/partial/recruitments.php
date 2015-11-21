<?php if (isset($listRecruitment) && count($listRecruitment) > 0) {
	?>
<div class="box-body table-responsive no-padding no-border">
    <table id="example" class="display" cellspacing="0" width="100%" class="table table-hover table-striped">
        <thead>
            <tr>
                <th><?php echo lang('m_code'); ?></th>
                <th><?php echo lang('rec_title'); ?></th>
                <th><?php echo lang('m_status'); ?></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
           <?php foreach ($listRecruitment as $key => $value) {
		?>

           <tr>
           	<td class="min-w-100"><strong><?php echo $value->rec_code; ?></strong></td>
	           	<td class="min-w-150">
              <a href="<?php echo base_url('employer/recruitment/') . '/' . $value->rec_code . '-' . $value->rec_id . '.html'; ?>"><?php echo (strlen($value->rec_title) > 30) ? substr($value->rec_title, 0, 30) . '...' : $value->rec_title; ?></a>
              </td>
	           	<td class="min-w-150">
               <?php if ($value->rec_is_drafts == 1) {
			echo '<label class="btn btn-xs btn-warning">Lưu nháp</label>';
		} else if ($value->rec_is_approve == 1) {
			echo '<label class="btn btn-xs btn-primary">Đang đăng</label>';
		} else {
			echo '<label class="btn btn-xs btn-danger">Chờ duyệt</label>';
		}
		?>
              </td>
	           	<td class="min-w-150">

                <button data-href="<?php echo base_url('employer/recruitment/') . '/' . $value->rec_code . '-' . $value->rec_id . '.html'; ?>"  class="btn btn-xs btn-primary btn-detail-recruitment" ><?php echo lang('m_view_detail'); ?></button>

	           		<?php if ($value->rec_map_user_employer == $employerInfo->user['id']) {?>
                <button data-href="<?php echo base_url('employer/recruitment/edit') . '/' . $value->rec_code . '-' . $value->rec_id . '.html' ?>"  class="btn btn-xs btn-warning btn-edit-recruitment-em"><?php echo lang('m_edit'); ?></button>
                <button data-href="<?php echo $value->rec_id; ?>" data-toggle="modal" data-target="#modal-delete-recruitment-em"  class="btn btn-xs btn-danger"><?php echo lang('m_delete'); ?></button>
                <?php }
		?>


	           	</td>
           </tr>

          <?php }
	?>
        </tbody>
    </table>
  </div>
  <?php } else {?>
  <div class="box-body table-responsive no-padding no-border text-center">
    <h3><?php echo lang('em_no_rec_manager'); ?>.</h3>
  </div>
  <?php }
?>

<script type="text/javascript">
  function filterGlobal () {
    $('#example').DataTable().search(
        $('#global_filter').val(),
        $('#global_regex').prop('checked'),
        $('#global_smart').prop('checked')
    ).draw();
}

function filterColumn ( i ) {
    $('#example').DataTable().column( i ).search(
        $('#col'+i+'_filter').val(),
        $('#col'+i+'_regex').prop('checked'),
        $('#col'+i+'_smart').prop('checked')
    ).draw();
}

$(document).ready(function() {
    $('#example').DataTable({
        "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
          },
          "dom":'<"pull-right"f><"top"l>rt<"bottom"p><"clear">',
         "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": false,
          "info": false,
          "autoWidth": true,

    });
        //"pageLength": 20
        //    "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
        //    "oLanguage": {
        //     "oPaginate": {
        //         "sFirst": "First page", // This is the link to the first page
        //         "sPrevious": "前ページ", // This is the link to the previous page
        //         "sNext": "次ページ", // This is the link to the next page
        //         "sLast": "Last page" // This is the link to the last page
        //     }
        // }
    $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );

    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    } );
} );
</script>