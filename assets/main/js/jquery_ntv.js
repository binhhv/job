var filename;
$(function(){
   getCaptcha('captcha');
	 $('.list-tag-job').niceScroll({cursorborder:"",cursorcolor:"#000",boxzoom:true}); // First scrollable DIV
	 $('#modalChangePassword').on('shown.bs.modal', function() {
        reposition();
    		getToken(addTokenInput);
              
	  })

   $('#modalChangePassword').on('hide.bs.modal', function() {
      $(".error-captcha").addClass('hide')
              $(".error-old-password").empty().addClass('hide');
              $(".error-new-password").empty().addClass('hide');
              $(".error-confirm-password").empty().addClass('hide');
              //$("input:password").val('');
              $("input").val('');
   })



   $("#change-password-form").submit(function(event) {
        event.preventDefault();
        //if(!checkCaptcha()){
          //$(".error-captcha").removeClass('hide');
          //getCaptcha();
    //}else{
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: base_website + "change-password", //Where to make Ajax calls
            dataType: "json", // Data type, HTML, json etc.
            data: $(this).serialize(), //Form variables
            success: function(response) {
                // var objs = $.parseJSON(response);

                var status = response.status;
                if (status == 'errvalid') {
                  //$(".error-captcha").empty()
                  $(".error-captcha").addClass('hide')
                  $(".error-old-password").empty();
                  $(".error-new-password").empty();
                  $(".error-confirm-password").empty();
                  

                    var password_old = response.content.password_old;
                    var password_new = response.content.password_new;
                    var password_confirm = response.content.password_confirm;

                    var captcha = response.content.captcha;

                    (password_old.length  > 0) ? $(".error-old-password").removeClass('hide').append(password_old) : null;
                    (password_new.length  > 0) ? $(".error-new-password").removeClass('hide').append(password_new) : null;
                    (password_confirm.length  > 0) ? $(".error-confirm-password").removeClass('hide').append(password_confirm) : null;
                    
                    (captcha.length > 0) ? $(".error-captcha").removeClass('hide') : null;
                    // $('#message_user').text("");
                    // $('#message_user').append(account_last_name);
                    // $('#message_user').append(account_first_name);
                    // $('#message_user').append(account_email);
                    // $('#message_user').append(account_password);
                    // $('#message_user').append(confirm_password);

                    $(".alert-danger").css('margin','0');
                   // $('input[name="csrf_test_name"]').val(csrf_hash);
                    getCaptcha('captcha');
                    getToken(addTokenInput);
                } else if (status == 'success') {
                    $("#modalChangePassword").modal('hide');
                    //$('#message_user').text("");
                    //$('#registerModal').modal('hide')
                    //window.location.href = '<?php echo base_url();?>'; //redirec to home page jobseeker
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                //alert(thrownError);
            }
        });
    //}
    })



      $('.btn-create-resume').on('click',function(){
        window.location.href = base_website + 'create-resume';
          //  $.ajax({
          //   url: base_website + 'jobseeker/gerFormCreateResume',
          //   type: "get",
          //   dataType:'html',
          //   success: function(data){
          //      //document.write(data); just do not use document.write
          //      //console.log(data);
          //      $(".content-create-resume").empty();
          //      $(".content-create-resume").append(data);
          //   //     var h = document.documentElement.clientHeight;//window.innerHeight;
          //   // h = (h*70)/100;
          //   // var top = $(".title-job-scroll").height();
          //   // $(".modal-content").css({"height":h,"overflow":"auto","margin-top":top + 20});
          //      $('#modal-create-resume').modal('show');
          //      //console.log(data.name);
          //      //alert(data);
          //   }
          // });
     

  });

      $('.btn-upload-resume').on('click',function(){
        window.location.href = base_website + 'upload-resume';
  });



//   var url = base_website +'uploads/do_upload';
//         $('#fileupload').fileupload({
//            add: function(e, data) {
//                 var uploadErrors = [];
//                 var acceptFileTypes = /(\.|\/)(doc|docx|pdf)$/i;
//                 console.log(JSON.stringify(data));
//                 //var filename = $('#fileupload').val();
//                 console.log('filename'+data.originalFiles[0]['name']);
//                 $(".files-name").empty().append(data.originalFiles[0]['name']);
//                 $("input[name=file-name]:hidden").val(data.originalFiles[0]['name']);
//                 var ext = data.originalFiles[0]['name'].split('.').pop().toLowerCase();
//           // if($.inArray(ext, ['doc','docx','pdf']) == -1) {
//           //     alert('invalid extension!');
//           // }
//                 if($.inArray(ext, ['doc','docx','pdf']) == -1) {
//                     uploadErrors.push('File không đúng định dạng.');
//                 }
//                 // if(data.originalFiles[0]['size'].length && data.originalFiles[0]['size'] > 5000000) {
//                 //     uploadErrors.push('Kích thước file quá lớn.');
//                 // }
//                 if(uploadErrors.length > 0) {
//                     var errormsg = uploadErrors.join("\n");
//                     $('.error-file').empty();
//                     $('.error-file').removeClass('hide');
//                     $('.error-file').append(errormsg);
//                 } else {
//                     data.submit();
//                 }
//           },
//             url: url,
//             dataType: 'json',
//             done: function (e, data) {
//                 $.each(data.result.files, function (index, file) {
//                   $("#files").empty();
//                   $('.error-file').empty();
//                     $('<p/>').text(file.name).appendTo('#files');
//                     $("input[name=file-tmp]:hidden").val(file.name);
//                     getToken(addTokenInput);
//                     //$("#btn-apply").attr("disabled",false);
//                 });
//                 //$(".files-name").append(filename);
//             },
        
//             progressall: function (e, data) {
//                 var progress = parseInt(data.loaded / data.total * 100, 10);
//                 $('#progress .progress-bar').css(
//                     'width',
//                     progress + '%'
//                 );
//             }
//         }).prop('disabled', !$.support.fileInput)
//             .parent().addClass($.support.fileInput ? undefined : 'disabled');
//     //});
//   $('#fileupload').change(function() {
//       var filename = $('#fileupload').val();
//       ///console.log('filename'+filename);
//       //$(".files-name").append(filename);
//   //       var ext = $('#fileupload').val().split('.').pop().toLowerCase();
//     // if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
//     //     alert('invalid extension!');
//     // }
//     // else{

//     // }
//    // $("input[name=file-name]:hidden").val(filename);
//        //alert(filename);
//     });
//     $('#fileupload').on("click", function(){
//       //alert("123123");
//        //var filename = $(this).val();
//        //alert(filename);
//       $.ajax({
//         url: base_website+'job/getToken',
//         type: "get",
//         dataType:'json',
//         success: function(data){
//           //alert(data.hash);
//           $(".token-create-form").empty();
//           var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
//           $(".token-create-form").append(token);
//            //document.write(data); just do not use document.write
//            //console.log(data);
//            //callback(data);
//            //console.log(data.name);
//         }
//       });
//      });


//     $("#form-upload-form").submit(function(event){
//     event.preventDefault();
//     $.ajax({
//                 type: "POST", // HTTP method POST or GET
//                 url:base_website+'jobseeker/upload-resume', //Where to make Ajax calls
//                 dataType:"json", // Data type, HTML, json etc.
//                 data:$(this).serialize(),
//                 // mimeType:"multipart/form-data",
//                 // contentType: false,
//                 // cache: false,
//                 // processData:false,
//                 //data:formdata ? formdata : form.serialize(),//$(this).serialize(), //Form variables
//                 success:function(response){
//                   $(".error-captcha").addClass('hide')
//                     if(response.status == 'success'){
//                         // $("#form-apply").addClass('hide');
//                         // $(".msg-apply").removeClass('hide');
//                         // $(".msg-apply").append(response.msg);
//                        // $("#modal-create-document").modal('hide');
//                        window.location.href=base_website+'jobseeker';
//                     }
//                     else{

//                       //   $(".msg-apply").removeClass('hide');
//                       //   $(".msg-apply").append(response.msg);
//                       //   $(".error-birthday").html(response.error.birthday);
//                       //   $(".error-phone").html(response.error.phone);
//                       //   $(".error-province").html(response.error.province);
//                       //   $(".error-degree").html(response.error.degree);
//                       //   $(".error-education").html(response.error.education);
//                       //   $(".error-address").html(response.error.address);
//                       //   $(".error-experience").html(response.error.experience);
//                       //   $(".error-skill").html(response.error.skill);
//                       //   $(".error-reason-apply").html(response.error.reasonapply);
//                       //   $(".error-salary").html(response.error.salary);
//                       //   var captcha = response.error.captcha;


//                       //   console.log(response.error);
//                       // (captcha.length > 0) ? $(".error-captcha").removeClass('hide') : null;
//                       $(".error-upload-resume").empty().removeClass('hide').append(response.msg);
//                         $(".token").empty();
//                         var token ='<input type="hidden" name="'+response.csrf.name+'" value="'+response.csrf.hash+'" />';
//                         $(".token").append(token);
//                         getCaptcha('captcha');
//                     }
//                 },
//                 error:function (xhr, ajaxOptions, thrownError){
//                     alert(thrownError);
//                     //On error, we alert user
//                     //$("#alert-error-contact").removeClass('hide');
//                     //alert(thrownError);
//                 }
//                 });
// });
    

    $('#confirm-delete-recruitment').on('show.bs.modal', function(e) {
      var url = $(e.relatedTarget).data('href');
    // $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'););
    $(".btn-ok").on('click',function(){
       $.ajax({
        url: url,
        type: "get",
        dataType:'json',
        success: function(data){
          if(data.status == 'success'){
              $('#confirm-delete-recruitment').modal('hide');
             // window.location.href =base_website+'jobseeker';
              window.setTimeout(function(){
                 window.location.href =base_website+'jobseeker';
              },200);
          }
          else{
            $('#confirm-delete-recruitment').modal('hide');
          }
        }
      });
    })
      
  });


     $('#confirm-delete-resume-upload').on('show.bs.modal', function(e) {
      var url = $(e.relatedTarget).data('href');
    // $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'););
    $(".btn-ok").on('click',function(){
       $.ajax({
        url: url,
        type: "get",
        dataType:'json',
        success: function(data){
          if(data.status == 'success'){
              $("#confirm-delete-resume-upload").modal('hide');
              window.setTimeout(function(){
                 window.location.href =base_website+'jobseeker';
              },200);
             
          }
          else{
            $('#confirm-delete-resume-upload').modal('hide');
          }
        }
      });
    })
      
  });


     $('#confirm-delete-resume-online').on('show.bs.modal', function(e) {
      var url = $(e.relatedTarget).data('href');
    // $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'););
    $(".btn-ok").on('click',function(){
       $.ajax({
        url: url,
        type: "get",
        dataType:'json',
        success: function(data){
          if(data.status == 'success'){
              $("#confirm-delete-resume-online").modal('hide');
              //window.location.href =base_website+'jobseeker';
              window.setTimeout(function(){
                 window.location.href =base_website+'jobseeker';
              },200);
          }
          else{
            $(this).modal('hide');
          }
        }
      });
    })
      
  });

})

var getToken = function(callback){
    	 $.ajax({
        url: base_website +'job/getToken',
        type: "get",
        dataType:'json',
        success: function(data){
        	$(".token").empty();
        	//var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
        	//$(".token").append(token);
           //document.write(data); just do not use document.write
           //console.log(data);
           callback(data);
           //console.log(data.name);
        }
      });
    };

    function addTokenInput(data){
    		$(".token").empty();
        	var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
        	$(".token").append(token);
    }
    function getCaptcha(el){
        $.ajax({
        url: base_website+'captcha/createCaptcha',
        type: "get",
        dataType:'json',
        success: function(data){
          //$(".captcha-box").removeClass('hide');
          $("."+el).empty();
          $("."+el).append('<img src="'+base_website+'captcha/'+data['filename']+'" >');
          $('input:hidden[name='+el+'-reg]').val(data['word']);
        }
      });
      }

       function reposition() {
        var page = $('#page'),
            dialog = page.find('#modalChangePassword .modal-dialog');
        $("#modalChangePassword").css('display', 'block');
        
        // Dividing by two centers the modal exactly, but dividing by three 
        // or four works better for larger screens.c
        console.log("dialog height " + dialog.height());
        console.log("window height " + document.documentElement.clientHeight);
        $("#modalChangePassword").css("margin-top", Math.max(0, (document.documentElement.clientHeight - dialog.height()) /2) - 50);
    }
    // Reposition when a modal is shown
    //$('#modalChangePassword').on('show.bs.modal', reposition);
    // Reposition when the window is resized
    $(window).on('resize', function() {
        $('#modalChangePassword:visible').each(reposition);
    });

function viewResume(idResume){
   $.ajax({
            url: base_website + 'jobseeker/detail-resume/'+idResume,
            type: "get",
            dataType:'html',
            success: function(data){
               //document.write(data); just do not use document.write
               //console.log(data);
               $(".content-view-resume").empty();
               $(".content-view-resume").append(data);
            //     var h = document.documentElement.clientHeight;//window.innerHeight;
            // h = (h*70)/100;
            // var top = $(".title-job-scroll").height();
            // $(".modal-content").css({"height":h,"overflow":"auto","margin-top":top + 20});
               $('#modal-view-resume').modal('show');
               //console.log(data.name);
               //alert(data);
            }
          });
}

function editResume(idResume){
   $.ajax({
            url: base_website + 'jobseeker/edit-resume/'+idResume,
            type: "get",
            dataType:'html',
            success: function(data){
               //document.write(data); just do not use document.write
               //console.log(data);
               $(".content-edit-resume").empty();
               $(".content-edit-resume").append(data);
            //     var h = document.documentElement.clientHeight;//window.innerHeight;
            // h = (h*70)/100;
            // var top = $(".title-job-scroll").height();
            // $(".modal-content").css({"height":h,"overflow":"auto","margin-top":top + 20});
               $('#modal-edit-resume').modal('show');
               //console.log(data.name);
               //alert(data);
            }
          });
}
