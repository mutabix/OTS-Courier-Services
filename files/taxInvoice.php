<?php
	include ("../dbTools/dbConnect.php");
	session_start();

	$taxInvoiceNumber = $_SESSION['taxInvoiceNumber'];

	$getTaxInvoice = $dbConnection->prepare("SELECT * FROM payments WHERE taxInvoiceID = :taxInvoiceID");
    $getTaxInvoice->bindParam(':taxInvoiceID', $taxInvoiceNumber);

    try {
        $getTaxInvoice->execute();
    } catch(Exception $error) {
        echo 'Exception -> ';
        var_dump($error->getMessage());
    }

    $taxInvoice = $getTaxInvoice->fetch();

    $orderNumber = $taxInvoice['shipmentId'];
    $paymentAmount = $taxInvoice['paymentAmount'];

    $retrievedPaymentType = $taxInvoice['paymentType'];
    $taxInvoiceDate = $taxInvoice['generatedDate'];
    $taxInvoiceDate = new DateTime($taxInvoiceDate);
    $taxInvoiceDate = date_format($taxInvoiceDate, 'd/m/Y');

    $paymentAmountGst = $paymentAmount * 0.1;

    if($retrievedPaymentType == 0){
    	$paymentType = "Cash";
    } else if($retrievedPaymentType == 1){
    	$paymentType = "Eftpos";
    } else if($retrievedPaymentType == 2){
    	$paymentType = "Cheque";
    } 
    

    $getBooking = $dbConnection->prepare("SELECT * FROM bookings WHERE shipmentId = :shipmentId");
    $getBooking->bindParam(':shipmentId', $orderNumber);
    try {
        $getBooking->execute();
    } catch(Exception $error) {
        echo 'Exception -> ';
        var_dump($error->getMessage());
    }

    $bookingDetails = $getBooking->fetch();

    $senderCompanyName = $bookingDetails['senderCompanyName'];
	$senderFirstName = $bookingDetails['senderFirstName'];
	$senderLastName = $bookingDetails['senderLastName'];
	$senderAddressLine1 = $bookingDetails['senderAddressLine1'];
	$senderAddressLine2 = $bookingDetails['senderAddressLine2'];
	$senderSuburb = $bookingDetails['senderSuburb'];
	$senderState = $bookingDetails['senderState'];
	$senderPostcode = $bookingDetails['senderPostcode'];
	$receiverState = $bookingDetails['receiverState'];
	$packageTypeID = $bookingDetails['packageTypeID'];









	/*$taxInvoiceDate = $_SESSION['invoiceDate'];
	$orderNumber = $_SESSION['bookingID'];

	$senderCompanyName = $_SESSION['senderDetails'] [0];
	$senderFirstName = $_SESSION['senderDetails'] [1];
	$senderLastName = $_SESSION['senderDetails'] [2];
	$senderAddressLine1 = $_SESSION['senderDetails'] [5];
	$senderAddressLine2 = $_SESSION['senderDetails'] [6];
	$senderSuburb = $_SESSION['senderDetails'] [7];
	$senderState = $_SESSION['senderDetails'] [8];
	$senderPostcode = $_SESSION['senderDetails'] [9];
	$receiverState = $_SESSION['receiverDetails'] [8];
	$packageTypeID = $_SESSION['shipmentDetails'] [5];*/

	//echo $senderState;

	if($senderState == $receiverState){
		$deliveryDetail = "Interstate";
	} else {
		$deliveryDetail = "Intrastate";
	}

	if($packageTypeID == 0){
		$packageDetail = "1kg Satchel";
	} else if($packageTypeID == 1){
		$packageDetail = "3kg Satchel";
	} else if($packageTypeID == 2){
		$packageDetail = "5kg Satchel";
	} else if($packageTypeID == 3){
		$packageDetail = "1kg Box";
	} else if($packageTypeID == 4){
		$packageDetail = "3kg Box";
	} else if($packageTypeID == 5){
		$packageDetail = "5kg Box";
	} else if($packageTypeID == 6){
		$packageDetail = "10kg Box";
	} else if($packageTypeID == 7){
		$packageDetail = "20kg Box";
	} 




?>

<!DOCTYPE html>
<html>
	<head>
		
	</head>
	<body>
		<div id='invoice-wrapper'>
			<img src="../../../../../assets/img/logo.png" >

			<div id="taxInvoiceDetails">
				<h1>Tax Invoice</h1>
				<strong>INVOICE NUMBER: <?php echo $taxInvoiceNumber; ?></strong>
				<br>
				<strong> DATE: <?php echo $taxInvoiceDate; ?></strong>
				<br><br>
				<p>ON THE SPOT COURIER SERVICES <br>
				ABN: 12 345 678 999 <br>
				PH: 1300 OTS CS0 <br>
				FAX: 1300 FAX OTS</p>
				<br>
				<p>PO Box 1000</p>
				<p>Brisbane 4000</p>
				<p>www.otscouriers.com.au</p>
			</div>

			<div id="invoiceToDetails">
				<br><br><br><br><br>
				<strong><?php echo $senderCompanyName; ?></strong>
				<br>
				<strong><?php echo $senderFirstName . " " . $senderLastName; ?></strong>
				<p><?php echo $senderAddressLine1; ?></p>
				<?php if ($senderAddressLine2 != ""){ echo "<p>". $senderAddressLine2 . "</p>"; }?>
				<p><?php echo $senderSuburb; ?></p>
				<p><?php echo $senderState . ", " . $senderPostcode; ?></p>
			</div>
			<br>
			<table cellpadding="0" cellspacing="0" id="invoiceTable">   
				<tr>
					<th>QTY</th>
					<th>DESCRIPTION</th>
					<th>PRICE</th>
					<th>AMOUNT</th>
				</tr>         
	            <tr class="first-item">
	                <td>
	                	1
	                	<div class='spacer1'></div>
	                </td>
	                <td>
	                	Package Shipment &rarr; Order Number: <?php echo $orderNumber; ?>
	                	<br> &nbsp; &nbsp; 
	                	Type: <?php echo $packageDetail; ?> 
	                	<br> &nbsp; &nbsp; 
	                	Shipping: <?php echo $deliveryDetail; ?>
	                	<div class='spacer1'></div>
	                </td>
	                <td>
        				<?php echo '$' . number_format((float)($paymentAmount - $paymentAmountGst), 2, '.', ''); ?>
	                	<div class='spacer1'></div>
	                </td>
	                <td>
        				<?php echo '$' . number_format((float)($paymentAmount - $paymentAmountGst), 2, '.', ''); ?>
	                	<div class='spacer1'></div>
	                </td>
	            </tr>
        		<tr>
        			<td colspan="2" class='noteSection'>
        				<br>
        				NOTE: <br>
        				Selected Payment Method: <?php echo $paymentType; ?> <br>
        				Payment collected on pickup <br>
        				<br><br>

        				Payment Collected & Package Collected (sign below) <br><br>
        				Customer Signature: ________________________ &nbsp; &nbsp; Date: ___________
        				<br><br>
        				Driver Signature: ____________________________ &nbsp; &nbsp; Date: ___________
        				<br>
        				<br>
        			</td>
        			<td class='pricingCellFirst'>
        				AMOUNT
        				<br>
        				GST
        				<br><br>
        				<strong>TOTAL</strong>
        			</td>
        			<td class='pricingCellSecond'>
        				<?php echo '$' . number_format((float)($paymentAmount - $paymentAmountGst), 2, '.', ''); ?>
        				<br>
        				<?php echo '$' . number_format((float)$paymentAmountGst, 2, '.', ''); ?>
        				<br><br>
        				<strong><?php echo '$' . $paymentAmount; ?></strong>
        			</td>
        		</tr>
        	</table>
		</div>

		


	</body>

	<style>
		@import 'https://fonts.googleapis.com/css?family=Open+Sans:400,700';

		*{
			margin: 0;
			padding: 0;
			font-family: 'Open Sans', sans-serif;

		}

		body{
			background-image: url("bkg.png");
			background-color: #ababab;
		}

		img{
			width: 225px;
			height: auto;
			margin-top: 20px;
			margin-left: 20px;
			float: left;
		}

		#invoice-wrapper{
			/*height: 29.7cm;
			width: 21cm;*/
			height: 220.077mm;
			width: 155.61mm;
			margin: 0 auto;
			margin-top: 20px;
			background-color: #ffffff;
		}

		#taxInvoiceDetails{
			float: right;
			text-align: right;
			margin-right: 20px;
		}

		#taxInvoiceDetails h1{
			margin-bottom: -8px;
			margin-top: 5px;
			font-size: 35px;
		}

		#taxInvoiceDetails strong{
			font-size: 12px;
		}

		#taxInvoiceDetails p{
			font-size: 12px;
		}

		#invoiceToDetails {
			float: left;
			margin-left: -220px;
			text-align: left;
		}

		#invoiceToDetails strong{
			font-size: 12px;
		}

		#invoiceToDetails p{
			font-size: 12px;
		}

		#invoiceTable{
			margin-top: 275px;
			margin-right: 20px;
			margin-left: 20px;
			width: 550px;
			table-layout: fixed;
			border: 2px solid #888888;
		}

		#invoiceTable td {
		}

		#invoiceTable tr th {
			text-align: left;
			font-size: 12px;
			padding-top: 5px;
			padding-bottom: 5px;
			padding-left: 5px;
			border: 2px solid #888888;
			border-left: none;
			border-top: none;

		}

		#invoiceTable tr th:nth-child(1){
			width: 40px;
		}

		#invoiceTable tr th:nth-child(2){
		}

		#invoiceTable tr th:nth-child(3){
			width: 80px;
		}

		#invoiceTable tr th:nth-child(4){
			border-right: none;
			width: 80px;
		}

		#invoiceTable tr td:nth-child(1){
			border-right: 2px solid #888888;
			border-bottom: 2px solid #888888;
			padding-left: 5px;
			padding-top: 5px;
			padding-bottom: 5px;
			font-size: 12px;
		}

		#invoiceTable tr td:nth-child(2){
			border-right: 2px solid #888888;
			border-bottom: 2px solid #888888;

			padding-left: 5px;
			padding-top: 5px;
			padding-bottom: 5px;
			font-size: 12px;
		}

		#invoiceTable tr td:nth-child(3){
			border-right: 2px solid #888888;
			border-bottom: 2px solid #888888;

			padding-left: 5px;
			padding-top: 5px;
			padding-bottom: 5px;
			font-size: 12px;
		}

		#invoiceTable tr td:nth-child(4){
			border-bottom: 2px solid #888888;

			padding-left: 5px;
			padding-top: 5px;
			padding-bottom: 5px;
			font-size: 12px;
		}

		.spacer1{
			height: 200px;
		}

		.pricingCellFirst{
			vertical-align: bottom;
			text-align: right;
			padding-right: 5px;
			border-bottom: none !important;
		}

		.pricingCellSecond{
			vertical-align: bottom;
			text-align: left;
			padding-left: 5px;
			border-bottom: none !important;
			border-right: none !important;
		}

		.noteSection{
			border-bottom: none !important;
		}
	</style>
	<style type="text/css" media="print">
		@page {
			margin: 0;
		}

	  	BODY {
		    PAGE-BREAK-BEFORE: always;
		    width:100%;
		    height:100%;
		    margin-top: -20px;
		    zoom: 140%;
		    filter: progid:DXImageTransform.Microsoft.BasicImage(Rotation=3);
		}
	</style>

</html>

