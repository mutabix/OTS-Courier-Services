<?php
include 'assets/includes/header.php';

$package_type = $_POST['type'];
$height = $_POST['height'];
$width = $_POST['width'];
$length = $_POST['length'];

$pickup_state = $_POST['pickup_state'];
$delivery_state = $_POST['deliver_state'];

$service_type = $_POST['service_type'];

?>
<div class="container-fluid top-buffer">
	<div class="row">
		<img class="img-responsive" src="assets/img/cost-panorama.jpg">
	</div>
</div>

<div class="container top-buffer">
	<div class="row">
	<h1>Welcome to the postage calculator</h1>
	<h2>Your delivery is estimated to cost...</h2>
	</div>
</div>

<?php
include 'assets/includes/cost_formula.php';
?>

<div class="container top-buffer">
	<div class="row text-center">
	<h1><?php echo $total_cost ?> Dollars</h1>
	</div>
</div>