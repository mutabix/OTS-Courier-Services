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
				$result = $dbConnection->prepare('SELECT customerID, companyName, firstName, lastName, email, mobileNumber, state
				FROM customers');
				$result->execute();
				
				echo '<table class="table">
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Company Name</th>
								<th>Email</th>
								<th>Phone number</th>
								<th>State</th>
							</tr>
						</thead>
						<tbody>';
						foreach ($result as $customer)
						{
							echo '<tr>';
								echo '<td>';
									echo "<a href='contacts=".$customer["customerID"]."'>".$customer["firstName"]."</a>";
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
									echo $customer['state'];
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
