var arrFileAttach =[];
var arrFileTmpAttach =[];
$(function() {
	$('#fjobseekerMail').submit(function(e) {
		e.preventDefault();
		//alert(getMailSelected());
   // $('input[type="submit"]').prop('disabled', false);
    $("#submit-send-mail").attr("disabled", true);
    var listMail = getMailSelected();
    var listFileTmp = arrFileTmpAttach;
    var listFile = arrFileAttach;
    var data = {
      'csrf_test_name':$('input:hidden[name=csrf_test_name]').val(),
      'email':listMail,
      'subject':$("input[name='subject']").val(),
      'content': tinyMCE.get('comments').getContent(),//$('textarea#comments').val(),
      'file':listFile,
      'fileTmp':listFileTmp,
      'form':$(this).serialize()
    };
      var timerId = 0;
        var ctr=0;
        var max=10;
        
        timerId = setInterval(function () {
          // interval function
          ctr++;
          $('#progressMail .progress-bar').attr("style","width:" + ctr*max + "%");
          
          // max reached?
          if (ctr==max){
            clearInterval(timerId);
          }
          
      }, 500);

    $.ajax({

        type: "POST", // HTTP method POST or GET
        url: config.base_url+'admin/mail/sendMail', //Where to make Ajax calls
        dataType:"json", // Data type, HTML, json etc.
        data:data, //Form variables
        success:function(response){
           $("#submit-send-mail").removeAttr("disabled");
          $('#progressMail .progress-bar').attr("style","width:" +100 + "%");
            clearInterval(timerId);
            addTokenInput(response.csrf);
            alertSendSuccess();
            setTimeout(function(){
              window.location.href = window.location.href;//config.base_url + 'admin/mail/send-mail-jobseeker';
            }, 2000);
            
        },
        error:function (xhr, ajaxOptions, thrownError){
          //On error, we alert user
          $("#alert-error-contact").removeClass('hide');
          //alert(thrownError);
        }
    });
		return false;
	});

	'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === config.base_url+'uploads/do_upload';
    $('#fileupload').fileupload({
        url: config.base_url+'uploads/do_upload',
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
            	// $("#files").empty();
            	arrFileTmpAttach.push(file.name);
            	var index = arrFileTmpAttach.indexOf(file.name);
           		var fileAttachName = arrFileAttach[index].split("\\").pop();
            	var fileAttach ='<p data-file = "'+file.name+'" class="file-attach">'+fileAttachName+ 

            	'<img onclick="removeFileAttach('+'\''+file.name+'\''+')" class="icon-delete-file-attach" src="'+config.base_url+'assets/admin/dist/img/icons/icon_deleted.png">'
            	+ '</p>'
            	$("#files").append(fileAttach);
                //$('<p/>').text(file.name).appendTo('#files');
                
                getToken(addTokenInput);
            });
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
});
$('#fileupload').change(function() {
  		var filename = $('#fileupload').val();
  //       var ext = $('#fileupload').val().split('.').pop().toLowerCase();
		// if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
		//     alert('invalid extension!');
		// }
		// else{

		// }
		//$("input[name=file-name]:hidden").val(filename);
		arrFileAttach.push(filename);
       //alert(filename);
    });
    $('#fileupload').on("click", function(){
    	//alert("123123");
    	 //var filename = $(this).val();
    	 //alert(filename);
    	$.ajax({
        url: config.base_url +'job/getToken',
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
function getMailSelected(){
	var listMail ='';
  var arrMail =  [];
	$("div#input-mail-to > div > input").each(function() {
	 	//listMail += ($(this).val().length > 0) ? $(this).val() + '-' :'';
    arrMail.push( $(this).val());
	});
	//listMail = listMail.slice(0,-1);
	//return listMail;
  return arrMail;
}

function removeFileAttach(fileName){
	var index = arrFileTmpAttach.indexOf(fileName);
	arrFileTmpAttach.splice(index,1);
	arrFileAttach.splice(index,1);
	console.log(index);
	//child.parent( ".file-attach" ).remove();
	$("#files").find("[data-file='" + fileName + "']").remove();
	//$('div#files').find(fileRemove).empty();
	//alert(fileRemove);
	//fileRemove.remove();
}

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
  var alertSendSuccess = function(){
        $(".alert-send-mail").removeClass('hide');
                    $(".alert-send-mail").alert();
                    window.setTimeout(function() { $(".alert-send-mail").addClass('hide').fadeOut(); }, 1500);
        }