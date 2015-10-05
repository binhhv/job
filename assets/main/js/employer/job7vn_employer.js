
//employer register
function uploadOnChange(objFile) {
    fileName = objFile.value.replace(/C:\\fakepath\\/i, '');
    $("#note_file_select").html(fileName);
}
var err_ext = false;

function getExt(filename) {
    var ext = filename.split('.').pop();
    if (ext == filename) return "";
    return ext;
}

function uploadOnChange_cv(objFile) {
    fileName = objFile.value.replace(/C:\\fakepath\\/i, '');
    var ext = getExt(fileName);
    if (ext == "doc" || ext == "docx" || ext == "pdf") {
        $("#note_file_select").html(fileName);
        err_ext = true;
    } else {
        $("#note_file_select").html('file định dạng không đúng');
        err_ext = false;
    }
}

function closeModal_update() {
    $('#message_update_empoyer').text("");
    $('#employer_updateModal').modal('hide');
    $('#message_update_contact_empoyer').text("");
    $('#employer_contact_updateModal').modal('hide');
    $('#message_update_account_empoyer').text("");
    $('#employer_account_updateModal').modal('hide');
}

$(document).ready(function() {
    $("input[name='rec_job_map_country']").click(function() {
        var name_input = $(this).val();
        var cct = $("input[name=csrf_test_name]").val(); //alert(cct);
        // $('#province_name').multiselect();
        $.ajax({
            type: "POST",
            url: base_website + "createrecruitment/buildDropProvince",
            dataType: "json",
            data: {
                'csrf_test_name': cct,
                'rec_job_map_country': name_input
            },
            success: function(response) {
                var name_res = response.content.name_data;
                var csrf_hash = response.content.hash;
                $('input[name="csrf_test_name"]').val(csrf_hash);
                // alert(name_res);
                $('select#province_name').html('');
                for (var i = 0; i < name_res.length; i++) {
                    $("<option />").val(name_res[i].province_id).text(name_res[i].province_name).appendTo($('select#province_name'));
                }
                $('#province_name').selectpicker('refresh');
                // $("#name").val('');
                // $("#province_name").html(name_res);
                // $('#province_name').multiselect();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                console.log(xhr.responseText);
                alert(thrownError);
            }
        });
    });
    //employer update imfomation
    $("#employer-update-form").submit(function(event) {
            event.preventDefault();
            var form = $(this);
            var formdata = false;
            if (window.FormData) {
                formdata = new FormData(form[0]);
            }
            var formAction = form.attr('action');
            $.ajax({
                type: "POST", // HTTP method POST or GET
                url: base_website + "employer/employer/update_information_employer", //Where to make Ajax calls
                dataType: "json", // Data type, HTML, json etc.
                cache: false,
                data: formdata ? formdata : form.serialize(),
                contentType: false,
                processData: false,
                success: function(response) {
                    // var objs = $.parseJSON(response);
                    var status = response.status;
                    if (status == 'errvalid') {
                        var employer_name = response.content.employer_name;
                        var employer_size = response.content.employer_size;
                        var employer_phone = response.content.employer_phone;
                        var employer_about = response.content.employer_about;
                        var employer_address = response.content.employer_address;
                        var employer_map_province = response.content.employer_map_province;
                        var csrf_name = response.content.name;
                        var csrf_hash = response.content.hash;
                        $('#message_update_empoyer').text("");
                        $('#message_update_empoyer').append(employer_name);
                        $('#message_update_empoyer').append(employer_address);
                        $('#message_update_empoyer').append(employer_map_province);
                        $('#message_update_empoyer').append(employer_phone);
                        $('#message_update_empoyer').append(employer_size);
                        $('#message_update_empoyer').append(employer_about);
                        $('input[name="csrf_test_name"]').val(csrf_hash);
                    } else if (status == 'success') {
                        $('#message_update_empoyer').text("");
                        $('#employer_updateModal').modal('hide');
                        window.location.reload();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert('lalue');
                }
            });
        })
        //employer update imfomation
    $("#employer-contact-update-form").submit(function(event) {
            event.preventDefault();
            var form = $(this);
            var formdata = false;
            if (window.FormData) {
                formdata = new FormData(form[0]);
            }
            var formAction = form.attr('action');
            $.ajax({
                type: "POST", // HTTP method POST or GET
                url: base_website + "employer/employer/update_contact_info_employer", //Where to make Ajax calls
                dataType: "json", // Data type, HTML, json etc.
                cache: false,
                data: formdata ? formdata : form.serialize(),
                contentType: false,
                processData: false,
                success: function(response) {
                    // var objs = $.parseJSON(response);
                    var status = response.status;
                    if (status == 'errvalid') {
                        var employer_contact_name = response.content.employer_contact_name;
                        var employer_contact_phone = response.content.employer_contact_phone;
                        var employer_contact_mobile = response.content.employer_contact_mobile;
                        var employer_contact_email = response.content.employer_contact_email;
                        var csrf_name = response.content.name;
                        var csrf_hash = response.content.hash;
                        $('#message_update_contact_empoyer').text("");
                        $('#message_update_contact_empoyer').append(employer_contact_name);
                        $('#message_update_contact_empoyer').append(employer_contact_phone);
                        $('#message_update_contact_empoyer').append(employer_contact_mobile);
                        $('#message_update_contact_empoyer').append(employer_contact_email);
                        $('input[name="csrf_test_name"]').val(csrf_hash);
                    } else if (status == 'success') {
                        $('#message_update_contact_empoyer').text("");
                        $('#employer_contact_updateModal').modal('hide');
                        window.location.reload();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert('lalue');
                }
            });
        })
        //employer update account
    $("#employer-account-update-form").submit(function(event) {
        event.preventDefault();
        var form = $(this);
        var formdata = false;
        if (window.FormData) {
            formdata = new FormData(form[0]);
        }
        var formAction = form.attr('action');
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: base_website + "employer/employer/update_account_employer", //Where to make Ajax calls
            dataType: "json", // Data type, HTML, json etc.
            cache: false,
            data: formdata ? formdata : form.serialize(),
            contentType: false,
            processData: false,
            success: function(response) {
                // var objs = $.parseJSON(response);
                var status = response.status;
                if (status == 'errvalid') {
                    var account_password = response.content.account_password;
                    var confirm_password = response.content.confirm_password;
                    var csrf_name = response.content.name;
                    var csrf_hash = response.content.hash;
                    $('#message_update_account_empoyer').text("");
                    $('#message_update_account_empoyer').append(account_password);
                    $('#message_update_account_empoyer').append(confirm_password);
                    $('input[name="csrf_test_name"]').val(csrf_hash);
                } else if (status == 'success') {
                    $('#message_update_account_empoyer').text("");
                    $('#employer_account_updateModal').modal('hide');
                    window.location.reload();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert('lalue');
            }
        });
    })
});