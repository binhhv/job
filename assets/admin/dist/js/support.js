
var arrCookie =[];
$(function(){
	getListSupportChat();
	$(".direct-chat-messages").attr({ scrollTop: $(".direct-chat-messages").attr("scrollHeight") });
  setInterval(function(){
     getAndUpdateListSupportChat(updateListSupportChat);
   },5000);

  $("input[name='message-sp-ad']").keypress(function(event) {
          if (event.which == 13) {
            event.preventDefault();
            $("#btn-sp-ad").click();
          }
      });

  $("#btn-sp-ad").on("click",function(event){
      event.preventDefault();
      startChat();
    });

  setInterval(function(){

    var cookie_id = $("input:hidden[name='cookie_id_ad']").val();
    var schat_id = $("input:hidden[name='schat_id_ad']").val();
    getMessageReply(cookie_id,schat_id);
    console.log(cookie_id);
    console.log(schat_id);
  },5000);
 
});
function getMessageReply(cookie_id,schat_id){
      $.ajax({
              url: base_url + 'supportAPI/getMessageReplyUser/'+cookie_id+'/'+schat_id,
              type: "get",
              dataType:'json',
              success: function(data){
                 //callback(data);
                 for (var i = 0; i < data.dataOb.length; i++) {
                    appendMessage(data.dataOb[i]);
                 };
                 if(data.dataOb.length > 0 ){addSchatIdInput(data.dataOb[data.dataOb.length-1].schat_id);}
                 //scrollChatBox();
                 addTokenInput(data.csrf);

              },
              error:function (xhr, ajaxOptions, thrownError){
                //alert(thrownError);

              }

          });
    }
function startChat(){
  var cookie_id = $("input:hidden[name='cookie_id_ad']").val();
  var cookie_user = $("input:hidden[name='cookie_user_ad']").val();
  var obData = {'csrf_test_name':$("input:hidden[name='csrf_test_name']").val(),
            'msg':$("input[name='message-sp-ad']").val(),
            'cookie_id':cookie_id,
            'cookie_user':cookie_user};
    $.ajax({
    type: "POST", // HTTP method POST or GET
    url: base_url + 'supportAPI/startChatWithReply', //Where to make Ajax calls
    dataType:"json", // Data type, HTML, json etc.
    data:obData,//{'data':$("#form-sp-online").serialize(),'cookie_id':cookie_id}, //Form variables
    success:function(response){

      //console.log(response);
      if(response.status ==='success'){
        addTokenInput(response.csrf);
        //if(response.cookie_id != cookie_id){
          //console.log(response.cookie_id);
          //$.cookie('schat_cookie_id', response.cookie_id, { expires: 7 });
          ///$.cookie('schat_cookie_user', response.cookie_user, { expires: 7 });
        //}
        addSchatIdInput(response.schat_id);
        appendMessage(response.objectSP);
        //$.cookie('schat_id', response.schat_id, { expires: 7 });
        scrollChatBox();
        $("input[name='message-sp-ad']").val('');
      }

    },
    error:function (xhr, ajaxOptions, thrownError){
      //alert(thrownError);
    }
    });
}
function getListSupportChat(){
	$.ajax({
        url: base_url +'admin/support/getListSupportChat',
        type: "get",
        dataType:'json',
        success: function(data){
           $("ul.ul-list-support-chat").empty();
           //console.log(data);
           for (var i = 0; i < data.length; i++) {
           	//data.contacts[i]
              appendListSupportChat(data[i]);
           };
           if(data.length > 0){
           	getAllMessageWithCookieId(data[0].schat_cookie_id);
           }
           //updateListSupportChat();
        },
        error:function (xhr, ajaxOptions, thrownError){
					//alert(thrownError);

		}

      });
}
function scrollChatBox(){
		var height=0;
		$( ".direct-chat-messages div" ).each(function() {
			height+= $(this).height();
		});
		$('.direct-chat-messages').animate({scrollTop: height});
		
	}
function getAndUpdateListSupportChat(callback){
  $.ajax({
        url: base_url +'admin/support/getListSupportChat',
        type: "get",
        dataType:'json',
        success: function(data){
           callback(data);
        },
        error:function (xhr, ajaxOptions, thrownError){
         //alert(thrownError);

    }

      });
}
function updateListSupportChat(data){
  arrCookie =[];
  $("ul.ul-list-support-chat li").each(function(){
    var value = $(this).data("cookie");
    arrCookie.push(value);
    
  });
  console.log(arrCookie.length);
  console.log(data.length);
  for (var i = 0; i < data.length; i++) {
     if(arrCookie.indexOf(data[i].schat_cookie_id) >= 0){
        var divText = $("ul.ul-list-support-chat li div").find("[data-cookie='" + data[i].schat_cookie_id + "']");
        if(data[i].numsp > 0){
          //spanText.text(data[i].numsp);
          divText.empty();
          var html ='<span class="col-xs-12 pull-right no-padding"><label class="label label-primary ">'+data[i].numsp+'</label></span>';
          divText.append(html);
        }  
     }
     else{
        appendListSupportChat(data[i]);
     }
  };
}

function updateClientCookieId(cookie_id){
  //arrCookie.push(data[i].schat_cookie_id);
  var divText = $("ul.ul-list-support-chat li div").find("[data-cookie='" + cookie_id + "']");
  divText.empty();
  var html ='<span class="col-xs-12 text-right no-padding"><i class="fa fa-check"></i></span>';
  divText.append(html);
}
function getTokenSP(callback){
       $.ajax({
        url:base_url+ 'job/getToken',
        type: "get",
        dataType:'json',
        success: function(data){
           callback(data);
           //console.log(data);
        },
        error:function (xhr, ajaxOptions, thrownError){
          //alert(thrownError);

        }

      });
    };

    function addTokenInput(data){
        $(".token-sp-ad").empty();
        var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
        $(".token-sp-ad").append(token);
    }
    function addCookieInput(cookie_id){
      $(".cookie-sp-ad").empty();
      var cookieValue ='<input type="hidden" name="cookie_id_ad" value="'+cookie_id+'" />';
      $(".cookie-sp-ad").append(cookieValue);
    }
    function addSchatIdInput(value){
      $(".schat-sp-ad").empty();
      var schatValue ='<input type="hidden" name="schat_id_ad" value="'+value+'" />';
      $(".schat-sp-ad").append(schatValue);
    }
    function addCookieUserInput(value){
      $(".cookie-user-sp-ad").empty();
      var schatValue ='<input type="hidden" name="cookie_user_ad" value="'+value+'" />';
      $(".cookie-user-sp-ad").append(schatValue);
    }
function getAllMessageWithCookieId(cookie_id){
  addCookieInput(cookie_id);
	$(".direct-chat-messages").empty();
    			$.ajax({
			        url: base_url+ 'supportAPI/getMessageClient/'+cookie_id,
			        type: "get",
			        dataType:'json',
			        success: function(data){
			           //callback(data);
                 updateClientCookieId(cookie_id);
			           for (var i = 0; i < data.length; i++) {
			           		appendMessage(data[i]);
			           };
			           scrollChatBox();
                 getTokenSP(addTokenInput);
                 addSchatIdInput(data[data.length-1].schat_id);
                 addCookieUserInput(data[data.length-1].schat_cookie_user);
			        },
			        error:function (xhr, ajaxOptions, thrownError){
								//alert(thrownError);

							}

		      });
//alert(cookie_id);
}
function appendListSupportChat(data){
                var liSupport ='<li class=';
                liSupport +='""';
                liSupport +='data-cookie="'+data.schat_cookie_id+'"><a href="javascript:getAllMessageWithCookieId('+'\''+data.schat_cookie_id+'\''+'); ">';
                liSupport+='<div class="row"><div class="col-xs-2"><i class="fa fa-user"></i></div>';
                liSupport+='<div class="col-xs-8"><strong><small style="display:block">'+data.schat_cookie_user+'</small></strong>'+data.schat_message.substring(0, 20)+'</div>';
                liSupport+='<div class="col-xs-2" data-cookie="'+data.schat_cookie_id+'">';
                if(data.numsp != 0){
                  liSupport+='<span class="col-xs-12 pull-right no-padding"><label class="label label-primary ">'+data.numsp+'</label></span>';
                }
                else{
                  liSupport+='<span class="col-xs-12 text-right no-padding"><i class="fa fa-check"></i></span>';
                }
                liSupport+='</div></div></a></li>';
                $("ul.ul-list-support-chat").append(liSupport); 
}
function appendMessage(data){
    	if(data.schat_type == 0){
    		var html ='<div class="direct-chat-msg">';
                html+='<img class="direct-chat-img" src="'+base_url+'assets/admin/dist/img/supportonline/icon_user_support.png" alt="message user image">';
                html+='<div class="direct-chat-text">';
                html+=data.schat_message;
                html+='</div>';
                html+='</div>';
            $(".direct-chat-messages").append(html);
    	}
    	else{
    		var html ='<div class="direct-chat-msg right">';
                html+='<img class="direct-chat-img" src="'+base_url+'assets/admin/dist/img/supportonline/icon_black.png" alt="message user image">';
                html+='<div class="direct-chat-text">';
                html+=data.schat_message;
                html+='</div>';
                html+='</div>';
            $(".direct-chat-messages").append(html);
    	}
    }