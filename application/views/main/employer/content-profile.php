<div class="col-sm-12 content-profile-em">
  <?php $this->load->view('main/employer/partial/profile', array('employerInfo' => $employerInfo));?>
</div>



<!--modal change info profile account -->
    <!-- Modal -->
  <div id="modal-profile-account" class="modal fade modal-vcenter" role="dialog">
    <div class="modal-dialog modal-md">

      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title"><?php echo lang('title_modal_change_profile_account_em'); ?></h3>
                 <div class="require_info clearfix italic">(<span class="colorRed">*</span>) <?php echo lang('require_info'); ?></div>
          </div>
        <div class="modal-body">
         <form class="form-horizontal" role="form" id="fprofile-account" method="post">
          <div class="form-group">
            <label class="control-label col-sm-2" for="firstname"><?php echo lang('last_name') ?></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="lastname" value="<?php echo $employerInfo->account_last_name; ?>" >
            </div>
            <div class="col-sm-10 col-sm-offset-2 hide error-firstname text-danger">

            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="lastname"><?php echo lang('first_name') ?></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="firstname" value="<?php echo $employerInfo->account_first_name ?>">
                <input type="hidden" name="csrf_test_name" value="" />
            </div>
            <div class="col-sm-10 col-sm-offset-2 hide error-lastname text-danger">

            </div>
          </div>


          <div class="form-group">
            <div class="col-sm-12 text-right">

               <button type="submit" class="btn btn-default btn-primary" ><?php echo lang('m_change'); ?></button>
            </div>
          </div>
        </form>
        </div>

      </div>

    </div>
  </div>
  <script type="text/javascript">
    /* center modal */
function centerModals($element) {
  var $modals;
  if ($element.length) {
    $modals = $element;
  } else {
    $modals = $('.modal-vcenter:visible');
  }
  $modals.each( function(i) {
    var $clone = $(this).clone().css('display', 'block').appendTo('body');
    var top = Math.round(($clone.height() - $clone.find('.modal-content').height()) / 2);
    top = top > 0 ? top : 0;
    $clone.remove();
    $(this).find('.modal-content').css("margin-top", top);
  });
}
$('.modal-vcenter').on('show.bs.modal', function(e) {
  centerModals($(this));
   $.ajax({
        url: base_website +'job/getToken',
        type: "get",
        dataType:'json',
        success: function(data){

            $("input:hidden[name=csrf_test_name]").empty().val(data.hash);
             console.log(data.hash);

        }
      });
});
$(window).on('resize', centerModals);


$("#fprofile-account").submit(function(event) {
            event.preventDefault();
            $.ajax({
                type: "POST", // HTTP method POST or GET
                url: base_website + "employer/change-account-name", //Where to make Ajax calls
                dataType: "json", // Data type, HTML, json etc.
                data: $(this).serialize(),
                success: changeSuccess,
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError);
                }
            });
        })

function getContenProfile(){
 $.ajax({
            url: base_website + 'employer/get-content-profile',
            type: "get",
            dataType:'html',
            success: function(data){
               $(".content-profile-em").empty().append(data);
            }
          });
}
function changeSuccess(response){
  var status = response.status;
  if (status == 'errvalid') {
      $(".error-firstname").addClass('hide');
      $(".error-lastname").addClass('hide');
      var firstname = response.content.firstname;
      var lastname = response.content.lastname;
      var csrf_name = response.content.name;
      var csrf_hash = response.content.hash;
      $(".error-firstname").removeClass('hide').empty().append(lastname);
      $(".error-lastname").removeClass('hide').empty().append(firstname);
      $('input[name="csrf_test_name"]').val(csrf_hash);
  } else if (status == 'success') {
      $("body").find($("input:hidden[name=csrf_test_name]")).val(response.content.hash);
      getContenProfile();
      $("#modal-profile-account").modal('hide');
      // $(".content-profile-em").em;

  }
}
</script>