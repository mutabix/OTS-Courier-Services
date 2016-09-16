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
					$result = $dbConnection->prepare('SELECT employeeID, firstName, lastName, email, mobileNumber
					FROM employees
					WHERE employeeID = '.$_GET["id"].'');
					$result->execute();
				
					foreach($result as $employee)
					{
						echo $employee['employeeID'];
						echo $employee['firstName'];
						echo $employee['lastName'];
						echo $employee['email'];
						echo $employee['mobileNumber'];
					}
					
				
				?>

            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>


</html>
