<?php
    session_start();
    include("../../dbTools/dbConnect.php");
    include("checkLogin.php");

    $email = $_SESSION['username'];  

    $getShipments = $dbConnection->prepare("SELECT shipmentStatusCode FROM shipments");

    try {
        $getShipments->execute();
    } catch(Exception $error) {
        echo 'Exception -> ';
        var_dump($error->getMessage());
    }

    $pendingCount = 0;
    $processingCount = 0;
    $progressCount = 0;

    foreach ($getShipments as $shippingDetail) {
        //$shipmentIDList[$i] = $shippingDetail['trackingNumber'];
        //$shipmentIDListStatus[$i] = $shippingDetail['shipmentStatusCode'];
        //$shipmentStatusCode = $shippingDetail['shipmentStatusCode'];
        if ($shippingDetail['shipmentStatusCode'] == 0){
            $pendingCount++;
        } else if ($shippingDetail['shipmentStatusCode'] == 3){
            $processingCount++;
        }

        if($shippingDetail['shipmentStatusCode'] != 4){
            $progressCount++;
        }
    }

    $getOrders = $dbConnection->prepare("SELECT * FROM shipments WHERE shipmentStatusCode = 0 OR shipmentStatusCode = 3 LIMIT 7");
    try {
        $getOrders->execute();
    } catch(Exception $error) {
        echo 'Exception -> ';
        var_dump($error->getMessage());
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
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Pickups to Assign</h4>
                            </div>
                            <div class="content">
                            <?php echo "<h4>".$pendingCount."</h4>" ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Deliveries to Assign</h4>
                            </div>
                            <div class="content">
                                <?php echo "<h4>".$processingCount."</h4>" ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Orders in Progress</h4>
                            </div>
                            <div class="content">
                                <?php echo "<h4>".$progressCount."</h4>" ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='row'>
                    <a href="#"><div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Orders Requiring Action</h4>
                            </div>
                             <div class="content">
                                <h5>You Have Orders Requiring Action Please Click on the Card to Modify</h5>
                            </div>
                        </div>
                    </div></a>
                </div>

                <div class='row'>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Notifications</h4>
                            </div>
                            <div class="content">                                
                            <div class="table-full-width">
                                    <table class="table">
										<thead>
											<tr>
												<th class='col-md-1'>Date</th>
												<th class='col-md-2'>From</th>
												<th class='col-md-9'>Message</th>
											</tr>
										</thead>
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

                                           <tr><td colspan="3" style="text-align: right;"><a href="notifications.php">See All Notifications</a></td></tr>
                                    </tbody>
                                    </table>'
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
