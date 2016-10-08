<?php
    include("../dbTools/dbConnect.php");
    //include("dashboardTools/checkAndValidateLogin.php");
    //include("bookPackageTools/inputSenderData.php");

    session_start();

    //Set variables
    //include ("dashboardTools/bookPackageTools/assignBookingVariables.php");


?>

<!doctype html>
<html lang="en">
<head>
	<title>Book Package</title>

    <?php include("includes/styling_scripts/meta.html"); ?>
    <?php include("includes/styling_scripts/css.html"); ?>
    <?php include("includes/styling_scripts/fonts-icons.html"); ?>
    <?php include("includes/styling_scripts/javascript.html"); ?>
</head>
<body>

<div class="wrapper">
    <?php include("includes/sidebar.html"); ?>

    <div class="main-panel">
        <?php include("includes/navbar-mobile-open.html"); ?>
        <a class="navbar-brand" href="#">Book a Package</a>
        <?php include("includes/navbar-mobile-close.html"); ?>


        <div class="content">
            <div class="container-fluid">
                <h3>Request Courier to Pickup Package</h3>
                <h4>Payment Type</h4>
                <p>See below for cost. Payment will be collected on pickup.</p>
                
                <?php
                    //$errors = array();
                    //Checks to see if data is set
                    $errorsExist = false;

                    if (isset($_POST["optradio"])) {

                        //require ("validateBookingDataFunctions.php");
                        //require ("validateBookingData.php");
                        //validateEmail($errors, $_POST, 'email');
                        // validate surname
                        // ...
                        if ($errorsExist) {
                            //echo '<h1>Invalid, correct the following errors:</h1>';
                            //foreach ($errors as $field => $error)
                            //    echo "$field $error</br>";
                            // redisplay the form
                            include ("dashboardTools/bookPackageTools/submitrequestform.php");

                        } else {

                            //$message = "TEST";
                            //echo "<script type='text/javascript'>alert('$message');</script>";
                            //echo $_SESSION['shipmentTrackingId'];
                            include ("dashboardTools/bookPackageTools/insertBookingIntoDatabase.php");
                            //echo $_SESSION['bookingID'];
                            //header("Location: bookingconfirmation.php");
                            //exit();
                        }
                    } else {
                        include ("dashboardTools/bookPackageTools/submitrequestform.php");
                    }
                ?>

                <style>
                    .special-subtotal-hr {
                        border: 0;
                        height: 1px;
                        background: #ec7d46;
                        background-image: linear-gradient(to right, #eca650, #ec7d46, #eca650);
                    }
                </style>
            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>
</html>
