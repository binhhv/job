//user register

$(document).ready(function(){
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

// 

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



});
