<!doctype html>
<html lang="en">
	<head>
		<title>Login</title>
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
			//Database connection info
			$host = "d6q8diwwdmy5c9k9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
			$dbusername = "tgs66cq1wippa93b";
			$dbpassword = "xi7mibqw1s765w4q";
			$dbname = "vrtepy2jtdixgvmr";

			try {
				//DATABASE CONNECTION
				$dbConnection = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
				echo "Connected successfully"; //Debugging
			}
			catch(PDOException $error) { //Should make a error page
				echo "Connection failed: ";
			}
		?>
		<br>
		<div class="row">
			<div class="col-md-8">
			</div>
			<div class="col-md-3">
				<div class="pull-right">
					<button type="button" onclick="goToRegister()" class="list-group-item">Don't have an account? Register now</button>
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
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title"><b><center>Welcome Back, please enter your login details below.</center></b></h2>
					</div>
					<div class="panel-body">
						<div class="card ">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
								<input type="text" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
								<div class="row">
									<div class="col-md-4">
									</div>
									<div class="col-md-4">
										<button type="button" onclick="login()" class="list-group-item"><center>Login</center></button>
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
		<br>
		<br>
		<br>
		<br>
		<br>
		<script>
			function goToRegister() {
				window.location = 'OTS_Register.php'
			}
			function login() {
				<?php
					if ($stmt = $mysqli->prepare("SELECT email FROM customers")) {
						$stmt->bind_result($name);
						$OK = $stmt->execute();
					}
					$result_array = Array();
					while($stmt->fetch()) {
					$result_array[] = $name;
					}
					$json_array = json_encode($result_array);
				?>
				var login = false;
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