
var base_url = config.base_url;
$(function () {
	//alert(base_url);
	getNotifyContact();
	getNotifySupport();
	setInterval(function(){
		getNotifyContact();
		getNotifySupport();
		//alert("123123");
	},60000);
	
});

function getNotifyContact(){
	 $.ajax({
        url: base_url +'admin/getNotifyContact',
        type: "get",
        dataType:'json',
        success: function(data){
           //callback(data);
           $(".notify-num-contact").empty();
           $(".notify-num-contact").text(data.numContact);
           //console.log(data.numContact);
           $("ul.ul-notify-contact").empty();
           for (var i = 0; i < data.contacts.length; i++) {
           	//data.contacts[i]
           	var liContact = '<li><a href="'+base_url+'admin/contact">';
           		liContact+='<div class="pull-left">';
                liContact+='<i class="fa fa-envelope-o"></i>';
                liContact+='</div>';
           		liContact+='<h4>';
                liContact+=data.contacts[i]['cont_subject'].substring(0, 20);
               	liContact+='<small><i class="fa fa-clock-o"></i>'+ data.contacts[i]['cont_created_at'].substring(0, 10) +'</small>';
                liContact+='</h4>';
                liContact+='<p>'+data.contacts[i]['cont_message'].substring(0, 50)+'</p>';
                liContact+='</a>';
                liContact+='</li>';
                $("ul.ul-notify-contact").append(liContact); 
           };
        },
        error:function (xhr, ajaxOptions, thrownError){
					//alert(thrownError);

		}

      });
}

function getNotifySupport(){
	 $.ajax({
        url: base_url +'admin/getNotifySupport',
        type: "get",
        dataType:'json',
        success: function(data){
           //callback(data);
           $(".notify-num-support").empty();
           $(".notify-num-support").text(data.numSupport);
           //console.log(data.numContact);
           $("ul.ul-notify-support").empty();
           for (var i = 0; i < data.supports.length; i++) {
           	//data.contacts[i]
           	var liSupport ='<li>';
                liSupport+='<a href="'+base_url+'admin/support">';
                liSupport+='<i class="fa fa-users text-aqua"></i>' + data.supports[i]['schat_message'].substring(0, 50);
                liSupport+='</a>';
                liSupport+='</li>';
                $("ul.ul-notify-support").append(liSupport); 
           };
        },
        error:function (xhr, ajaxOptions, thrownError){
					//alert(thrownError);

		}

      });
}