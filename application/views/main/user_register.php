<p class="text-center contact-box">
    <button class="btn btn-default" data-toggle="modal" data-target="#registerModal">Login</button>
</p>

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">User Register</h5>
                 <div id="message">


                </div> 
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                <form role="form" name="register-form" id="register-form" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label">Email</label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="account_email" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label">Password</label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="password" class="form-control" name="account_password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label">Confirm Password</label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="password" class="form-control" name="password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label">First Name</label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="account_first_name" />
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-4 col-md-4 col-xs-4 control-label">Last Name</label>
                        <div class="col-sm-8 col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="account_last_name" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12 col-md-12 col-xs-12 row-btn-register">
                            <button type="submit" class="btn btn-primary">Register</button>
             				
                        </div>
                    </div>
                    <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

// $('#registerModal').on('hidden.bs.modal', function() {
//     $('#register-form').formValidation('resetForm', true);
// });

// $(document).ready(function() {
//     $('#register-form').formValidation({
//         framework: 'bootstrap',
//         excluded: ':disabled',
//         icon: {
//             valid: 'glyphicon glyphicon-ok',
//             invalid: 'glyphicon glyphicon-remove',
//             validating: 'glyphicon glyphicon-refresh'
//         },
//         fields: {
//             account_email: {
//                 validators: {
//                     notEmpty: {
//                         message: 'The username is required'
//                     }
//                 }
//             },
//             account_password: {
//                 validators: {
//                     notEmpty: {
//                         message: 'The password is required'
//                     }
//                 }
//             }
//         }
//     });
// });

$(document).ready(function() {
$("#register-form").submit(function(event){
	 event.preventDefault();
		$.ajax({
		type: "POST", // HTTP method POST or GET
		url: "<?php echo base_url('register/insertAccount');?>", //Where to make Ajax calls
		dataType:"json", // Data type, HTML, json etc.
		data:$(this).serialize(), //Form variables
		success:function(response){
            // var objs = $.parseJSON(response);
            var account_email = response.account_email;
            var account_password = response.account_password;
            var account_first_name = response.account_first_name;
            var account_last_name = response.account_last_name;
            var csrf_name = response.name;
            var csrf_hash = response.hash;
            if(account_email != null)
            {                           
                $('#message').text("");
                $('#message').append(account_email);
                $('#message').append("<br>");
                $('#message').append(account_password);
                $('#message').append("<br>");
                $('#message').append(account_first_name);
                $('#message').append("<br>");
                $('#message').append(account_last_name);
                $('input[name="csrf_test_name"]').val(csrf_hash);
            }
            else
            {                             
                $('#message').text("");
                // $('#message').html(obj);
                // $('#registerModal').modal('hide')
            }

			
			// $(".registerModal").html("");
			// 	var msg = response.msg;
			// 	$(".contact-box").addClass("text-center padding-150");
			// 	$(".contact-box").append(msg);
		},
		error:function (xhr, ajaxOptions, thrownError){
			//On error, we alert user
			// alert("failure");
			// alert(thrownError);
		}
		});
})
});


// //form submit
// $(document).ready(function () {
//     $("#register-form").submit(function(){
//         jQuery.ajax({
//             type: "POST",
//            	url: "<?php echo base_url('register/insertAccount'); ?>",
//            	data:$(this).serialize(), //Form variables
//             success: function(msg){
//                  alert(msg);
//             },
//             error: function(){
//                 alert("failure");
//             }
//         });
//     });
// });

</script>