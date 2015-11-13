// $(function(){
$('#modal-delete-account-em').on('show.bs.modal', function(e) {
    var idUser = $(e.relatedTarget).data('href');
    $("#fdelete-account-em").find("input:hidden[name=idUser]").val(idUser);
    getToken(addTokenInput);
});
$('#modal-disable-account-em').on('show.bs.modal', function(e) {
    var idUser = $(e.relatedTarget).data('href');
    $("#fdisable-account-em").find("input:hidden[name=idUser]").val(idUser);
    getToken(addTokenInput);
});
$('#modal-enable-account-em').on('show.bs.modal', function(e) {
    var idUser = $(e.relatedTarget).data('href');
    $("#fenable-account-em").find("input:hidden[name=idUser]").val(idUser);
    getToken(addTokenInput);
});
$('#modal-account-em').on('show.bs.modal', function(e) {
	var idUser = $(e.relatedTarget).data('href');
  
    getViewAccount(idUser);
    //getToken(addTokenInput);
});
//delete account
$("#fdelete-account-em").submit(function(event) {
    event.preventDefault();
    console.log($(this).serialize());
    $.ajax({
        type: "POST", // HTTP method POST or GET
        url: base_website + "employer/delete-account", //Where to make Ajax calls
        dataType: "json", // Data type, HTML, json etc.
        data: $(this).serialize(),
        success: successAccounts,
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError);
        }
    });
})

//disabled acount
$("#fdisable-account-em").submit(function(event) {
    event.preventDefault();
    console.log($(this).serialize());
    $.ajax({
        type: "POST", // HTTP method POST or GET
        url: base_website + "employer/disable-account", //Where to make Ajax calls
        dataType: "json", // Data type, HTML, json etc.
        data: $(this).serialize(),
        success: successAccounts,
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError);
        }
    });
})

//enabled account
$("#fenable-account-em").submit(function(event) {
    event.preventDefault();
    console.log($(this).serialize());
    $.ajax({
        type: "POST", // HTTP method POST or GET
        url: base_website + "employer/enable-account", //Where to make Ajax calls
        dataType: "json", // Data type, HTML, json etc.
        data: $(this).serialize(),
        success: successAccounts,
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError);
        }
    });
})
//create account
// $("#faccount-em").submit(function(event) {
//     event.preventDefault();
//     var url = ($(this).find('input:hidden[name=idUser]').val() == 0) ? base_website + 'employer/create-account': base_website +'employer/update-account' ;
//     console.log(url);
//     // $.ajax({
//     //     type: "POST", // HTTP method POST or GET
//     //     url: url, //Where to make Ajax calls
//     //     dataType: "json", // Data type, HTML, json etc.
//     //     data: $(this).serialize(),
//     //     success: handleCreateUpdateAccount,
//     //     error: function(xhr, ajaxOptions, thrownError) {
//     //         console.log(thrownError);
//     //     }
//     // });
// })

function successAccounts(response) {
    console.log(response);
    $("body").find($("input:hidden[name=csrf_test_name]")).val(response.content.csrf.hash);
    (response.content.status == 'success') ? loadFinish(): null;
    $("#" + response.content.modal).modal('hide');
}
function handleCreateUpdateAccount(response){
	if(response.status == 'errvalid'){
		$(".error-account-email").empty();
		$(".error-account-password").empty();
		$(".error-account-passconf").empty();
	    $(".error-account-firstname").empty();
	    $(".error-account-lastname").empty();
	    
	    var account_email = response.content.email;
	    var account_firstname = response.content.firstname;
	    var account_lastname = response.content.lastname;
	    var account_password = response.content.password;
	    var account_passconf = response.content.passconf;

	    (account_email.length > 0 ) ? $('.error-account-email').removeClass('hide').append(account_email) : null;
	    (account_password.length > 0 ) ? $('.error-account-password').removeClass('hide').append(account_password) : null;
	    (account_passconf.length > 0 ) ? $('.error-account-passconf').removeClass('hide').append(account_passconf) : null;
	    (account_firstname.length > 0 ) ? $('.error-account-firstname').removeClass('hide').append(account_firstname) : null;
	    (account_lastname.length > 0 ) ? $('.error-account-lastname').removeClass('hide').append(account_lastname) : null;

	    getToken(addTokenInput);
	}
	else{
		$("body").find($("input:hidden[name=csrf_test_name]")).val(response.content.csrf.hash);
		loadFinish();
    	$("#modal-account-em").modal('hide');
	}
}
function getListAccount() {
    $(".loading-accounts-em").removeClass('hide');
    $(".content-accounts-em").addClass('hide');
    $.ajax({
        url: base_website + 'employer/get-list-account',
        type: "get",
        dataType: 'html',
        success: function(data) {
            window.setTimeout(function() {
                $(".content-accounts-em").empty().append(data);
            }, 200);

        }
    });
}

function getViewAccount(id){
	$.ajax({
        url: base_website + 'employer/get-view-account-em/'+id,
        type: "get",
        dataType: 'html',
        success: function(data) {
            window.setTimeout(function() {
                $("#modal-account-em .content-modal-account-em").empty().append(data);
            }, 200);

        }
    });
}
function getToken(callback) {
    $.ajax({
        url: base_website + 'job/getToken',
        type: "get",
        dataType: 'json',
        success: function(data) {
            $(".token").empty();
            callback(data);
        }
    });
};

function addTokenInput(data) {
    $(".token").empty();
    var token = '<input type="hidden" name="' + data.name + '" value="' + data.hash + '" />';
    $(".token").append(token);
    //console.log(token);
}
$(window).load(function() {
    loadFinish();
})

function loadFinish() {
    getListAccount();
    window.setTimeout(function() {
        $(".loading-accounts-em").addClass('hide');
        $(".content-accounts-em").removeClass('hide');
    }, 1500);
}
