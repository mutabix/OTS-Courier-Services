<?php

    include("../dbTools/dbConnect.php");
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
        <a class="navbar-brand" href="#">Check Payments</a>
        <?php include("includes/navbar-mobile-close.html"); ?>


        <div class="content">
            <div class="container-fluid">
              <?php
              //Below: Pagination code adapted by Reeve from http://stackoverflow.com/questions/3705318/simple-php-pagination-script
              $total = $dbConnection->query('SELECT COUNT(*)
              FROM bookings')->fetchColumn();

              $limit = 11;

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
              //Above: Pagination code adapted by Reeve from http://stackoverflow.com/questions/3705318/simple-php-pagination-script*/


              $myBookingsData = $dbConnection->prepare('SELECT *
              FROM bookings
              LIMIT :limit
              OFFSET :offset');
              $myBookingsData->bindParam(':limit', $limit, PDO::PARAM_INT);
              $myBookingsData->bindParam(':offset', $offset, PDO::PARAM_INT);
              $myBookingsData->execute();

              ?>
              <h2>All Orders</h2>
				<table class="table table-hover">
					<thead>
						<tr>
							<th><strong>Booking Date</strong></th>
							<th><strong>Shipping ID</strong></th>
							<th><strong>Sender</strong></th>
							<th><strong>Reciever</strong></th>
							<th><strong>Status</strong></th>
              <th><strong></strong></th>
							<th></th>
						</tr>
					</thead>
				<tbody>
            <?php
            foreach ($myBookingsData as $booking) {

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
          </tbody>
        </table>

        </div>
      </div>
    </div>
  </div>

</body>


</html>
