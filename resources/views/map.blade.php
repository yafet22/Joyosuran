<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
  </head>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBI5Lyu0SJ1q2W5KuZwSrgtmDj7iiHRvcE&callback=initMap"></script>
  <script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAgrj58PbXr2YriiRDqbnL1RSqrCjdkglBijPNIIYrqkVvD1R4QxRl47Yh2D_0C1l5KXQJGrbkSDvXFA" type="text/javascript"></script>
   <script type="text/javascript" >
function load() {
     if (GBrowserIsCompatible()) {
       var map = new GMap2(document.getElementById("map"));
       map.addControl(new GSmallMapControl());
 map.addControl(new GMapTypeControl());
       var center = new GLatLng(-7.79722, 110.36880);
       map.setCenter(center, 15);
       geocoder = new GClientGeocoder();
       var marker = new GMarker(center, {draggable: true});
       map.addOverlay(marker);
       document.getElementById("lat").innerHTML = center.lat().toFixed(5);
       document.getElementById("lng").innerHTML = center.lng().toFixed(5);

  GEvent.addListener(marker, "dragend", function() {
      var point = marker.getPoint();
      map.panTo(point);
      document.getElementById("lat").innerHTML = point.lat().toFixed(5);
      document.getElementById("lng").innerHTML = point.lng().toFixed(5);
       });


 GEvent.addListener(map, "moveend", function() {
   map.clearOverlays();
   var center = map.getCenter();
   var marker = new GMarker(center, {draggable: true});
   map.addOverlay(marker);
   document.getElementById("lat").innerHTML = center.lat().toFixed(5);
   document.getElementById("lng").innerHTML = center.lng().toFixed(5);

 GEvent.addListener(marker, "dragend", function() {
     var point =marker.getPoint();
     map.panTo(point);
     document.getElementById("lat").innerHTML = point.lat().toFixed(5);
     document.getElementById("lng").innerHTML = point.lng().toFixed(5);
       });

       });

     }
   }

   function showAddress(address) {
   var map = new GMap2(document.getElementById("map"));
      map.addControl(new GSmallMapControl());
      map.addControl(new GMapTypeControl());
      if (geocoder) {
       geocoder.getLatLng(
         address,
         function(point) {
           if (!point) {
             alert(address + " not found");
           } else {
   document.getElementById("lat").innerHTML = point.lat().toFixed(5);
   document.getElementById("lng").innerHTML = point.lng().toFixed(5);
  map.clearOverlays()
  map.setCenter(point, 14);
  var marker = new GMarker(point, {draggable: true});
  map.addOverlay(marker);

 GEvent.addListener(marker, "dragend", function() {
     var pt = marker.getPoint();
     map.panTo(pt);
     document.getElementById("lat").innerHTML = pt.lat().toFixed(5);
     document.getElementById("lng").innerHTML = pt.lng().toFixed(5);
       });


 GEvent.addListener(map, "moveend", function() {
   map.clearOverlays();
   var center = map.getCenter();
   var marker = new GMarker(center, {draggable: true});
   map.addOverlay(marker);
   document.getElementById("lat").innerHTML = center.lat().toFixed(5);
   document.getElementById("lng").innerHTML = center.lng().toFixed(5);

 GEvent.addListener(marker, "dragend", function() {
    var pt = marker.getPoint();
    map.panTo(pt);
   document.getElementById("lat").innerHTML = pt.lat().toFixed(5);
   document.getElementById("lng").innerHTML = pt.lng().toFixed(5);
       });

       });
           }
         }
       );
     }
   }
   </script>


<body onload="load()" onunload="GUnload()" >



<table width="300">
 <tr >
   <td >Latitude</td>
   <td >Longitude</td>
 </tr>
 <tr>
   <td id="lat"></td>
   <td id="lng"></td>
 </tr >

</table>

 <div id="map" style="width: 600px; height: 400px">


</body>

</html>