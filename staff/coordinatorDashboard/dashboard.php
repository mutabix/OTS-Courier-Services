<?php
    session_start();
    include("../../dbTools/dbConnect.php");
    include("../../dbTools/checkLogin.php");

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

        if($shipmentStatusCode == 0){
            $pendingCount++;
            $trackingStatus[$count] = "Pending";
        } else if ($shipmentStatusCode == 1){
            $readyCount++;
            $trackingStatus[$count] = "Ready for Pickup";
        } else if ($shipmentStatusCode == 2){
            $processingCount++;
            $trackingStatus[$count] = "Processing";
        } else if ($shipmentStatusCode == 3){
            $deliveryCount++;
            $trackingStatus[$count] = "Ready for Delivery";
        } else if ($shipmentStatusCode == 4){
            $trackingStatus[$count] = "Delivered";
        } 
    }
	
	$notificationResult = $dbConnection->prepare('SELECT * FROM notifications WHERE notificationFor = :email ORDER BY notificationDate DESC');
    $notificationResult->bindParam(':email', $_SESSION['username']);
    $notificationResult->execute();

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
										$total = count($trackingNumber);
										$limit = 8;
										
										$pages = ceil($total / $limit);
										
										
										$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array
										('options' => array
											('default' => 1,
											 'min_range' => 1,
											),
										)));
										
										$offset = ($page - 1) * $limit;
										
										$start = $offset + 1;
										$end = min(($offset + $limit), $total);
										
										$prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';
										$nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';
										echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';
										
										$result = $dbConnection->prepare('SELECT trackingNumber
										FROM tracking
										ORDER BY trackingNumber
										LIMIT :limit
										OFFSET :offset');
										$result->bindParam(':limit', $limit, PDO::PARAM_INT);
										$result->bindParam(':offset', $offset, PDO::PARAM_INT);
										$result->execute();	
										
										foreach ($result as $trackingNumber)
										{
											echo "<tr>";
												echo "<td>";
												echo $trackingNumber['trackingNumber'];
												echo "</td>";
												echo "<td>";
												echo "Pending";
												echo "</td>";
                                                echo "<td class='td-actions text-right'>";
													echo "<button type='button' rel='tooltip' title='Edit Task' class='btn btn-info btn-simple btn-xs'>";
														echo "<i class='fa fa-edit'></i>";
													echo "</button>";
												echo "</td>";
                                            echo "</tr>";
										}
										
                                          /*  for ($i=0; $i<count($trackingNumber); $i++){
                                                echo "<tr>";
                                                    echo "<td>";
                                                    echo $trackingNumber[$i];
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo "Pending"; //Temp code --> for testing
                                                    echo "</td>";
                                                    echo "<td class='td-actions text-right'>";
                                                        echo "<button type='button' rel='tooltip' title='Edit Task' class='btn btn-info btn-simple btn-xs'>";
                                                            echo "<i class='fa fa-edit'></i>";
                                                        echo "</button>";
                                                    echo "</td>";
                                                echo "</tr>";
                                            }*/
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
										echo '</tbody>
									</table>';
									?>
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
