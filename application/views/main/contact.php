<div class="container contact-page">
	<div class="row">
		<div class="col-sm-12 text-center contact-title">
			<h1 class="">Liên hệ</h1>
					<div class="border-bottom-title border-color-1"></div>
		</div>
	</div>
	<div class="row contact-error hide">
		<div class="col-sm-12 text-center text-danger hide" id="alert-error-contact">Đã có lỗi xảy ra. Vui lòng thử lại sau.</div>
	</div>
	<div class="row ">
	 <div class="col-md-8 col-md-push-4   col-xs-12">
	 <div class="row">
	 	<!-- <div class="col-sm-12 msg-success hide text-left text-success contact-success no-padding-left"></div> -->
	 		<div class="col-sm-12 no-padding-right">
	 			<div class="col-sm-12 msg-success hide text-center text-success contact-success no-padding-left"></div>
	 		<div class="contact-form-box">
	 			<form class="form-horizontal" role="form" method="post" name="fcontact" id="fcontact">
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="name">Họ tên:</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="name" name="name">
					    </div>
					    <div class="col-sm-offset-2 col-sm-10 text-danger error-name" >

					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="email">Email:</label>
					    <div class="col-sm-10">
					      <input type="email" class="form-control" id="email" name="email" >
					    </div>
					    <div class="col-sm-offset-2 col-sm-10 text-danger error-email"></div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="subject">Tiêu đề:</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="subject" name="subject">
					    </div>
					    <div class="col-sm-offset-2 col-sm-10 text-danger error-subject" ></div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="message">Nội dung:</label>
					    <div class="col-sm-10">
					      <textarea name="message" id="message" class="form-control" tabindex="3" rows="10" cols="50"></textarea>
					    </div>
					    <div class="col-sm-offset-2 col-sm-10 text-danger error-message"></div>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
					      <button type="submit" class="btn btn-default btn-primary">Gửi</button>
					    </div>
					  </div>
					</form>
	 		<!-- <form role="form" class="form-inline" name="contact-form" id="contact-form" method="post">
						<div class="form-group">
						<label for="name">Name:</label>
							<input type="text" class="form-control" id="name" name="name">
						</div>
						<div class="form-group">
						<label for="email">Email:</label>
							<input type="email" class="form-control" id="email" name="email">
						</div>
						<div class="form-group">
						<label for="subject">Subject:</label>
							<input type="text" class="form-control" id="subject" name="subject">
						</div>
						<div class="form-group">
							<label for="message">Message:</label>
							<textarea name="message" id="message" class="form-control" tabindex="3" rows="10" cols="50"></textarea>
						</div>
						<div class="form-group text-center">
							<button type="submit" class="btn btn-primary ">Send</button>
						</div>
						<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
					</form> -->
				</div>
			</div>
	 </div>
	 </div>

	<div class="col-md-4 col-md-pull-8  col-xs-12 ">
		<div class="row ">
			<div class="col-sm-12">
				<div class="row contact-map">

						<div class="col-sm-12"><strong>allSHIGOTO</strong></div>
						<div class="col-sm-12"><i class="fa fa-home"></i>&nbsp;Địa chỉ : Số 5, Lê quang định, phường Thắng nhất , TP Vũng Tàu</div>
						<div class="col-sm-12"><i class="fa fa-phone"></i>&nbsp;xxxxxxx</div>
						<div class="col-sm-12"><i class="fa fa-envelope"></i> &nbsp;contact@allshigoto.com</div>
						<div class="col-sm-12 map-box">
							<div id="map"></div>
						</div>

				</div>
			</div>
		</div>
	</div>
	</div>
</div>

<script type="text/javascript">
	function initmap() {
             var map_options = {
                 center: new google.maps.LatLng(10.381464, 107.0991627),
                 zoom: 16,
                 mapTypeId: google.maps.MapTypeId.ROADMAP
             };

             var google_map = new google.maps.Map(document.getElementById("map"), map_options);

             var info_window = new google.maps.InfoWindow({
                 content: 'loading'
             });

             var t = [];
             var x = [];
             var y = [];
             var h = [];

             t.push('Nhãn hàng thời trang QO');
             x.push(10.381464);
             y.push(107.0991627);
             h.push('<p><strong>GROUP</strong><br/>339/17A Nguyễn Thái Bình,Phường 12,Quận Tân Bình, Hồ Chí Minh</p>');



             //var i = 0;
             for (var i = 0 ; i < t.length; i ++) {
                 var m = new google.maps.Marker({
                     map: google_map,
                     animation: google.maps.Animation.DROP,
                     title: t[i],
                     position: new google.maps.LatLng(x[i], y[i]),
                     html: h[i]
                 });

                 //m.setTitle((i + 1).toString());
                 attachSecretMessage(m);
                // i++;
             }

             function attachSecretMessage(marker) {
                 var infowindow = new google.maps.InfoWindow({
                     content: 'GROUP'
                 });

                 google.maps.event.addListener(marker, 'click', function () {
                     //alert('123123');
                     infowindow.open(marker.get('map'), marker);
                 });
                 google.maps.event.addListener(marker, 'mouseover', function () {
                     //alert('123123');
                     infowindow.open(marker.get('map'), marker);
                 });
             }
         }

         $(document).ready(function () {
             initmap();

         });
</script>


<script type="text/javascript">
$(document).ready(function() {

$("#fcontact").submit(function(event){
	 event.preventDefault();
$.ajax({
		type: "POST", // HTTP method POST or GET
		url: "<?php echo base_url('contact/send-contact');?>", //Where to make Ajax calls
		dataType:"json", // Data type, HTML, json etc.
		data:$(this).serialize(), //Form variables
		success:function(response){
			//on success, hide  element user wants to delete.
			//var obj = JSON.parse(response);
			//alert(response.status);
			//alert("ádasdasd");
			if(response.status == 'error'){
				// $(".contact-box").html("");
				// var msg = response.msg;
				// $(".contact-box").addClass("text-center padding-150");
				// $(".contact-box").append(msg);
				//console.log(response.error);
				$(".error-name").html(response.error.name);
				$(".error-email").html(response.error.email);
				$(".error-subject").html(response.error.subject);
				$(".error-message").html(response.error.message);
				console.log(response.error);
			}
			else{
				$(".contact-form-box").addClass('hide');
				$(".msg-success").removeClass('hide').html(response.msg);

				console.log(response);
			}
		},
		error:function (xhr, ajaxOptions, thrownError){
			//On error, we alert user
			$("#alert-error-contact").removeClass('hide');
			//alert(thrownError);
		}
		});
})
});
</script>