//user register
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
            var status = response.status;
            if(status == 'erremail'){
                var title_err = response.content.title_err;
                var csrf_name = response.content.name;
                var csrf_hash = response.content.hash;
                $('#message').text("");
                $('#message').append(title_err);
                $('input[name="csrf_test_name"]').val(csrf_hash);

            }else if(status == 'errvalid'){
                var account_email = response.content.account_email;
                var account_password = response.content.account_password;
                var account_first_name = response.content.account_first_name;
                var account_last_name = response.content.account_last_name;
                var csrf_name = response.content.name;
                var csrf_hash = response.content.hash;
                $('#message').text("");
                $('#message').append(account_email);
                $('#message').append("<br>");
                $('#message').append(account_password);
                $('#message').append("<br>");
                $('#message').append(account_first_name);
                $('#message').append("<br>");
                $('#message').append(account_last_name);
                $('input[name="csrf_test_name"]').val(csrf_hash);
            }else if(status == 'success'){
                $('#message').text("");
                $('#registerModal').modal('hide')
            }
		},
		error:function (xhr, ajaxOptions, thrownError){
			// alert("failure");
		}
		});
})
});