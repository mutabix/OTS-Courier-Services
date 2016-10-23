<?php
    session_start();
    include("../dbTools/dbConnect.php");
    include("checkLogin.php");
    
    $email = $_SESSION['username'];
    $getTrackingNumbers = $dbConnection->prepare("SELECT trackingNumber FROM tracking WHERE customer = :customerEmail");
    $getTrackingNumbers->bindParam(':customerEmail', $email);
    $getTrackingNumbers->execute();
    $count = 0;
    $pendingCount = 0;
    $readyCount = 0;
    $processingCount = 0;
    $deliveryCount = 0;

    $trackingNumber = array();
    $trackingStatus = array();

    foreach ($getTrackingNumbers as $trackingNumberFetch){
        $trackingNumber[$count] = $trackingNumberFetch['trackingNumber'];
        $count++;
    }

    for ($i=0; $i<count($trackingNumber); $i++){
        $currentTrackingNumber = $trackingNumber[$i];
        $getTrackingDetails = $dbConnection->prepare("SELECT shipmentStatusCode FROM shipments WHERE trackingNumber = :trackingNumber");
        $getTrackingDetails->bindParam(':trackingNumber', $currentTrackingNumber);

        try {
            $getTrackingDetails->execute();
        } catch(Exception $error) {
            echo 'Exception -> ';
            var_dump($error->getMessage());
        }
        $shipmentStatusCodeFetch = $getTrackingDetails->fetch();
        $shipmentStatusCode = $shipmentStatusCodeFetch['shipmentStatusCode'];
        //echo $shipmentStatusCode;

        if($shipmentStatusCode == 0){
            $pendingCount++;
            $trackingStatus[$i] = "Pending";
        } else if ($shipmentStatusCode == 1){
            $readyCount++;
            $trackingStatus[$i] = "Ready for Pickup";
        } else if ($shipmentStatusCode == 2){
            $processingCount++;
            $trackingStatus[$i] = "Processing";
        } else if ($shipmentStatusCode == 3){
            $deliveryCount++;
            $trackingStatus[$i] = "Ready for Delivery";
        } else if ($shipmentStatusCode == 4){
            $trackingStatus[$i] = "Delivered";
        }
    }



    $notificationResult = $dbConnection->prepare('SELECT * FROM notifications WHERE notificationFor = :email ORDER BY notificationDate DESC LIMIT 5');
    $notificationResult->bindParam(':email', $_SESSION['username']);
    try {
        $notificationResult->execute();

    } catch(Exception $error) {
        echo 'Exception -> ';
        var_dump($error->getMessage());
    }

    //My Bookings Data
    $myBookingsData = $dbConnection->prepare('SELECT * FROM bookings WHERE senderEmail = :email ORDER BY bookingMadeOn DESC');
    $myBookingsData->bindParam(':email', $email);
    try {
        $myBookingsData->execute();

    } catch(Exception $error) {
        echo 'Exception -> ';
        var_dump($error->getMessage());
    }
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
        <?php include("includes/navbar-mobile-open.html"); ?>
        <a class="navbar-brand" href="#">Dashboard</a>
        <?php include("includes/navbar-mobile-close.html"); ?>


        <div class="content">
            <div class="container-fluid">
                <div class='row' style='text-align: center'>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Packages Pending</h4>
                            </div>
                            <div class="content">
                            <?php echo "<h4>".$pendingCount."</h4>" ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Ready for Pickup</h4>
                            </div>
                            <div class="content">
                            <?php echo "<h4>".$readyCount."</h4>" ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Packages Processing</h4>
                            </div>
                            <div class="content">
                            <?php echo "<h4>".$processingCount."</h4>" ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Ready for Delivery</h4>
                            </div>
                            <div class="content">
                            <?php echo "<h4>".$deliveryCount."</h4>" ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">My Orders</h4>
                            </div>
                             <div class="content">
                                 <div class="table-full-width">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Booking Date</td>
                                                <td>Shipment ID</td>
                                                <td>Sender</td>
                                                <td>Receiver</td>
                                                <td>Status</td>
                                                <td></td>
                                            </tr>
                                            <?php
                                            $orderCount = 0;
                                            foreach ($myBookingsData as $booking) {
                                                $orderCount++;
                                                if($orderCount > 5){
                                                    break;
                                                }
                                                $shipmentStatusRetrieval = $dbConnection->prepare('SELECT * FROM shipments WHERE trackingNumber = :trackingNumber LIMIT 1');
                                                $shipmentStatusRetrieval->bindParam(':trackingNumber', $booking['shipmentId']);
                                                try {
                                                    $shipmentStatusRetrieval->execute();

                                                } catch(Exception $error) {
                                                    echo 'Exception -> ';
                                                    var_dump($error->getMessage());
                                                }

                                                $shipmentStatus = $shipmentStatusRetrieval->fetch();
                                                $shipmentStatusCode = $shipmentStatus['shipmentStatusCode'];
                                                if($shipmentStatusCode == 0){
                                                    if($shipmentStatus['pendingBool'] == 0){
                                                        $shipmentStatus = "Pending";
                                                    } else {
                                                        $shipmentStatus = "Pending Complete, Waiting for Pickup";

                                                    }
                                                    $lastActionedDate = $shipmentStatus['pendingDate'];

                                                } else if($shipmentStatusCode == 1){
                                                    if($shipmentStatus['pickupBool'] == 0){
                                                        $shipmentStatus = "Driver Enroute to Pickup";
                                                    } else {
                                                        $shipmentStatus = "Package Picked Up";
                                                    }

                                                } else if($shipmentStatusCode == 2){
                                                    if($shipmentStatus['processingBool'] == 0){
                                                        $shipmentStatus = "Processing Package";
                                                    } else {
                                                        $shipmentStatus = "Processing Complete";
                                                    }

                                                } else if($shipmentStatusCode == 3){
                                                    if($shipmentStatus['deliveryBool'] == 0){
                                                        $shipmentStatus = "Driver Enroute for Delivery";
                                                    } else {
                                                        $shipmentStatus = "Package Delivered";
                                                    }
                                                }


                                                echo '<tr>';
                                                echo '<td>'.$booking['bookingMadeOn'].'</td>';
                                                echo '<td>'.$booking['shipmentId'].'</td>';
                                                echo '<td>'.$booking['senderFirstName']." ".$booking['senderLastName'].'</td>';
                                                echo '<td>'.$booking['receiverFirstName']." ".$booking['receiverLastName'].'</td>';
                                                echo '<td>'.$shipmentStatus.'</td>';
                                                echo '<td>';
                                                echo '<a href="getBookingDetails.php?id='.$booking['shipmentId'].'" class="btn btn-info" role="button">See More Details</a>';
                                                echo '</td>';

                                                echo '</tr>';
                                            }

                                                
                                            ?>

                                            <tr><td colspan="6" style='text-align: right;'><a href='seeAllOrders.php'>See All Orders</a></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class="col-md-4">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Saved Tracking Numbers</h4>
                            </div>
                            <div class="content">
                                <div class="table-full-width">
                                    <table class="table">
                                        <tbody>
                                        <?php
                                            for ($i=0; $i<5; $i++){
                                                echo "<tr>";
                                                    echo "<td>";
                                                    echo $trackingNumber[$i];
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo $trackingStatus[$i];
                                                    echo "</td>";
                                                    echo "<td class='td-actions text-right'>";
                                                        echo "<a href='tracking.php?id=".$trackingNumber[$i]."'><button type='submit' rel='tooltip' title='Edit Task' class='btn btn-info btn-simple btn-xs'>";
                                                            echo "<i class='fa fa-external-link'></i>";
                                                        echo "</button></a>";
                                                    echo "</td>";
                                                echo "</tr>";
                                            }
                                        ?>

                                            <tr><td colspan="3" style='text-align: right;'><a href='savedTrackingNumbers.php'>See My Saved Tracking Numbers</a></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
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