[11:02:51 AM] Take La: Trong phần search địa điểm thì có thể có thể 1 ô map show view các công việc:
https://jobsearch.gov.au/harvesttrail/townsandcrops.aspx

Ví dụ nhé bình:
trang agoda là trang tìm kiếm khách sạn
http://www.agoda.com/vi-vn?type=1&device=c&network=g&adid=48998346597&rand=16741095435074352765&expid=&adpos=1t1&site_id=1415320&tag=90cdb2fd-a098-4191-84d7-8c37b4e933ce&url=http://www.agoda.com/vi-vn&gclid=Cj0KEQjw3auuBRDj1LnQyLjy-4sBEiQAKPU_vZlXfCRdcdRZt8IS8R9KqEYKBS5RqzXOLVKA0ZE38AIaAnSM8P8HAQ&cklg=1


Trong link trên, bạn chọn xem ksan ở hcm rồi chọn bất kì khách sạn nào như saigon riverside hotel
, và nhấn vào chữ xem bản đồ ở cạnh tên hotel.

http://www.agoda.com/vi-vn/liberty-central-saigon-riverside-hotel/hotel/ho-chi-minh-city-vn.html?asq=XqlQ7bJ0pUN0G2iz%2fnzAiCzyBqAkHV9KPSwEE%2fJQ7PP4N7uQHxEqqNnHX0VgaoC8mjpX11VpAw3P8dNUhGK6r3ctXx9i8gNFhbXcbrbVbhUsVO1U%2bkZDgbfMDc93rsShwbZZWlqVkA%2f7UAXTYzezfrEfAg93RbM0SsDFqhw0i2W3OD3GNYBesrH%2fp0MxPIBScpgWFO8fAk9TVcB3Dc1ZiHxhdT0YeDlACk50HELky9Z4DZnRG%2bpbIXr2sxylVbY7&cid=1415320&tag=90cdb2fd-a098-4191-84d7-8c37b4e933ce&tyra=1%7c1&searchrequestid=2c6acce3-40d6-41e8-82a1-ee3508dba484&pingnumber=1
[11:03:27 AM] Take La: 4. Khi user vao xem trag top thi sau 3 phut tu luc vao xem se hien thi pop up (1 man hh thog bao sau)

Ban muon nhan tin tuyen dung tu chung toi qua email?
Hay vui long de lai email nhe.
User ko thich de lai email tho co the tat pop up di ko sao ca.

5. Khi user la nha tuyen dug ( da log in) thi khi xem trag top hay bat ki trag nao, sau  3 phut tu luc truy cap thi se hien thi pop up:

Ban co muon lien he dang tin quang cao hay tim kiem ung vien theo nhu cau khong?
Neu co vui long de lai email cho chung toi.
[11:03:36 AM] Take La: User k thich thi co the tat pop up di ko sao ca.
[11:03:55 AM] Take La: Khi user tat di thi khoang 7phut sau se hien thi lai.
Tuc la
Vi du: user bdau xem web luc 12:30 thi 12:33 se hien thi popup roi user tat di. Den 12:40 se hien thi lai nua.
Di nhien neu user da dien email (tuc la k tat pop up di) thi se k hien thi lai nua.
Cai nay lien wan code sau nen gio bih cu note lai :)


<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoDPfuZRiusY-jTRprYVx0h2WOaqrspEo&libraries=places&sensor=false"></script> -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>-->
<!-- <script src="https://maps.googleapis.com/maps/api/js"></script> -->
    <script src="<?php echo base_url();?>assets/main/js/map/data.json"></script>

    <script src="<?php echo base_url();?>assets/main/js/map/markerclusterer.js"></script>

    <!--<script src="<?php echo base_url();?>assets/main/js/map/markerclusterer_compiled.js"></script>
    <script src="<?php echo base_url();?>assets/main/js/map/speed_test.js"></script>-->

    <script>
    function initialize() {
    //var center = new google.maps.LatLng(37.4419, -122.1419);
    var center = new google.maps.LatLng(49, 2.56);

    var map = new google.maps.Map(document.getElementById('map-job'), {
        zoom: 7,
        center: center,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var markers = [];

    var macDoList = [
        {lat:49.00408,lng:2.56228,data:{drive:false,zip:93290,city:"TREMBLAY-EN-FRANCE"}},
        {lat:49.00308,lng:2.56219,data:{drive:false,zip:93290,city:"TREMBLAY-EN-FRANCE"}},
        {lat:48.93675,lng:2.35237,data:{drive:false,zip:93200,city:"SAINT-DENIS"}},
        {lat:48.93168,lng:2.39858,data:{drive:true,zip:93120,city:"LA COURNEUVE"}},
        {lat:48.91304,lng:2.38027,data:{drive:true,zip:93300,city:"AUBERVILLIERS"}},
    ];

    for(var i=0;i<5;i++){
        console.log(macDoList[i].lat)
        var latLng = new google.maps.LatLng(
                            macDoList[i].lat,
                            macDoList[i].lng);
        var marker = new google.maps.Marker({
            position: latLng,
            map: map
        });
        markers.push(marker);
    }

    var markerCluster = new MarkerClusterer(map, markers);
}
    $(document).ready(function () {
      //initialize();
    // var center = new google.maps.LatLng(37.4419, -122.1419);
    //   var options = {
    //     'zoom': 13,
    //     'center': center,
    //     'mapTypeId': google.maps.MapTypeId.ROADMAP
    //   };

    //   var map = new google.maps.Map(document.getElementById("map"), options);

    //   var markers = [];
    //   for (var i = 0; i < 100; i++) {
    //     var latLng = new google.maps.LatLng(data.photos[i].latitude,
    //         data.photos[i].longitude);
    //     var marker = new google.maps.Marker({'position': latLng});
    //     markers.push(marker);
    //   }
    //   var markerCluster = new MarkerClusterer(map, markers);
      });
      // google.maps.event.addDomListener(window, 'load', speedTest.init);
    </script>
    <script>
      // var _gaq = _gaq || [];
      // _gaq.push(['_setAccount', 'UA-12846745-20']);
      // _gaq.push(['_trackPageview']);

      // (function() {
      //   var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      //   ga.src = ('https:' === document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      //   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      // })();
    </script>



    <script type="text/javascript">
// function createMarker(number, currentMap, currentMapData) {

//    var marker = new MarkerWithLabel({
//        position: new google.maps.LatLng(currentMapData.lat, currentMapData.lng),
//                  map: currentMap,
//                  icon: '/img/sticker/empty.png',
//                  shadow: '/img/sticker/bubble_shadow.png',
//                  transparent: '/img/sticker/bubble_transparent.png',
//                  draggable: false,
//                  raiseOnDrag: false,
//                  labelContent: ""+number,
//                  labelAnchor: new google.maps.Point(3, 30),
//                  labelClass: "mapIconLabel", // the CSS class for the label
//                  labelInBackground: false
//                 });
//             }
// 	function initialize() {

//             $.getScript("<?php echo base_url();?>assets/main/js/map/markerwithlabel.js#{applicationBean.version}", function(){
//             var mapData = [
//         {lat:49.00408,lng:2.56228,data:{drive:false,zip:93290,city:"TREMBLAY-EN-FRANCE"}},
//         {lat:49.00308,lng:2.56219,data:{drive:false,zip:93290,city:"TREMBLAY-EN-FRANCE"}},
//         {lat:48.93675,lng:2.35237,data:{drive:false,zip:93200,city:"SAINT-DENIS"}},
//         {lat:48.93168,lng:2.39858,data:{drive:true,zip:93120,city:"LA COURNEUVE"}},
//         {lat:48.91304,lng:2.38027,data:{drive:true,zip:93300,city:"AUBERVILLIERS"}},
//     ];

//             var mapOptions = {
//                 zoom: 8,
//                 center: new google.maps.LatLng(currentLat, currentLng),
//                 mapTypeId: google.maps.MapTypeId.ROADMAP,
//                 streetViewControl: false,
//                 mapTypeControl: false
//             };

//             var map = new google.maps.Map(document.getElementById('map-job'),
//                     mapOptions);

//             var bounds = new google.maps.LatLngBounds();

//             for (var i = 0; i < mapData.length; i++) {
//                 createMarker(i+1, map, mapData[i]); <!-- MARKERS! -->
//                 extendBounds(bounds, mapData[i]);
//             }
//             map.fitBounds(bounds);
//             var maximumZoomLevel = 16;
//             var minimumZoomLevel = 11;
//             var ourZoom = defaultZoomLevel; // default zoom level

//             var blistener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
//                 if (this.getZoom(map.getBounds) > 16) {
//                     this.setZoom(maximumZoomLevel);
//                 }
//                 google.maps.event.removeListener(blistener);
//             });
//             });
//         }

//         function loadScript() {
//             var script = document.createElement('script');
//             script.type = 'text/javascript';
//             script.src = "https://maps.googleapis.com/maps/api/js?v=3.exp&amp;libraries=places&amp;sensor=false&amp;callback=initialize";
//             document.body.appendChild(script);
//         }

        //window.onload = loadScript;


      function initialize() {
      	  var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(-34.397, 150.644)
  };
  map = new google.maps.Map(document.getElementById('map-job'),
      mapOptions);

var marker = new MarkerWithLabel({
       position: new google.maps.LatLng(-34.397, 151.244),
     			 map: map,
                 icon: '<?php echo base_url();?>assets/main/img/map/marker3.png',
                 shadow: '<?php echo base_url();?>assets/main/img/map/marker3.png',
                 transparent: '<?php echo base_url();?>assets/main/map/img/marker3.png',
                 draggable: false,
                 raiseOnDrag: false,
                 labelContent: ""+'12',
                 labelAnchor: new google.maps.Point(3, 30),
                 labelClass: "mapIconLabel", // the CSS class for the label
                 labelInBackground: false
});

        // var mapOptions = {
        //   center: new google.maps.LatLng(37.286172, -121.80929),
        //   zoom: 8,
        //   mapTypeId: google.maps.MapTypeId.ROADMAP
        // };
        // var map = new google.maps.Map(document.getElementById("map-job"),
        //     mapOptions);

        // var myLatlng = new google.maps.LatLng(37.286172, -121.80929);
        // var marker = new google.maps.Marker({
        //     position: myLatlng,
        //     map: map,
        //     icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=7|00FF00|000000',
        //     title: 'A Number Marker'
        // });
      }


    </script>