<?php

    include("../dbTools/dbConnect.php");
    $result = $dbConnection->prepare('SELECT * FROM pickups');
    $result->execute();

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


				<table class="table table-hover">
					<thead>
						<tr>
							<th><strong>Pickup ID</strong></th>
							<th><strong>Shipment ID</strong></th>
							<th><strong>Pickup Date & Time</strong></th>
							<th><strong>Shipment Status</strong></th>
							<th><strong>Payment ID</strong></th>
							<th><strong>Payment Type</strong></th>
              <th><strong>Total Amount Due</strong></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
            <?php
              foreach ($result as $pickup) {
                echo '<tr>';
                  echo '<td>';
                    echo $pickup['pickupID'];
                  echo '</td>';
                  echo '<td>';
                    echo $pickup['shipmentID'];
                  echo '</td>';
                  echo '<td>';
                    echo $pickup['pickupDateTime'];
                  echo '</td>';
                  echo '<td>';
                  if ($pickup['shipmentStatus'] == 0)
                    {
                      echo 'En Route to Delivery';
                    }else if ($pickup['shipmentStatus'] == 1)
                      {
                        echo 'En Route to Pickup';
                      }else if ($pickup['shipmentStatus'] == 2)
                        {
                          echo 'En Route to Warehouse';
                      }else if ($pickup['shipmentStatus'] == 3)
                        {
                          echo 'At Warehouse';
                        }

                  echo '</td>';
                  echo '<td>';
                    echo $pickup['paymentID'];
                  echo '</td>';
                  echo '<td>';
                  if ($pickup['paymentType'] == 0)
                    {
                      echo 'Cash';
                    }else if ($pickup['paymentType'] == 1)
                      {
                        echo 'EFTPOS';
                      }else if ($pickup['paymentType'] == 2)
                        {
                          echo 'Cheque';
                        }else{
                          echo 'Unknown Payment Type';
                          }
                  echo '</td>';
                  echo '<td>';
                    echo $pickup['totalAmountDue'];
                  echo '</td>';
                echo '</tr>';
              }
              echo '</tbody>
              </table>';


            ?>
          </tbody>

        </div>
      </div>
    </div>
</div>

</body>


</html>
