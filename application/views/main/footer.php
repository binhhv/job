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
                <li><a href="<?php echo base_url('about'); ?>"><?php echo lang('m_introduce'); ?></a></li>

                <li>|</li>

                 <li><a href="<?php echo base_url('faq'); ?>"><?php echo lang('ft_faq'); ?></a></li>
                   <li>|</li>
                 <li><a href="<?php echo base_url('about/term') ?>"><?php echo lang('ft_terms'); ?></a></li>
                 <li>|</li>
                <li><a href="<?php echo base_url('contact') ?>"><?php echo lang('m_contact'); ?></a></li>
                <li>|</li>
                <li><a href="<?php echo base_url() ?>"><?php echo lang('ft_support'); ?></a></li>
            </ul>
            <ul class="social">
                <li><a href="#"><img src="<?php echo base_url(); ?>assets/main/img/social/facebook.png"></a></li>
                <li><a href="#"><img src="<?php echo base_url(); ?>assets/main/img/social/twitter.png"></a></li>
                <li><a href="#"><img src="<?php echo base_url(); ?>assets/main/img/social/g+.png"></a></li>
                <li><a href="#"><img src="<?php echo base_url(); ?>assets/main/img/social/skype.png"></a></li>
                <li><a href="#"><img src="<?php echo base_url(); ?>assets/main/img/social/youtube.png"></a></li>
            </ul>
            <div class="">
            <!-- <h2 class="margin-top-5" style="display: inline-block">HOTLINE</h2> -->
             <h1 class="h1-hotline"><?php echo lang('m_hotline_up'); ?> : 01212 049 149</h1>
              <!-- <div class="border-bottom-title border-color-1"></div> -->
            </div>


             <span class="copyrighttitle">Copyright 2015 allSHIGOTO Group | All Rights Reserved </span>
        </div>
         <div class="col-sm-6 col-md-6 col-xs-12 text-center">
          <!-- <div class="col-sm-12 col-xs-12 text-left">
           <h2>HOTLINE</h2>
           <h1>XX-XXX-XXXX-XX</h1>
           </div> -->
           <div class="col-sm-12 col-xs-12 fb-load no-padding">
             <!-- <div class="fb-page" data-href="https://www.facebook.com/japanese.job" data-width="250" data-height="150" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/japanese.job"><a href="https://www.facebook.com/japanese.job">Tuyển dụng nhân sự tiếng Nhật ở Việt Nam（ベトナムでの日本語関係の仕事の募集）</a></blockquote></div></div> -->
           </div>
            <!-- <div class="col-sm-12 col-xs-12 fb-md">
             <div class="fb-page" data-href="https://www.facebook.com/japanese.job" data-width="350" data-height="150" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/japanese.job"><a href="https://www.facebook.com/japanese.job">Tuyển dụng nhân sự tiếng Nhật ở Việt Nam（ベトナムでの日本語関係の仕事の募集）</a></blockquote></div></div>
           </div>
            <div class="col-sm-12 col-xs-12 fb-lg text-right">
             <div class="fb-page" data-href="https://www.facebook.com/japanese.job" data-width="500" data-height="150" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/japanese.job"><a href="https://www.facebook.com/japanese.job">Tuyển dụng nhân sự tiếng Nhật ở Việt Nam（ベトナムでの日本語関係の仕事の募集）</a></blockquote></div></div>
           </div> -->
         <!--  <div class="col-sm-12 col-xs-12">
            <div class="hotline">
            <h2>HOTLINE</h2>  <h1>XX-XXX-XXXX-XX</h1>
            <div class="border-bottom-title border-color-1"></div>
            </div>
            <div class="phone text-left">
            <h1>XX-XXX-XXXX-XX</h1>
            </div>
          </div> -->



        </div>

    </div>
    <!-- <div class="row support-online">
      <div class="col-sm-12 text-right">
        <label class="btn btn-succss ">allSHIGOTO</label>
      </div>
    </div> -->
</div>


<?php if (isset($popup)) {
	//echo $popup;
	include 'popup.php';
}
?>
<script type="text/javascript">

$(".change-language").on('click',function(){
  var lang = $(this).data("language");
  var currentURL = '<?php echo urlencode(current_url()); ?>';
  var url ='<?php echo base_url("language") ?>'+'/'+lang;
  //window.location.href='<?php echo base_url("language") ?>'+'/lang?url='+currentURL;
  console.log(url);
      $.ajax({
        url: url,
        type: "get",
        data:{'currentURL':currentURL},
        dataType:'json',
        success: function(data){
            location.reload();
        },
         error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
      });
});
$(document).ready(function() {
 // alert("123123");
 var w = document.documentElement.clientWidth;
  var h = document.documentElement.clientHeight;//window.innerHeight;
    h = (h*80)/100;
    //alert(h+'');
    $('<style type="text/css">#main-page,.contact-page,.job-detail {min-height:'+h+'px; } footer{width:'+w+'px;}</style>').appendTo($('head'));
});
$( window ).resize(function() {
  var w = document.documentElement.clientWidth;
  var h = document.documentElement.clientHeight;//window.innerHeight;
  h = (h*80)/100;
  $('<style type="text/css">#main-page,.contact-page,.job-detail {min-height:'+h+'px; } footer{width:'+w+'px;}</style>').appendTo($('head'));

});
    </script>

 <?php
if (isset($scriptOption)) {
	foreach ($scriptOption as $script) {?>
    <script src="<?php echo base_url() . $script; ?>"></script>
  <?php }
}
?>