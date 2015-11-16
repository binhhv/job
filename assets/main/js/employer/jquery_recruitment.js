$(function(){
	$("#femployer-create-recruitment").submit(function(event) {
        event.preventDefault();
        var province =[];
	    var countrySelect = $('input:radio[name="country"]:checked').val();
	    if(countrySelect == '1'){
	    $('.select-province-vn .chosen-container ul.chosen-choices li.search-choice').each(function () {
	        var li = $(this).find('a');
	        var indexProvince = li.data('option-array-index');
	       province.push($('select.province-vn option').eq(indexProvince).val());
	    });
		}else{
			$('.select-province-jp .chosen-container ul.chosen-choices li.search-choice').each(function () {
	        var li = $(this).find('a');
	       var indexProvince = li.data('option-array-index');
	       province.push($('select.province-jp option').eq(indexProvince).val());

	    });
		}

    	$("input[name=province]:hidden").val(province);
        var url = base_website;
        if($("input[name=isDraft]:hidden").val() == 1){
            url +="employer/recruitment/draft";
        }
        else{
             url +="employer/recruitment/create";
        }
        console.log(url);
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: url,//base_website + "employer/recruitment/create", //Where to make Ajax calls
            dataType: "json", // Data type, HTML, json etc.
            data: $(this).serialize(), //Form variables
            success: function(response) {
                // var objs = $.parseJSON(response);

                var status = response.status;
                console.log(status);
                if (status == 'errvalid') {

 
                	$(".error-title-recruitment").empty();
                	$(".error-province").empty();
                	$(".error-time-work").empty();
                    $(".error-content-recruitment").empty();
                    $(".error-regimen-recruitment").empty();
                    $(".error-require-recruitment").empty();
                    $(".error-priority-recruitment").empty();
                    $(".error-contact-name").empty();
                    $(".error-contact-email").empty();
                    $(".error-contact-phone").empty();
                    $(".error-contact-mobile").empty();
                    $(".error-contact-address").empty();
                    // $(".error-employer-contact-mobile").empty();


                    var title_recruitment = response.content.title_recruitment;//(typeof response.content.account_email === 'undefined' || response.content.account_email === null) ? response.content.account_email :'';
                    var province = response.content.province;//(typeof response.content.account_password === 'undefined' || response.content.account_password === null) ? response.content.account_password : '';
                    var time_work = response.content.time_work;//(typeof response.content.confirm_password === 'undefined' || response.content.confirm_password === null) ? response.content.confirm_password : '';
                    var content_recruitment = response.content.content_recruitment;//(typeof response.content.employer_name === 'undefined' || response.content.employer_name === null) ? response.content.employer_name : '';
                    var regimen_recruitment = response.content.regimen_recruitment;//(typeof response.content.employer_size === 'undefined' || response.content.employer_size === null) ? response.content.employer_size : '';
                    var require_recruitment = response.content.require_recruitment;//(typeof response.content.employer_phone === 'undefined' || response.content.employer_phone === null) ? response.content.employer_phone : '';
                    var priority_recruitment = response.content.priority_recruitment;//(typeof response.content.employer_fax === 'undefined' || response.content.employer_fax === null) ? response.content.employer_fax : '';
                    var contact_name = response.content.contact_name;//(typeof response.content.employer_about === 'undefined' || response.content.employer_about === null) ? response.content.employer_about : '';
                    var contact_email = response.content.contact_email;//(typeof response.content.employer_address === 'undefined' || response.content.employer_address === null) ? response.content.employer_address : '';
                    var contact_phone = response.content.contact_phone ;//(typeof response.content.employer_contact === 'undefined' || response.content.employer_contact === null) ? response.content.employer_contact : '';
                    var contact_mobile = response.content.contact_mobile;//(typeof response.content.employer_contact_email === 'undefined' || response.content.employer_contact_email === null) ? response.content.employer_contact_email : '';
                    var contact_address = response.content.contact_address;
                    // var employer_contact_phone = response.content.employer_contact_phone;//(typeof response.content.employer_contact_phone === 'undefined' || response.content.employer_contact_phone === null) ? response.content.employer_contact_phone : '';
                    // var employer_contact_mobile = response.content.employer_contact_mobile;//(typeof response.content.employer_contact_mobile === 'undefined' || response.content.employer_contact_mobile === null) ? response.content.employer_contact_mobile :'';
   
                   // var captcha = response.content.captcha;//(typeof response.content.captcha === 'undefined' || response.content.captcha === null) ? response.content.captcha : '';
                    var csrf_name = response.content.name;
                    var csrf_hash = response.content.hash;

                    // (account_last_name.length  > 0) ? $(".error-account-last-name").removeClass('hide').append(account_last_name) : null;
                    // (account_first_name.length  > 0) ? $(".error-account-first-name").removeClass('hide').append(account_first_name) : null;

                    (title_recruitment.length  > 0) ? $(".error-title-recruitment").removeClass('hide').append(title_recruitment) : null;
                    (province.length  > 0) ? $(".error-province").removeClass('hide').append(province) : null;
                    (time_work.length  > 0) ? $(".error-time-work").removeClass('hide').append(time_work) : null;
                    (content_recruitment.length  > 0) ? $(".error-content-recruitment").removeClass('hide').append(content_recruitment) : null;
                    (regimen_recruitment.length  > 0) ? $(".error-regiment-recruitment").removeClass('hide').append(regimen_recruitment) : null;
                    (require_recruitment.length  > 0) ? $(".error-require-recruitment").removeClass('hide').append(require_recruitment) : null;
                    (priority_recruitment.length  > 0) ? $(".error-priority-recruitment").removeClass('hide').append(priority_recruitment) : null;
                    (contact_name.length  > 0) ? $(".error-contact-name").removeClass('hide').append(contact_name) : null;
                    (contact_email.length  > 0) ? $(".error-contact-email").removeClass('hide').append(contact_email) : null;
                    (contact_phone.length  > 0) ? $(".error-contact-phone").removeClass('hide').append(contact_phone) : null;
                    (contact_mobile.length  > 0) ? $(".error-contact-mobile").removeClass('hide').append(contact_mobile) : null;
                    (contact_address.length  > 0) ? $(".error-contact-address").removeClass('hide').append(contact_address) : null;
                    // (employer_contact_phone.length  > 0) ? $(".error-employer-contact-phone").removeClass('hide').append(employer_contact_phone) : null;
                    // (employer_contact_mobile.length  > 0) ? $(".error-employer-contact-mobile").removeClass('hide').append(employer_contact_mobile) : null;
                    
                   	getTokenEditInfo(addTokenInputEditInfo);
                   // getCaptcha();
                } else if (status == 'success') {
                    window.location.href = base_website+ 'employer/recruitments'; //redirec to home page jobseeker
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
		//}
    })


    //form submit edit
    $("#femployer-edit-recruitment").submit(function(event) {
        event.preventDefault();
        var province =[];
        var countrySelect = $('input:radio[name="country"]:checked').val();
        if(countrySelect == '1'){
        $('.select-province-vn .chosen-container ul.chosen-choices li.search-choice').each(function () {
            var li = $(this).find('a');
            var indexProvince = li.data('option-array-index');
           province.push($('select.province-vn option').eq(indexProvince).val());
        });
        }else{
            $('.select-province-jp .chosen-container ul.chosen-choices li.search-choice').each(function () {
            var li = $(this).find('a');
           var indexProvince = li.data('option-array-index');
           province.push($('select.province-jp option').eq(indexProvince).val());

        });
        }

        $("input[name=province]:hidden").val(province);
        var url = base_website;
        if($("input[name=isDraft]:hidden").val() == 1){
            url +="employer/recruitment/update-draft";
        }
        else{
             url +="employer/recruitment/update";
        }
        console.log(url);
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: url,//base_website + "employer/recruitment/create", //Where to make Ajax calls
            dataType: "json", // Data type, HTML, json etc.
            data: $(this).serialize(), //Form variables
            success: function(response) {
                // var objs = $.parseJSON(response);

                var status = response.status;
                console.log(status);
                if (status == 'errvalid') {

 
                    $(".error-title-recruitment").empty();
                    $(".error-province").empty();
                    $(".error-time-work").empty();
                    $(".error-content-recruitment").empty();
                    $(".error-regimen-recruitment").empty();
                    $(".error-require-recruitment").empty();
                    $(".error-priority-recruitment").empty();
                    $(".error-contact-name").empty();
                    $(".error-contact-email").empty();
                    $(".error-contact-phone").empty();
                    $(".error-contact-mobile").empty();
                    $(".error-contact-address").empty();
                    // $(".error-employer-contact-mobile").empty();


                    var title_recruitment = response.content.title_recruitment;//(typeof response.content.account_email === 'undefined' || response.content.account_email === null) ? response.content.account_email :'';
                    var province = response.content.province;//(typeof response.content.account_password === 'undefined' || response.content.account_password === null) ? response.content.account_password : '';
                    var time_work = response.content.time_work;//(typeof response.content.confirm_password === 'undefined' || response.content.confirm_password === null) ? response.content.confirm_password : '';
                    var content_recruitment = response.content.content_recruitment;//(typeof response.content.employer_name === 'undefined' || response.content.employer_name === null) ? response.content.employer_name : '';
                    var regimen_recruitment = response.content.regimen_recruitment;//(typeof response.content.employer_size === 'undefined' || response.content.employer_size === null) ? response.content.employer_size : '';
                    var require_recruitment = response.content.require_recruitment;//(typeof response.content.employer_phone === 'undefined' || response.content.employer_phone === null) ? response.content.employer_phone : '';
                    var priority_recruitment = response.content.priority_recruitment;//(typeof response.content.employer_fax === 'undefined' || response.content.employer_fax === null) ? response.content.employer_fax : '';
                    var contact_name = response.content.contact_name;//(typeof response.content.employer_about === 'undefined' || response.content.employer_about === null) ? response.content.employer_about : '';
                    var contact_email = response.content.contact_email;//(typeof response.content.employer_address === 'undefined' || response.content.employer_address === null) ? response.content.employer_address : '';
                    var contact_phone = response.content.contact_phone ;//(typeof response.content.employer_contact === 'undefined' || response.content.employer_contact === null) ? response.content.employer_contact : '';
                    var contact_mobile = response.content.contact_mobile;//(typeof response.content.employer_contact_email === 'undefined' || response.content.employer_contact_email === null) ? response.content.employer_contact_email : '';
                    var contact_address = response.content.contact_address;
                    // var employer_contact_phone = response.content.employer_contact_phone;//(typeof response.content.employer_contact_phone === 'undefined' || response.content.employer_contact_phone === null) ? response.content.employer_contact_phone : '';
                    // var employer_contact_mobile = response.content.employer_contact_mobile;//(typeof response.content.employer_contact_mobile === 'undefined' || response.content.employer_contact_mobile === null) ? response.content.employer_contact_mobile :'';
   
                   // var captcha = response.content.captcha;//(typeof response.content.captcha === 'undefined' || response.content.captcha === null) ? response.content.captcha : '';
                    var csrf_name = response.content.name;
                    var csrf_hash = response.content.hash;

                    // (account_last_name.length  > 0) ? $(".error-account-last-name").removeClass('hide').append(account_last_name) : null;
                    // (account_first_name.length  > 0) ? $(".error-account-first-name").removeClass('hide').append(account_first_name) : null;

                    (title_recruitment.length  > 0) ? $(".error-title-recruitment").removeClass('hide').append(title_recruitment) : null;
                    (province.length  > 0) ? $(".error-province").removeClass('hide').append(province) : null;
                    (time_work.length  > 0) ? $(".error-time-work").removeClass('hide').append(time_work) : null;
                    (content_recruitment.length  > 0) ? $(".error-content-recruitment").removeClass('hide').append(content_recruitment) : null;
                    (regimen_recruitment.length  > 0) ? $(".error-regiment-recruitment").removeClass('hide').append(regimen_recruitment) : null;
                    (require_recruitment.length  > 0) ? $(".error-require-recruitment").removeClass('hide').append(require_recruitment) : null;
                    (priority_recruitment.length  > 0) ? $(".error-priority-recruitment").removeClass('hide').append(priority_recruitment) : null;
                    (contact_name.length  > 0) ? $(".error-contact-name").removeClass('hide').append(contact_name) : null;
                    (contact_email.length  > 0) ? $(".error-contact-email").removeClass('hide').append(contact_email) : null;
                    (contact_phone.length  > 0) ? $(".error-contact-phone").removeClass('hide').append(contact_phone) : null;
                    (contact_mobile.length  > 0) ? $(".error-contact-mobile").removeClass('hide').append(contact_mobile) : null;
                    (contact_address.length  > 0) ? $(".error-contact-address").removeClass('hide').append(contact_address) : null;
                    // (employer_contact_phone.length  > 0) ? $(".error-employer-contact-phone").removeClass('hide').append(employer_contact_phone) : null;
                    // (employer_contact_mobile.length  > 0) ? $(".error-employer-contact-mobile").removeClass('hide').append(employer_contact_mobile) : null;
                    
                    getTokenEditInfo(addTokenInputEditInfo);
                   // getCaptcha();
                } else if (status == 'success') {
                    window.location.href = base_website+ 'employer/recruitments'; //redirec to home page jobseeker
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
        //}
    })
});

var getTokenEditInfo = function(callback){
    	 $.ajax({
        url: base_website +'job/getToken',
        type: "get",
        dataType:'json',
        success: function(data){
           callback(data);

        }
      });
    };

    function addTokenInputEditInfo(data){
    	console.log('token' +data);
    	$('input:hidden[name="csrf_test_name"]').val(data.hash);
    }

$(window).load(function() {
    window.setTimeout(function(){
         $(".loading-recruitments-em").addClass('hide');
        $(".content-recruitments-em").removeClass('hide');
    },1000);
})
$(".btn-detail-recruitment").on('click',function(){
    window.location.href = $(this).data('href');
})
$(".btn-edit-recruitment-em").on('click',function(){
    window.location.href = $(this).data('href');
})

// $(".btn-drafts").on('click',function(){
//     alert("check");
// });
function draftRecruiment(){
   var draft = '<input type="hidden" name="isDraft" value="1">';
   $(".draft-rec").empty().append(draft);
   $("#femployer-create-recruitment").submit();
}
function editDraftRecruiment(){
    var draft = '<input type="hidden" name="isDraft" value="1">';
   $(".draft-rec").empty().append(draft);
  $("#femployer-edit-recruitment").submit();
  //alert($("input[name=isDraft]:hidden").val());
}


$('#modal-delete-recruitment-em').on('show.bs.modal', function(e) {
    var idRec = $(e.relatedTarget).data('href');
    $("#fdelete-recruitment-em").find("input:hidden[name=idRec]").val(idRec);
   // getToken(addTokenInput);
    getToken(addTokenInput);
});

$("#fdelete-recruitment-em").submit(function(event) {
    event.preventDefault();
    console.log($(this).serialize());
    $.ajax({
        type: "POST", // HTTP method POST or GET
        url: base_website + "employer/recruitment/delete", //Where to make Ajax calls
        dataType: "json", // Data type, HTML, json etc.
        data: $(this).serialize(),
        success: successRecruitments,
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError);
        }
    });
})

function successRecruitments(response) {
    console.log(response);
    $("body").find($("input:hidden[name=csrf_test_name]")).val(response.content.csrf.hash);
    (response.content.status == 'success') ? loadFinishRecruitments(): null;
    $("#" + response.content.modal).modal('hide');
}

function getListRecruitment(){
    $.ajax({
        url: base_website + 'employer/recruitment/get-view-recruitment-em',
        type: "get",
        dataType: 'html',
        success: function(data) {
            $(".loading-recruitments-em").removeClass('hide');
            $(".content-recruitments-em").addClass('hide');
            window.setTimeout(function() {
                $(".content-recruitments-em").empty().append(data);
            }, 200);

        }
    });
}


function loadFinishRecruitments() {
    getListRecruitment();
    window.setTimeout(function() {
        $(".loading-recruitments-em").addClass('hide');
        $(".content-recruitments-em").removeClass('hide');
    }, 1500);
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