<div class="col-sm-12 loading-store-resume-em">
		    <img class="img-responsive" style="margin: 0 auto;" src="<?php echo base_url(); ?>assets/main/img/default/load.gif">
		 </div>
		  <div class="col-sm-12 content-store-resume-em hide">
        <?php if (isset($listResume) && count($listResume) > 0) {
	?>

        <div class="box-body table-responsive no-padding no-border">
    <table id="tableStoreResume" class="display" cellspacing="0" width="100%" class="table table-hover table-striped">
        <thead>
            <tr>
                <th class="text-center hide"><?php echo lang('m_code'); ?></th>
                <th class="text-center hide"><?php echo lang('m_info'); ?></th>
                <th class="hide"></th>
            </tr>
        </thead>

        <tbody>
           <?php foreach ($listResume as $key => $value) {
		?>
		<tr <?php if ($key % 2 == 0) {echo 'class="bg-even"';}
		?> >
			<td class="min-w-100">
				<b><?php echo $value->docon_code; ?></b>
			</td>
			<td >
				<div class="row">
					<div class="col-sm-12"><b><?php echo lang('job_form_name'); ?> :</b><?php echo $value->account_first_name . '&nbsp' . $value->account_last_name; ?></div>
					<div class="col-sm-12"><b><?php echo lang('m_email'); ?> : </b><?php echo $value->account_email; ?></div>
					<div class="col-sm-12"><b><?php echo lang('job_form_phone'); ?> :</b><?php echo $value->docon_phone; ?></div>
					<!-- <div class="col-sm-12"><b>Ngành nghề : </b><?php echo $value->career_name; ?></div>
					<div class="col-sm-12"><b>Năng lực tiếng nhật : </b><?php echo $value->ljob_level; ?></div> -->
				</div>
			</td>
			<td class="min-w-100">
			<?php if ($employerInfo->user['id'] == $value->emstore_map_user_employer) {?>
			<button data-href="<?php echo $value->emstore_id; ?>" data-toggle="modal" data-target="#modal-delete-resume-store-em" class="btn btn-xs btn-danger"><?php echo lang('m_delete'); ?></button>
			<?php	}
		?>
			<a class="btn btn-xs btn-primary" href="<?php echo base_url('employer/resume/detail/') . '/' . $value->docon_code . '-' . $value->docon_id; ?>"><?php echo lang('m_view_detail'); ?></a>
			</td>
		</tr>
          <?php }
	?>
        </tbody>
    </table>
  </div>
        <?php	} else {?>
         <div class="box-body table-responsive no-padding no-border">
        	<h3><?php echo lang('em_ms_no_save_resume'); ?>.</h3>
        </div>
        	<?php	}
?>
</div>

<script type="text/javascript">
  function filterGlobal () {
    $('#tableStoreResume').DataTable().search(
        $('#global_filter').val(),
        $('#global_regex').prop('checked'),
        $('#global_smart').prop('checked')
    ).draw();
}

function filterColumn ( i ) {
    $('#tableStoreResume').DataTable().column( i ).search(
        $('#col'+i+'_filter').val(),
        $('#col'+i+'_regex').prop('checked'),
        $('#col'+i+'_smart').prop('checked')
    ).draw();
}

$(document).ready(function() {
    $('#tableStoreResume').DataTable({
        "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
          },
          "dom":'<"pull-right"f><"top"l>rt<"bottom"p><"clear">',
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

$(window).load(function(){
	window.setTimeout(function(){
		$(".loading-store-resume-em").addClass('hide');
		$(".content-store-resume-em").removeClass('hide');
		},1000);
})
</script>