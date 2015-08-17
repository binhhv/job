<div class="row">
	<div class="col-sm-12 col-md-12 col-xs-12">
		<div class="contact-content border-top-10">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-xs-12">
					<div class="title-contact info-color text-center">

						<h2>Contact</h2>

					</div>
				</div>
				<!-- <div class="col-sm-4 col-md-4 col-xs-12">
				</div> -->
			</div>
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 contact-box">
					<form role="form" name="contact-form" id="contact-form" method="post">
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
					</form>
					<!-- <button class="btn btn-success" id="btn-click">click</button> -->
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	var myData = "123123";
$("#contact-form").submit(function(event){
	 event.preventDefault();
jQuery.ajax({
		type: "POST", // HTTP method POST or GET
		url: "<?php echo base_url('contact/insertContact');?>", //Where to make Ajax calls
		dataType:"json", // Data type, HTML, json etc.
		data:$(this).serialize(), //Form variables
		success:function(response){
			//on success, hide  element user wants to delete.
			//var obj = JSON.parse(response);
			//alert(response.status);
			if(response.id != 0){
				$(".contact-box").html("");
				var msg = response.msg;
				$(".contact-box").addClass("text-center padding-150");
				$(".contact-box").append(msg);
			}
			else{

			}
		},
		error:function (xhr, ajaxOptions, thrownError){
			//On error, we alert user
			alert(thrownError);
		}
		});
})
});
</script>