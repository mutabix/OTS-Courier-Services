<?php
    session_start();
    include("../../dbTools/dbConnect.php");
    

    $connoteNumber = $_POST["connoteNumber"];
    if(isset($_SESSION["connoteNumber"]) && $_SESSION["connoteNumber"] != ""){
        $connoteNumber = $_SESSION["connoteNumber"];
        $_SESSION["connoteNumber"] = "";
        unset($_SESSION["connoteNumber"]);
    }

    unset($_POST["connoteNumber"]);
    unset($_SESSION["connoteNumber"]);

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
        //$_SESSION['shippingId'] = $shippingId;
        //$_SESSION['connoteNumber'] = $connoteNumber;

        if(isset($shippingId)){
            $connoteNumberExists = true;
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
	<title>Update Package Status</title>

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
        echo "<a class='navbar-brand' href='#'>Update Status";
        if($connoteNumberExists){
            echo ": CON-".$connoteNumber." | ID: ".$shippingId."</a>";
        } else{
            echo "</a>";
        }
        include("includes/navbar-mobile-close.html"); ?>


        <div class="content">
            <div class="container-fluid">
            <?php
                if(isset($connoteNumber)) {
                    if(strlen((string)$connoteNumber < 2)){
                        echo "Consignment Note Number Not Valid";
                        include("updateStatusForm.php");

                    } else if (!$connoteNumberExists){
                        include("updateStatusForm.php");
                        echo "<br><br><br><br>";
                        echo "<p><strong>Consignment Note Number Does Not Exist</strong></p>";

                    } else {
                        //Successful
                        include("updateStatusForm.php");
                        $_SESSION['shippingId'] = $shippingId;
                        $_SESSION['connoteNumber'] = $connoteNumber;

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

                        $packageTypeID = $orderDetail['packageWeight'];
                        if($packageTypeID == 1){
                          $packageDetail = "1kg Satchel";
                          $packageWeight = "1kg";
                        } else if($packageTypeID == 2){
                          $packageDetail = "3kg Satchel";
                          $packageWeight = "3kg";
                        } else if($packageTypeID == 3){
                          $packageDetail = "5kg Satchel";
                          $packageWeight = "5kg";
                        } else if($packageTypeID == 4){
                          $packageDetail = "1kg Box";
                          $packageWeight = "1kg";
                        } else if($packageTypeID == 5){
                          $packageDetail = "3kg Box";
                          $packageWeight = "3kg";
                        } else if($packageTypeID == 6){
                          $packageDetail = "5kg Box";
                          $packageWeight = "5kg";
                        } else if($packageTypeID == 7){
                          $packageDetail = "10kg Box";
                          $packageWeight = "10kg";
                        } else if($packageTypeID == 8){
                          $packageDetail = "20kg Box";
                          $packageWeight = "20kg";
                        }

                        $serviceTypeId = $orderDetail['serviceTypeID'];
                        if($serviceTypeId == 1){
                          $serviceType = "Standard";
                        } else if($serviceTypeId == 2){
                          $serviceType = "Express";
                        } else if($serviceTypeId == 3){
                          $serviceType = "Overnight";
                        }

                        $paymentTypeId = $costToShip['paymentType'];
                        if($paymentTypeId == 1){
                          $paymentType = "Cash";
                        } else if($paymentTypeId == 2){
                          $paymentType = "Eftpos";
                        } else if($paymentTypeId == 3){
                          $paymentType = "Cheque";
                        }



                        echo "<h4>Current Status: ".$trackingStatus."</h4>";
                        if($trackingStatus == "Ready for Pickup"){
                            echo "<h5>Payment Required</h5>";
                            echo "<h5>Amount: $".$costToShip['paymentAmount']."</h5>";
                            echo "<h5>Mode: ".$paymentType."</h5>";
                        }
                        echo "<button type='submit' class='btn btn-info btn-fill' name='changeStatus' id='changeStatus' onclick='hideChangeStatusOptions()'>Change Status Of Package</button>";
                        echo "<br><br>";




                        echo "<form action='changeShipmentStatus.php' method='POST'>";
                        if($shipmentStatusCode == 0){
                            echo "<script>document.getElementById('changeStatus').className = 'btn btn-fill disabled';</script>";
                            echo "<p>Driver Action cannot be taken at this time, please contact an admin to change status</p>";
                        } else if ($shipmentStatusCode == 1){
                            echo "<br>";
                            echo "<div id='changeStatusOptions'>";

                                echo "<input type='checkbox' id='packagePickedUp' name='packagePickedUp'/>";
                                echo "<label for='packagePickedUp'><span></span>Package Picked Up</label>";

                                echo "<br><br>";
                                echo "<button type='submit' class='btn btn-info btn-fill pull-left' name='updateStatus'>Update Status</button>";
                            echo "</div>";
                        } else if ($shipmentStatusCode == 2){
                            echo "<script>document.getElementById('changeStatus').className = 'btn btn-fill disabled';</script>";
                            echo "<p>Driver Action cannot be taken at this time, please contact an admin to change status</p>";
                        } else if ($shipmentStatusCode == 3){
                            echo "<br>";
                            echo "<div id='changeStatusOptions'>";
                                echo "<input type='checkbox' id='packageDelivered' name='packageDelivered'/>";
                                echo "<label for='packageDelivered'><span></span>Package Delivered</label>";

                                echo "<br><br>";
                                echo "<button type='submit' class='btn btn-info btn-fill pull-left' name='updateStatus'>Update Status</button>";
                            echo "</div>";

                        } else if ($shipmentStatusCode == 4){
                            echo "<script>document.getElementById('changeStatus').className = 'btn btn-fill disabled';</script>";
                            echo "<p>Driver Action cannot be taken at this time, please contact an admin to change status</p>";
                        }

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
#changeStatusOptions{
    display: none;
}

input[type="checkbox"] {
    display:none;
}
input[type="checkbox"] + label span {
    display:inline-block;
    width:19px;
    height:19px;
    margin:-1px 4px 0 0;
    vertical-align:middle;
    background-color: #9e9e9e;
    border-radius: 4px;
    background:url(../../assets/img/checkbox-01.png);
    background-size: 19px 19px;
    background-repeat: no-repeat;
    cursor:pointer;
}
input[type="checkbox"]:checked + label span {
    background:url(../../assets/img/checkbox-03.png);
    background-size: 19px 19px;
    background-repeat: no-repeat;
}
}
</style>
<script>
    function hideChangeStatusOptions(){
        document.getElementById("changeStatusOptions").style.display = "block";
    }
    
</script>

</html>
