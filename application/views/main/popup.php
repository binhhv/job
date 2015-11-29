<?php
if (!isset($user)) {?>

<div class="modal fade" id="myModal" data-show="0">
 <div class="vertical-alignment-helper">
  <div class="modal-dialog modal-md vertical-align-center">
    <div class="modal-content">
      <div class="modal-header background-color-3">
      	<div class="modal-popup-box">
      		<!-- <span>Modal title</span> -->
      		<img src="<?php echo base_url(); ?>assets/main/img/header/allSHIGOTO.png" >
      		 <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">×</button>
      	</div>

        <!-- <h4 class="modal-title">Modal title</h4> -->
      </div>
      <div class="modal-body">
      	<p><?php echo lang('pnew_title_1'); ?> <br>
      	<?php echo lang('pnew_title_2'); ?></p>
      	<p class="text-danger danger alert hide popup-error"><?php echo lang('pnew_require'); ?></p>
      	<form id="fpopup-user" method="post" >
      		<div class="form-group">
      			<input type="text" class="form-control" name="firstname" placeholder="Họ">
      		</div>
      		<div class="form-group">
      			<input type="text" class="form-control" name="lastname" placeholder="Tên">
      		</div>
      		<div class="form-group has-feedback ">
			  <input type="email" name="email-popup-user" class="form-control" id="email-popup-user" aria-describedby="inputError2Status" placeholder="Email">
			  <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
			  <span id="inputError2Status" class="sr-only"></span>
			</div>
			<div class="popup-token hide">
				<!-- <input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?php echo $csrf['hash']; ?>" /> -->
			</div>
      	<div class="text-right"><button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><?php echo lang('m_close'); ?></button>
      		<button type="submit" class="btn btn-sm btn-primary"><?php echo lang('m_send'); ?></button></div></form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div><!-- /.modal-content has-error has-feedback-->
  </div><!-- /.modal-dialog -->
	</div>
</div><!-- /.modal -->
<?php }
?>
<script type="text/javascript">

	$(document).ready(function(){
    getToken(addTokenInput);
		var currentdate = new Date();
var datetime = "Last Sync: " + currentdate.getDate() + "/"
                + (currentdate.getMonth()+1)  + "/"
                + currentdate.getFullYear() + " @ "
                + currentdate.getHours() + ":"
                + currentdate.getMinutes() + ":"
                + currentdate.getSeconds();
                console.log("datetime"+datetime);
		var checkSetEmail = $.cookie('popupUser');
		var onetime = $.cookie('onetime');
		//alert(checkSetEmail);
		//$.removeCookie('onetime');
		//var show = $("#myModal").attr('data-show');
		//alert(show);



		console.log("mail "+checkSetEmail + " time" +onetime);
		if(typeof onetime === "undefined" && typeof checkSetEmail === "undefined"){
			console.log("ádasdasd");
			// setInterval(function(){
			// 	$("#myModal").modal("show");
			// }, 3000);
			setTimeout(function() {
					getToken(addTokenInput);
			       $("#myModal").modal("show");
			 }, 120000);
			// var timesRun = 0;
			// var interval = setInterval(function(){
			//     timesRun += 1;
			// }, 120000);
			// if(timesRun === 121000){
			//         $("#myModal").modal("show");
			// }


		}
		$("#fpopup-user").submit(function(event){
	 event.preventDefault();
	 if(checkValidate()){
	$.ajax({
		type: "POST", // HTTP method POST or GET
		url: "<?php echo base_url('getNewsRecruitment'); ?>", //Where to make Ajax calls
		dataType:"json", // Data type, HTML, json etc.
		data:$(this).serialize(), //Form variables
		success:function(response){
			$("#myModal").modal("hide");
			$.cookie('popupUser', '1', { expires: 7 });
			$("#myModal").attr('data-show','1');
			//location.reload();
			//$('#myModal').remove();
			console.log(response);
		},
		error:function (xhr, ajaxOptions, thrownError){
			alert(thrownError);
      $("#myModal").modal("hide");
		}
		});
	}
	else{
		$(".popup-error").removeClass('hide');
		getToken(addTokenInput);
	}
})

	});

	// $('#myModal').on('shown.bs.modal', function (e) {

	// 	});
	$('#myModal').on('hidden.bs.modal', function () {
  	console.log("hide");
  	var onetime = $.cookie('onetime');
  	console.log("onetime " +onetime);
  	if(typeof onetime === "undefined"){
  		setTimeout(function() {
  			getToken(addTokenInput);
			       $("#myModal").modal("show");
			       $.cookie('onetime', '1', { expires: 7 });
			 }, 300000);
  	}

  	if (onetime=="1"){
  		setTimeout(function() {
  					getToken(addTokenInput);
			       $("#myModal").modal("show");
			       $.cookie('onetime', '2', { expires: 7 });
			 }, 600000);
  	}
  	//var twotime = $.cookie('onetime');
 //  	if(onetime=="undefined"){
 //  		$.cookie('onetime', '1', { expires: 7 });
 //  		 $("#myModal").modal("show");
 //  		// setTimeout(function() {
	// 		 //       $("#myModal").modal("show");
	// 		 // }, 10000);
	// console.log("one");

 //  	}
 //  	else if(onetime=="1"){
 //  		$.cookie('onetime', '2', { expires: 7 });
 //  		 $("#myModal").modal("show");
 //  		// setTimeout(function() {
	// 		 //       $("#myModal").modal("show");
	// 		 // }, 15000);
	// console.log("two");
 //  	}

})
	function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
	};


	 var getToken = function(callback){
    	 $.ajax({
        url: '<?php echo base_url() . "job/getToken" ?>',
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
    		$(".popup-token").empty();
        	var token ='<input type="hidden" name="'+data.name+'" value="'+data.hash+'" />';
        	$(".popup-token").append(token);
    }

    function checkValidate(){
    	var check = true;
    	var firstname = $("input[name=firstname]").val();
    	var lastname = $("input[name=lastname]").val();
    	var email = $("input[name=email-popup-user]").val();
    	if(firstname.length <= 0){
    		check = false;
    	}
    	else if(lastname.length <= 0 ){
    		check = false;
    	}
    	else if(email.length <= 0){
    		check = false;
    	}
    	else if(!isValidEmailAddress(email)){
    		check = false;
    	}
    	return check;
    }

</script>