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
	<h2>Start by making sure your package will fit the requirements. (PLACEHOLDER)</h2>
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
	<h2>Please enter the type and measurements of your desired package.</h2>
	</div>
</div>

<div class="container top-buffer">
	<div class="row postage-addresses">
		<form id="postForm" onsubmit="initMap()" action="cost_result.php" method="post">
			<div class="col-md-3">
				Type (Satchel or Box)
				<select name="type" class="form-control">
					<option value="-">Select Package Type</option>
					<option value="satchel_1_kg">1kg Satchel</option>
					<option value="satchel_3_kg">3kg Satchel</option>
					<option value="satchel_5_kg">5kg Satchel</option>
					<option value="box_1_kg">1kg Box</option>
					<option value="box_3_kg">3kg Box</option>
					<option value="box_5_kg">5kg Box</option>
					<option value="box_10_kg">10kg Box</option>
					<option value="box_20_kg">20kg Box</option>
				</select>
			</div>
			<div class="col-md-3">
				Height (in centimetres)	
				<input type="text" name="height" class="form-control" required>
			</div>
			<div class="col-md-3">
				Width (in centimetres)
				<input type="text" name="width" class="form-control" required>
			</div>
			<div class="col-md-3">
				Length (in centimetres)
				<input type="text" name="length" class="form-control" required>
			</div>
	</div>
</div>

<div class="container top-buffer">
	<div class="row">
	<h2>And finally, please enter the states you wish to post from and to, as well as the delivery service you wish for.
	</div>
</div>
 
<div class="container top-buffer">
	<div class="row postage-addresses">
		<div class="col-md-3">
			Postage from:
			<br>
			<select name="pickup_state" class="form-control">
				<option value="act">Australian Capital Territory</option>
				<option value="nsw">New South Wales</option>
				<option value="nt">Northen Territory</option>
				<option value="qld">Queensland</option>
				<option value="sa">South Australia</option>
				<option value="tas">Tasmania</option>
				<option value="vic">Victoria</option>
				<option value="wa">Western Australia</option>
			</select>
		</div>
		
		<div class="col-md-3">
			To:
			<br>
			<select name="deliver_state" class="form-control">
				<option value="act">Australian Capital Territory</option>
				<option value="nsw">New South Wales</option>
				<option value="nt">Northen Territory</option>
				<option value="qld">Queensland</option>
				<option value="sa">South Australia</option>
				<option value="tas">Tasmania</option>
				<option value="vic">Victoria</option>
				<option value="wa">Western Australia</option>
			</select>
		</div>
		
		<div class="col-md-3">
			Service Type:
			<br>
			<select name="service_type" class="form-control">
				<option value="-">Select Service</option>
				<option value="standard">Standard 2-5 Days</option>
				<option value="express">Express 1-3 Days</option>
				<option value="overnight">Overnight</option>
			</select>
		</div>
		
		<div class="col-md-3">
			Factor in shipping insurance?
			<br>
			<div class="checkbox">
				<label>
					<input type="checkbox"> Yes.
				</label>
			</div>
		</div>
	</div>
	<div class="row top-buffer">
		<div class="col-md-12 text-center">
			<input type="submit" id="submit" class="btn btn-warning" value="Estimate Price">
		</form>
		</div>
	</div>
</div>

<?php
include 'assets/includes/footer.php';
?>
