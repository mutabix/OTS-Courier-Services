<?php
    include("../dbTools/dbConnect.php");
    //include("dashboardTools/checkAndValidateLogin.php");

    session_start();

    $orderNumber = $_SESSION['shipmentTrackingId'];

    $getOrderDetails = $dbConnection->prepare("SELECT * FROM bookings WHERE shipmentId = :shipmentId LIMIT 1");
    $getOrderDetails->bindParam(':shipmentId', $orderNumber);
    $getOrderDetails->execute();
    $orderDetail = $getOrderDetails->fetch();
    //echo $orderDetail['packageWeight'];

    $getCostToShip = $dbConnection->prepare("SELECT * FROM payments WHERE shipmentId = :shipmentId LIMIT 1");
    $getCostToShip->bindParam(':shipmentId', $orderNumber);
    $getCostToShip->execute();
    $costToShip = $getCostToShip->fetch();
    $_SESSION['taxInvoiceNumber'] = $costToShip['taxInvoiceID'];
    //echo $costToShip['taxInvoiceID'];

    $getTrackingDetails = $dbConnection->prepare("SELECT * FROM shipments WHERE trackingNumber = :shipmentId LIMIT 1");
    $getTrackingDetails->bindParam(':shipmentId', $orderNumber);
    $getTrackingDetails->execute();
    $trackingDetail = $getTrackingDetails->fetch();

    $getConnoteNumber = $dbConnection->prepare("SELECT connoteNumber FROM connotes WHERE shippingId = :shipmentId LIMIT 1");
    $getConnoteNumber->bindParam(':shipmentId', $orderNumber);
    $getConnoteNumber->execute();
    $connoteNumber = $getConnoteNumber->fetch();
    $_SESSION['connoteNumber'] = $connoteNumber['connoteNumber'];

    $packageTypeID = $orderDetail['packageWeight'];
    if($packageTypeID == 1){
      $packageDetail = "1kg Satchel";
    } else if($packageTypeID == 2){
      $packageDetail = "3kg Satchel";
    } else if($packageTypeID == 3){
      $packageDetail = "5kg Satchel";
    } else if($packageTypeID == 4){
      $packageDetail = "1kg Box";
    } else if($packageTypeID == 5){
      $packageDetail = "3kg Box";
    } else if($packageTypeID == 6){
      $packageDetail = "5kg Box";
    } else if($packageTypeID == 7){
      $packageDetail = "10kg Box";
    } else if($packageTypeID == 8){
      $packageDetail = "20kg Box";
    }


    $serviceTypeId = $orderDetail['serviceTypeID'];
    if($serviceTypeId == 1){
      $serviceType = "Standard";
    } else if($serviceTypeId == 2){
      $serviceType = "Express";
    } else if($serviceTypeId == 3){
      $serviceType = "Overnight";
    }

    $bookingMadeOn = new DateTime($orderDetail['bookingMadeOn']);
    $bookingMadeOn = $bookingMadeOn->format('d/m/Y');

    $shipmentStatusCode = $trackingDetail['shipmentStatusCode'];

        if($shipmentStatusCode == 0){
            $trackingStatus = "Pending";
        } else if ($shipmentStatusCode == 1){
            $trackingStatus = "Ready for Pickup";
        } else if ($shipmentStatusCode == 2){
            $trackingStatus = "Processing";
        } else if ($shipmentStatusCode == 3){
            $trackingStatus = "Ready for Delivery";
        } else if ($shipmentStatusCode == 4){
            $trackingStatus = "Delivered";
        }
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
        <?php 
            include("includes/navbar-mobile-open.html");
            echo "<a class='navbar-brand' href='#'>Order Details: ".$orderNumber."</a>";
            include("includes/navbar-mobile-close.html");
        ?>


        <div class="content">
            <div class="container-fluid">
            <h2>Order Status: <?php echo $trackingStatus ?></h2>
            <div class='row'>
                <button type="button" class="btn btn-info btn-fill pull-left" name="printConsignment" onclick="showConsignmentNote()" style="margin-right: 20px;">Print Consignment</button>
                <button type="button" class="btn btn-info btn-fill pull-left" name="printTaxInvoice" onclick="showTaxInvoice()">Print Tax Invoice</button>
            </div>
            <div class="row">
                <div class='card'>
                    <h4>&nbsp;&nbsp;Sending & Receiving</h4>
                    <table class='table table-hover shipmentDetails'>
                        <tr>
                            <th></th>
                            <th>Sender</th>
                            <th>Receiver</th>
                        </tr>
                        <tr>
                            <?php 
                                echo "<td>Company</td>";
                                echo "<td>".$orderDetail['senderCompanyName']."</td>";
                                echo "<td>".$orderDetail['receiverCompanyName']."</td>";
                            ?>
                        </tr>
                        <tr>
                            <?php
                                echo "<td>Contact Name</td>";
                                echo "<td>".$orderDetail['senderFirstName']." ".$orderDetail['senderLastName']."</td>";
                                echo "<td>".$orderDetail['receiverFirstName']." ".$orderDetail['receiverLastName']."</td>";
                            ?>
                        </tr>
                        <tr>
                            <?php
                                echo "<td>Phone Number</td>";
                                echo "<td>".$orderDetail['senderMobile']."</td>";
                                echo "<td>".$orderDetail['receiverMobile']."</td>";
                            ?>
                        </tr>
                        <tr>
                            <?php
                                echo "<td>Email</td>";
                                echo "<td>".$orderDetail['senderEmail']."</td>";
                                echo "<td>".$orderDetail['receiverEmail']."</td>";
                            ?>
                        </tr>
                        <tr>
                            <?php
                                echo "<td>Street Address</td>";
                                echo "<td>".$orderDetail['senderAddressLine1']." ".$orderDetail['senderAddressLine2']."</td>";
                                echo "<td>".$orderDetail['receiverAddressLine1']." ".$orderDetail['receiverAddressLine2']."</td>";
                            ?>
                        </tr>
                        <tr>
                            <?php
                                echo "<td>Suburb</td>";
                                echo "<td>".$orderDetail['senderSuburb']."</td>";
                                echo "<td>".$orderDetail['receiverSuburb']."</td>";
                            ?>
                        </tr>
                        <tr>
                            <?php
                                echo "<td>State</td>";
                                echo "<td>".$orderDetail['senderState']."</td>";
                                echo "<td>".$orderDetail['receiverState']."</td>";
                            ?>
                        </tr>
                        <tr>
                            <?php
                                echo "<td>Postcode</td>";
                                echo "<td>".$orderDetail['senderPostcode']."</td>";
                                echo "<td>".$orderDetail['receiverPostcode']."</td>";
                            ?>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class='card'>
                <h4>&nbsp;&nbsp;Package Details</h4>
                    <table class='table table-hover packageDetails'>
                        <tr>
                            <th>&nbsp;&nbsp;Qty</th>
                            <th>Package Type</th>
                            <th>Package Dimensions</th>
                            <th>Service Type</th>
                            <th>Total Value</th>
                            <th>Booking Made On</th>
                            <th>Cost to Ship</th>
                        </tr>
                        <tr>
                            <?php
                                echo "<td>".$orderDetail['noOfPackages']."</td>";
                                echo "<td>".$packageDetail."</td>";
                                echo "<td>".$orderDetail['packageWidth']."x".$orderDetail['packageLength']."x".$orderDetail['packageDepth']."</td>";
                                echo "<td>".$serviceType."</td>";
                                echo "<td> $".number_format((float)$orderDetail['totalValue'], 2, '.', '')."</td>";
                                echo "<td>".$bookingMadeOn."</td>";
                                echo "<td>".$costToShip['paymentAmount']."</td>";
                            ?>
                        </tr>
                    </table>
                </div>
            </div>
            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>
<style>
    .shipmentDetails, .packageDetails{
        font-size: 15px;
        width: 75%;
    }

    .shipmentDetails td{
        width: 25%;  
    }

    .shipmentDetails td:nth-child(1){
        width: 15% !important;
        font-weight: bold;
    }

    .card h4{
        padding-top: 10px;
        margin-left: 5px;
    }
    
</style>
<script>
    function showConsignmentNote(){
        window.open('../files/connote.php' ,'_blank');
    }

    function showTaxInvoice(){
        window.open('../files/taxInvoice.php' ,'_blank');
    }

    function goToDashboard(){
        window.location.href = "dashboard.php";
    }

    function showOrder(){
        window.open('bookingDetails.php' ,'_blank');
    }
</script>

</html>
