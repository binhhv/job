<!-- <div class="container">
	<div class="row no-padding">
		<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 info-company no-padding">
			<h1>GROUP</h1>
			<label>Tp hcm</label>
		</div>
		<div class="col-md-9 col-sm-9 col-lg-9 col-xs-12 map-company no-padding">
			<div id="map">

			</div>
		</div>
	</div>
</div> -->
<script type="text/javascript">
// 	function initmap() {
//              var map_options = {
//                  center: new google.maps.LatLng(10.381464, 107.0991627),
//                  zoom: 16,
//                  mapTypeId: google.maps.MapTypeId.ROADMAP
//              };

//              var google_map = new google.maps.Map(document.getElementById("map"), map_options);

//              var info_window = new google.maps.InfoWindow({
//                  content: 'loading'
//              });

//              var t = [];
//              var x = [];
//              var y = [];
//              var h = [];

//              t.push('Nhãn hàng thời trang QO');
//              x.push(10.381464);
//              y.push(107.0991627);
//              h.push('<p><strong>GROUP</strong><br/>339/17A Nguyễn Thái Bình,Phường 12,Quận Tân Bình, Hồ Chí Minh</p>');



//              var i = 0;
//              for (item in t) {
//                  var m = new google.maps.Marker({
//                      map: google_map,
//                      animation: google.maps.Animation.DROP,
//                      title: t[i],
//                      position: new google.maps.LatLng(x[i], y[i]),
//                      html: h[i]
//                  });

//                  //m.setTitle((i + 1).toString());
//                  attachSecretMessage(m);
//                  i++;
//              }

//              function attachSecretMessage(marker) {
//                  var infowindow = new google.maps.InfoWindow({
//                      content: 'GROUP'
//                  });

//                  google.maps.event.addListener(marker, 'click', function () {
//                      //alert('123123');
//                      infowindow.open(marker.get('map'), marker);
//                  });
//                  google.maps.event.addListener(marker, 'mouseover', function () {
//                      //alert('123123');
//                      infowindow.open(marker.get('map'), marker);
//                  });
//              }
//          }

//          $(document).ready(function () {
//              initmap();

//          });
</script>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-xs-12 ">
            <!-- <span><strong>JOB7VN GROUP</strong></span>
            <span>Số điện thoại: xxxxxxx</span>
            <span>Địa chỉSố 5, Lê quang định, phường Thắng nhất , TP Vũng Tàu</span> -->
            <ul>
                <li><a href="#">Giới thiệu</a></li>

                <li>|</li>

                 <li><a href="<?php echo base_url('faq');?>">FAQ</a></li>
                   <li>|</li>
                 <li><a href="#">Điều khoản sử dụng</a></li>
                 <li>|</li>
                <li><a href="<?php echo base_url('contact')?>">Liên hệ</a></li>
                <li>|</li>
                <li><a href="#">Giúp đỡ</a></li>
            </ul>
            <ul class="social">
                <li><a href="#"><img src="<?php echo base_url();?>assets/main/img/social/facebook.png"></a></li>
                <li><a href="#"><img src="<?php echo base_url();?>assets/main/img/social/twitter.png"></a></li>
                <li><a href="#"><img src="<?php echo base_url();?>assets/main/img/social/g+.png"></a></li>
                <li><a href="#"><img src="<?php echo base_url();?>assets/main/img/social/skype.png"></a></li>
                <li><a href="#"><img src="<?php echo base_url();?>assets/main/img/social/youtube.png"></a></li>
            </ul>
             <span class="copyrighttitle">Copyright 2015 JOB7VN Group | All Rights Reserved </span>
        </div>
         <div class="col-sm-6 col-md-6 col-xs-12 text-center">
            <div class="hotline">
            <h2>HOTLINE</h2>
            <div class="border-bottom-title border-color-1"></div>
            </div>
            <div class="phone text-left">
            <h1>XX-XXX-XXXX-XX</h1>
            </div>
        </div>

    </div>
</div>

<script>
$(window).load(function() {
/** this is come when complete page is fully loaded, including all frames, objects and images **/
var h = window.innerHeight;//$(window).height();
    h = (h*80)/100;// (h > 300) ? h-100 : h;
       // $( "<style>.modal-body {height:'"+h+"px'; overflow:auto;}</style>" ).appendTo( "head" )
    $('<style type="text/css">#main-page {min-height:'+h+'px; }</style>').appendTo($('head'));
});
$( window ).resize(function() {
  var h = window.innerHeight;//$(window).height();
  h = (h*80)/100;//(h > 300) ? h-100 : h;
       // $( "<style>.modal-body {height:'"+h+"px'; overflow:auto;}</style>" ).appendTo( "head" )
  $('<style type="text/css">#main-page {min-height:'+h+'px; }</style>').appendTo($('head'));

});

//$(function(){
   // alert("123123");
  //});
    //$(document).ready(function(){
      //  var h = $(window).height();

       // $( "<style>.modal-body {height:'"+h+"px'; overflow:auto;}</style>" ).appendTo( "head" )
        //$('<style type="text/css">.modal-body {height:'+h+'px; overflow:auto;}</style>').appendTo($('head'));
   // });
    </script>