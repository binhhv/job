$(function(){
   getCaptcha('captcha');
	 $('.list-tag-job').niceScroll({cursorborder:"",cursorcolor:"#000",boxzoom:true}); // First scrollable DIV
	 $('#modalChangePassword').on('shown.bs.modal', function() {
        reposition();
    		getToken(addTokenInput);
	  })
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
          //console.log(data);
          //alert(data.hash);
          //$(".token").empty();
          //var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
          //$(".token").append(token);
           //document.write(data); just do not use document.write
           //console.log(data);
           //callback(data);
           //console.log(data.name);
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