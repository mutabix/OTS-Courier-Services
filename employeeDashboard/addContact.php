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
				<table class="table table-striped">
					<tbody>
						<tr>
							<th><h3>First Name</h3></th>
							<th><h3>Last Name</h3></th>
							<th><h3>Company Name</h3></th>
							<!--<th><strong>Email</strong></th>
							<th><strong>Address</strong></th>
							<th><strong>Suburb</strong></th>
							<th><strong>State</strong></th>
							<th><strong>Postcode</strong></th>-->
						</tr>
						<tr>
							<td><input type="text"></td>
							<td><input type="text"></td>
							<td><input type="text"></td>
						</tr>
						<tr>
							<th><h3>Email</h3></th>
							<th><h3>Phone Number</h3></th>
							<th><h3>Address</h3></th>
						</tr>
						<tr>
							<td><input type="text"></td>
							<td><input type="text"></td>
							<td><input type="text"></td>
						</tr>
						<tr>
							<th><h3>Suburb</h3></th>
							<th><h3>State</h3></th>
							<th><h3>Postcode</h3></th>							
						</tr>
						<tr>
							<td><input type="text"></td>
							<td><input type="text"></td>
							<td><input type="text"></td>
						</tr>
					</tbody>
				</table>



            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>


</html>
