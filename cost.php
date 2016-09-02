<?php
include 'assets/includes/header.php';

echo 
'<div class="container">
	<div class="row">
		<form onsubmit="return false;">
			<div class="col-md-6">
				Enter address to pickup:
				<input type="text" id="address1">
			</div>
		
			<div class="col-md-6">
				Enter address to deliver:
				<input type="text" id="address2">
			</div>
		
			<input type="submit" id="submit">
		</form>
	</div>
	<div class="row" style="background-color:blue;height:100px;">
		<div class="col-md-12">
		</div>
	</div>
</div>';

echo
'<script>
function initMap()
{
	var geocoder = new google.maps.Geocoder();
	document.getElementById("submit").addEventListener("click", function(){
		geocodeAddress(geocoder);
	});
}

function geocodeAddress(geocoder)
{
	var address1 = document.getElementById("address1").value
	var address2 = document.getElementById("address2").value
	geocoder.geocode({"address" : address1}, function(results, status){
          if (status === "OK") {
            var latitude = results[0].geometry.location.lat();
			var longitude = results[0].geometry.location.lng();
			alert(latitude);
			alert(longitude);
		  }
		  else {
			  alert("Geocode was not successful for the following reason: " + status);
		  }
	});
	geocoder.geocode({"address" : address2}, function(results, status){
          if (status === "OK") {
            var latitude2 = results[0].geometry.location.lat();
			var longitude2 = results[0].geometry.location.lng();
			alert(latitude2);
			alert(longitude2);
		  }
		  else {
			  alert("Geocode was not successful for the following reason: " + status);
		  }
	});
}
</script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC681vlrQytqEPRKSbNRN45PS8-iVReBmY&callback=initMap">
    </script>';

?>