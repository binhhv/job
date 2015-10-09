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
// var img_file = "";

// function uploadOnChange_cv(objFile) {
//     fileName = objFile.value.replace(/C:\\fakepath\\/i, '');
//     var ext = getExt(fileName);
//     if (ext == "doc" || ext == "docx" || ext == "pdf") {
//         $("#note_file_select").html(fileName);
//         err_ext = true;

//         var oFReader = new FileReader();
//         oFReader.readAsDataURL(document.getElementById("userfile").files[0]);
//         oFReader.onload = function (oFREvent) {
//             var binaryString = oFREvent.target.result;
//                 img_file = btoa(binaryString);
//         };


        

//     } else {
//         $("#note_file_select").html('file định dạng không đúng');
//         err_ext = false;
//     }
// }
function closeModal(){
    $('#message_recruitment').text("");
    $('#create_recruitmentModel').modal('hide');

    $('#message_user').text("");
    $('#registerModal').modal('hide');

    $('#message_upload_cv').text("");
    $('#uploadcvModel').modal('hide');

    $('#message_upload_cv_online').text("");
    $('#createcv_onlineModel').modal('hide');

    $('#message_recruitment').text("");
    $('#create_recruitmentModel').modal('hide');
  
}

$(document).ready(function() {
    $("#upload_cv").hide();
    //user register
    $("#register-form").submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: base_website + "register/insertAccount", //Where to make Ajax calls
            dataType: "json", // Data type, HTML, json etc.
            data: $(this).serialize(), //Form variables
            success: function(response) {
                // var objs = $.parseJSON(response);
                var status = response.status;
                if (status == 'errvalid') {
                    var account_email = response.content.account_email;
                    var account_password = response.content.account_password;
                    var confirm_password = response.content.confirm_password;
                    var account_first_name = response.content.account_first_name;
                    var account_last_name = response.content.account_last_name;
                    var csrf_name = response.content.name;
                    var csrf_hash = response.content.hash;
                    $('#message_user').text("");
                    $('#message_user').append(account_last_name);
                    $('#message_user').append(account_first_name);
                    $('#message_user').append(account_email);
                    $('#message_user').append(account_password);
                    $('#message_user').append(confirm_password);
                    
                    
                    $('input[name="csrf_test_name"]').val(csrf_hash);
                } else if (status == 'success') {
                    $('#message_user').text("");
                    $('#registerModal').modal('hide')
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                // alert("failure");
            }
        });
    })
    
    //employer register
    $("#employer-register-form").submit(function(event) {
        event.preventDefault();
        var form = $(this);
        var formdata = false;
        if (window.FormData) {
            formdata = new FormData(form[0]);
        }
        var formAction = form.attr('action');
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: base_website + "register/insertEmployer", //Where to make Ajax calls
            dataType: "json", // Data type, HTML, json etc.
            cache: false,
            data: formdata ? formdata : form.serialize(),
            contentType: false,
            processData: false,
            success: function(response) {
                // var objs = $.parseJSON(response);
                var status = response.status;
                if (status == 'errvalid') {
                    var account_email = response.content.account_email;
                    var account_password = response.content.account_password;
                    var confirm_password = response.content.confirm_password;
                    var employer_name = response.content.employer_name;
                    var employer_size = response.content.employer_size;
                    var employer_phone = response.content.employer_phone;
                    var employer_fax = response.content.employer_fax;
                    var employer_about = response.content.employer_about;
                    var employer_address = response.content.employer_address;
                    var employer_map_province = response.content.employer_map_province;
                    var employer_contact = response.content.employer_contact;
                    var employer_contact_email = response.content.employer_contact_email;
                    var employer_contact_phone = response.content.employer_contact_phone;
                    var employer_contact_mobile = response.content.employer_contact_mobile;
                    var csrf_name = response.content.name;
                    var csrf_hash = response.content.hash;
                    $('#message_empoyer').text("");
                    $('#message_empoyer').append(account_email);
                    $('#message_empoyer').append(account_password);
                    $('#message_empoyer').append(confirm_password);
                    $('#message_empoyer').append(employer_name);
                    $('#message_empoyer').append(employer_size);
                    $('#message_empoyer').append(employer_phone);
                    $('#message_empoyer').append(employer_fax);
                    $('#message_empoyer').append(employer_about);
                    $('#message_empoyer').append(employer_address);
                    $('#message_empoyer').append(employer_map_province);
                    $('#message_empoyer').append(employer_contact);
                    $('#message_empoyer').append(employer_contact_email);
                    $('#message_empoyer').append(employer_contact_phone);
                    $('#message_empoyer').append(employer_contact_mobile);
                    $('input[name="csrf_test_name"]').val(csrf_hash);
                } else if (status == 'success') {
                    $('#message_empoyer').text("");
                    $('#employer_registerModal').modal('hide')
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert('lalue');
            }
        });
    })
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
    //upload cv online
    $("#createcv_online-form").submit(function(event) {
            event.preventDefault();
            $.ajax({
                type: "POST", // HTTP method POST or GET
                url: base_website + "uploadcv/upload_cv_online", //Where to make Ajax calls
                dataType: "json", // Data type, HTML, json etc.
                data: $(this).serialize(), //Form variables
                success: function(response) {
                    // alert(response);
                    // var objs = $.parseJSON(response);
                    var status = response.status;
                    if (status == 'success') {
                        $('#message_upload_cv_online').text("");
                        $('#createcv_onlineModel').modal('hide');
                    } else {
                        var docon_career = response.content.docon_career;
                        var docon_salary = response.content.docon_salary;
                        var docon_degree = response.content.docon_degree;
                        var docon_education = response.content.docon_education;
                        var docon_experience = response.content.docon_experience;
                        var docon_healthy = response.content.docon_healthy;
                        var docon_advance = response.content.docon_advance;
                        var docon_reason_apply = response.content.docon_reason_apply;
                        var docon_address = response.content.docon_address;
                        var docon_phone = response.content.docon_phone;
                        // var docon_birthday = response.content.docon_birthday;
                        var csrf_name = response.content.name;
                        var csrf_hash = response.content.hash;
                        $('#message_upload_cv_online').text("");
                        $('#message_upload_cv_online').append(docon_career);
                        $('#message_upload_cv_online').append(docon_salary);
                        $('#message_upload_cv_online').append(docon_degree);
                        $('#message_upload_cv_online').append(docon_education);
                        $('#message_upload_cv_online').append(docon_experience);
                        $('#message_upload_cv_online').append(docon_healthy);
                        $('#message_upload_cv_online').append(docon_advance);
                        $('#message_upload_cv_online').append(docon_reason_apply);
                        $('#message_upload_cv_online').append(docon_address);
                        $('#message_upload_cv_online').append(docon_phone);
                        // $('#message').append(docon_birthday);
                        $('input[name="csrf_test_name"]').val(csrf_hash);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert("failure");
                }
            });
        })
        //create recruitment
    $("#create_recruitment-form").submit(function(event) {
            // var dobday = $("#dobday").attr("name");
            // var dobmonth = $("#dobmonth").attr("name");
            // var dobyear = $("#dobyear").attr("name");
            // var datetime = dobday + "/" + dobmonth + "/" + dobyear;
            event.preventDefault();
            $.ajax({
                type: "POST", // HTTP method POST or GET
                url: base_website + "createrecruitment/create_recruitment", //Where to make Ajax calls
                dataType: "json", // Data type, HTML, json etc.
                data: $(this).serialize(), //Form variables
                success: function(response) {
                    // alert(response);
                    // var objs = $.parseJSON(response);
                    var status = response.status;
                    if (status == 'success') {
                         $('#message_recruitment').text("");
                        $('#create_recruitmentModel').modal('hide');
                    } else {
                        var rec_title = response.content.rec_title;
                        var rec_job_map_country = response.content.rec_job_map_country;
                        var province_name = response.content.province_name;
                        var rec_salary = response.content.rec_salary;
                        var rec_job_map_career = response.content.rec_job_map_career;
                        var rec_job_regimen = response.content.rec_job_regimen;
                        var rec_job_content = response.content.rec_job_content;
                        var rec_day = response.content.rec_day;
                        var rec_month = response.content.rec_month;
                        var rec_year = response.content.rec_year;
                        var rec_job_require = response.content.rec_job_require;
                        var rec_job_priority = response.content.rec_job_priority;
                        var rec_job_map_form = response.content.rec_job_map_form;
                        var rec_job_map_level = response.content.rec_job_map_level;
                        var rec_job_map_form_child = response.content.rec_job_map_form_child;
                        var rec_contact_name = response.content.rec_contact_name;
                        var rec_contact_email = response.content.rec_contact_email;
                        var rec_contact_address = response.content.rec_contact_address;
                        var rec_contact_phone = response.content.rec_contact_phone;
                        var rec_contact_form = response.content.rec_contact_form;
                        // var docon_birthday = response.content.docon_birthday;
                        var csrf_name = response.content.name;
                        var csrf_hash = response.content.hash;
                        $('#message_recruitment').text("");
                        $('#message_recruitment').append(rec_title);
                        $('#message_recruitment').append(rec_job_map_country);
                        $('#message_recruitment').append(province_name);

                        //$('#message_recruitment').append(rec_salary);
                        $('#message_recruitment').append(welfare);

                        //$('#message_recruitment').append(rec_salary);
                        $('#message_recruitment').append(rec_job_map_career);

                        $('#message_recruitment').append(rec_job_regimen);
                        $('#message_recruitment').append(rec_job_content);
                        $('#message_recruitment').append(rec_day);
                        $('#message_recruitment').append(rec_month);
                        $('#message_recruitment').append(rec_year);
                        $('#message_recruitment').append(rec_job_require);
                        $('#message_recruitment').append(rec_job_priority);
                        $('#message_recruitment').append(rec_job_map_form);
                        $('#message_recruitment').append(rec_job_map_level);
                        $('#message_recruitment').append(rec_job_map_form_child);
                        $('#message_recruitment').append(rec_contact_name);
                        $('#message_recruitment').append(rec_contact_email);
                        $('#message_recruitment').append(rec_contact_address);
                        $('#message_recruitment').append(rec_contact_phone);
                        $('#message_recruitment').append(rec_contact_form);
                        // $('#message').append(docon_birthday);
                        $('input[name="csrf_test_name"]').val(csrf_hash);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert("failure");
                }
            });
        })
        //upload cv
   $("#uploadcv").click(function(){
        event.preventDefault();
        var cct = $("input[name=csrf_test_name]").val();
        var jobseeker_first_name = $("input[name=jobseeker_first_name]").val();
        var jobseeker_last_name = $("input[name=jobseeker_last_name]").val();
        var jobseeker_phone = $("input[name=jobseeker_phone]").val();
        var jobseeker_mail = $("input[name=jobseeker_mail]").val();
       //var data_send = {'file_name': img_file, 'csrf_test_name':cct};

       // console.log(data_send);
        if (err_ext) {
            $.ajaxFileUpload({
                type: "POST",
                 url: base_website + "uploadcv/upload_file", //Where to make Ajax cal1*-ls
                secureuri : false,
                fileElementId : "userfile",
                dataType :"json",
                data : {'jobseeker_first_name': jobseeker_first_name, 'jobseeker_last_name': jobseeker_last_name,'jobseeker_first_name': jobseeker_phone,'jobseeker_phone': jobseeker_mail,  'csrf_test_name': cct},
                 // data: $(this).serialize(),
                success : function(data, status){
                    if(data.status != "error"){
                       console.log(response);
                    }
                    alert(data.msg);
                }
            });
            return false;

            /*$.ajaxFileUpload({
                type: "POST", // HTTP method POST or GET
                url: base_website + "uploadcv/upload_file", //Where to make Ajax cal1*-ls
                secureuri : false,
                fileElementId : "userfile",
                dataType: "json", // Data type, HTML, json etc.
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response);
                    $("#upload_cv").modal('hide');
                    // var status = response.status;
                    // if (status == 'success') {
                    //     $('#message_upload_cv').text("");
                    //     $('#uploadcvModel').modal('hide');
                    // } else {
                    //     var content = response.content.contente;
                    //     $('#message_upload_cv').text("");
                    //     $('#message_upload_cv').append(content);
                    //     $('input[name="csrf_test_name"]').val(csrf_hash);
                    // }
                },
                error: function(xhr, ajaxOptions, thrownError) {

                    alert(xhr.status);
                    console.log(xhr.responseText);
                    alert(thrownError);
                }
            });*/
        
        } else {
            $("#note_file_select").html('file dinh dang khong dung');
        }
    })

$.dobPicker({
        daySelector: '#job_day',
        /* Required */
        monthSelector: '#job_month',
        /* Required */
        yearSelector: '#job_year',

        /* Required */
        dayDefault: 'Ngày',
        /* Optional */
        monthDefault: 'Tháng',
        /* Optional */
        yearDefault: 'Năm',
        /* Optional */
        minimumAge: 0,
        /* Optional */
        maximumAge: 100 /* Optional */
    });

$.dobPicker({
        daySelector: '#dobday',
        /* Required */
        monthSelector: '#dobmonth',
        /* Required */
        yearSelector: '#dobyear',

        /* Required */
        dayDefault: 'Day',
        /* Optional */
        monthDefault: 'Month',
        /* Optional */
        yearDefault: 'Year',
        /* Optional */
        minimumAge: 10,
        /* Optional */
        maximumAge: 100 /* Optional */
    });
});