<form action='updateStatus.php' method='POST'>
<div class='row'>
	<div class='col-md-12'>
			<label for='connoteNumber'>Please Enter a Consignment Note Number</label>
			<input type="number" name="connoteNumber" class="form-control" <?php echo "value=".$connoteNumber; ?> required>
	</div>
	<div class='col-md-2'>
		<br>
		<button type='submit' class='btn btn-info btn-fill pull-left' name='submitConnote'>Look Up Package</button>
	</div>
</div>
</form>
