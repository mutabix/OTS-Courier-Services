<?php
    include ("../dbTools/dbConnect.php");


<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8" />
		<title>Track</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
		<link rel="shortcut icon" href="images/favicon.ico" />
		<meta name ="viewport" content="width=device-width, initial-scale=1">
<div id="wrapper">
			<div class="container-fluid">
				<div class="row">
					<div id="login_top_bar">
						<p><a href="#">Facebook</a> | <a href="#">Twitter</a> | <a href="#">My Dashboard</a> | <a href="#">Support</a></p>
					</div>
				</div>
			</div>

			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 logo">
						<img class="img-responsive" src="assets/img/logo.png" alt="On The Spot Couriers">
					</div>
				
					<div class="col-md-6 main_navigation">
						<ul>
						<li><a class="active" href="#">Home</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Ship</a></li>
						<li><a href="#">Track</a></li>
						<li><a href="#">Contact Us</a></li>
						</ul>
						
					</div>
				</div>
			</div>
		 
		<link rel="stylesheet" type="text/css" href="css/styles_'.css">
		</head>
		<body>
        
        
		
<div class="main-panel">
        <?php include("includes/navbar-mobile-open.html"); ?>
        <a class="navbar-brand" href="#">Track your package</a>
        <?php include("includes/navbar-mobile-close.html"); ?>


		<h1>Track your package</h1>

		<?php include("includes/styling_scripts/meta.html"); ?>
        <?php include("includes/styling_scripts/css.html"); ?>
        <?php include("includes/styling_scripts/fonts-icons.html"); ?>
        <?php include("includes/styling_scripts/javascript.html"); ?>


		<form action="Tracking.php" method="get">
  <label>Tracking number:
  <input type="number" name="tracking number" />
  </label>
  <input type="submit" value="Track" />
</form>
	<?php

	$searchTerm = trim($_GET['number']);


if($searchTerm == "")
{
echo "Enter tracking number";
exit();
}


$usertable='bookings';
$location = $_POST['location'];
$usertable = $_POST['usertable'];


$query = "select * from $usertable where Location = '$location'";

$query = 'SELECT * FROM ' . $usertable;
$result = mysql_query($query);
if($result) {
while($row = mysql_fetch_array($result))
echo $row['Date/Time'] . " " . $row['Event']. " ". $row['Location']. " " . $row['Details'];
echo "
";
}

$query = "SELECT * FROM customer_details WHERE id LIKE '%$searchTerm%'";
$results = mysqli_query($link, $query);

if(mysqli_num_rows($results) >= 1)
{
    $output = "";
    while($row = mysqli_fetch_array($results))
{


echo '<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>';

while ($row = mysqli_fetch_array($results)) {
    echo '
        <tr>
            <td>'.$row['tracking number'].'</td>
            <td>'.$row['location'].'</td>
        </tr>';

}

echo '
</table>';


}
echo $output;
}
else
    echo "There was no matching record for the name " . $searchTerm;
?>

<footer>
	<p>© 2016 Geckoboard. All rights reserved.</p>
</footer>

		</div>

</body>
</html>


