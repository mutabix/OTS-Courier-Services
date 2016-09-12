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
    <?php include("includes/employee/sidebar.html"); ?>

    <div class="main-panel">
        <?php include("includes/navbar-mobile-open.html"); ?>
        <a class="navbar-brand" href="#">Dashboard</a>
        <?php include("includes/navbar-mobile-close.html"); ?>


        <div class="content">
            <div class="container-fluid">
                <?php
					$result = $dbConnection->prepare('SELECT customerID, companyName, firstName, lastName, email, mobileNumber, addressLine1, addressLine2, suburb, state, postcode
					FROM customers
					WHERE customerID = '.$_GET["id"].'');
				$result->execute();
				?>
				<table class="table">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Company Name</th>
							<th>Email</th>
							<th>Phone number</th>
							<th>Address</th>
							<th>Address (Will combine these two)</th>
							<th>Suburb</th>
							<th>State</th>
							<th>Postcode</th>
						</tr>
					</thead>
					<tbody>
					<?php
						foreach ($result as $customer)
						{
							echo '<tr>';
								echo '<td>';
									echo "<a href='contact=".$customer["customerID"]."'>".$customer["firstName"]."</a>";
								echo '</td>';
								echo '<td>';
									echo $customer['lastName'];
								echo '</td>';
								echo '<td>';
									echo $customer['companyName'];
								echo '</td>';
								echo '<td>';
									echo $customer['email'];
								echo '</td>';
								echo '<td>';
									echo $customer['mobileNumber'];
								echo '</td>';
								echo '<td>';
									echo $customer['addressLine1'];
								echo '</td>';
								echo '<td>';
									echo $customer['addressLine2'];
								echo '</td>';
								echo '<td>';
									echo $customer['suburb'];
								echo '</td>';
								echo '<td>';
									echo $customer['state'];
								echo '</td>';
								echo '<td>';
									echo $customer['postcode'];
								echo '</td>';

							echo '</tr>';
						}
						?>
					</tbody>
				</table>
				




            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>


</html>
