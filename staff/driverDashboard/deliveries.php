<?php
    include("../../dbTools/dbConnect.php");
	
	include("checkDriverLogin.php");

	
	//Pull logged in user's credentials
    $employeeID = $_SESSION['employeeID'];
	echo $_SESSION['employeeID'];
	$employeeID = 1;
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
        <a class="navbar-brand" href="#">Deliveries</a>
        <?php include("includes/navbar-mobile-close.html"); ?>


        <div class="content">
            <div class="container-fluid">
				<div class="row">
					<div class="col-md-6">
						<?php
						//Below: Pagination code adapted by Reeve from http://stackoverflow.com/questions/3705318/simple-php-pagination-script
						$total = $dbConnection->query('SELECT
						COUNT(*)
						FROM deliveries
						WHERE assignedDriver = "'.$employeeID.'"')->fetchColumn();
						
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
						//Above: Pagination code adapted by Reeve from http://stackoverflow.com/questions/3705318/simple-php-pagination-script
						
						
						
						$deliveries = $dbConnection->prepare('SELECT deliveryID, shipmentStatus, deliveryDueBy, deliveryAddress, deliveryAddressPostcode, assignedDriver, priority
						FROM deliveries
						WHERE assignedDriver = "'.$employeeID.'"
						ORDER BY deliveryID
						LIMIT :limit
						OFFSET :offset');
						$deliveries->bindParam(':limit', $limit, PDO::PARAM_INT);
						$deliveries->bindParam(':offset', $offset, PDO::PARAM_INT);
						$deliveries->execute();	
						?>
					</div>
				</div>
				<table class="table table-hover">
					<thead>
						<tr>
							<th><strong>Delivery ID</strong></th>
							<th><strong>Status</strong></th>
							<th><strong>Due Date</strong></th>
							<th><strong>Delivery Address</strong></th>
							<th><strong>Postcode</strong></th>
							<th><strong>Driver</strong></th>
							<th><strong>Priority</strong></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php
						foreach ($deliveries as $delivery)
						{
							echo '<td>';
								echo $delivery["deliveryID"];
							echo '</td>';
							echo '<td>';
								echo $delivery['shipmentStatus'];
							echo '</td>';
							echo '<td>';
								echo $delivery['deliveryDueBy'];
							echo '</td>';
							echo '<td>';
								echo $delivery['deliveryAddress'];
							echo '</td>';
							echo '<td>';
								echo $delivery['deliveryAddressPostcode'];
							echo '</td>';
							echo '<td>';
								echo $delivery['assignedDriver'];
							echo '</td>';
							echo '<td>';
								echo $delivery['priority'];
							echo '</td>';
							echo'<td>';
								echo '<a href="delete.php?id='.$delivery["deliveryID"].'" class="btn btn-info" role="button">Delete</a>';
							echo '</td>';
							echo '</tr>';
						}
					echo '</tbody>
					</table>';
				?>
            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>


</html>
