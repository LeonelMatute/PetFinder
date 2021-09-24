<style>
#map{ height: 400px; width: 100%;}
</style>
<div id="map">

</div>

<script>

function initMap() {
  //MAP OPTIONS
  var options = {
    zoom:10,
    center:{lat: -34.672501,lng:-58.449722}
  }
  // NEW MAPP
  var map = new google.maps.Map(document.getElementById("map"),options);
  //ADD Marker
  var marker = new google.maps.Marker({position:{lat: -34.6,lng:-58.500},map:map});

  var infoWindow = new google.maps.InfoWindow({content:'<h1>Lynn MA</h1>'
  });

  marker.addListener('click', function(){
    infoWindow.open(map,marker);
  });
  }


</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9B-oZ-uHrcS-xfWYoKCIpLopV3qOvEXk&callback=initMap&libraries=&v=weekly"></script>
