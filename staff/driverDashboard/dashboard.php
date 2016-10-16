<?php
    session_start();
    include("../../dbTools/dbConnect.php");
    include("checkDriverLogin.php");

    $employeeID = $_SESSION['employeeID'];

    $getShipmentDetails = $dbConnection->prepare("SELECT * FROM shipments WHERE assignedDriver = :assignedDriver");
    $getShipmentDetails->bindParam(':assignedDriver', $employeeID);

    try {
        $getShipmentDetails->execute();
    } catch(Exception $error) {
        echo 'Exception -> ';
        var_dump($error->getMessage());
    }

    //$shippingDetails = $getShipmentDetails->fetch();
    $readyForPickup = 0;
    $readyForDelivery = 0;
    $shipmentIDList = array();
    $shipmentIDListStatus = array();
    $i = 0;

    foreach ($getShipmentDetails as $shippingDetail) {
        $shipmentIDList[$i] = $shippingDetail['trackingNumber'];
        $shipmentIDListStatus[$i] = $shippingDetail['shipmentStatusCode'];
        $shipmentStatusCode = $shippingDetail['shipmentStatusCode'];
        if ($shipmentStatusCode == 1){
            $readyForPickup++;
        } else if ($shipmentStatusCode == 3){
            $readyForDelivery++;
        }

        $i++;
    }

    $notificationResult = $dbConnection->prepare('SELECT * FROM notifications WHERE notificationFor = :email ORDER BY notificationDate DESC LIMIT 5');
    $notificationResult->bindParam(':email', $_SESSION['username']);
    try {
        $notificationResult->execute();

    } catch(Exception $error) {
        echo 'Exception -> ';
        var_dump($error->getMessage());
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
        <?php include("includes/navbar-mobile-open.html"); ?>
        <a class="navbar-brand" href="#">Dashboard</a>
        <?php include("includes/navbar-mobile-close.html"); ?>


        <div class="content">
            <div class="container-fluid">
                <div class='row' style='text-align: center'>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Packages To Pickup</h4>
                            </div>
                            <div class="content">
                            <?php echo "<h4>".$readyForPickup."</h4>" ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Packages to Deliver</h4>
                            </div>
                            <div class="content">
                            <?php echo "<h4>".$readyForDelivery."</h4>" ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='row'>
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Packages to Pickup</h4>
                            </div>
                             <div class="content">
                                <div class="table-full-width">
                                    <table class="table">
                                        <tbody>

                                            <?php
                                                if($readyForPickup > 0){
                                                    echo "<tr>";
                                                        echo "<th>Shipment ID</th>";
                                                        echo "<th>Connote ID</th>";
                                                        echo "<th>Service Type</th>";
                                                        echo "<th>Suburb</th>";
                                                        echo "<th></th>";
                                                    echo "</tr>";

                                                    for($i=0; $i<count($shipmentIDList); $i++){
                                                        if($shipmentIDListStatus[$i] == 1){
                                                            $getBookingDetail = $dbConnection->prepare('SELECT serviceTypeID, senderSuburb FROM bookings WHERE shipmentId = :shippingId LIMIT 1');
                                                            $getBookingDetail->bindParam(':shippingId', $shipmentIDList[$i]);
                                                            try {
                                                                $getBookingDetail->execute();

                                                            } catch(Exception $error) {
                                                                echo 'Exception -> ';
                                                                var_dump($error->getMessage());
                                                            }

                                                            $bookingDetail = $getBookingDetail->fetch();

                                                            $getConnoteNumber = $dbConnection->prepare('SELECT connoteNumber FROM connotes WHERE shippingId = :shippingId LIMIT 1');
                                                            $getConnoteNumber->bindParam(':shippingId', $shipmentIDList[$i]);
                                                            try {
                                                                $getConnoteNumber->execute();

                                                            } catch(Exception $error) {
                                                                echo 'Exception -> ';
                                                                var_dump($error->getMessage());
                                                            }

                                                            $connoteNumber = $getConnoteNumber->fetch();


                                                            if($bookingDetail['serviceTypeID'] == 1){
                                                                $priority = "Low";
                                                            } else if($bookingDetail['serviceTypeID'] == 2){
                                                                $priority = "Moderate";
                                                            } else if($bookingDetail['serviceTypeID'] == 3){
                                                                $priority = "High";
                                                            }

                                                            echo '<tr>';
                                                            echo '<td>'.$shipmentIDList[$i].'</td>';
                                                            echo '<td>'.$connoteNumber['connoteNumber'].'</td>';
                                                            echo '<td>'.$priority.'</td>';
                                                            echo '<td>'.$bookingDetail['senderSuburb'].'</td>';
                                                            echo '<td>';
                                                            echo '<a href="getOrderDetails.php?id='.$connoteNumber['connoteNumber'].'" class="btn btn-info" role="button">See More Details</a>';
                                                            echo '</td>';
                                                            echo '</tr>';
                                                        }
                                                    }
                                                } else {
                                                    echo "<h5>&nbsp; &nbsp; No Packages To Pickup</h5>";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Packages to Deliver</h4>
                            </div>
                             <div class="content">
                                <div class="table-full-width">
                                    <table class="table">
                                        <tbody>
                                            

                                            <?php
                                                if($readyForDelivery > 0){
                                                    echo "<tr>";
                                                        echo "<th>Shipment ID</th>";
                                                        echo "<th>Connote ID</th>";
                                                        echo "<th>Service Type</th>";
                                                        echo "<th>Suburb</th>";
                                                        echo "<th></th>";
                                                    echo "</tr>";

                                                    for($i=0; $i<count($shipmentIDList); $i++){
                                                        if($shipmentIDListStatus[$i] == 3){
                                                            $getBookingDetail = $dbConnection->prepare('SELECT serviceTypeID, receiverSuburb FROM bookings WHERE shipmentId = :shippingId LIMIT 1');
                                                            $getBookingDetail->bindParam(':shippingId', $shipmentIDList[$i]);
                                                            try {
                                                                $getBookingDetail->execute();

                                                            } catch(Exception $error) {
                                                                echo 'Exception -> ';
                                                                var_dump($error->getMessage());
                                                            }

                                                            $bookingDetail = $getBookingDetail->fetch();

                                                            $getConnoteNumber = $dbConnection->prepare('SELECT connoteNumber FROM connotes WHERE shippingId = :shippingId LIMIT 1');
                                                            $getConnoteNumber->bindParam(':shippingId', $shipmentIDList[$i]);
                                                            try {
                                                                $getConnoteNumber->execute();

                                                            } catch(Exception $error) {
                                                                echo 'Exception -> ';
                                                                var_dump($error->getMessage());
                                                            }

                                                            $connoteNumber = $getConnoteNumber->fetch();


                                                            if($bookingDetail['serviceTypeID'] == 1){
                                                                $priority = "Low";
                                                            } else if($bookingDetail['serviceTypeID'] == 2){
                                                                $priority = "Moderate";
                                                            } else if($bookingDetail['serviceTypeID'] == 3){
                                                                $priority = "High";
                                                            }

                                                            echo '<tr>';
                                                            echo '<td>'.$shipmentIDList[$i].'</td>';
                                                            echo '<td>'.$connoteNumber['connoteNumber'].'</td>';
                                                            echo '<td>'.$priority.'</td>';
                                                            echo '<td>'.$bookingDetail['receiverSuburb'].'</td>';
                                                            echo '<td>';
                                                            echo '<a href="getOrderDetails.php?id='.$connoteNumber['connoteNumber'].'" class="btn btn-info" role="button">See More Details</a>';
                                                            echo '</td>';
                                                            echo '</tr>';
                                                        }
                                                    }
                                                } else {
                                                    echo "<h5>&nbsp; &nbsp; No Packages To Deliver</h5>";
                                                }
                                                
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='row'>
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Notifications</h4>
                            </div>
                            <div class="content">
                                <div class="table-full-width">
                                    <table class="table">
                                        <tbody>
                                            <?php
                                                foreach ($notificationResult as $notification) {
                                                    echo '<tr>';
                                                    echo '<td>';
                                                    //echo $notification['notificationDate'];
                                                    $date = date("d/m/Y", strtotime($notification['notificationDate']));
                                                    echo $date;

                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo $notification['notificationFrom'];
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo $notification['notificationDescription'];
                                                    echo '</td>';
                                                    echo '</tr>';
                                                }
                                            ?>

                                            <tr><td colspan="3" style='text-align: right;'><a href='notifications.php'>See All Notifications</a></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>


</html>
