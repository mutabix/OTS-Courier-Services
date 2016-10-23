<?php
    session_start();
    include("../dbTools/dbConnect.php");
    include("checkLogin.php");

    $trackingNumber = $_POST["trackingNumber"];
    $_POST["trackingNumber"] = "";

    $trackingNumberExists;

    if(isset($trackingNumber)){
        $trackingNumberExists = false;
        $checkTracking = $dbConnection->prepare("SELECT * FROM shipments WHERE trackingNumber = :trackingNumber");

        $checkTracking->bindParam(':trackingNumber', $trackingNumber);

        try {
            $checkTracking->execute();

        } catch(Exception $error) {
            echo 'Exception -> ';
            var_dump($error->getMessage());
        }

        $trackingDetails = $checkTracking->fetch();
        $retrievedTrackingNumber = $trackingDetails['trackingNumber'];
        $shipmentStatusCode = $trackingDetails['shipmentStatusCode'];
        $pendingBool = $trackingDetails['pendingBool'];
        $pendingDate = $trackingDetails['pendingDate'];
        $pickupBool = $trackingDetails['pickupBool'];
        $pickupDate = $trackingDetails['pickupDate'];
        $processingBool = $trackingDetails['processingBool'];
        $processingDate = $trackingDetails['processingDate'];
        $deliveryBool = $trackingDetails['deliveryBool'];
        $deliveryDate = $trackingDetails['deliveryDate'];

        if(isset($retrievedTrackingNumber)){
            $trackingNumberExists = true;
        }
    }
    
    
?>

<!doctype html>
<html lang="en">
<head>
    <title>Track Package</title>

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
        <a class="navbar-brand" href="#">Track Package</a>
        <?php include("includes/navbar-mobile-close.html"); ?>


        <div class="content">
            <div class="container-fluid">
                <div class='col-md-12'>
                    <div id="tracking-details">

                    <?php
                        if(isset($trackingNumber)) {
                            if(strlen((string)$trackingNumber < 2)){
                                echo "Tracking Number Not Valid";
                                include("trackform.php");

                            } else if (!$trackingNumberExists){
                                echo "Tracking Number Does Not Exist";
                                include("trackform.php");

                            } else {
                                include("trackform.php");
                            }

                        } else {
                            include("trackform.php");
                        }
                    ?>

                    </div>
                </div>

                    <br>

                    <div class='col-md-12' style='text-align: center;'>
                        <br>
                        <br>

                        <div class="quick-links">
                            <div class="row">
                                <?php
                                    if($trackingNumberExists){
                                        if($shipmentStatusCode == 0){
                                            if($pendingBool == 0){
                                                echo "<div class='col-md-2'>";
                                                    echo "<div class='info'>";
                                                        echo "<div class='icon icon-primary'>";
                                                            echo "<i class='fa fa-spinner' aria-hidden='true' style='font-size: 100px'></i>";
                                                        echo "</div>";
                                                        echo "<h4 class='info-title'>Pending</h4>";
                                                    echo "</div>";
                                                echo "</div>";
                                            } else if($pendingBool == 1){
                                                echo "<div class='col-md-2'>";
                                                    echo "<div class='info'>";
                                                        echo "<div class='icon icon-primary'>";
                                                            echo "<i class='fa fa-spinner' aria-hidden='true' style='font-size: 100px'></i>";
                                                        echo "</div>";
                                                        echo "<h4 class='info-title'>Pending Complete</h4>";
                                                        echo "<h4 class='info-title'>".$pendingDate."</h4>";
                                                    echo "</div>";
                                                echo "</div>";
                                            }
                                        }

                                        if($shipmentStatusCode == 1){
                                            echo "<div class='col-md-2'>";
                                                echo "<div class='info'>";
                                                    echo "<div class='icon icon-primary'>";
                                                        echo "<i class='fa fa-spinner' aria-hidden='true' style='font-size: 100px'></i>";
                                                    echo "</div>";
                                                    echo "<h4 class='info-title'>Pending Complete</h4>";
                                                    echo "<h4 class='info-title'>".$pendingDate."</h4>";
                                                echo "</div>";
                                            echo "</div>";

                                            if($pickupBool == 0){
                                                echo "<div class='col-md-2'>";
                                                    echo "<div class='info'>";
                                                        echo "<div class='icon icon-primary'>";
                                                            echo "<i class='fa fa-truck' aria-hidden='true' style='font-size: 100px'></i>";
                                                        echo "</div>";
                                                        echo "<h4 class='info-title'>Enroute to Pickup</h4>";
                                                    echo "</div>";
                                                echo "</div>";
                                            } else if($pickupBool == 1){
                                                echo "<div class='col-md-2'>";
                                                    echo "<div class='info'>";
                                                        echo "<div class='icon icon-primary'>";
                                                            echo "<i class='fa fa-truck' aria-hidden='true' style='font-size: 100px'></i>";
                                                        echo "</div>";
                                                        echo "<h4 class='info-title'>Package Picked Up</h4>";
                                                        echo "<h4 class='info-title'>".$pendingDate."</h4>";
                                                    echo "</div>";
                                                echo "</div>";
                                            }
                                        }

                                        if($shipmentStatusCode == 2){
                                            echo "<div class='col-md-2'>";
                                                echo "<div class='info'>";
                                                    echo "<div class='icon icon-primary'>";
                                                        echo "<i class='fa fa-spinner' aria-hidden='true' style='font-size: 100px'></i>";
                                                    echo "</div>";
                                                    echo "<h4 class='info-title'>Pending Complete</h4>";
                                                    echo "<h4 class='info-title'>".$pendingDate."</h4>";
                                                echo "</div>";
                                            echo "</div>";

                                            echo "<div class='col-md-2'>";
                                                echo "<div class='info'>";
                                                    echo "<div class='icon icon-primary'>";
                                                        echo "<i class='fa fa-truck' aria-hidden='true' style='font-size: 100px'></i>";
                                                    echo "</div>";
                                                    echo "<h4 class='info-title'>Package Picked Up</h4>";
                                                    echo "<h4 class='info-title'>".$pendingDate."</h4>";
                                                echo "</div>";
                                            echo "</div>";



                                            if($processingBool == 0){
                                                echo "<div class='col-md-2'>";
                                                    echo "<div class='info'>";
                                                        echo "<div class='icon icon-primary'>";
                                                            echo "<i class='fa fa-cogs' aria-hidden='true' style='font-size: 100px'></i>";
                                                        echo "</div>";
                                                        echo "<h4 class='info-title'>Processing</h4>";
                                                    echo "</div>";
                                                echo "</div>";
                                            } else if($processingBool == 1){
                                                echo "<div class='col-md-2'>";
                                                    echo "<div class='info'>";
                                                        echo "<div class='icon icon-primary'>";
                                                            echo "<i class='fa fa-cogs' aria-hidden='true' style='font-size: 100px'></i>";
                                                        echo "</div>";
                                                        echo "<h4 class='info-title'>Package Processed</h4>";
                                                        echo "<h4 class='info-title'>".$processingDate."</h4>";
                                                    echo "</div>";
                                                echo "</div>";
                                            }
                                        }

                                        if($shipmentStatusCode == 3){
                                            echo "<div class='col-md-2'>";
                                                echo "<div class='info'>";
                                                    echo "<div class='icon icon-primary'>";
                                                        echo "<i class='fa fa-spinner' aria-hidden='true' style='font-size: 100px'></i>";
                                                    echo "</div>";
                                                    echo "<h4 class='info-title'>Pending Complete</h4>";
                                                    echo "<h4 class='info-title'>".$pendingDate."</h4>";
                                                echo "</div>";
                                            echo "</div>";

                                            echo "<div class='col-md-2'>";
                                                echo "<div class='info'>";
                                                    echo "<div class='icon icon-primary'>";
                                                        echo "<i class='fa fa-truck' aria-hidden='true' style='font-size: 100px'></i>";
                                                    echo "</div>";
                                                    echo "<h4 class='info-title'>Package Picked Up</h4>";
                                                    echo "<h4 class='info-title'>".$pendingDate."</h4>";
                                                echo "</div>";
                                            echo "</div>";

                                            echo "<div class='col-md-2'>";
                                                echo "<div class='info'>";
                                                    echo "<div class='icon icon-primary'>";
                                                        echo "<i class='fa fa-cogs' aria-hidden='true' style='font-size: 100px'></i>";
                                                    echo "</div>";
                                                    echo "<h4 class='info-title'>Package Processed</h4>";
                                                    echo "<h4 class='info-title'>".$processingDate."</h4>";
                                                echo "</div>";
                                            echo "</div>";



                                            if($deliveryBool == 0){
                                                echo "<div class='col-md-2'>";
                                                    echo "<div class='info'>";
                                                        echo "<div class='icon icon-primary'>";
                                                            echo "<i class='fa fa-truck' aria-hidden='true' style='font-size: 100px'></i>";
                                                        echo "</div>";
                                                        echo "<h4 class='info-title'>Onboard with Driver for Delivery</h4>";
                                                    echo "</div>";
                                                echo "</div>";
                                            } else if($deliveryBool == 1){
                                                echo "<div class='col-md-2'>";
                                                    echo "<div class='info'>";
                                                        echo "<div class='icon icon-primary'>";
                                                            echo "<i class='fa fa-truck' aria-hidden='true' style='font-size: 100px'></i>";
                                                        echo "</div>";
                                                        echo "<h4 class='info-title'>Package Delivered</h4>";
                                                        echo "<h4 class='info-title'>".$deliveryDate."</h4>";
                                                    echo "</div>";
                                                echo "</div>";
                                            }
                                        }

                                        if($shipmentStatusCode == 4){
                                            echo "<div class='col-md-2'>";
                                                echo "<div class='info'>";
                                                    echo "<div class='icon icon-primary'>";
                                                        echo "<i class='fa fa-spinner' aria-hidden='true' style='font-size: 100px'></i>";
                                                    echo "</div>";
                                                    echo "<h4 class='info-title'>Pending Complete</h4>";
                                                    echo "<h4 class='info-title'>".$pendingDate."</h4>";
                                                echo "</div>";
                                            echo "</div>";

                                            echo "<div class='col-md-2'>";
                                                echo "<div class='info'>";
                                                    echo "<div class='icon icon-primary'>";
                                                        echo "<i class='fa fa-truck' aria-hidden='true' style='font-size: 100px'></i>";
                                                    echo "</div>";
                                                    echo "<h4 class='info-title'>Package Picked Up</h4>";
                                                    echo "<h4 class='info-title'>".$pendingDate."</h4>";
                                                echo "</div>";
                                            echo "</div>";

                                            echo "<div class='col-md-2'>";
                                                echo "<div class='info'>";
                                                    echo "<div class='icon icon-primary'>";
                                                        echo "<i class='fa fa-cogs' aria-hidden='true' style='font-size: 100px'></i>";
                                                    echo "</div>";
                                                    echo "<h4 class='info-title'>Package Processed</h4>";
                                                    echo "<h4 class='info-title'>".$processingDate."</h4>";
                                                echo "</div>";
                                            echo "</div>";

                                            echo "<div class='col-md-2'>";
                                                echo "<div class='info'>";
                                                    echo "<div class='icon icon-primary'>";
                                                        echo "<i class='fa fa-truck' aria-hidden='true' style='font-size: 100px'></i>";
                                                    echo "</div>";
                                                    echo "<h4 class='info-title'>Package Delivered</h4>";
                                                    echo "<h4 class='info-title'>".$deliveryDate."</h4>";
                                                echo "</div>";
                                            echo "</div>";

                                            echo "<div class='col-md-2'>";
                                                echo "<div class='info'>";
                                                    echo "<div class='icon icon-primary'>";
                                                        echo "<i class='fa fa-check' aria-hidden='true' style='font-size: 100px'></i>";
                                                    echo "</div>";
                                                    echo "<h4 class='info-title'>Complete</h4>";
                                                echo "</div>";
                                            echo "</div>";
                                        }
                                    }

                                    
                                ?>
                                
                                <!--
                                FONT AWESOME ICONS 
                                PENDING - ellipsis-h or spinner
                                ENROUTE TO PICKUP - truck
                                WITH DRIVER FOR PROCESSING - truck
                                PROCESSING @ FACILITY - cogs
                                WITH DRIVER FOR DELIVERY - truck
                            -->
                                
                                
                            </div>
                        </div>

                    </div>
                    <?php
                        if(isset($trackingNumber)){
                            echo "<div class='row'>";
                            echo "<a href='saveToAccount.php?id=".$trackingNumber."'><button type='submit' class='btn btn-info btn-fill pull-left' name='submitTrack' style='margin-top: 50px'>Save Tracking Number To My Account</button></a>";
                            echo "</div>";
                        }
                    ?>
            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>


</html>