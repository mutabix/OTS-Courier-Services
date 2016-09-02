<?php for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
        <tr>
                <td><?php echo $results->data[$i]['shipmentId']; ?></td>
                <td><?php echo $results->data[$i]['shipmentSatus']; ?></td>
                <td><?php echo $results->data[$i]['deliveryDueBy']; ?></td>
                <
        </tr>
<?php endfor; ?>

<?php
    include("../dbTools/dbConnect.php");
    //include("dashboardTools/checkAndValidateLogin.php");
    session_start();
    //Set variables
?>

<!doctype html>
<html lang="en">
<head>
	<title>List of shipment</title>

    <?php include("includes/styling_scripts/meta.html"); ?>
    <?php include("includes/styling_scripts/css.html"); ?>
    <?php include("includes/styling_scripts/fonts-icons.html"); ?>
    <?php include("includes/styling_scripts/javascript.html"); ?>
</head>
<body>

<?php
    require_once 'Paginator.class.php';
 
    $conn       = new mysqli( 'd6q8diwwdmy5c9k9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com, tgs66cq1wippa93b, xi7mibqw1s765w4q, vrtpy2jtdixgvmr, Shipping'; );
 
    $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 25;
    $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
    $query      = "SELECT Shipping.shipmentId, Shipping.shipmentSatus, Shipping.deliveryDueBy FROM Shipping WHERE Shipping.shipmentId = Shipping.shipmentSatus,";
 
    $Paginator  = new Paginator( $conn, $query );

    if (isset($_POST['apprrovalstat'])) {
                mysql_query("UPDATE webform_submitted_data SET approval_status = '". $_POST['apprrovalstat'] ."'
                WHERE CONCAT(nid, sid) = '".$projid."' AND '". $_POST['apprrovalstat'] ."' != '-select-';" );
                echo "Rows updated";
            }
            else {
                echo "Update error";
 
    $results    = $Paginator->getData( $page, $limit );
?>
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



<?php for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
        <tr>
                <td><?php echo $results->data[$i]['shipmentId']; ?></td>
                <td><?php echo $results->data[$i]['shipmentSatus']; ?></td>
                <td><?php echo $results->data[$i]['deliveryDueBy']; ?></td>
              
        </tr>
<?php endfor; ?>

<?php echo $Paginator->createLinks( $links, 'pagination pagination-sm' ); ?> 


        </body>
</html>