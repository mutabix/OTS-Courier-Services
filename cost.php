<?php
include 'assets/includes/header.php';
?>
<div class="container-fluid top-buffer">
	<div class="row">
		<img class="img-responsive" src="assets/img/cost-panorama.jpg">
	</div>
</div>

<div class="container top-buffer">
	<div class="row">
	<h1>Welcome to the postage calculator</h1>
	<h2>Here, you may enter details on your package and its destination to receive a price estimate.</h2>
	<h2>Start by making sure your package will fit the requirements.</h2>
	</div>
</div>

<div class="container top-buffer">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped table-bordered">
				<tr>
					<th>Destination</th>
					<th>Maximum Weight</th> 
					<th>Maximum Dimension</th>
				</tr>
				<tr>
					<td>Domestic</td>
					<td>22kg</td> 
					<td>105cm</td>
				</tr>
				<tr>
					<td>International</td>
					<td>20kg</td> 
					<td>105cm</td>
				</tr>
			</table>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
	<h2>Please enter the measurements of your desired package.</h2>
	</div>
</div>

<div class="container top-buffer">
	<div class="row postage-addresses">
		<form id="postForm" onsubmit="return false;">
			<div class="col-md-4">
				Weight (in kilograms)	
				<input type="text" class="form-control" required>
			</div>
			<div class="col-md-4">
				Height (in centimetres)
				<input type="text" class="form-control" required>
			</div>
			<div class="col-md-4">
				Length (in centimetres)
				<input type="text" class="form-control" required>
			</div>
	</div>
</div>

<div class="container top-buffer">
	<div class="row">
	<h2>And finally, please enter the address you wish to post from and to.
	</div>
</div>
 
<div class="container top-buffer">
	<div class="row postage-addresses">
			<div class="col-md-6">
				Postage from:
				<br>
				<input type="text" id="address1" class="form-control" required>
			</div>
		
			<div class="col-md-6">
				To:
				<br>
				<input type="text" id="address2" class="form-control" required>
			</div>
	</div>
	<div class="row top-buffer">
		<div class="col-md-12 text-center">
			<input type="submit" id="submit" class="btn btn-warning" value="Estimate Price">
		</form>
		</div>
	</div>
</div>

<script>
function initMap()
{
	var geocoder = new google.maps.Geocoder();
	document.getElementById("postForm").addEventListener("submit", function(){
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

function determineDistance ()
{
	return false;
}

</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC681vlrQytqEPRKSbNRN45PS8-iVReBmY&callback=initMap">
</script>

<?php
include 'assets/includes/footer.php';
?>
