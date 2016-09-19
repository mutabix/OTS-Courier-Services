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
        <a class="navbar-brand" href="#">Dashboard</a>
        <?php include("includes/navbar-mobile-close.html"); ?>


        <div class="content">
            <div class="container-fluid">
                <?php
					$result = $dbConnection->prepare('SELECT customerID, companyName, firstName, lastName, email, mobileNumber, addressLine1, addressLine2, suburb, state, postcode
					FROM customers
					WHERE customerID = '.$_GET["id"].'');
					$result->execute();
					
					foreach ($result as $customer)
					{
						//Don't need to assign variables here
					}
				?>
				<div class="row">
					<div class="col-md-6">
						<?php 
						echo '<h2>';
						echo $customer['firstName'];
						echo ' ';
						echo $customer['lastName'];
						echo '</h2>';
						?>
					</div>
					<div class="col-md-6">
						<!-- Maybe have a notes section here? -->
					</div>
				</div>
				
				<table class="table table-striped">
				<?php
					echo '<tbody>';
						echo '<tr>';
							echo '<th><h3>First Name</h3></th>';
							echo '<th><h3>Last Name</h3></th>';
							echo '<th><h3>Company Name</h3></th>';
						echo '</tr>';
						echo '<tr>';
							echo '<td><h5>'.$customer["firstName"].'</h5></td>';
							echo '<td><h5>'.$customer["lastName"].'</h5></td>';
							echo '<td><h5>'.$customer["companyName"].'</h5></td>';
						echo '</tr>';
						echo '<tr>';
							echo '<th><h3>Email</h3></th>';
							echo '<th><h3>Phone Number</h3></th>';
							echo '<th><h3>Address</h3></th>';
						echo '</tr>';
						echo '<tr>';
							echo '<td><h5>'.$customer["email"].'</h5></td>';
							echo '<td><h5>'.$customer["mobileNumber"].'</h5></td>';
							echo '<td><h5>'.$customer["addressLine1"].' '.$customer["addressLine2"].'</h5></td>';
						echo '</tr>';
						echo '<tr>';
							echo '<th><h3>Suburb</h3></th>';
							echo '<th><h3>State</h3></th>';
							echo '<th><h3>Postcode</h3></th>';							
						echo '</tr>';
						echo '<tr>';
							echo '<td><h5>'.$customer["suburb"].'</h5></td>';
							echo '<td><h5>'.$customer["state"].'</h5></td>';
							echo '<td><h5>'.$customer["postcode"].'</h5></td>';
						echo '</tr>';
					echo '</tbody>';
				echo '</table>';
				?>
				<div class="row">
					<div class="col-md-6">
						<?php /* if(true)//user is owner
						{
							echo '<form>';
								echo '<a href="#" class="btn btn-info" role="button">Edit contact</a>';
							echo '</form>';
						}
						*/?>
					</div>
				</div>

            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>


</html>
