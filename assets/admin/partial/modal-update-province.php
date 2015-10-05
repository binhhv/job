<section ng-controller="provinceController">
    <div class="modal-header">
        <h3 class="modal-title">Chỉnh sửa: {{province.province_name}}</h3>
    </div>
    <div class="modal-body" id="province-modal">
            <form name="updateprovinceForm" novalidate>
                <fieldset>
                    <div class="row">
                        <!-- <div data-ng-show="error" class="text-danger">
                            <strong data-ng-bind="error"></strong>
                        </div>
                        <div class="form-group">
                            <div data-ng-show="error" class="text-center text-danger">
                                <div class="alert alert-danger" role="alert">
                                    <strong data-ng-bind="error"></strong>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-sm-12">
                          <div class="hide" id="latitude"></div>
                          <div class="hide" id="longitude"></div>
                        <input type="hidden" name="province_long" ng-value="province.province_long">
                        <input type="hidden" name="province_lat" ng-value="province.province_lat">
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="province_name">Tên</label>
                                <div class="controls">
                                    <input type="text" name="province_name" ng-model="province.province_name" id="province_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 padding-top-10">
                                <label class="control-label" for="province_type">Tỉnh/Thành</label>
                                <div class="controls">
                                    <label class="controls"><input  type="radio" name="province_type" ng-model="province.province_type" value="Tỉnh">Tỉnh</label> &nbsp;
                                     <label><input  type="radio" name="province_type" ng-model="province.province_type" value="Thành Phố">Thành phố</label>
                                    <!-- <input type="text" name="province_type" ng-model="province.province_type" id="province_type" class="form-control" disabled> -->
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="region_name">Vùng miền</label>
                                <div class="controls">
                                    <select class="form-control" name="region" id="region"
      ng-options="option.region_name for option in province.regions track by option.region_id"
      ng-model="province.objectRegion"></select>
                                    <!-- <input type="text" name="region_name" ng-model="province.region_name" id="firstname" class="form-control" required> -->
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="province_long_lat">Kinh độ/Vĩ độ</label>
                                <div class="controls">
                                    <input type="text" name="province_long_lat" ng-model="province.province_long_lat" id="province_long_lat" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="form-group col-sm-12" ng-init="loadMap(province.province_long,province.province_lat);">

                                <div class="controls">
                                    <div id="map_region"></div>
                                    <!-- <div id="current">Nothing yet...</div> -->
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="updateProvince(province);ok()" ng-disabled="updateprovinceForm.$invalid || disabled_modal">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Hủy</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>


  <script>
  function initialize() {
    //var $element = $('div[ng-controller="provinceController"]');
    //var scope = angular.element($element).scope();
    //var $latitude = document.getElementById('latitude');
    //var $longitude = document.getElementById('longitude');
    var latitude = $("input:hidden[name='province_lat']").val();
    var longitude =$("input:hidden[name='province_long']").val()
    var zoom = 10;

    var LatLng = new google.maps.LatLng(latitude, longitude);

    var mapOptions = {
      zoom: zoom,
      center: LatLng,
      panControl: false,
      zoomControl: false,
      scaleControl: true,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    var map = new google.maps.Map(document.getElementById('map_region'),mapOptions);

    var marker = new google.maps.Marker({
      position: LatLng,
      map: map,
      title: 'Drag Me!',
      draggable: true
    });

    google.maps.event.addListener(marker, 'dragend', function(marker){
      var latLng = marker.latLng;
      //if(typeof latLng)
      $("#latitude").text(latLng.lat());
      $("#longitude").text(latLng.lng());
      $("input[name='province_long_lat']").val(ddToDms(latLng.lat(),latLng.lng()));
    });

  }
  $(document).ready(function(){
      //$("#province-modal").load(function() {
setTimeout(function(){
//alert($("input:hidden[name='province_long']").val());
initialize();
},100);

// Do stuff
//alert('123123');

//});
     // initialize();
//var $element = $('section[ng-controller="provinceController"]');
   // var scope = angular.element($element).scope();
        //console.dir(scope);
      //var data = $('[ng-controller="provinceController"]').scope().province;
       //alert(scope.province_lat);
  });

  function ddToDms(lat, lng) {

           var lat = lat;
           var lng = lng;
           var latResult, lngResult, dmsResult;

           lat = parseFloat(lat);
           lng = parseFloat(lng);

           //latResult = (lat >= 0)? 'N' : 'S';

           // Call to getDms(lat) function for the coordinates of Latitude in DMS.
           // The result is stored in latResult variable.
           latResult = getDms(lat);
           latResult += (lat >= 0)? 'N' : 'S';

           //lngResult = (lng >= 0)? 'E' : 'W';

           // Call to getDms(lng) function for the coordinates of Longitude in DMS.
           // The result is stored in lngResult variable.
           lngResult = getDms(lng);
           lngResult +=  (lng >= 0)? 'E' : 'W';

           // Joining both variables and separate them with a space.
           dmsResult = latResult + ', ' + lngResult;

           // Return the resultant string
           return dmsResult;
        }

        function getDms(val) {

          var valDeg, valMin, valSec, result;

          val = Math.abs(val);

          valDeg = Math.floor(val);
          result = valDeg + " ";

          valMin = Math.floor((val - valDeg) * 60);
          result += valMin + " ";

          valSec = Math.round((val - valDeg - valMin / 60) * 3600 * 1000) / 1000;
          result += valSec + '';

          return result;
        }


  </script>
