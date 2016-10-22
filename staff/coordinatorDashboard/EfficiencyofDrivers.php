
<?php
    include("dbTools/dbConnect.php");
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

<title>Efficiency of Drivers</title>

<?php include("includes/styling_scripts/meta.html"); ?>
    <?php include("includes/styling_scripts/css.html"); ?>
    <?php include("includes/styling_scripts/fonts-icons.html"); ?>
    <?php include("includes/styling_scripts/javascript.html"); ?>

</head>

<body class="profile-page">

<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">

        <div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">

                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
           
       </div>
       </div>
       
       
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right"></ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->

<div class="wrapper">
<?php include("includes/sidebar.html"); ?>

<div class="main-panel">
        <?php include("includes/navbar-mobile-open.html"); ?>
        <a class="navbar-brand" href="#">Efficiency og Drivers</a>
        <?php include("includes/navbar-mobile-close.html"); ?>

    <div class="header header-filter" style="background-image: url('assets/img/full_page_bkg_img.png');"></div>
    <div class="main main-raised">
        <div class="section section-basic">

            <div class="container">
                <div class="title"><h2>Track a Package</h2></div>
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
                            <div class='row' style='text-align: center'>


                                <?php
                                    if($trackingNumberExists){
                                        if($shipmentStatusCode == 0){
                                            if($pendingBool == 0){
                                                echo "<div class='col-md-3'>";

                                                    echo "<div class='info'>";
                                                        echo "<div class='icon icon-primary'>";
                                                            echo "<i class='fa fa-spinner' aria-hidden='true' style='font-size: 100px'></i>";
                                                        echo "</div>";
                                                        echo "<h4 class='info-title'>Pending</h4>";
                                                    echo "</div>";
                                                echo "</div>";
                                            } else if($pendingBool == 1){
                                                echo "<div class='col-md-3'>";
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
                                            if($pickupBool == 0){
                                                echo "<div class='col-md-3'>";
                                                    echo "<div class='info'>";
                                                        echo "<div class='icon icon-primary'>";
                                                            echo "<i class='fa fa-truck' aria-hidden='true' style='font-size: 100px'></i>";
                                                        echo "</div>";
                                                        echo "<h4 class='info-title'>Enroute to Pickup</h4>";
                                                    echo "</div>";
                                                echo "</div>";
                                            } else if($pickupBool == 1){
                                                echo "<div class='col-md-3'>";
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

                                        if($shipmentStatusCode == 3){
                                            if($processingBool == 0){
                                                echo "<div class='col-md-3'>";
                                                    echo "<div class='info'>";
                                                        echo "<div class='icon icon-primary'>";
                                                            echo "<i class='fa fa-cogs' aria-hidden='true' style='font-size: 100px'></i>";
                                                        echo "</div>";
                                                        echo "<h4 class='info-title'>Processing</h4>";
                                                    echo "</div>";
                                                echo "</div>";
                                            } else if($processingBool == 1){
                                                echo "<div class='col-md-3'>";
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

                                        if($shipmentStatusCode == 4){
                                            if($deliveryBool == 0){
                                                echo "<div class='col-md-3'>";
                                                    echo "<div class='info'>";
                                                        echo "<div class='icon icon-primary'>";
                                                            echo "<i class='fa fa-truck' aria-hidden='true' style='font-size: 100px'></i>";
                                                        echo "</div>";
                                                        echo "<h4 class='info-title'>Onboard with Driver for Delivery</h4>";
                                                    echo "</div>";
                                                echo "</div>";
                                            } else if($deliveryBool == 1){
                                                echo "<div class='col-md-3'>";
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
            </div>
        </div>
    </div>


   <footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>
        <p class="copyright pull-right">&copy; 2016 On The Spot Courier Services</p>
    </div>
</footer>

</div>

</body>
    <!--   Core JS Files   -->
    <script src="../../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/js/bootstrap-checkbox-radio-switch.js"></script>
<script src="../../assets/js/chartist.min.js"></script>
<script src="../../assets/js/bootstrap-notify.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="../../assets/js/light-bootstrap-dashboard.js"></script>



</html>
