<?php
    include("../dbTools/dbConnect.php");
    //include("dashboardTools/checkAndValidateLogin.php");

    session_start();
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
        <a class="navbar-brand" href="#">Booking Confirmed</a>
        <?php include("includes/navbar-mobile-close.html"); ?>


        <div class="content">
            <div class="container-fluid">
            <?php

                echo "<h4>Booking ID: ".$_SESSION['bookingID']."</h4>";
                echo "<h4>Tracking Number: ".$_SESSION['trackingNumber']." </h4>";
            ?>

            <br />
            <div class="row">
                <button type="button" class="btn btn-info btn-fill pull-left" name="printConsignment" onclick="showConsignmentNote()" style="margin-right: 20px;">Print Consignment</button>
                <button type="button" class="btn btn-info btn-fill pull-left" onclick="showTaxInvoice()" name="printTaxInvoice">Print Tax Invoice</button>
            </div>
            <br /><br />
            <div class="row">
                <button type="button" class="btn btn-info btn-fill pull-left" name="toDashboard" onclick="goToDashboard()">Return to Dashboard</button>
            </div>

                <style>
                    .special-subtotal-hr {
                        border: 0;
                        height: 1px;
                        background: #ec7d46;
                        background-image: linear-gradient(to right, #eca650, #ec7d46, #eca650);
                    }
                </style>
                <script>
                    function showConsignmentNote(){
                        window.open('files/connote.php' ,'_blank');
                    }

                    function showTaxInvoice(){
                        window.open('files/taxInvoice.php' ,'_blank');
                    }

                    function goToDashboard(){
                        window.location.href = "dashboard.php";
                    }
                </script>
            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>
</html>
