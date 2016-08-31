<!doctype html>
<html lang="en">
<head>
	<title>Logon</title>

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
<body>

<div class="wrapper">

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

    <div class="sidebar" data-color="orange" data-image="assets/img/sidebar-img.jpg">
		<div class="sidebar-wrapper">
		</div>
	</div>
	
    <div class="main-panel" data-color="orange">
        <nav class="navbar navbar-default navbar-fixed">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Log On</a>
				</div>
			</div>
		</nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
							<html>
								<body>
									Welcome <?php echo $_POST["FirstName"]; ?><br>
									Your email address is: <?php echo $_POST["Email"]; ?>
								</body>
							</html>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card ">
						
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card ">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
    </div>
</div>
</body>


</html>