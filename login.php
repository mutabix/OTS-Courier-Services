<?php
	include("../dbTools/dbConnect.php");
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		session_start();
			
		$date = new DateTime();
		$error = ""; //Used for storing errors
		$email = $_POST['email'];
		$password = $_POST['password'];

		//If values are assigned to $username and $password (entered into login form)
		if(isset($email)&&isset($password)){
			$password = sha1($password); //Hashes password
			
			//SQL query selects the user from the database where username and password MongoDeleteBatch
			//Checks if user is in the database
			$getLogin = $dbConnection->prepare("SELECT * FROM customers WHERE :email = :email and password = :password");

			//Binds values to the query
			$getLogin->bindValue(':email', $email);
			$getLogin->bindValue(':password', $password);
			$getLogin->execute(); //Executes the query
			$login = $getLogin->fetch(); //Fetchs results

			$retrievedUsername = $login['email'];
			$retrievedPassword = $login['password'];

			//Double checks the login credentials
			if($email == $retrievedEmail && $password == $retrievedPassword){
				$_SESSION['email'] = $email; //Current session username
				header("location: index.php"); //Redirects to home page if credentials matchs
				exit;
			}
			else { //If doesn't match username and password doesn't
				//match the retrieved values - only used if there is a
				//issue with the database or query
				$error = "Wrong Email or Password";
			}
		}
		else { //If the use didn't enter a value for the username or password
			$error = "Both fields are required.";
		}
		$_SESSION['error'] = $error; //Sets the SESSION error variable to the correct error
		header("location: login.php"); //Redirects user to login page
	}
	//Check if the user just signed up from the SESSION variable- if they did
	//Indicate the successful message on the page
	if(isset($_SESSION["signedUpCheck"])){
		$msg = "You Have Successfully Signed Up";
		echo "<section class='just-registered-section'>";
		echo "<p>$msg</p>";
		echo "</section>";
		header("location: $msg"); //Redirects user to login page
	}

	//Checks if there was an error while logging in if there was reports on the error
	else if(isset($_SESSION["error"])){
		$errorMsg = $_SESSION["error"];
		echo "<section class='error-credentials-section'>";
		echo "<p>$errorMsg</p>";
		echo "</section>";
		header("location: $errorMsg"); //Redirects user to login page
	}

    //Ends the error session
	session_unset();
	session_destroy();
?>
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
		<script src="assets/js/light-bootstrap-dashboard.js"></script>
		<style>
			body  {
				background-image: url("assets/img/orange_sky.jpg");
				background-color: #000000;
				background-repeat: no-repeat;
				background-size: 100% 100%;
			}
		</style>
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
							<form method="post" action="login.php">
								<div class="input-group">
									<input type="text" id="email" name="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
									<input type="text" id="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
									<div class="row">
										<div class="col-md-4">
										</div>
										<div class="col-md-4">
											<button type="submit" class="list-group-item"><center>Login</center></button>
										</div>
										<div class="col-md-4">
										</div>
									</div>
								</div>
							</form>
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
				window.location = 'register.php'
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