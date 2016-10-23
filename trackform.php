<form action='track.php' method='POST'>
	<div class='col-md-12'>
		<label for='trackingNumber'>Please Enter a Tracking Number</label>
		<input type="number" name="trackingNumber" class="form-control" required>
		<div id="notValid" style="display: none">Tracking Number Not Valid<br></div>
		<div id="notExist" style="display: none">Tracking Number Does Not Exist<br></div>
	</div>
	<div class='col-md-2'>
		<button type='submit' class='btn btn-fill pull-left' style='background-color: #EE966A' name='submitTrack'>Look up Package</button>
	</div>
</form>
