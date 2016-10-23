<?php
    include("../dbTools/dbConnect.php");
    //include("dashboardTools/checkAndValidateLogin.php");

    session_start();

    $receiverCompanyName = $_SESSION['receiverDetails'] [0];
    $receiverFirstName = $_SESSION['receiverDetails'] [1];
    $receiverLastName = $_SESSION['receiverDetails'] [2];
    $receiverEmail = $_SESSION['receiverDetails'] [3];
    $receiverMobile = $_SESSION['receiverDetails'] [4];
    $receiverAddressLine1 = $_SESSION['receiverDetails'] [5];
    $receiverAddressLine2 = $_SESSION['receiverDetails'] [6];
    $receiverSuburb = $_SESSION['receiverDetails'] [7];
    $receiverState = $_SESSION['receiverDetails'] [8];
    $receiverPostcode = $_SESSION['receiverDetails'] [9];
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

                echo "<h4>Booking ID & Tracking Number: ".$_SESSION['bookingID']."</h4>";

                echo "<h4>Shiping To:</h4>";
                echo "<h5>Company: ".$receiverCompanyName."</h5>";
                echo "<h5>Contact: ".$receiverFirstName. " ".$receiverLastName."</h5>";
                if($receiverAddressLine2 != ""){
                    echo "<h5>Address: ".$receiverAddressLine1.", ".$receiverAddressLine2.", ".$receiverSuburb.", ".$receiverState." ".$receiverPostcode."</h5>";
                } else{
                    echo "<h5>Address: ".$receiverAddressLine1 .", ".$receiverSuburb. ", ".$receiverState." ".$receiverPostcode."</h5>";
                }


            ?>

            <br />
            <div class="row">
                <button type="button" class="btn btn-info btn-fill pull-left" name="showOrder" onclick="showOrder()" style="margin-right: 20px;">Show Full Order</button>
                <button type="button" class="btn btn-info btn-fill pull-left" name="printConsignment" onclick="showConsignmentNote()" style="margin-right: 20px;">Print Consignment</button>
                <button type="button" class="btn btn-info btn-fill pull-left" name="printTaxInvoice" onclick="showTaxInvoice()">Print Tax Invoice</button>
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
                        window.open('../../files/connote.php' ,'_blank');
                    }

                    function showTaxInvoice(){
                        window.open('../../files/taxInvoice.php' ,'_blank');
                    }

                    function goToDashboard(){
                        window.location.href = "dashboard.php";
                    }

                    function showOrder(){
                        window.open('bookingDetails.php' ,'_blank');
                    }
                </script>
            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>
</html>
