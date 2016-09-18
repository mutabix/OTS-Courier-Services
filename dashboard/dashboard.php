<?php
    session_start();
    include("../dbTools/dbConnect.php");
    include("../dbTools/checkLogin.php");

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


    foreach ($getTrackingNumbers as $trackingNumber){
        $trackingNumber[$count];
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

        if($shipmentStatusCode == 0){
            $pendingCount++;
        } else if ($shipmentStatusCode == 1){
            $readyCount++;
        } else if ($shipmentStatusCode == 2){
            $processingCount++;
        } else if ($shipmentStatusCode == 3){
            $deliveryCount++;
        }  
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
                                <h4>0</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Packages Processing</h4>
                            </div>
                            <div class="content">
                                <h4>0</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Ready for Delivery</h4>
                            </div>
                            <div class="content">
                                <h4>0</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='row'>
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Saved Tracking Numbers</h4>
                            </div>
                            <div class="content">
                                <div class="table-full-width">
                                    <table class="table">
                                        <tbody>
                                        <?php
                                            foreach ($getTrackingNumbers as $trackingNumber){
                                                echo "<tr>";
                                                    echo "<td>";
                                                    echo $trackingNumber['trackingNumber'];
                                                    echo "</td>";
                                                    echo "<td class='td-actions text-right'>";
                                                        echo "<button type='button' rel='tooltip' title='Edit Task' class='btn btn-info btn-simple btn-xs'>";
                                                            echo "<i class='fa fa-edit'></i>";
                                                        echo "</button>";
                                                    echo "</td>";
                                                echo "</tr>";
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
                                <h4 class="title">Notifications</h4>
                            </div>
                            <div class="content">
                                <div class="table-full-width">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Sign contract for "What are conference organizers afraid of?"</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </td>
                                            </tr>
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
