<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
var myCenter=new google.maps.LatLng(-6.980994, 110.408978);

function initialize()
{
var mapProp = {
  center: myCenter,
  zoom:8,
  mapTypeId: google.maps.MapTypeId.ROADMAP
  };

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
  position: myCenter,
  title:'Click to zoom'
  });

marker.setMap(map);

// Zoom to 9 when clicking on marker
google.maps.event.addListener(marker,'click',function() {
  map.setZoom(15);
  map.setCenter(marker.getPosition());
  });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div id="googleMap" style="width:1100px;height:500px;"></div>

