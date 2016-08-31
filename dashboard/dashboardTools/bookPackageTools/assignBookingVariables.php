<?php

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

//Set package variables
$noOfPackages = $_POST["noOfPackages"];
$packageWeight = $_POST["packageWeight"];
$packageWidth = $_POST["packageWidth"];
$packageLength = $_POST["packageLength"];
$packageDepth = $_POST["packageDepth"];
$serviceTypeID = $_POST["serviceTypeID"];
$totalValue = $_POST["totalValue"];

$shipDateDay = $POST["shipDateDay"];
$shipDateMonth = $POST["shipDateMonth"];
$shipDateYear = $POST["shipDateYear"];

$date = mktime(0, 0, 0, $shipDateMonth, $shipDateDay, $shipDateYear);
$dateFormatted = date('Y-m-d', $ts);
$shipDate = $dateFormatted;
//$costToCustomerExGst = $_POST["costToCustomerExGst"];
?>