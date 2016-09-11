<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Home - OTS Courier Services</title>

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
	                    <img src="assets/img/logo-white.png" alt="On The Spot Courier Services Logo" rel="tooltip" data-placement="bottom" data-html="true">
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
	            <div class="title"><h2>Get Shipping Rates</h2></div>
	            	<div id='col-md-8'>
	            		<div class='row'>
		            		<div class="col-md-3">
								<label for='type'>Package Type</label>
								<select name="type" class="form-control" id='packageTypeSelect' onchange="calculateCost()">
									<option selected disabled>Select Package Type</option>
									<option value="1">1kg Satchel</option>
									<option value="2">3kg Satchel</option>
									<option value="3">5kg Satchel</option>
									<option value="4">1kg Box</option>
									<option value="5">3kg Box</option>
									<option value="6">5kg Box</option>
									<option value="7">10kg Box</option>
									<option value="8">20kg Box</option>
								</select>			
							</div>
							<div class="col-md-3">
								<label for='type'>Service Type</label>
								<br>
								<select name="service_type" class="form-control" id='serviceTypeSelect' onchange="calculateCost()">
									<option selected disabled>Select Service</option>
									<option value="1">Standard 2-5 Days</option>
									<option value="2">Express 1-3 Days</option>
									<option value="3">Overnight</option>
								</select>
							</div>

							<div class="col-md-3">
								<label for='pickupLocation'>Pickup Location</label>
								<select name="pickup_state" class="form-control" pickup onchange="calculateCost()" id='pickupLocationSelect'>
									<option selected disabled>Select State</option>
									<option value="1">Australian Capital Territory</option>
									<option value="2">New South Wales</option>
									<option value="3">Northen Territory</option>
									<option value="4">Queensland</option>
									<option value="5">South Australia</option>
									<option value="6" disabled>Tasmania</option>
									<option value="7">Victoria</option>
									<option value="8">Western Australia</option>
								</select>
							</div>

							<div class="col-md-3">
								<label for='deliveryLocation'>Delivery Location</label>
								<select name="delivery_state" class="form-control" onchange="calculateCost()" id='deliveryLocationSelect'>
									<option selected disabled>Select State</option>
									<option value="1">Australian Capital Territory</option>
									<option value="2">New South Wales</option>
									<option value="3">Northen Territory</option>
									<option value="4">Queensland</option>
									<option value="5">South Australia</option>
									<option value="6" disabled>Tasmania</option>
									<option value="7">Victoria</option>
									<option value="8">Western Australia</option>
								</select>
							</div>
						</div>

						<h4>Package Specification</h4>

						<div class='row'>
							<div class="col-md-2">
								<label for='height'>Height (cm)</label>
								<input type="number" name="height" id='heightInput' class="form-control" onkeyup="calculateCost()" required>
							</div>
							<div class="col-md-2">
								<label for='width'>Width (cm)</label>
								<input type="number" name="width" id='widthInput' class="form-control" onkeyup="calculateCost()" required>
							</div>
							<div class="col-md-2">
								<label for='length'>Length (cm)</label>
								<input type="number" name="length" id='lengthInput' class="form-control" onkeyup="calculateCost()" required>
							</div>
						</div>


	            	</div>

	            	<br/>

	            	<div id='col-md-8'>
	            		<h3>Shipping Rate:</h3>
	            		<h5 id='packageTypeLabel'>Package Type: --</h5>
	            		<h5 id='packageTypeWeight'>Package Weight: --</h5>
	            		<h5 id='serviceTypeLabel'>ServiceType: --</h5>
	            		<h5 id='deliveryLocationCost'>Delivery Location: --</h5>
	            		<h5 id='packageSpecCost'>Package Cost: --</h5>

            			<h4 id='subtotal'>Subtotal: --</h4>
            			<h4 id='gst'>GST Included: --</h4>

            			<hr>

            			<h3 id='totalCost'>Total Cost: --</h3>

            			<h3>


	            		


	            		<script type="text/javascript">
	            		//var serviceTypeCost;
	            		//var packageTypeCost;

	            		function calculateCost(){
	            			var packageTypeCost = 0.0;
	            			var serviceTypeCost = 0.0;
	            			var deliveryLocationCost = 0.0;

	            			var packageTypeID = 0;
	            			var serviceTypeID = 0;
	            			var pickupLocationID = 0;
	            			var deliveryLocationID = 0;
	            			var packageSpecCost = 0.0;

	            			var calculatePackageSpecs;
	            			var heightInputValue = 0;
	            			var widthInputValue = 0;
	            			var lengthInputValue = 0;

	            			var packageTypeSelected = document.getElementById("packageTypeSelect");
            				var packageTypeID = packageTypeSelected.options[packageTypeSelected.selectedIndex].value;
            				
            				var flatRateSatchelCost = 15.0;
            				var flatRateBoxCost = 25.0;

            				var heightInputValue = document.getElementById("heightInput").value;
            				var widthInputValue = document.getElementById("widthInput").value;
            				var lengthInputValue = document.getElementById("lengthInput").value;

            				
        					if(heightInputValue > 0 && widthInputValue > 0 && lengthInputValue > 0){
            					if(heightInputValue < 101 && widthInputValue < 101 && lengthInputValue < 101){
            						packageSpecCost = (heightInputValue * 0.3) + (widthInputValue * 0.3) + (lengthInputValue * 0.3);
            						packageSpecCost = Math.round(packageSpecCost*2)/2;
            						document.getElementById("packageSpecCost").innerHTML = "Package Cost: $" + packageSpecCost;
            					}
        					}

            				if(packageTypeID == 1){
            					packageTypeCost = flatRateSatchelCost + 0.0;
								document.getElementById("packageTypeLabel").innerHTML = "Package Type: Satchel (+15.00)";
								document.getElementById("packageTypeWeight").innerHTML = "Package Weight: 1kg (+ $0.00)";
								document.getElementById("heightInput").disabled = true;
								document.getElementById("widthInput").disabled = true;
								document.getElementById("lengthInput").disabled = true;
								document.getElementById("heightInput").value = "0";
								document.getElementById("widthInput").value = "0";
								document.getElementById("lengthInput").value = "0";
								calculatePackageSpecs = false;

            				} else if(packageTypeID == 2){
            					packageTypeCost = flatRateSatchelCost + 5.0;
								document.getElementById("packageTypeLabel").innerHTML = "Package Type: Satchel (+15.00)";
								document.getElementById("packageTypeWeight").innerHTML = "Package Weight: 3kg (+ $5.00)";
								document.getElementById("heightInput").disabled = true;
								document.getElementById("widthInput").disabled = true;
								document.getElementById("lengthInput").disabled = true;
								document.getElementById("heightInput").value = "0";
								document.getElementById("widthInput").value = "0";
								document.getElementById("lengthInput").value = "0";
								calculatePackageSpecs = false;

            				} else if(packageTypeID == 3){
            					packageTypeCost = flatRateSatchelCost + 7.5;
								document.getElementById("packageTypeLabel").innerHTML = "Package Type: Satchel (+15.00)";
								document.getElementById("packageTypeWeight").innerHTML = "Package Weight: 5kg (+ $7.50)";
								document.getElementById("heightInput").disabled = true;
								document.getElementById("widthInput").disabled = true;
								document.getElementById("lengthInput").disabled = true;
								document.getElementById("heightInput").value = "0";
								document.getElementById("widthInput").value = "0";
								document.getElementById("lengthInput").value = "0";
								calculatePackageSpecs = false;

            				} else if(packageTypeID == 4){
            					packageTypeCost = flatRateBoxCost + 0.0;
            					document.getElementById("packageTypeLabel").innerHTML = "Package Type: Box (+$25.00)";
            					document.getElementById("packageTypeWeight").innerHTML = "Package Weight: 1kg (+ $0.00)";
            					document.getElementById("heightInput").disabled = false;
								document.getElementById("widthInput").disabled = false;
								document.getElementById("lengthInput").disabled = false;

								if(heightInput == 0 && widthInput == 0 && lengthInput == 0){
									document.getElementById("heightInput").value = "";
									document.getElementById("widthInput").value = "";
									document.getElementById("lengthInput").value = "";
								}

								calculatePackageSpecs = true;

            				} else if(packageTypeID == 5){
            					packageTypeCost = flatRateBoxCost + 5.0;
            					document.getElementById("packageTypeLabel").innerHTML = "Package Type: Box (+$25.00)";
            					document.getElementById("packageTypeWeight").innerHTML = "Package Weight: 3kg (+ $5.00)";
            					document.getElementById("heightInput").disabled = false;
								document.getElementById("widthInput").disabled = false;
								document.getElementById("lengthInput").disabled = false;
								if(heightInput == 0 && widthInput == 0 && lengthInput == 0){
									document.getElementById("heightInput").value = "";
									document.getElementById("widthInput").value = "";
									document.getElementById("lengthInput").value = "";
								}
								calculatePackageSpecs = true;

            				} else if(packageTypeID == 6){
            					packageTypeCost = flatRateBoxCost + 10.0;
            					document.getElementById("packageTypeLabel").innerHTML = "Package Type: Box (+$25.00)";
            					document.getElementById("packageTypeWeight").innerHTML = "Package Weight: 5kg (+ $10.00)";
            					document.getElementById("heightInput").disabled = false;
								document.getElementById("widthInput").disabled = false;
								document.getElementById("lengthInput").disabled = false;
								if(heightInput == 0 && widthInput == 0 && lengthInput == 0){
									document.getElementById("heightInput").value = "";
									document.getElementById("widthInput").value = "";
									document.getElementById("lengthInput").value = "";
								}
								calculatePackageSpecs = true;

            				} else if(packageTypeID == 7){
            					packageTypeCost = flatRateBoxCost + 25.0;
            					document.getElementById("packageTypeLabel").innerHTML = "Package Type: Box (+$25.00)";
            					document.getElementById("packageTypeWeight").innerHTML = "Package Weight: 10kg (+ $25.00)";
            					document.getElementById("heightInput").disabled = false;
								document.getElementById("widthInput").disabled = false;
								document.getElementById("lengthInput").disabled = false;
								if(heightInput == 0 && widthInput == 0 && lengthInput == 0){
									document.getElementById("heightInput").value = "";
									document.getElementById("widthInput").value = "";
									document.getElementById("lengthInput").value = "";
								}
								calculatePackageSpecs = true;

            				} else if(packageTypeID == 8){
            					packageTypeCost = flatRateBoxCost + 45.0;
            					document.getElementById("packageTypeLabel").innerHTML = "Package Type: Box (+$25.00)";
            					document.getElementById("packageTypeWeight").innerHTML = "Package Weight: 20kg (+ $45.00)";
            					document.getElementById("heightInput").disabled = false;
								document.getElementById("widthInput").disabled = false;
								document.getElementById("lengthInput").disabled = false;
								if(heightInput == 0 && widthInput == 0 && lengthInput == 0){
									document.getElementById("heightInput").value = "";
									document.getElementById("widthInput").value = "";
									document.getElementById("lengthInput").value = "";
								}
								calculatePackageSpecs = true;
            				}

            				var serviceTypeSelected = document.getElementById("serviceTypeSelect");
            				var serviceTypeID = serviceTypeSelected.options[serviceTypeSelected.selectedIndex].value;
            				//var serviceTypeCost = 0.0;

            				if(serviceTypeID == 1){
            					serviceTypeCost = 0.0;
								document.getElementById("serviceTypeLabel").innerHTML = "Service Type: Standard (+ $0.00)";
            				} else if(serviceTypeID == 2){
            					serviceTypeCost = 5.0;
            					document.getElementById("serviceTypeLabel").innerHTML = "Service Type: Express (+ $5.00)";
            				} else if(serviceTypeID == 3){
            					serviceTypeCost = 15.0;
            					document.getElementById("serviceTypeLabel").innerHTML = "Service Type: Overnight (+ $15.00)";
            				}


            				var pickupLocation = document.getElementById("pickupLocationSelect");
            				var pickupLocationID = pickupLocation.options[pickupLocation.selectedIndex].value;

            				var deliveryLocation = document.getElementById("deliveryLocationSelect");
            				var deliveryLocationID = deliveryLocation.options[deliveryLocation.selectedIndex].value;

            				if(pickupLocationID > 0 && deliveryLocationID > 0){
	            				if(pickupLocationID == deliveryLocationID){
	            					deliveryLocationCost = 0.0;
									document.getElementById("deliveryLocationCost").innerHTML = "Delivery Location: Intrastate (+ $0.00)";
	            				} else {
	            					deliveryLocationCost = 15.0;
	            					document.getElementById("deliveryLocationCost").innerHTML = "Delivery Location: Interstate (+ $15.00)";
	            				}
            				}         				


        					if(calculatePackageSpecs && (heightInputValue > 0 && widthInputValue > 0 && lengthInputValue > 0 && heightInputValue < 101 && widthInputValue < 101 && lengthInputValue < 101)){
	            				if(packageTypeID > 0 && serviceTypeID > 0 && pickupLocationID > 0 && deliveryLocationID > 0){
		            				var totalCost = serviceTypeCost + packageTypeCost + deliveryLocationCost + packageSpecCost;
		            				var subtotalCost = totalCost * 0.9;
		            				var gst = totalCost - subtotalCost;

									document.getElementById("subtotal").innerHTML = "Subtotal: $" + subtotalCost;
									document.getElementById("gst").innerHTML = "GST Included: $" + gst;
									document.getElementById("totalCost").innerHTML = "Total Cost: $" + totalCost;

	            				} else if(!calculatePackageSpecs && (heightInputValue == 0 && widthInputValue == 0 && lengthInputValue == 0)){
        							if(packageTypeID > 0 && serviceTypeID > 0 && pickupLocationID > 0 && deliveryLocationID > 0){
			            				var totalCost = serviceTypeCost + packageTypeCost + deliveryLocationCost + packageSpecCost;
			            				var subtotalCost = totalCost * 0.9;
			            				var gst = totalCost - subtotalCost;

										document.getElementById("subtotal").innerHTML = "Subtotal: $" + subtotalCost;
										document.getElementById("gst").innerHTML = "GST Included: $" + gst;
										document.getElementById("totalCost").innerHTML = "Total Cost: $" + totalCost;
		            				}
        						}
        					}
            			}
	            		</script>

	            	
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
