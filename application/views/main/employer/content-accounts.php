<div class="col-sm-12 content-accounts-em ">
		<div class="col-sm-12 clear mb_20 margin-top-10">
             <span class="border-vertical text-color-1"></span>
            <span class="text-color-1 title-jobseeker-register"><strong><?php echo lang('title_manager_accounts_em');?></strong></span>
        </div>
        <?php if (isset($listAccount) && count($listAccount) > 0) {
	?>
        <div class="col-sm-12">
        <div class="box-body table-responsive no-padding no-border">
    <table id="example" class="display" cellspacing="0" width="100%" class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Mã số</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
           <?php foreach ($listAccount as $key => $value) {?>
           <tr>
           	<td class="min-w-100"><strong><?php echo $value->account_code;?></strong></td>
	           	<td class="min-w-150"><?php echo $value->account_first_name . ' ' . $value->account_last_name;?></td>
	           	<td class="min-w-150"><?php echo $value->account_email;?></td>
	           	<td class="min-w-150">
                <button class="btn btn-xs btn-primary">Sửa</button>
                <button class="btn btn-xs btn-danger">Xóa</button>
	           		<button class="btn btn-xs btn-warning">Ngừng hoạt động</button>
	           	</td>
           </tr>
          <?php }
	?>
        </tbody>
    </table>
  </div>
        </div>
        <?php	} else {?>
        <div class="col-sm-12 text-center">
        	<h3>ĐÃ CÓ LỖI XẢY RA. !!!</h3>
        </div>
        	<?php	}
?>
        </div>

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