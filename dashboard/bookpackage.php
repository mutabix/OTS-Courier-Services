<?php
    include("../dbTools/dbConnect.php");
    //include("dashboardTools/checkAndValidateLogin.php");
    include("bookPackageTools/inputSenderData.php");

    session_start();
    //Set variables
    include ("dashboardTools/bookPackageTools/assignBookingVariables.php");





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

                <ul class="nav nav-tabs">
                    <li class="active"><a href="#senders-details-tab">Senders Details</a></li>
                    <li><a href="#receivers-details-tab">Receivers Details</a></li>
                    <li><a href="#package-details-tab">Package Details</a></li>
                    <li><a href="#extras-tab">Extras</a></li>
                    <li><a href="#submit-tab">Submit</a></li>
                </ul>

                <?php
                    $errors = array();
                    //Checks to see if data is set
                    if (isset($senderCompanyName) && isset($senderFirstName) && isset($senderLastName) && isset($senderEmail) && isset($senderMobile) && isset($senderAddressLine1) && isset($senderSuburb) && isset($senderState) && isset($senderPostcode) && isset($receiverCompanyName) && isset($receiverFirstName) && isset($receiverLastName) && isset($receiverEmail) && isset($receiverMobile) && isset($receiverAddressLine1) && isset($receiverSuburb) && isset($receiverState) && isset($receiverPostcode) && isset($noOfPackages) && isset($packageWeight) && isset($packageWidth) && isset($packageLength) && isset($packageDepth) && isset($serviceTypeID) && isset($totalValue) && isset($shipDate) && isset($_POST["detailsCorrectCheckbox"]) && isset($_POST["termsAcceptCheckbox"])) {

                        require ("validateBookingDataFunctions.php");
                        require ("validateBookingData.php");
                        //validateEmail($errors, $_POST, 'email');
                        // validate surname
                        // ...
                        if ($errors) {
                            echo '<h1>Invalid, correct the following errors:</h1>';
                            //foreach ($errors as $field => $error)
                            //    echo "$field $error</br>";
                            // redisplay the form
                            include ("dashboardTools/bookPackageTools/bookingform.php");

                        } else {

                            //echo 'form submitted successfully with no errors'; //Debugging Tool
                            include ("dashboardTools/bookPackageTools/insertBookingIntoDatabase.php");
                            header("Location: submitrequestpickup.php");
                            exit();
                        }
                    } else {
                        include ("dashboardTools/bookPackageTools/bookingform.php");
                    }
                ?>

                <script>
                    $(document).ready(function(){
                        $(".nav-tabs a").click(function(){
                            $(this).tab('show');
                        });
                    });

                    $(document).ready(function(){
                        $(".nav-buttons button").click(function(){
                            $(this).tab('show');
                        });
                    });
                </script>
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
