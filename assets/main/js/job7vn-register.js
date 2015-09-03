//employer register
function uploadOnChange(objFile) {
        fileName = objFile.value.replace(/C:\\fakepath\\/i, '');
        $("#note_file_select").html(fileName);
}

var err_ext = false;
function getExt(filename)
{
    var ext = filename.split('.').pop();
    if(ext == filename) return "";
    return ext;
}
function uploadOnChange_cv(objFile) {
        fileName = objFile.value.replace(/C:\\fakepath\\/i, '');
        var ext = getExt(fileName);
        if(ext == "doc" || ext == "docx" || ext == "pdf"){
             $("#note_file_select").html(fileName);
            err_ext =  true;
        }else{
             $("#note_file_select").html('file định dạng không đúng');
            err_ext = false;
        }

 }


$(document).ready(function(){
//user register
$("#register-form").submit(function(event){
     event.preventDefault();
        $.ajax({
        type: "POST", // HTTP method POST or GET
        url: base_website +"register/insertAccount", //Where to make Ajax calls
        dataType:"json", // Data type, HTML, json etc.
        data:$(this).serialize(), //Form variables
        success:function(response){
            // var objs = $.parseJSON(response);
            var status = response.status;
            if(status == 'errvalid'){
                var account_email = response.content.account_email;
                var account_password = response.content.account_password;
                var confirm_password = response.content.confirm_password;
                var account_first_name = response.content.account_first_name;
                var account_last_name = response.content.account_last_name;
                var csrf_name = response.content.name;
                var csrf_hash = response.content.hash;
                $('#message').text("");
                $('#message').append(account_email);
                $('#message').append(account_password);
                $('#message').append(confirm_password);
                $('#message').append(account_first_name);
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

    $.dobPicker({
    daySelector: '#dobday', /* Required */
    monthSelector: '#dobmonth', /* Required */
    yearSelector: '#dobyear', /* Required */
    dayDefault: 'Day', /* Optional */
    monthDefault: 'Month', /* Optional */
    yearDefault: 'Year', /* Optional */
    minimumAge: 8, /* Optional */
    maximumAge: 100 /* Optional */
  });

//employer register

$("#employer-register-form").submit(function(event){
     event.preventDefault();
      var form = $(this);
        var formdata = false;
        if(window.FormData){
            formdata = new FormData(form[0]);
        }
        var formAction = form.attr('action');
        $.ajax({
        type: "POST", // HTTP method POST or GET
        url: base_website + "register/insertEmployer", //Where to make Ajax calls
        dataType:"json", // Data type, HTML, json etc.
        cache : false,
        data        : formdata ? formdata : form.serialize(),
        contentType : false,
        processData : false,

        success:function(response){
            // var objs = $.parseJSON(response);
            var status = response.status;
            if(status == 'errvalid'){
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
                $('#message').text("");
                $('#message').append(account_email);
                $('#message').append(account_password);
                $('#message').append(confirm_password);
                $('#message').append(employer_name);
                $('#message').append(employer_size);
                $('#message').append(employer_phone);
                $('#message').append(employer_fax);
                $('#message').append(employer_about);
                $('#message').append(employer_address);
                $('#message').append(employer_map_province);
                $('#message').append(employer_contact);
                $('#message').append(employer_contact_email);
                $('#message').append(employer_contact_phone);
                $('#message').append(employer_contact_mobile);
                $('input[name="csrf_test_name"]').val(csrf_hash);
            }else if(status == 'success'){
                $('#message').text("");
                $('#employer_registerModal').modal('hide')
            }
        },
        error:function (xhr, ajaxOptions, thrownError){
           alert('lalue');
        }
        });
})


$("input[name='rec_job_map_country']").click(function() {
        var name_input = $(this).val();
        var cct = $("input[name=csrf_test_name]").val();//alert(cct);
        // $('#province_name').multiselect();
        $.ajax({
        type: "POST",
        url: base_website + "createrecruitment/buildDropProvince", 
        dataType:"json",
        data: {'csrf_test_name':cct, 'rec_job_map_country':name_input},
        success: function(response) {
            var name_res = response.content.name_data;
            var csrf_hash = response.content.hash;
            $('input[name="csrf_test_name"]').val(csrf_hash);
            // alert(name_res);

            $('select#province_name').html('');

             for(var i=0;i<name_res.length;i++)
            {
                $("<option />").val(name_res[i].province_id)
                               .text(name_res[i].province_name)
                               .appendTo($('select#province_name'));
            }
            $('#province_name').selectpicker('refresh');    

            // $("#name").val('');
            // $("#province_name").html(name_res);

            // $('#province_name').multiselect();
            
        },
         error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            console.log(xhr.responseText);
            alert(thrownError);
        }
    });
     });

//upload cv online
$("#createcv_online-form").submit(function(event){
     event.preventDefault();
      $.ajax({
        type: "POST", // HTTP method POST or GET
        url: base_website + "uploadcv/upload_cv_online", //Where to make Ajax calls
        dataType:"json", // Data type, HTML, json etc.
        data:$(this).serialize(), //Form variables
        success:function(response){
            // alert(response);

            // var objs = $.parseJSON(response);
            var status = response.status;
            if(status == 'success'){
                $('#createcv_onlineModel').modal('hide');
            }else{

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
                $('#message').text("");
                $('#message').append(docon_career);
                $('#message').append(docon_salary);
                $('#message').append(docon_degree);
                $('#message').append(docon_education);
                $('#message').append(docon_experience);
                $('#message').append(docon_healthy);
                $('#message').append(docon_advance);
                $('#message').append(docon_reason_apply);
                $('#message').append(docon_address);
                $('#message').append(docon_phone);
                // $('#message').append(docon_birthday);
                $('input[name="csrf_test_name"]').val(csrf_hash);
            }
        },
        error:function (xhr, ajaxOptions, thrownError){
            alert("failure");
        }
        });
    })
//create recruitment

$("#create_recruitment-form").submit(function(event){
    var dobday = $("#dobday").attr("name");
    var dobmonth = $("#dobmonth").attr("name");
    var dobyear = $("#dobyear").attr("name");
    var datetime = dobday + "/" + dobmonth + "/" + dobyear;
     event.preventDefault();
      $.ajax({
        type: "POST", // HTTP method POST or GET
        url: base_website + "createrecruitment/create_recruitment", //Where to make Ajax calls
        dataType:"json", // Data type, HTML, json etc.
        data:$(this).serialize(), //Form variables
        success:function(response){
            // alert(response);

            // var objs = $.parseJSON(response);
            var status = response.status;
            if(status == 'success'){
                $('#create_recruitmentModel').modal('hide');
            }else{

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
                $('#message').text("");
                $('#message').append(docon_career);
                $('#message').append(docon_salary);
                $('#message').append(docon_degree);
                $('#message').append(docon_education);
                $('#message').append(docon_experience);
                $('#message').append(docon_healthy);
                $('#message').append(docon_advance);
                $('#message').append(docon_reason_apply);
                $('#message').append(docon_address);
                $('#message').append(docon_phone);
                // $('#message').append(docon_birthday);
                $('input[name="csrf_test_name"]').val(csrf_hash);
            }
        },
        error:function (xhr, ajaxOptions, thrownError){
            alert("failure");
        }
        });
    })

    //upload cv
    $("#uploadcv-form").submit(function(event){
     event.preventDefault();
      var form = $(this);
        var formdata = false;
        if(window.FormData){
            formdata = new FormData(form[0]);
        }

        var formAction = form.attr('action');
        if(err_ext){
             $.ajax({
            type: "POST", // HTTP method POST or GET
            url: base_website + "uploadcv/upload_cv", //Where to make Ajax calls
            dataType:"json", // Data type, HTML, json etc.
            cache : false,
            data        : formdata ? formdata : form.serialize(),
            contentType : false,
            processData : false,

            success:function(response){
                // alert(response);

                // var objs = $.parseJSON(response);
                var status = response.status;
                if(status == 'success'){
                    $('#uploadcvModel').modal('hide');
                }else{
                    var content = response.content.contente;
                    $('#message').text("");
                    $('#message').append(content);
                    $('input[name="csrf_test_name"]').val(csrf_hash);
                }
                // if(status == 'errvalid'){
                //     // var account_email = response.content.account_email;
                //     // var account_password = response.content.account_password;
                //     // var csrf_name = response.content.name;
                //     // var csrf_hash = response.content.hash;
                //     // $('#message').text("");
                //     // $('#message').append(account_email);
                //     // $('#message').append(account_password);
                //     // $('input[name="csrf_test_name"]').val(csrf_hash);
                //      $('#message').text("");
                //     $('#uploadcvModel').modal('hide')
                // }else if(status == 'success'){
                //     $('#message').text("");
                //     $('#uploadcvModel').modal('hide')
                // }
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert("failure");
            }
            });
        }else{
            $("#note_file_select").html('file dinh dang khong dung');
        }

    })
});
