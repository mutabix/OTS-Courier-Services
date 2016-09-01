<?php
	$addBooking = $dbConnection->prepare("INSERT INTO shipments (shipmentId, customerId, senderCompanyName, senderFirstName, senderLastName, senderEmail, senderMobile, senderAddressLine1, senderAddressLine2, senderSuburb, senderState, senderPostcode, receiverCompanyName, receiverFirstName, receiverLastName, receiverEmail, receiverMobile, receiverAddressLine1, receiverAddressLine2, receiverSuburb, receiverState, receiverPostcode, noOfPackages, packageWeight, packageWidth, packageLength, packageDepth, serviceTypeID, totalValue)VALUES (:shipmentId, :customerId, :senderCompanyName, :senderFirstName, :senderLastName, :senderEmail, :senderMobile, :senderAddressLine1, :senderAddressLine2, :senderSuburb, :senderState, :senderPostcode, :receiverCompanyName, :receiverFirstName, :receiverLastName, :receiverEmail, :receiverMobile, :receiverAddressLine1, :receiverAddressLine2, :receiverSuburb, :receiverState, :receiverPostcode, :noOfPackages, :packageWeight, :packageWidth, :packageLength, :packageDepth, :serviceTypeID, :totalValue)");
    
    //Bind parameters

	//TEST DATA
	$shipmentId = 3;
	$customerId = 1;

	include ("dashboardTools/bookPackageTools/getCustomerId.php");
    include ("dashboardTools/bookPackageTools/getShipmentId.php");

	$addBooking->bindParam(':shipmentId', $shipmentId);
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
    $addBooking->bindParam(':packageWeight', $packageWeight);
    $addBooking->bindParam(':packageWidth', $packageWidth);
    $addBooking->bindParam(':packageLength', $packageLength);
    $addBooking->bindParam(':packageDepth', $packageDepth);
    $addBooking->bindParam(':serviceTypeID', $serviceTypeID); //NEEDS TO BE ASSIGNED BASED ON SELECTION
    $addBooking->bindParam(':totalValue', $totalValue);
    
    try {
    	$addBooking->execute(); //Executes $addBooking - adds the data into the database

    } catch(Exception $error) {
    	echo 'Exception -> ';
    	var_dump($error->getMessage());
    }


	//$costToCustomerExGst = $_POST["costToCustomerExGst"];




?>

