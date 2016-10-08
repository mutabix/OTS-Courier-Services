<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>
	<head>
		
	</head>
	<body>
		<div id='invoice-wrapper'>
			<img src="../../../../../assets/img/logo.png" >

			<div id="taxInvoiceDetails">
				<h1>Tax Invoice</h1>
				<strong>INVOICE NUMBER: 111111111</strong>
				<br>
				<strong> DATE: 01/01/2000</strong>
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
				<br><br>
				<strong>Sender Company Name</strong>
				<br>
				<strong>Sender Name</strong>
				<p>Sender Address Line 1</p>
				<p>Sender Address Line 2</p>
				<p>Suburb</p>
				<p>State, Postcode</p>
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
	                	Package Shipment &rarr; Order Number: 0000000
	                	<br> &nbsp; &nbsp; 
	                	Type: 1kg Package 
	                	<br> &nbsp; &nbsp; 
	                	Shipping: Intrastate
	                	<div class='spacer1'></div>
	                </td>
	                <td>
	                	$0.00
	                	<div class='spacer1'></div>
	                </td>
	                <td>
	                	$0.00
	                	<div class='spacer1'></div>
	                </td>
	            </tr>
        		<tr>
        			<td colspan="2" class='noteSection'>
        				<br>
        				NOTE: <br>
        				Selected Payment Method: Cash <br>
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
        				$0.00
        				<br>
        				$0.00
        				<br><br>
        				<strong>$0.00</strong>
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
			margin-left: 20px;
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
		


		@media print {

		}
	</style>
</html>

