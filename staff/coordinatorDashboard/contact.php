<?php
    session_start();
    include("../../dbTools/dbConnect.php");
	include("checkLogin.php");
?>

<!doctype html>
<html lang="en">
<head>
	<title>Dashboard</title>

    <?php include("includes/styling_scripts/meta.html"); ?>
    <?php include("includes/styling_scripts/css.html"); ?>
    <?php include("includes/styling_scripts/fonts-icons.html"); ?>
    <?php include("includes/styling_scripts/javascript.html"); ?>
</head>
<body>

<div class="wrapper">
    <?php include("includes/sidebar.html"); ?>

    <div class="main-panel">
        <?php 
			$customerData = $dbConnection->prepare('SELECT customerID, companyName, firstName, lastName, email, mobileNumber, addressLine1, addressLine2, suburb, state, postcode
			FROM customers
			WHERE customerID = '.$_GET["id"].'');
			$customerData->execute();
			
			foreach ($customerData as $customer)
			{
				$firstName = $customer["firstName"];
				$lastName = $customer["lastName"];
				$companyName = $customer["companyName"];
				$email = $customer["email"];
				$mobileNumber = $customer["mobileNumber"];
				
				$addressLine1 = $customer["addressLine1"];
				$addressLine2 = $customer["addressLine2"];
				$suburb = $customer["suburb"];
				$state = $customer["state"];
				$postcode = $customer["postcode"];
			}
			

			
            include("includes/navbar-mobile-open.html");
            
            echo "<a class='navbar-brand'>Customer Profile: ".$firstName." ".$lastName."</a>";
            
            include("includes/navbar-mobile-close.html"); 
        ?>


        <div class="content">
            <div class="container-fluid">
                <div class='row'>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Customer Details</h4>
                            </div>
                            <div class="content">
                                <?php
                                    if(!($companyName == "")){
                                        echo "<h5>Company Name: ".$companyName."</h5>";
                                    }

                                    echo "<h5>First Name: ".$firstName."</h5>";
                                    echo "<h5>Last Name: ".$lastName."</h5>";
                                    echo "<h5>Email: ".$email."</h5>";
                                    echo "<h5>Mobile: 0".$mobileNumber."</h5>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Service Address</h4>
                            </div>
                            <div class="content">
                                <?php
                                    echo "<h5>Address Line 1: ".$addressLine1."</h5>";
                                    if(!($addressLine2 == "")){
                                        echo "<h5>Address Line 2: ".$addressLine2."</h5>";
                                    }
                                   
                                    echo "<h5>Suburb: ".$suburb."</h5>";
                                    echo "<h5>State: ".$state."</h5>";
                                    echo "<h5>Postcode: ".$postcode."</h5>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Billing Address</h4>
                            </div>
                            <div class="content">
                                <?php
                                    echo "<h5>Address Line 1: ".$addressLine1."</h5>";
                                    if(!($addressLine2 == "")){
                                        echo "<h5>Address Line 2: ".$addressLine2."</h5>";
                                    }
                                   
                                    echo "<h5>Suburb: ".$suburb."</h5>";
                                    echo "<h5>State: ".$state."</h5>";
                                    echo "<h5>Postcode: ".$postcode."</h5>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>


                <h5>Edit Contact</h5>


            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>


</html>
