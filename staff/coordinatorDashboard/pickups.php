<?php
    include("../../dbTools/dbConnect.php");
	include("checkLogin.php");
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
        <a class="navbar-brand" href="#">Pickups</a>
        <?php include("includes/navbar-mobile-close.html"); ?>


        <div class="content">
            <div class="container-fluid">
				<div class="row">
					<div class="col-md-6">
						<?php
						//Below: Pagination code adapted by Reeve from http://stackoverflow.com/questions/3705318/simple-php-pagination-script
						$total = $dbConnection->query('SELECT
						COUNT(*)
						FROM pickups')->fetchColumn();
						
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
						
						
						
						$result = $dbConnection->prepare('SELECT pickupID, shipmentID, pickupDateTime, shipmentStatus, paymentID, paymentType, totalAmountDue, pickupAddress
						FROM pickups
						ORDER BY pickupDateTime
						LIMIT :limit
						OFFSET :offset');
						$result->bindParam(':limit', $limit, PDO::PARAM_INT);
						$result->bindParam(':offset', $offset, PDO::PARAM_INT);
						$result->execute();	
						?>
					</div>
					<div class="col-md-6">
						<?php /* if(true)//user is owner
						{
							echo '<a href="addContact.php" class="btn btn-info" role="button">Add contact</a>';
						}
						*/?>
					</div>
				</div>
				<table class="table table-hover">
					<thead>
						<tr>
							<th><strong>pickupID</strong></th>
							<th><strong>shipmentID</strong></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php
						foreach ($result as $pickup)
						{
							?>
							<tr onclick="location.href=<?php echo"'contact.php?id=".$customer["customerID"]."'";?>;" style="cursor: pointer">
							<?php // Above is some troublesome code, could probably work placed into a normal block of PHP but was having issues.
								echo '<td>';
									echo $pickup["pickupID"];
								echo '</td>';
								echo '<td>';
									echo $pickup["shipmentID"];
								echo '</td>';
								if(true) //(User is owner)
								{
									echo'<td>';
										echo '<a href="delete.php?id='.$customer["customerID"].'" class="btn btn-info" role="button">Delete</a>';
									echo '</td>';
								}
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
