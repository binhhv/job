<div class="container-fluid support-online-box">
		<div class="row ">
			<div class="col-md-2 col-md-offset-10 col-xs-6 col-xs-offset-6 open-support-online-box">
				  <div class="panel panel-primary">
	                <div class="panel-heading" id="open-support-online-box">
	                    <span class="glyphicon glyphicon-comment"></span> Hỗ trợ online
	                    <!-- <div class="btn-group pull-right"> -->
	                    	<span class="open-support-online " style="float: right"><i class="fa fa-angle-up"></i></span>
	                    <!-- </div> -->
	                </div>
           		 </div>
			</div>
		</div>
	<div class="row ">
			<!-- <div class="col-md-2 col-md-offset-10 col-xs-6 col-xs-offset-6 open-support-online-box">
				  <div class="panel panel-primary">
	                <div class="panel-heading" id="open-support-online-box">
	                    <span class="glyphicon glyphicon-comment"></span> Hỗ trợ online
	                    <div class="btn-group pull-right">
	                    	<span class="open-support-online"><i class="fa fa-angle-up"></i></span>
	                    </div>
	                </div>
           		 </div>
			</div> -->
	        <div class="col-md-3 col-md-offset-9 col-xs-8 col-xs-offset-4 close-support-online-box hide">
	         <div class="panel panel-primary">
                <div class="panel-heading" id="close-support-online-box">
                    <span class="glyphicon glyphicon-comment"></span> Hỗ trợ online
                    <!-- <div class="btn-group pull-right"> -->
                    	<span class="close-support-online " style="float: right"><i class="fa fa-angle-down"></i></span>
                    <!-- </div> -->
                </div>
                <div class="panel-body support-online-box-body">
                	<div class="support-online-box-header">
                		<div class="item-left">
                			<img src="<?php echo base_url();?>assets/main/img/header/icon_black.png">
                		</div>
                		<div class="item-right">
                			<img src="<?php echo base_url();?>assets/main/img/header/allSHIGOTO_B.png">
                			<small>Tuyển dụng nhân sự tiếng nhật.</small>
                		</div>
                	</div>
                    <ul class="chat">
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img width="35" src="<?php echo base_url()?>assets/main/img/supportonline/icon_user_support.png" alt="User Avatar" class="icon-support-online " />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><span class="chat-img pull-right-chat">
                            <img width="35"src="<?php echo base_url()?>assets/main/img/header/icon_black.png" alt="User Avatar" class="icon-support-online " />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="panel-footer">
                <form id="form-sp-online" >
                    <div class="input-group">

                    		<div class="hide token-sp-online"></div>
	                        <input name="input-sp-online" id="input-sp-online" type="text" class="form-control input-sm" placeholder="" />
	                       	<span class="input-group-btn">
	                            <button class="btn btn-warning btn-sm" id="btn-chat">
	                                Gửi</button>
	                        </span>

                    </div>
                    </form>
                </div>
            </div>
        </div>
	</div>
</div>
<!--
 <div class="header">
    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
        <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
</div>
-->
<script type="text/javascript">
	$(document).ready(function(){
		$("#open-support-online-box").on("click",function(){
			$(".open-support-online-box").addClass('hide');
			$(".close-support-online-box").removeClass('hide');
			console.log("open");
			getTokenSP(addTokenInput);
			getAllMessage();
			getMessage();


			$("input[name='input-sp-online']").keypress(function(event) {
			    if (event.which == 13) {
			    	event.preventDefault();
			    	$("#btn-chat").click();
			    }
			});
			//scrollChatBox();
			$(".support-online-box-body").attr({ scrollTop: ($(".support-online-box-body").attr("scrollHeight"))+ 100 });


		});
		$("#close-support-online-box").on("click",function(){
			$(".close-support-online-box").addClass('hide');
			$(".open-support-online-box").removeClass('hide');
		});

		$("#btn-chat").on("click",function(event){
		 	event.preventDefault();
		 	startChat();
		});


		$(".support-online-box-body").scroll(function(event){
			event.preventDefault();
		});
	});

	function scrollChatBox(){
		//$(".support-online-box-body").attr({ scrollTop: $(".support-online-box-body").attr("scrollHeight") });
		// var height=0;
		// $("ul.chat li" ).each(function() {
		// 	height+= $(this).clientHeight();
		// });//$('.support-online-box-body').height()
		$('.support-online-box-body').animate({scrollTop: ($(".support-online-box-body ul.chat").height() )});
		//$(".support-online-box-body").prop("scrollHeight")
	}
	function startChat(){
		var cookie_id = $.cookie('schat_cookie_id');
		var cookie_user = $.cookie('schat_cookie_user');
		if(typeof cookie_id === "undefined"){
			cookie_id = 0;
		}
		if(typeof cookie_user === "undefined"){
			cookie_user = 0;
		}
		console.log(cookie_user);
		var obData = {'csrf_test_name':$("input:hidden[name='csrf_test_name']").val(),
					  'msg':$("input[name='input-sp-online']").val(),
					  'cookie_id':cookie_id,
					  'cookie_user':cookie_user};
		$.ajax({
		type: "POST", // HTTP method POST or GET
		url: "<?php echo base_url() . 'supportAPI/startChatWithSend'?>", //Where to make Ajax calls
		dataType:"json", // Data type, HTML, json etc.
		data:obData,//{'data':$("#form-sp-online").serialize(),'cookie_id':cookie_id}, //Form variables
		success:function(response){

			//console.log(response);
			if(response.status ==='success'){
				addTokenInput(response.csrf);
				if(response.cookie_id != cookie_id){
					console.log(response.cookie_id);
					$.cookie('schat_cookie_id', response.cookie_id, { expires: 7 });
					$.cookie('schat_cookie_user', response.cookie_user, { expires: 7 });
				}
				appendMessage(response.objectSP);
				$.cookie('schat_id', response.schat_id, { expires: 7 });
				scrollChatBox();
				$("input[name='input-sp-online']").val('');
			}

		},
		error:function (xhr, ajaxOptions, thrownError){
			//alert(thrownError);
		}
		});
	}
	function getTokenSP(callback){
    	 $.ajax({
        url: '<?php echo base_url() . "job/getToken"?>',
        type: "get",
        dataType:'json',
        success: function(data){
           callback(data);
        },
        error:function (xhr, ajaxOptions, thrownError){
					//alert(thrownError);

				}

      });
    };

    function addTokenInput(data){
    		$(".token-sp-online").empty();
        	var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
        	$(".token-sp-online").append(token);
    }

    function getAllMessage(){
    	var cookie_id = $.cookie('schat_cookie_id');
    	console.log(cookie_id);
    	if(typeof cookie_id !== "undefined"){
    			$.ajax({
			        url: '<?php echo base_url() . "supportAPI/getMessage/"?>'+cookie_id,
			        type: "get",
			        dataType:'json',
			        success: function(data){
			           //callback(data);
			           if(data.length > 0){
				           for (var i = 0; i < data.length; i++) {
				           		$.cookie('schat_id', data[i].schat_id, { expires: 7 });
				           		appendMessage(data[i]);
				           };
				           scrollChatBox();
				        }
			        },
			        error:function (xhr, ajaxOptions, thrownError){
								//alert(thrownError);

							}

		      });
    	}
    }
    function getMessage(){
    	setInterval(function (){
       	 	//console.log($.cookie('schat_id'));
       	 	if(typeof $.cookie('schat_cookie_id') !== "undefined"){
       	 		getMessageReply($.cookie('schat_cookie_id'),$.cookie('schat_id'));
       		 }
       	 	//console.log($("ul.chat li").length);
       	 	//scrollChatBox();
      	},1500);

    }
    function getMessageReply(cookie_id,schat_id){
    	$.ajax({
			        url: '<?php echo base_url() . "supportAPI/getMessageReply/"?>'+cookie_id+'/'+schat_id,
			        type: "get",
			        dataType:'json',
			        success: function(data){
			           //callback(data);
			           for (var i = 0; i < data.dataOb.length; i++) {
			           		$.cookie('schat_id', data.dataOb[i].schat_id, { expires: 7 });
			           		appendMessage(data.dataOb[i],1);
			           };
			           addTokenInput(data.csrf);
			           //scrollChatBox();

			        },
			        error:function (xhr, ajaxOptions, thrownError){
								//alert(thrownError);

							}

		      });
    }
    function appendMessage(data,scroll){
    	if(data.schat_type == 0){
    		var html ='<li class="left clearfix"><span class="chat-img pull-left">';
                html+='<img width="35" src="<?php echo base_url()?>assets/main/img/supportonline/icon_user_support.png" alt="User Avatar" class="icon-support-online " />';
                html+='</span>';
                html+='<div class="chat-body clearfix">';
                html+='<p>';
                html+= data.schat_message;
                html+='</p>';
                html+='</div>';
                html+='</li>';
            $("ul.chat").append(html);
    	}
    	else{
    		var html ='<li class="right clearfix"><span class="chat-img pull-right-chat">';
                html+='<img width="35"src="<?php echo base_url()?>assets/main/img/header/icon_black.png" alt="User Avatar" class="icon-support-online " />';
                html+='</span>';
                html+='<div class="chat-body clearfix">';
                html+='<p>';
                html+=data.schat_message;
                html+='</p>';
                html+='</div>';
                html+='</li>';
            $("ul.chat").append(html);
    	}
    	if (typeof scroll !== "undefined") {
        		scrollChatBox();
    	}
    }


</script>