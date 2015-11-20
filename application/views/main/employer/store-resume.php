<div class="card">

	<div class="row-employer row ">
		<div class="col-sm-12 clear mb_20 margin-top-10">
            <p><span class="border-vertical text-color-1"></span>
            <span class="text-color-1 title-jobseeker-register"><strong><?php echo lang('title_store_resume_em'); ?></strong></span>
            </p>
        </div>
        <div class="resumes">
        	<?php echo $this->load->view('main/employer/partial/resumes', array('listResume' => $listResume, 'employerInfo' => $employerInfo), TRUE); ?>
		</div>
    </div>
</div>

<!--modal confirm delete resume store employer -->
  <div class="modal fade" id="modal-delete-resume-store-em" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">

               Bạn có muốn xóa hồ sơ ứng viên này trong hồ sơ đã lưu không ?
            </div>
            <div class="modal-footer">
                <a type="submit" class="btn btn-danger" data-dismiss="modal">Hủy</a>
                <button type="submit" class="btn btn-primary btn-ok">Xóa</button>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $('#modal-delete-resume-store-em').on('show.bs.modal', function(e) {
      var id = $(e.relatedTarget).data('href');
      console.log(id);
    // $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'););
    $(".btn-ok").on('click',function(){
      //alert("123123");
       $.ajax({
        url: '<?php echo base_url(); ?>' +'/employer/resume/delete-store/'+id,
        type: "get",
        dataType:'html',
        success: function(data){
        	 $('#modal-delete-resume-store-em').modal('hide');
      		 $(".resumes").empty().append(data);
      		 	window.setTimeout(function(){
		$(".loading-store-resume-em").addClass('hide');
		$(".content-store-resume-em").removeClass('hide');
		},1000);

        },
         error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError);
               //$('#confirm-store-resume').modal('hide');
            }
      });
    })

  });
</script>