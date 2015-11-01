// 'use strict';
// $(function() {
//     // Change this to the location of your server-side upload handler:
//     var url = window.location.hostname === config.base_url+'uploads/do_upload';
//     $('#fileupload').fileupload({
//         url: config.base_url+'uploads/do_upload',
//         acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
//         maxFileSize: 99,
//         dataType: 'json',
//         done: function (e, data) {
//             $.each(data.result.files, function (index, file) {
//                 // $("#files").empty();
//                 // arrFileTmpAttach.push(file.name);
//                 // var index = arrFileTmpAttach.indexOf(file.name);
//                 // var fileAttachName = arrFileAttach[index].split("\\").pop();
//                 // var fileAttach ='<p data-file = "'+file.name+'" class="file-attach">'+fileAttachName+ 

//                 // '<img onclick="removeFileAttach('+'\''+file.name+'\''+')" class="icon-delete-file-attach" src="'+config.base_url+'assets/admin/dist/img/icons/icon_deleted.png">'
//                 // + '</p>'
//                 // $("#files").append(fileAttach);
//                 //$('<p/>').text(file.name).appendTo('#files');
//                          $('<p/>').text(file.name).appendTo('#files');
//                 getToken(addTokenInput);
//             });
//         },
//         progressall: function (e, data) {
//             var progress = parseInt(data.loaded / data.total * 100, 10);
//             $('#progress .progress-bar').css(
//                 'width',
//                 progress + '%'
//             );
//         }
//     }).prop('disabled', !$.support.fileInput)
//         .parent().addClass($.support.fileInput ? undefined : 'disabled');
// });
// $('#fileupload').change(function() {
//         var filename = $('#fileupload').val();
//   //       var ext = $('#fileupload').val().split('.').pop().toLowerCase();
//         // if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
//         //     alert('invalid extension!');
//         // }
//         // else{

//         // }
//         //$("input[name=file-name]:hidden").val(filename);
//         //arrFileAttach.push(filename);
//        //alert(filename);
//     });
//     $('#fileupload').on("click", function(){
//         //alert("123123");
//          //var filename = $(this).val();
//          //alert(filename);
//         $.ajax({
//         url: config.base_url +'job/getToken',
//         type: "get",
//         dataType:'json',
//         success: function(data){
//             //alert(data.hash);
//             $(".token").empty();
//             var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
//             $(".token").append(token);
//            //document.write(data); just do not use document.write
//            //console.log(data);
//            //callback(data);
//            //console.log(data.name);
//         }
//       });
//      });

//     var getToken = function(callback){
//          $.ajax({
//         url: config.base_url+'job/getToken',
//         type: "get",
//         dataType:'json',
//         success: function(data){
//             $(".token").empty();
//             //var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
//             //$(".token").append(token);
//            //document.write(data); just do not use document.write
//            //console.log(data);
//            callback(data);
//            //console.log(data.name);
//         }
//       });
//     };

//     function addTokenInput(data){
//             $(".token").empty();
//             var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
//             $(".token").append(token);
//     }

var arrFile = [];
var arrFileTmp= [];
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = config.base_url+'uploads/do_upload',
        uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .text('Processing...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(mp4|wmv|avi|flv)$/i,
        maxFileSize: 41943040,
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        data.context = $('<div/>').appendTo('#files');
        $.each(data.files, function (index, file) {
            var node = $('<p/>')
                    .append($('<span/>').text(file.name));
            if (!index) {
                node
                    .append('<br>')
                    .append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
            arrFile.push(file.name);
        });
       // getToken(addTokenInput);
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
            $(".error-file-upload").empty();
        }
        if (file.error) {
            node.empty();
            //$(".error-file-upload").append($('<span class="text-danger"/>').text(file.error));
               // node.append('<br>')
                //.append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                .text('Upload')
                .prop('disabled', !!data.files.error);
        }

    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        var indexFile =0;
        $.each(data.result.files, function (index, file) {
            if (file.url) {
                var link = $('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url);
                $(data.context.children()[index])
                    .wrap(link);
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            }
            console.log("file"+file.name);
            arrFileTmp.push(file.name);
            //getToken(addTokenInput);
            index = index;
           
        });
        getToken(addTokenInput);
       setTimeout(uploadVideo(arrFile[indexFile],arrFileTmp[indexFile]),2000);
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {
            var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index]).empty();
            //$(".error-file-upload").append($('<span class="text-danger"/>').text(file.error));
                // .append('<br>')
                // .append(error);
                // console.log("index"+index);

        });
        getToken(addTokenInput);
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});


    var getToken = function(callback){
         $.ajax({
        url: config.base_url+'job/getToken',
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

    function uploadVideo(filename,filetmp){
       //  getToken(addTokenInput);
       var encodeFile =$.base64('encode', filename);
      // var url = config.base_url+'admin/config/uploadVideo/'+encodeFile+'/'+filetmp;
       console.log(encodeFile);
        var data = {
           
              'file_name':encodeFile,
              'file_tmp':filetmp
        };

        // $.get(config.base_url+'admin/config/uploadVideo',data, function(data, status){
        //         //alert("Data: " + data + "\nStatus: " + status);
        //         if(d)
        // });

         $.ajax({

        type: "GET", // HTTP method POST or GET
        url: config.base_url+'admin/config/uploadVideo', //Where to make Ajax calls
        dataType:"json", // Data type, HTML, json etc.
        data:data, //Form variables
        success:function(response){
          //  $("#submit-send-mail").removeAttr("disabled");
          // $('#progressMail .progress-bar').attr("style","width:" +100 + "%");
          //   clearInterval(timerId);
          //   addTokenInput(response.csrf);
          //   alertSendSuccess();
          //   setTimeout(function(){
          //     window.location.href = window.location.href;//config.base_url + 'admin/mail/send-mail-jobseeker';
          //   }, 2000);
          window.location.href = config.base_url+'admin/aboutus-video';
          //console.log(response);
            
        },
        error:function (xhr, ajaxOptions, thrownError){
          //On error, we alert user
          //$("#alert-error-contact").removeClass('hide');
          alert(thrownError);
        }
    });
    }

 

