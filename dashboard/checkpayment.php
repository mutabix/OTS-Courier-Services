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
              $total = $dbConnection->query('SELECT
              COUNT(*)
              FROM pickups')->fetchColumn();

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
              //Above: Pagination code adapted by Reeve from http://stackoverflow.com/questions/3705318/simple-php-pagination-script

              $result = $dbConnection->prepare('SELECT *
              FROM pickups
              LIMIT :limit
              OFFSET :offset');
              $result->bindParam(':limit', $limit, PDO::PARAM_INT);
              $result->bindParam(':offset', $offset, PDO::PARAM_INT);
              $result->execute();

              ?>
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
