<form action='track.php' method='POST'>
	<div class='col-md-10'>
		<label for='trackingNumber'>Please Enter a Tracking Number</label>
		<input type="number" name="trackingNumber" class="form-control" required>
	</div>
	<div class='col-md-2'>
		<button type='submit' class='btn btn-info btn-fill pull-left' name='submitTrack'>Look up Package</button>
	</div>
</form>