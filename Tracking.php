<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8" />
		<title>Track</title>
<style>
	body{
		font-family: sans-serif;
		font-size: 1em;
	}
	</style>
		 
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
  <label>Name:
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

$hostname='d6q8diwwdmy5c9k9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
$username='tgs66cq1wippa93b';
$password='xi7mibqw1s765w4q';
$dbname='vrtpy2jtdixgvmr';
$usertable='Tracking';
$location = $_POST['location'];
$usertable = $_POST['usertable'];


mysql_connect($hostname,$username, $password), ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname);

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


?>

</body>
</html>
