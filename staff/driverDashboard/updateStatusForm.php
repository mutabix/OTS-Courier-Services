<form action='updateStatus.php' method='POST'>
	<div class='col-md-10'>
		<label for='connoteNumber'>Please Enter a Consignment Note Number</label>
		<input type="number" name="connoteNumber" class="form-control" <?php echo "value=".$connoteNumber; ?> required>
	</div>
	<div class='col-md-2'>
		<button type='submit' class='btn btn-info btn-fill pull-left' name='submitConnote'>Look up Package</button>
	</div>
</form>
