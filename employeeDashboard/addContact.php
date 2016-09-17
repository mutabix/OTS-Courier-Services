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
				<div class="row">
					<div class="col-md-6">
						<h2>Add contact</h2>
					</div>
				</div>
				
				<table class="table table-striped">
					<tbody>
						<tr>
							<th><h3>First Name</h3></th>
							<th><h3>Last Name</h3></th>
							<th><h3>Company Name</h3></th>
						</tr>
						<tr>
							<td><input type="text" name="firstName" value="<?php echo htmlspecialchars($firstName); ?>"></td>
							<td><input type="text" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>"></td>
							<td><input type="text" name="companyName" value="<?php echo htmlspecialchars($companyName); ?>"></td>
						</tr>
						<tr>
							<th><h3>Email</h3></th>
							<th><h3>Phone Number</h3></th>
							<th><h3>Address</h3></th>
						</tr>
						<tr>
							<td><input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>"></td>
							<td><input type="text" name="mobileNumber" value="<?php echo htmlspecialchars($mobileNumber); ?>"></td>
							<td><input type="text" name="addressLine1" value="<?php echo htmlspecialchars($addressLine1); ?>"></td>
						</tr>
						<tr>
							<th><h3>Suburb</h3></th>
							<th><h3>State</h3></th>
							<th><h3>Postcode</h3></th>							
						</tr>
						<tr>
							<td><input type="text" name="suburb" value="<?php echo htmlspecialchars($suburb); ?>"></td>
							<td><input type="text" name="state" value="<?php echo htmlspecialchars($state); ?>"></td>
							<td><input type="text" name="postcode" value="<?php echo htmlspecialchars($postcode); ?>"></td>
						</tr>
					</tbody>
				</table>
				<div class="row">
					<div class="col-md-6">
						<?php						
							function myFunction()
							{
								$result = $dbConnection->prepare('INSERT INTO customers (customerID, firstName, lastName, companyName, email, mobileNumber, addressLine1, suburb, state, postcode)
								VALUES (NULL :firstName, :lastName, :companyName, :email, :mobileNumber, :addressLine1, :suburb, :state, :postcode)');
								$result->bindParam(':firstName', $firstName);
								$result->bindParam(':lastName', $lastName);
								$result->bindParam(':companyName', $companyName);
								
								$result->bindParam(':email', $email);
								$result->bindParam(':mobileNumber', $mobileNumber);
								$result->bindParam(':addressLine1', $addressLine1);
								
								$result->bindParam(':suburb', $suburb);
								$result->bindParam(':state', $state);
								$result->bindParam(':postcode', $postcode);
								
								$firstName = "Test";
								$lastName = "Test";
								$companyName = "Test";
								
								$email = "Test";
								$mobileNumber = "123";
								$addressLine1 = "Test";
								
								$suburb = "Test";
								$state = "Test";
								$postcode = "Test";
								
								$result->execute();


							}	
							echo '<button onclick="myFunction()" return="myFunction()" class="btn btn-info">Add contact</a>';
						?>
					</div>
				</div>


            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>


</html>
