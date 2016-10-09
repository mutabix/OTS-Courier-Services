<?php
    include("dbTools/dbConnect.php");

    $trackingNumber = $_POST["trackingNumber"];
    $_POST["trackingNumber"] = "";

    $trackingNumberExists;

    if(isset($trackingNumber)){
    	$trackingNumberExists = false;
    	$checkTracking = $dbConnection->prepare("SELECT * FROM shipments WHERE trackingNumber = :trackingNumber");

		$checkTracking->bindParam(':trackingNumber', $trackingNumber);

		try {
        	$checkTracking->execute();

    	} catch(Exception $error) {
	        echo 'Exception -> ';
	        var_dump($error->getMessage());
    	}

    	$trackingDetails = $checkTracking->fetch();
    	$retrievedTrackingNumber = $trackingDetails['trackingNumber'];
    	$shipmentStatusCode = $trackingDetails['shipmentStatusCode'];
    	$pendingBool = $trackingDetails['pendingBool'];
    	$pendingDate = $trackingDetails['pendingDate'];
    	$pickupBool = $trackingDetails['pickupBool'];
    	$pickupDate = $trackingDetails['pickupDate'];
    	$processingBool = $trackingDetails['processingBool'];
    	$processingDate = $trackingDetails['processingDate'];
    	$deliveryBool = $trackingDetails['deliveryBool'];
    	$deliveryDate = $trackingDetails['deliveryDate'];

    	if(isset($retrievedTrackingNumber)){
    		$trackingNumberExists = true;
    	}
    }
    


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Tracking - OTS Courier Services</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/template-styles.min.css" rel="stylesheet"/>
	<link href="assets/css/custom-styles.css" rel="stylesheet" />

</head>

<body class="profile-page">

<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
	<div class="container">
        <div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
	        	<span class="sr-only">Toggle navigation</span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	    	</button>
	    	<a href="index.php">
	        	<div class="logo-container">
	                <div class="logo">
	                    <img src="assets/img/logo-white.png" alt="On The Spot Courier Services Logo" rel="tooltip" data-placement="bottom"data-html="true">
	                </div>
				</div>
	      	</a>
	    </div>

	    <div class="collapse navbar-collapse" id="navigation-index">
	    	<ul class="nav navbar-nav navbar-right">
	    		<li><a href="track.php">Track</a></li>
	    		<li><a href="estimate.php">Calculate Shipping</a></li>
				<li><a href="dashboard/dashboard.php">Dashboard</a></li>
				<li><a href="contact.php">Contact Us</a></li>


	    	</ul>
	    </div>
	</div>
</nav>
<!-- End Navbar -->

<div class="wrapper">
	<div class="header header-filter" style="background-image: url('assets/img/full_page_bkg_img.png');"></div>
	<div class="main main-raised">
		<div class="section section-basic">
	    	<div class="container">
	            <div class="title"><h2>Track a Package</h2></div>
	            	<div class='col-md-12'>
			            	
			            	<div id="tracking-details">

			            	<?php
			            		if(isset($trackingNumber)) {
			            			if(strlen((string)$trackingNumber < 2)){
			            				echo "Tracking Number Not Valid";
			            				include("trackform.php");

			            			} else if (!$trackingNumberExists){
			            				echo "Tracking Number Does Not Exist";
			            				include("trackform.php");

			            			} else {
			            				include("trackform.php");
			            			}


			            		} else {
			            			include("trackform.php");
			            		}


			            	?>

			            	
			            	</div>
	            	</div>

	            	<br>

	            	<div class='col-md-12' style='text-align: center;'>
	            		<br>
	            		<br>

	            		<div class="quick-links">
							<div class="row">
								<?php
									if($trackingNumberExists){
										if($shipmentStatusCode == 0){
											if($pendingBool == 0){
												echo "<div class='col-md-3'>";
													echo "<div class='info'>";
														echo "<div class='icon icon-primary'>";
															echo "<i class='fa fa-spinner' aria-hidden='true' style='font-size: 100px'></i>";
														echo "</div>";
														echo "<h4 class='info-title'>Pending</h4>";
													echo "</div>";
					                    		echo "</div>";
				                    		} else if($pendingBool == 1){
				                    			echo "<div class='col-md-3'>";
													echo "<div class='info'>";
														echo "<div class='icon icon-primary'>";
															echo "<i class='fa fa-spinner' aria-hidden='true' style='font-size: 100px'></i>";
														echo "</div>";
														echo "<h4 class='info-title'>Pending Complete</h4>";
														echo "<h4 class='info-title'>".$pendingDate."</h4>";
													echo "</div>";
					                    		echo "</div>";
				                    		}
				                    	}

				                    	if($shipmentStatusCode == 1){
				                    		if($pickupBool == 0){
				                    			echo "<div class='col-md-3'>";
													echo "<div class='info'>";
														echo "<div class='icon icon-primary'>";
															echo "<i class='fa fa-truck' aria-hidden='true' style='font-size: 100px'></i>";
														echo "</div>";
														echo "<h4 class='info-title'>Enroute to Pickup</h4>";
													echo "</div>";
					                    		echo "</div>";
				                    		} else if($pickupBool == 1){
				                    			echo "<div class='col-md-3'>";
													echo "<div class='info'>";
														echo "<div class='icon icon-primary'>";
															echo "<i class='fa fa-truck' aria-hidden='true' style='font-size: 100px'></i>";
														echo "</div>";
														echo "<h4 class='info-title'>Package Picked Up</h4>";
														echo "<h4 class='info-title'>".$pendingDate."</h4>";
													echo "</div>";
					                    		echo "</div>";
				                    		}
				                    	}

				                    	if($shipmentStatusCode == 2){
				                    		if($processingBool == 0){
				                    			echo "<div class='col-md-3'>";
													echo "<div class='info'>";
														echo "<div class='icon icon-primary'>";
															echo "<i class='fa fa-cogs' aria-hidden='true' style='font-size: 100px'></i>";
														echo "</div>";
														echo "<h4 class='info-title'>Processing</h4>";
													echo "</div>";
					                    		echo "</div>";
				                    		} else if($processingBool == 1){
				                    			echo "<div class='col-md-3'>";
													echo "<div class='info'>";
														echo "<div class='icon icon-primary'>";
															echo "<i class='fa fa-cogs' aria-hidden='true' style='font-size: 100px'></i>";
														echo "</div>";
														echo "<h4 class='info-title'>Package Processed</h4>";
														echo "<h4 class='info-title'>".$processingDate."</h4>";
													echo "</div>";
					                    		echo "</div>";
				                    		}
				                    	}

				                    	if($shipmentStatusCode == 3){
				                    		if($deliveryBool == 0){
				                    			echo "<div class='col-md-3'>";
													echo "<div class='info'>";
														echo "<div class='icon icon-primary'>";
															echo "<i class='fa fa-truck' aria-hidden='true' style='font-size: 100px'></i>";
														echo "</div>";
														echo "<h4 class='info-title'>Onboard with Driver for Delivery</h4>";
													echo "</div>";
					                    		echo "</div>";
				                    		} else if($deliveryBool == 1){
				                    			echo "<div class='col-md-3'>";
													echo "<div class='info'>";
														echo "<div class='icon icon-primary'>";
															echo "<i class='fa fa-truck' aria-hidden='true' style='font-size: 100px'></i>";
														echo "</div>";
														echo "<h4 class='info-title'>Package Delivered</h4>";
														echo "<h4 class='info-title'>".$deliveryDate."</h4>";
													echo "</div>";
					                    		echo "</div>";
				                    		}
			                    		}
									}

		                    		
								?>
			                    
			                    <!--
			            		FONT AWESOME ICONS 
			            		PENDING - ellipsis-h or spinner
			            		ENROUTE TO PICKUP - truck
			            		WITH DRIVER FOR PROCESSING - truck
			            		PROCESSING @ FACILITY - cogs
			            		WITH DRIVER FOR DELIVERY - truck
			            	-->
			                    
			                    
			                </div>
						</div>

	            	</div>			
	    	</div>
	    </div>
	</div>
    <footer class="footer">
	    <div class="container">
	        <nav class="pull-left">
	            <ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="track.php">Track</a></li>
					<li><a href="estimate.php">Calculate Shipping</a></li>
					<li><a href="dashboard.php">Dashboard</a></li>
					<li><a href="contactus.php">Contact Us</a></li>
	            </ul>
	        </nav>
	        <div class="copyright pull-right">
	            &copy; 2016, OTS Courier Services
	        </div>
	    </div>
	</footer>
</div>

</body>
	<!--   Core JS Files   -->
	<script src="assets/js/jquery.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="assets/js/nouislider.min.js" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="assets/js/material-kit.js" type="text/javascript"></script>


</html>
