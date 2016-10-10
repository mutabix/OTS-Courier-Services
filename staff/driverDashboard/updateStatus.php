<?php
    include("../../dbTools/dbConnect.php");
    session_start();

    $connoteNumber = $_POST["connoteNumber"];

    if(isset($connoteNumber)){
        $connoteNumberExists = false;
        $checkConnote = $dbConnection->prepare("SELECT * FROM connotes WHERE connoteNumber = :connoteNumber");
        $checkConnote->bindParam(':connoteNumber', $connoteNumber);

        try {
            $checkConnote->execute();
        } catch(Exception $error) {
            echo 'Exception -> ';
            var_dump($error->getMessage());
        }

        $connoteDetails = $checkConnote->fetch();
        $shippingId = $connoteDetails['shippingId'];
        $_SESSION['shippingId'] = $shippingId;
        $_SESSION['connoteNumber'] = $connoteNumber;

        if(isset($shippingId)){
            $connoteNumberExists = true;
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
	<title>Employee Dashboard</title>

    <?php include("includes/styling_scripts/meta.html"); ?>
    <?php include("includes/styling_scripts/css.html"); ?>
    <?php include("includes/styling_scripts/fonts-icons.html"); ?>
    <?php include("includes/styling_scripts/javascript.html"); ?>
</head>
<body>

<div class="wrapper">
    <?php include("includes/sidebar.html"); ?>

    <div class="main-panel">
        <?php include("includes/navbar-mobile-open.html");
        echo "<a class='navbar-brand' href=''>Update Status";
        if($connoteNumberExists){
            echo ": CON-".$connoteNumber."</a>";
        } else{
            echo "</a>";
        }
        include("includes/navbar-mobile-close.html"); ?>


        <div class="content">
            <div class="container-fluid">
            <?php
                if(isset($connoteNumber)) {
                    if(strlen((string)$connoteNumber < 2)){
                        echo "Tracking Number Not Valid";
                        include("updateStatusForm.php");

                    } else if (!$connoteNumberExists){
                        include("updateStatusForm.php");
                        echo "<br><br><br><br>";
                        echo "<p><strong>Tracking Number Does Not Exist</strong></p>";

                    } else {
                        //Successful
                        include("updateStatusForm.php");

                        $getOrderDetails = $dbConnection->prepare("SELECT * FROM bookings WHERE shipmentId = :shipmentId LIMIT 1");
                        $getOrderDetails->bindParam(':shipmentId', $shippingId);
                        $getOrderDetails->execute();
                        $orderDetail = $getOrderDetails->fetch();

                        $getCostToShip = $dbConnection->prepare("SELECT * FROM payments WHERE shipmentId = '1475992365' LIMIT 1");
                        $getCostToShip->bindParam(':shipmentId', $shippingId);
                        $getCostToShip->execute();
                        $costToShip = $getCostToShip->fetch();
                        $_SESSION['taxInvoiceNumber'] = $costToShip['taxInvoiceID'];

                        $getTrackingDetails = $dbConnection->prepare("SELECT * FROM shipments WHERE trackingNumber = :shipmentId LIMIT 1");
                        $getTrackingDetails->bindParam(':shipmentId', $shippingId);
                        $getTrackingDetails->execute();
                        $trackingDetail = $getTrackingDetails->fetch();

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

                        echo "<h4>Current Status: ".$trackingStatus."</h4>";

                        echo "<h5>Change Status of Package</h5>";
                        




                        echo "<form action='changeShipmentStatus.php' method='POST'>";
                        if($shipmentStatusCode == 0){
                            echo "<p>Driver Action cannot be taken at this time, please contact an admin to change status</p>";
                            echo "<label class='checkbox-inline'><input type='checkbox' value='' name='packagePickedUp' disabled>Package Picked Up</label>";
                            echo "<label class='checkbox-inline'><input type='checkbox' value='' name='packageDelivered' disabled>Package Delivered</label>";
                        } else if ($shipmentStatusCode == 1){
                            $trackingStatus = "Ready for Pickup";
                            echo "<label class='checkbox-inline'><input type='checkbox' value='' name='packagePickedUp'>Package Picked Up</label>";
                            echo "<label class='checkbox-inline'><input type='checkbox' value='' name='packageDelivered' disabled>Package Delivered</label>";
                        } else if ($shipmentStatusCode == 2){
                            echo "<p>Driver Action cannot be taken at this time, please contact an admin to change status</p>";
                            echo "<label class='checkbox-inline'><input type='checkbox' value='' name='packagePickedUp' disabled>Package Picked Up</label>";
                            echo "<label class='checkbox-inline'><input type='checkbox' value='' name='packageDelivered' disabled>Package Delivered</label>";
                        } else if ($shipmentStatusCode == 3){
                            echo "<label class='checkbox-inline'><input type='checkbox' value='' name='packagePickedUp' disabled>Package Picked Up</label>";
                            echo "<label class='checkbox-inline'><input type='checkbox' value='' name='packageDelivered'>Package Delivered</label>";
                        } else if ($shipmentStatusCode == 4){
                            $trackingStatus = "Delivered";
                            echo "<p>Driver Action cannot be taken at this time, please contact an admin to change status</p>";
                            echo "<label class='checkbox-inline'><input type='checkbox' value='' name='packagePickedUp' disabled>Package Picked Up</label>";
                            echo "<label class='checkbox-inline'><input type='checkbox' value='' name='packageDelivered' disabled>Package Delivered</label>";
                        }

                        echo "<button type='submit' class='btn btn-info btn-fill pull-left' name='submitConnote'>Look up Package</button>";
                        echo "</form";


                        echo "<br><br><br><br>";
                        echo "<div class='col-md-12'>";
                            echo "<div class='row'>";
                                echo "<div class='card'>";
                                    echo "<table class='table packageDetails'>";
                                        echo "<tr>";
                                            echo "<th>&nbsp;&nbsp;Qty</th>";
                                            echo "<th>Package Type</th>";
                                            echo "<th>Package Dimensions</th>";
                                            echo "<th>Service Type</th>";
                                            echo "<th>Total Value</th>";
                                            echo "<th>Booking Made On</th>";
                                        echo "</tr>";
                                        echo "<tr>";
                                                echo "<td>".$orderDetail['noOfPackages']."</td>";
                                                echo "<td>".$packageDetail."</td>";
                                                echo "<td>".$orderDetail['packageWidth']."x".$orderDetail['packageLength']."x".$orderDetail['packageDepth']."</td>";
                                                echo "<td>".$serviceType."</td>";
                                                echo "<td> $".number_format((float)$orderDetail['totalValue'], 2, '.', '')."</td>";
                                                echo "<td>".$bookingMadeOn."</td>";
                                        echo "</tr>";
                                    echo "</table>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";


                        echo "<div class='col-md-12'>";
                            echo "<div class='card'>";
                                echo "<div class='header'>";
                                    echo "<div class='content'>";
                                        echo "<div class='panel-group' id='accordion'>";
                                            echo "<div class='panel panel-default'>";
                                                echo "<div class='panel-heading'>";
                                                    echo "<h4 class='panel-title'><a data-target='#collapseOne' href='#'' data-toggle='collapse' class='collapsed' aria-expanded='false'>Sender & Receiver Details &#9660;</a></h4>";
                                                echo "</div>";
                                                echo "<div id='collapseOne' class='panel-collapse collapse' aria-expanded='false' style='height: 0px;'>";
                                                    echo "<div class='panel-body'>";
                                                        echo "<div class='row'>";
                                                                echo "<table class='table table-hover shipmentDetails'>";
                                                                    echo "<tr>";
                                                                        echo "<th></th>";
                                                                        echo "<th>Sender</th>";
                                                                        echo "<th>Receiver</th>";
                                                                    echo "</tr>";
                                                                    echo "<tr>";
                                                                            echo "<td>Company</td>";
                                                                            echo "<td>".$orderDetail['senderCompanyName']."</td>";
                                                                            echo "<td>".$orderDetail['receiverCompanyName']."</td>";
                                                                    echo "</tr>";
                                                                    echo "<tr>";
                                                                            echo "<td>Contact Name</td>";
                                                                            echo "<td>".$orderDetail['senderFirstName']." ".$orderDetail['senderLastName']."</td>";
                                                                            echo "<td>".$orderDetail['receiverFirstName']." ".$orderDetail['receiverLastName']."</td>";
                                                                    echo "</tr>";
                                                                    echo "<tr>";
                                                                            echo "<td>Phone Number</td>";
                                                                            echo "<td>".$orderDetail['senderMobile']."</td>";
                                                                            echo "<td>".$orderDetail['receiverMobile']."</td>";
                                                                    echo "</tr>";
                                                                    echo "<tr>";
                                                                            echo "<td>Email</td>";
                                                                            echo "<td>".$orderDetail['senderEmail']."</td>";
                                                                            echo "<td>".$orderDetail['receiverEmail']."</td>";
                                                                    echo "</tr>";
                                                                    echo "<tr>";
                                                                            echo "<td>Street Address</td>";
                                                                            echo "<td>".$orderDetail['senderAddressLine1']." ".$orderDetail['senderAddressLine2']."</td>";
                                                                            echo "<td>".$orderDetail['receiverAddressLine1']." ".$orderDetail['receiverAddressLine2']."</td>";
                                                                    echo "</tr>";
                                                                    echo "<tr>";
                                                                            echo "<td>Suburb</td>";
                                                                            echo "<td>".$orderDetail['senderSuburb']."</td>";
                                                                            echo "<td>".$orderDetail['receiverSuburb']."</td>";
                                                                    echo "</tr>";
                                                                    echo "<tr>";
                                                                            echo "<td>State</td>";
                                                                            echo "<td>".$orderDetail['senderState']."</td>";
                                                                            echo "<td>".$orderDetail['receiverState']."</td>";
                                                                    echo "</tr>";
                                                                    echo "<tr>";
                                                                            echo "<td>Postcode</td>";
                                                                            echo "<td>".$orderDetail['senderPostcode']."</td>";
                                                                            echo "<td>".$orderDetail['receiverPostcode']."</td>";
                                                                    echo "</tr>";
                                                                echo "</table>";
                                                        echo "</div>";
                                                    echo "</div>";
                                                echo "</div>";
                                            echo "</div>";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";










                    }

                } else {
                    include("updateStatusForm.php");
                }


            
                
?>





            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>
<!--Specifically for Accordion-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    /* SQUARED ONE */
.squaredOne {
    width: 28px;
    height: 28px;
    background: #fcfff4;

    background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
    background: -moz-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
    background: -o-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
    background: -ms-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
    background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#b3bead',GradientType=0 );
    margin: 20px auto;
    -webkit-box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
    -moz-box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
    box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
    position: relative;
}

.squaredOne label {
    cursor: pointer;
    position: absolute;
    width: 20px;
    height: 20px;
    left: 4px;
    top: 4px;

    -webkit-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,1);
    -moz-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,1);
    box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,1);

    background: -webkit-linear-gradient(top, #222 0%, #45484d 100%);
    background: -moz-linear-gradient(top, #222 0%, #45484d 100%);
    background: -o-linear-gradient(top, #222 0%, #45484d 100%);
    background: -ms-linear-gradient(top, #222 0%, #45484d 100%);
    background: linear-gradient(top, #222 0%, #45484d 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#222', endColorstr='#45484d',GradientType=0 );
}

.squaredOne label:after {
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    filter: alpha(opacity=0);
    opacity: 0;
    content: '';
    position: absolute;
    width: 16px;
    height: 16px;
    background: #00bf00;

    background: -webkit-linear-gradient(top, #00bf00 0%, #009400 100%);
    background: -moz-linear-gradient(top, #00bf00 0%, #009400 100%);
    background: -o-linear-gradient(top, #00bf00 0%, #009400 100%);
    background: -ms-linear-gradient(top, #00bf00 0%, #009400 100%);
    background: linear-gradient(top, #00bf00 0%, #009400 100%);

    top: 2px;
    left: 2px;

    -webkit-box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
    -moz-box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
    box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
}

.squaredOne label:hover::after {
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=30)";
    filter: alpha(opacity=30);
    opacity: 0.3;
}

.squaredOne input[type=checkbox]:checked + label:after {
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
    filter: alpha(opacity=100);
    opacity: 1;
}
</style>

</html>
