<div class="col-sm-12 clear mb_20 margin-top-10">
            <p><span class="border-vertical text-color-1"></span>
            <span class="text-color-1 title-jobseeker-register"><strong><?php echo lang('title_manager_accounts_em'); ?></strong></span>
            <?php if ($employerInfo->account_map_role == 2) {?><button data-href="0" data-toggle="modal" data-target="#modal-account-em" class="btn btn-sm btn-primary pull-right"><?php echo lang('title_create_account_em'); ?></button> <?php }
?></p>
        </div>
        <?php if (isset($listAccount) && count($listAccount) > 0) {
	?>
        <div class="col-sm-12">
        <div class="box-body table-responsive no-padding no-border">
    <table id="example" class="display" cellspacing="0" width="100%" class="table table-hover table-striped">
        <thead>
            <tr>
                <th><?php echo lang('m_code'); ?></th>
                <th><?php echo lang('job_form_name'); ?></th>
                <th><?php echo lang('m_email'); ?></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
           <?php foreach ($listAccount as $key => $value) {
		?>
        <?php if ($value->account_id != $employerInfo->account_id) {
			?>
           <tr>
           	<td class="min-w-100"><strong><?php echo $value->account_code; ?></strong></td>
	           	<td class="min-w-150"><?php echo $value->account_first_name . ' ' . $value->account_last_name; ?></td>
	           	<td class="min-w-150"><?php echo $value->account_email; ?></td>
	           	<td class="min-w-150">
                <?php if ($value->account_map_role != 2) {
				?>
                <button data-href="<?php echo $value->account_id; ?>" data-toggle="modal" data-target="#modal-account-em" class="btn btn-xs btn-primary" ><?php echo lang('m_edit'); ?></button>
                <button data-href="<?php echo $value->account_id; ?>" data-toggle="modal" data-target="#modal-delete-account-em" class="btn btn-xs btn-danger"><?php echo lang('m_delete'); ?></button>
	           		<?php if ($value->account_is_disabled) {?>
                <button data-href="<?php echo $value->account_id; ?>" data-toggle="modal" data-target="#modal-enable-account-em" class="btn btn-xs btn-warning"><?php echo lang('m_unblock'); ?></button>
                <?php } else {?>
                <button data-href="<?php echo $value->account_id; ?>" data-toggle="modal" data-target="#modal-disable-account-em" class="btn btn-xs btn-warning"><?php echo lang('m_block'); ?></button>
                <?php }
				?>


	           	</td>
                <?php }
			?>
           </tr>
           <?php }
		?>
          <?php }
	?>
        </tbody>
    </table>
  </div>
        </div>
        <?php	} else {?>
        <div class="col-sm-12 text-center">
        	<h3><?php echo lang('em_no_accounts'); ?>.</h3>
        </div>
        	<?php	}
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
          "dom":'<"pull-left"f><"top"l>rt<"bottom"p><"clear">',
         "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": false,
          "info": false,
          "autoWidth": true
    });

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