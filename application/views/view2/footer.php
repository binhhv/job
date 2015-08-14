<div class="container">
	<div class="row ">
		<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 info-company ">
			<h1>GROUP</h1>
			<label>Tp hcm</label>
		</div>
		<div class="col-md-9 col-sm-9 col-lg-9 col-xs-12 map-company ">
			<div id="map">
				
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



             var i = 0;
             for (item in t) {
                 var m = new google.maps.Marker({
                     map: google_map,
                     animation: google.maps.Animation.DROP,
                     title: t[i],
                     position: new google.maps.LatLng(x[i], y[i]),
                     html: h[i]
                 });

                 //m.setTitle((i + 1).toString());
                 attachSecretMessage(m);
                 i++;
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

             //$('div.modalbg').click(function () {
             //    //alert("123123");
             //    $('#tiendas').fadeOut();
             //});
         });
</script>