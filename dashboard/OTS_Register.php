<!doctype html>
<html lang="en">
	<head>
		<title>Register</title>
		 <!--Metadata-->
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width" />    <!--Cascading Style Sheet-->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/animate.min.css" rel="stylesheet"/>
		<link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>    <!--Fonts and Icons-->
		<link rel="icon" type="image/png" href="assets/img/favicon.ico">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
		<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />    <!--Javascript-->
		<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
		<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>
		<script src="assets/js/chartist.min.js"></script>
		<script src="assets/js/bootstrap-notify.js"></script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<script src="assets/js/light-bootstrap-dashboard.js"></script></head>
		<style>
			body  {
				background-image: url("assets/img/orange_sky.jpg");
				background-color: #000000;
				background-repeat: no-repeat;
				background-size: 100% 100%;
			}
		</style>
		<?php
			$servername = "d6q8diwwdmy5c9k9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
			$username = "tgs66cq1wippa93b";
			$password = "xi7mibqw1s765w4q";

			$conn = mysqli_connect($servername, $username, $password);

			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			echo "Connected successfully";
		?>
		<br>
		<div class="row">
			<div class="col-md-8">
			</div>
			<div class="col-md-3">
				<div class="pull-right">
					<button type="button" onclick="goToLogin()" class="list-group-item">Looking for the Login Page?</button>
				</div>
			</div>
			<div class="col-md-1">
			</div>
		</div>
	</head>
	<body>
		<br>
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title"><b><center>New User? Register quick and easy below.</center></b></h2>
					</div>
					<div class="panel-body">
						<div class="card ">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="First Name" aria-describedby="basic-addon1">
								<input type="text" class="form-control" placeholder="Last Name" aria-describedby="basic-addon1">
								<input type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
								<input type="text" class="form-control" placeholder="Phone Number" aria-describedby="basic-addon1">
								<input type="text" class="form-control" placeholder="Address Line 1" aria-describedby="basic-addon1">
								<input type="text" class="form-control" placeholder="Address Line 2" aria-describedby="basic-addon1">
								<input type="text" class="form-control" placeholder="Postcode" aria-describedby="basic-addon1">
								<input type="text" class="form-control" placeholder="State" aria-describedby="basic-addon1">
								<input type="text" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
								<input type="text" class="form-control" placeholder="Confirm Password" aria-describedby="basic-addon1">
								<div class="row">
									<div class="col-md-4">
									</div>
									<div class="col-md-4">
										<button type="button" onclick="registerAccount()" class="list-group-item"><center>Register</center></button>
									</div>
									<div class="col-md-4">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
			</div>
		</div>
		<br>
		<br>
		<br>
		<br>
		<script>
			function goToLogin() {
				window.location = 'OTS_LOGIN.php'
			}
			function registerAccount() {
				$sql = "INSERT INTO customers (firstName, lastName, email) VALUES ('John', 'Doe', 'john@example.com')";
			}
		</script>
	</body>
	<footer class="footer">
		<div class="container-fluid">
			<nav class="pull-left">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Contact Us</a></li>
				</ul>
			</nav>
		<p class="copyright pull-right">&copy; 2016 On The Spot Courier Services</p>
		</div>
	</footer>
</html>