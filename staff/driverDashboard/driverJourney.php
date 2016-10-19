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
						<h3>Driver journey</h3>
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-md-6">
						
					</div>
				</div>




<table class="table table-striped">
					<tbody>
						<tr>
							<th><h3>Employee ID</h3></th>
							<tr>
							<td><input type="text" name="Employee ID" value="<?php echo htmlspecialchars($employeeID); ?>"></td>
							</tr>

								</tbody>
				</table>


							<div class="row">
					<div class="col-md-6">
					<?php						
							function myFunction()
							{
								$result = $dbConnection->prepare('INSERT INTO driverJourney (employeeID, startTime, endTime)
								
								VALUES (:employeeID, NOW(), NOW())');

								$result->bindParam(':employeeID', $employeeID);
								

								
								$employeeID = "1";
								
								
		
								try {
            $getemployeeID->execute();

        } catch(Exception $error) {
            echo 'Exception -> ';
            var_dump($error->getMessage());
        }
						$employeeID = $getemployeeID->Fetch();


							}	
							echo '<button onclick="myFunction()" return="myFunction()" class="btn btn-info">start</a>';
							echo '<button onclick="myFunction()" return="myFunction()" class="btn btn-info">end</a>';

						?>

</div>
				</div>


            </div>
        </div>







            </div>
        </div>


				

					



        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>


</html>
