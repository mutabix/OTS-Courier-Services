<?php
    session_start(); //ensure session is started.

$addBooking = $dbConnection->prepare("INSERT INTO bookings (shipmentId, customerId, senderCompanyName, senderFirstName, senderLastName, senderEmail, senderMobile, senderAddressLine1, senderAddressLine2, senderSuburb, senderState, senderPostcode, receiverCompanyName, receiverFirstName, receiverLastName, receiverEmail, receiverMobile, receiverAddressLine1, receiverAddressLine2, receiverSuburb, receiverState, receiverPostcode, noOfPackages, packageWidth, packageLength, packageDepth, serviceTypeID, totalValue)VALUES (DEFAULT, :customerId, :senderCompanyName, :senderFirstName, :senderLastName, :senderEmail, :senderMobile, :senderAddressLine1, :senderAddressLine2, :senderSuburb, :senderState, :senderPostcode, :receiverCompanyName, :receiverFirstName, :receiverLastName, :receiverEmail, :receiverMobile, :receiverAddressLine1, :receiverAddressLine2, :receiverSuburb, :receiverState, :receiverPostcode, :noOfPackages, :packageWidth, :packageLength, :packageDepth, :serviceTypeID, :totalValue)");
    
    
$senderCompanyName = $_SESSION['senderDetails'] [0];
$senderFirstName = $_SESSION['senderDetails'] [1];
$senderLastName = $_SESSION['senderDetails'] [2];
$senderEmail = $_SESSION['senderDetails'] [3];
$senderMobile = $_SESSION['senderDetails'] [4];
$senderAddressLine1 = $_SESSION['senderDetails'] [5];
$senderAddressLine2 = $_SESSION['senderDetails'] [6];
$senderSuburb = $_SESSION['senderDetails'] [7];
$senderState = $_SESSION['senderDetails'] [8];
$senderPostcode = $_SESSION['senderDetails'] [9];

$receiverCompanyName = $_SESSION['receiverDetails'] [0];
$receiverFirstName = $_SESSION['receiverDetails'] [1];
$receiverLastName = $_SESSION['receiverDetails'] [2];
$receiverEmail = $_SESSION['receiverDetails'] [3];
$receiverMobile = $_SESSION['receiverDetails'] [4];
$receiverAddressLine1 = $_SESSION['receiverDetails'] [5];
$receiverAddressLine2 = $_SESSION['receiverDetails'] [6];
$receiverSuburb = $_SESSION['receiverDetails'] [7];
$receiverState = $_SESSION['receiverDetails'] [8];
$receiverPostcode = $_SESSION['receiverDetails'] [9];

$noOfPackages = $_SESSION['shipmentDetails'] [0];
$packageWidth = $_SESSION['shipmentDetails'] [1];
$packageLength = $_SESSION['shipmentDetails'] [2];
$packageDepth = $_SESSION['shipmentDetails'] [3];
$serviceTypeID = $_SESSION['shipmentDetails'] [4];
$packageTypeID = $_SESSION['shipmentDetails'] [5];
$totalValue = $_SESSION['shipmentDetails'] [6];

//Remove all session variable
for($i=0; $i<9; $i++){
    $_SESSION['senderDetails'] [$i] = "";
    $_SESSION['receiverDetails'] [$i] = "";
}

for($i=0; $i<6; $i++){
    $_SESSION['shipmentDetails'] [$i] = "";
}

//$_SESSION['bookingID'] = $bookingID; //Place booking ID back in session storage
    //Bind parameters

	//TEST DATA

	$_SESSION['customerIdLogin'] = 1; //DUMMY DATA

    $customerId = $_SESSION['customerIdLogin'];
    /*$getShipmentId = $dbConnection->prepare("SELECT MAX(shipmentId) FROM bookings");

    
    try {
        $getShipmentId->execute();

    } catch(Exception $error) {
        echo 'Exception -> ';
        var_dump($error->getMessage());
    }
    
    //SHOULD ONLY RETREIVE ONE VALUE
    while($shipmentId = $getShipmentId->fetch(PDO::FETCH_ASSOC)){
        $shipmentId = $maxShipmentID + 1;
    }*/

	//$addBooking->bindParam(':shipmentId', $shipmentId);
    $addBooking->bindParam(':customerId', $customerId);

    $addBooking->bindParam(':senderCompanyName', $senderCompanyName);
    $addBooking->bindParam(':senderFirstName', $senderFirstName);
    $addBooking->bindParam(':senderLastName', $senderLastName);
    $addBooking->bindParam(':senderEmail', $senderEmail);
    $addBooking->bindParam(':senderMobile', $senderMobile);
    $addBooking->bindParam(':senderAddressLine1', $senderAddressLine1);
    $addBooking->bindParam(':senderAddressLine2', $senderAddressLine2);
    $addBooking->bindParam(':senderSuburb', $senderSuburb);
    $addBooking->bindParam(':senderState', $senderState);
    $addBooking->bindParam(':senderPostcode', $senderPostcode);

    $addBooking->bindParam(':receiverCompanyName', $receiverCompanyName);
    $addBooking->bindParam(':receiverFirstName', $receiverFirstName);
    $addBooking->bindParam(':receiverLastName', $receiverLastName);
    $addBooking->bindParam(':receiverEmail', $receiverEmail);
    $addBooking->bindParam(':receiverMobile', $receiverMobile);
    $addBooking->bindParam(':receiverAddressLine1', $receiverAddressLine1);
    $addBooking->bindParam(':receiverAddressLine2', $receiverAddressLine2);
    $addBooking->bindParam(':receiverSuburb', $receiverSuburb);
    $addBooking->bindParam(':receiverState', $receiverState);
    $addBooking->bindParam(':receiverPostcode', $receiverPostcode);

    $addBooking->bindParam(':noOfPackages', $noOfPackages);
    $addBooking->bindParam(':packageWidth', $packageWidth);
    $addBooking->bindParam(':packageLength', $packageLength);
    $addBooking->bindParam(':packageDepth', $packageDepth);
    $addBooking->bindParam(':serviceTypeID', $serviceTypeID); //NEEDS TO BE ASSIGNED BASED ON SELECTION
    $addBooking->bindParam(':totalValue', $totalValue);
    

    try {
    	$addBooking->execute(); //Executes $addBooking - adds the data into the database
        echo "executed";

    } catch(Exception $error) {
    	echo 'Exception -> ';
    	var_dump($error->getMessage());
    }


	//$costToCustomerExGst = $_POST["costToCustomerExGst"]


$addShipment = $dbConnection->prepare("INSERT INTO shipments (trackingNumber, shipmentStatusCode, pendingBool, pendingDate) VALUES (DEFAULT, :shipmentStatusCode, :pendingBool, NOW())");

$shipmentStatusCode = 0;
$pendingBool = 0;
$trackingNumber = time() + mt_rand(50, 999) + mt_rand(1, 99);

$addShipment->bindParam(':trackingNumber', $trackingNumber);
$addShipment->bindParam(':shipmentStatusCode', $shipmentStatusCode);
$addShipment->bindParam(':pendingBool', $pendingBool);

try {
    $addShipment->execute(); //Executes $addBooking - adds the data into the database
    //echo "executed";

} catch(Exception $error) {
    echo 'Exception -> ';
    var_dump($error->getMessage());
}



$addSavedTracking = $dbConnection->prepare("INSERT INTO tracking (trackingID, trackingNumber, customer) VALUES (DEFAULT, :trackingNumber, :customer)");


$customer = $_SESSION['username'];

$addSavedTracking->bindParam(':trackingNumber', $trackingNumber);
$addSavedTracking->bindParam(':customer', $customer);

try {
    $addSavedTracking->execute(); //Executes $addBooking - adds the data into the database
    //echo "executed";

} catch(Exception $error) {
    echo 'Exception -> ';
    var_dump($error->getMessage());
}

$_SESSION['bookingID'] = $shipmentId;
$_SESSION['trackingNumber'] = $trackingNumber;

?>
