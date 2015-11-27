$(function() {
    var editor = CKEDITOR.replace('blog_content',
    { filebrowserBrowseUrl : config.base_url + "ckeditor/ckfinder/ckfinder.html",
    filebrowserImageBrowseUrl :config.base_url + "ckeditor/ckfinder/ckfinder.html?Type=Images",
    filebrowserFlashBrowseUrl : config.base_url +"ckeditor/ckfinder/ckfinder.html?Type=Flash",
    filebrowserUploadUrl : config.base_url + "ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files",
    filebrowserImageUploadUrl : config.base_url +"ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images",
    filebrowserFlashUploadUrl : config.base_url + "ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash",
    filebrowserWindowWidth : '800', filebrowserWindowHeight : '480',height:'400' });
    CKEDITOR.editorConfig = function(config){
    	config.toolbar = []
    }
    CKFinder.setupCKEditor( editor, config.base_url +'ckeditor/ckfinder/' ); 



var url = config.base_url +'uploads/do_upload';
        $('#fileupload').fileupload({
           add: function(e, data) {
                var uploadErrors = [];
                var acceptFileTypes = /(\.|\/)(gif|jpe?g|png)$/i;
               // console.log(JSON.stringify(data));
                //var filename = $('#fileupload').val();
                console.log('filename'+data.originalFiles[0]['name']);
                $(".files-name").empty().append(data.originalFiles[0]['name']);
                //$("input:hidden[name=file_name]").val(data.originalFiles[0]['name']);
                $("input[name=file_name]:hidden").val(data.originalFiles[0]['name']);
                var ext = data.originalFiles[0]['name'].split('.').pop().toLowerCase();
          // if($.inArray(ext, ['doc','docx','pdf']) == -1) {
          //     alert('invalid extension!');
          // }
                if($.inArray(ext, ['gif','jpg','jpeg','png']) == -1) {
                    uploadErrors.push('File không đúng định dạng.');
                }
                // if(data.originalFiles[0]['size'].length && data.originalFiles[0]['size'] > 5000000) {
                //     uploadErrors.push('Kích thước file quá lớn.');
                // }
                if(uploadErrors.length > 0) {
                    var errormsg = uploadErrors.join("\n");
                    $('.error-file').empty();
                    $('.error-file').removeClass('hide');
                    $('.error-file').append(errormsg);
                } else {
                    data.submit();
                }
          },
            url: url,
            dataType: 'json',
            done: function (e, data) {
                $.each(data.result.files, function (index, file) {
                  $("#files").empty();
                  $('.error-file').empty();
                    $('<p/>').text(file.name).appendTo('#files');
                    $("input[name=file-tmp]:hidden").val(file.name);
                    getToken(addTokenInput);
                    //$("#btn-apply").attr("disabled",false);
                });
                //$(".files-name").append(filename);
            },
        
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    //});
  $('#fileupload').change(function() {
      var filename = $('#fileupload').val();
      ///console.log('filename'+filename);
      //$(".files-name").append(filename);
  //       var ext = $('#fileupload').val().split('.').pop().toLowerCase();
    // if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
    //     alert('invalid extension!');
    // }
    // else{

    // }
   // $("input[name=file-name]:hidden").val(filename);
       //alert(filename);
    });
    $('#fileupload').on("click", function(){
      //alert("123123");
       //var filename = $(this).val();
       //alert(filename);
      $.ajax({
        url: config.base_url+'job/getToken',
        type: "get",
        dataType:'json',
        success: function(data){
          //alert(data.hash);
          $(".token").empty();
          var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
          $(".token").append(token);
           //document.write(data); just do not use document.write
           //console.log(data);
           //callback(data);
           //console.log(data.name);
        }
      });
     });



})

var getToken = function(callback){
    	 $.ajax({
        url: config.base_url +'job/getToken',
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