<?php
    session_start();
    include("../dbTools/dbConnect.php");
    include("../dbTools/checkLogin.php");


    $email = $_SESSION['username'];


    $getAccountDetails = $dbConnection->prepare("SELECT * FROM customers WHERE email = :email");
    $getAccountDetails->bindParam(':email', $email);

    try {
        $getAccountDetails->execute();

    } catch(Exception $error) {
        echo 'Exception -> ';
        var_dump($error->getMessage());
    }

    $accountDetails = $getAccountDetails->fetch();
    $companyName = $accountDetails['companyName'];
    $firstName = $accountDetails['firstName'];
    $lastName = $accountDetails['lastName'];
    $email = $accountDetails['email'];
    $mobileNumber = $accountDetails['mobileNumber'];
    $addressLine1 = $accountDetails['addressLine1'];
    $addressLine2 = $accountDetails['addressLine2'];
    $suburb = $accountDetails['suburb'];
    $state = $accountDetails['state'];
    $postcode = $accountDetails['postcode'];

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
            include("includes/navbar-mobile-open.html");
            
            echo "<a class='navbar-brand'>My Profile: ".$firstName." ".$lastName."</a>";
            
            include("includes/navbar-mobile-close.html"); 
        ?>


        <div class="content">
            <div class="container-fluid">
                <div class='row'>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">My Details</h4>
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


                <h5>If you would like to change any of your details please email info@otsc.com.au.</h5>
                <h5>Sorry for any inconvenience.</h5>


            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>


</html>
