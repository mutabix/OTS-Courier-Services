<?php

$senderDetails = array();
$receiverDetails = array();
$shipmentDetails = array();

$senderCompanyName = $_POST["senderCompanyName"];
$senderFirstName = $_POST["senderFirstName"];
$senderLastName = $_POST["senderLastName"];
$senderEmail = $_POST["senderEmail"];
$senderMobile = $_POST["senderMobile"];
$senderAddressLine1 = $_POST["senderAddressLine1"];
$senderAddressLine2 = $_POST["senderAddressLine2"];
$senderSuburb = $_POST["senderSuburb"];
$senderState = $_POST["senderState"];
$senderPostcode = $_POST["senderPostcode"];

$senderDetails[0] = $senderCompanyName;
$senderDetails[1] = $senderFirstName;
$senderDetails[2] = $senderLastName;
$senderDetails[3] = $senderEmail;
$senderDetails[4] = $senderMobile;
$senderDetails[5] = $senderAddressLine1;
$senderDetails[6] = $senderAddressLine2;
$senderDetails[7] = $senderSuburb;
$senderDetails[8] = $senderState;
$senderDetails[9] = $senderPostcode;

//Set receiver variables
$receiverCompanyName = $_POST["receiverCompanyName"];
$receiverFirstName = $_POST["receiverFirstName"];
$receiverLastName = $_POST["receiverLastName"];
$receiverEmail = $_POST["receiverEmail"];
$receiverMobile = $_POST["receiverMobile"];
$receiverAddressLine1 = $_POST["receiverAddressLine1"];
$receiverAddressLine2 = $_POST["receiverAddressLine2"];
$receiverSuburb = $_POST["receiverSuburb"];
$receiverState = $_POST["receiverState"];
$receiverPostcode = $_POST["receiverPostcode"];

$receiverDetails[0] = $receiverCompanyName;
$receiverDetails[1] = $receiverFirstName;
$receiverDetails[2] = $receiverLastName;
$receiverDetails[3] = $receiverEmail;
$receiverDetails[4] = $receiverMobile;
$receiverDetails[5] = $receiverAddressLine1;
$receiverDetails[6] = $receiverAddressLine2;
$receiverDetails[7] = $receiverSuburb;
$receiverDetails[8] = $receiverState;
$receiverDetails[9] = $receiverPostcode;

//Set package variables
$noOfPackages = $_POST["noOfPackages"];
$packageWidth = $_POST["packageWidth"];
$packageLength = $_POST["packageLength"];
$packageDepth = $_POST["packageDepth"];
$serviceTypeID = $_POST["serviceType"];
$packageTypeID = $_POST["packageType"];
$totalValue = $_POST["totalValue"];

$noOfPackages = 1;

$shipmentDetails[0] = $noOfPackages;
$shipmentDetails[1] = $packageWidth;
$shipmentDetails[2] = $packageLength;
$shipmentDetails[3] = $packageDepth;
$shipmentDetails[4] = $serviceTypeID;
$shipmentDetails[5] = $packageTypeID;
$shipmentDetails[6] = $totalValue;

$shipDateDay = $POST["shipDateDay"];
$shipDateMonth = $POST["shipDateMonth"];
$shipDateYear = $POST["shipDateYear"];

$date = mktime(0, 0, 0, $shipDateMonth, $shipDateDay, $shipDateYear);
$dateFormatted = date('Y-m-d', $ts);
$shipDate = $dateFormatted;
//$costToCustomerExGst = $_POST["costToCustomerExGst"];

$_SESSION['senderDetails'] = $senderDetails;
$_SESSION['receiverDetails'] = $receiverDetails;
$_SESSION['shipmentDetails'] = $shipmentDetails;
?>