<?php
  include ("../dbTools/dbConnect.php");
  include ("barcodeGenerator/php-barcode.php");
  session_start();

  //$taxInvoiceNumber = $_SESSION['taxInvoiceNumber'];
  $connoteNumber = $_SESSION['connoteNumber'];

  $getShippingId = $dbConnection->prepare("SELECT shippingId FROM connotes WHERE connoteNumber = :connoteNumber");
  $getShippingId->bindParam(':connoteNumber', $connoteNumber);
  try {
      $getShippingId->execute();
  } catch(Exception $error) {
      echo 'Exception -> ';
      var_dump($error->getMessage());
  }
  $shippingId = $getShippingId->fetch();
  $retrievedShippingId = $shippingId['shippingId'];

  $getBooking = $dbConnection->prepare("SELECT * FROM bookings WHERE shipmentId = :shipmentId");
    $getBooking->bindParam(':shipmentId', $retrievedShippingId);
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
    $senderPhone = $bookingDetails['senderMobile'];
    $senderAddressLine1 = $bookingDetails['senderAddressLine1'];
    $senderAddressLine2 = $bookingDetails['senderAddressLine2'];
    $senderSuburb = $bookingDetails['senderSuburb'];
    $senderState = $bookingDetails['senderState'];
    $senderPostcode = $bookingDetails['senderPostcode'];
    $packageTypeID = $bookingDetails['packageTypeID'];

    $receiverCompanyName = $bookingDetails['receiverCompanyName'];
    $receiverFirstName = $bookingDetails['receiverFirstName'];
    $receiverLastName = $bookingDetails['receiverLastName'];
    $receiverPhone = $bookingDetails['receiverMobile'];
    $receiverAddressLine1 = $bookingDetails['receiverAddressLine1'];
    $receiverAddressLine2 = $bookingDetails['receiverAddressLine2'];
    $receiverSuburb = $bookingDetails['receiverSuburb'];
    $receiverState = $bookingDetails['receiverState'];
    $receiverPostcode = $bookingDetails['receiverPostcode'];

    $packageTypeID = $bookingDetails['packageWeight'];
    $width = $bookingDetails['packageWidth'];
    $length = $bookingDetails['packageLength'];
    $depth = $bookingDetails['packageDepth'];
    $serviceTypeId = $bookingDetails['serviceTypeID'];

    if($senderState == $receiverState){
      $deliveryDetail = "Interstate";
    } else {
      $deliveryDetail = "Intrastate";
    }

    if($packageTypeID == 1){
      $packageDetail = "1kg Satchel";
      $packageWeight = "1kg";
    } else if($packageTypeID == 2){
      $packageDetail = "3kg Satchel";
      $packageWeight = "3kg";
    } else if($packageTypeID == 3){
      $packageDetail = "5kg Satchel";
      $packageWeight = "5kg";
    } else if($packageTypeID == 4){
      $packageDetail = "1kg Box";
      $packageWeight = "1kg";
    } else if($packageTypeID == 5){
      $packageDetail = "3kg Box";
      $packageWeight = "3kg";
    } else if($packageTypeID == 6){
      $packageDetail = "5kg Box";
      $packageWeight = "5kg";
    } else if($packageTypeID == 7){
      $packageDetail = "10kg Box";
      $packageWeight = "10kg";
    } else if($packageTypeID == 8){
      $packageDetail = "20kg Box";
      $packageWeight = "20kg";
    }

    if($serviceTypeId == 1){
      $serviceType = "STANDARD";
    } else if($serviceTypeId == 2){
      $serviceType = "EXPRESS";
    } else if($serviceTypeId == 3){
      $serviceType = "OVERNIGHT";
    }


















  /*$getTaxInvoice = $dbConnection->prepare("SELECT * FROM payments WHERE taxInvoiceID = :taxInvoiceID");
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
    } */
?>

<!DOCTYPE html>
<html>
  <head>
    
  </head>
  <body>
    <div id='printInstructions'>
      <h1>Consignment Note</h1>
      <h3>1. Cut along dotted line</h3>
      <h3>2. Affix to package</h3>
      <h3>3. Sign Dangergous Goods Declatation</h3>
      <h3>4. Ready payment for pickup</h3>
    </div>
      <div id='connote-wrapper'>
      <div id='header'>
        <div id='companyDetails'>
          <div id='comDetsLft'>
            <img src='../assets/img/logo.png' />
            <br>
            <strong><sub>ABN: 12 345 678 999</sub></strong>
          </div>
          <div id='comDetsRht'>
            <strong><sub>PH: 1300 OTS CS0</sub></strong><br>
            <strong><sub>PO Box 1000, Brisbane 4000</sub></strong><br>
            <strong><sub>www.otscouriers.com.au</sub></strong>
          </div>
          
          
          

        </div>
        <div id='barcodeArea'>
          <div id='barcode'>
            <sup style='text-align: center'>Connote Number<br></sup>
            <?php
              echo "<img alt='12345' src='http://api-bwipjs.rhcloud.com/?bcid=code128&text=".$connoteNumber."&scaleX=3&scaleY=0.5' />";
              echo "<br><p><strong>".$connoteNumber."</strong></p>"
            ?>
          </div>
          


        </div>
      </div>
        <div id='sender'>
            <table>
              <tr>
                <th colspan="3">Sender</th>
              </tr>
              <tr>
                <td colspan="3">
                  <sup>Company Sender</sup>
                  <p><?php echo $senderCompanyName ?></p>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <sup>Contact Name</sup>
                  <p><?php echo $senderFirstName . " " . $senderLastName?></p>
                </td>
                <td colspan="1">
                  <sup>Phone</sup>
                  <p><?php echo $senderPhone ?></p>
                </td>
              </tr>
              <tr>
                <td colspan="3">
                  <sup>Address Line 1</sup>
                  <p><?php echo $senderAddressLine1 ?></p>
                </td>
              </tr>
              <tr>
                <td colspan="3">
                  <sup>Address Line 2</sup>
                  <p><?php echo $senderAddressLine2 ?></p>
                </td>
              </tr>
              <tr>
                <td>
                  <sup>Suburb</sup>
                  <p><?php echo $senderSuburb ?></p>
                </td>
                <td>
                <sup>State</sup>
                  <p><?php echo $senderState ?></p>
                </td>
                <td>
                  <sup>Postcode</sup>
                  <p><?php echo $senderPostcode ?></p>
                </td>
              </tr>
            </table>
        </div>

        <div id='receiver'>
            <table>
              <tr>
                <th colspan="3">Deliver To</th>
              </tr>
              <tr>
                <td colspan="3">
                  <sup>Company Sender</sup>
                  <p><?php echo $receiverCompanyName ?></p>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <sup>Contact Name</sup>
                  <p><?php echo $receiverFirstName . " " . $receiverLastName?></p>
                </td>
                <td colspan="1">
                  <sup>Phone</sup>
                  <p><?php echo $receiverPhone ?></p>
                </td>
              </tr>
              <tr>
                <td colspan="3">
                  <sup>Address Line 1</sup>
                  <p><?php echo $receiverAddressLine1 ?></p>
                </td>
              </tr>
              <tr>
                <td colspan="3">
                  <sup>Address Line 2</sup>
                  <p><?php echo $receiverAddressLine2 ?></p>
                </td>
              </tr>
              <tr>
                <td>
                  <sup>Suburb</sup>
                  <p><?php echo $receiverSuburb ?></p>
                </td>
                <td>
                <sup>State</sup>
                  <p><?php echo $receiverState ?></p>
                </td>
                <td>
                  <sup>Postcode</sup>
                  <p><?php echo $receiverPostcode ?></p>
                </td>
              </tr>
            </table>
        </div>
        <!--<div id='freightPaidBy'>
          <p>Freight Charges to be Paid by?</p>
          <p>Sender &#x25A3; &nbsp; &nbsp; Receiver &#x25A2; &nbsp; &nbsp; Third Party &#x25A2;</p>
          <table id='paymentAndShipmentDetails'>
            <td>
              
            </td>
          </table>
        </div>-->
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <table class='paymentAndShipmentDetails'>
          <tr>
            <th>Order Ref.</th>
            <th>Description</th>
            <th>Qty</th>
            <th>Weight</th>
            <th>Cubic</th>
            <th>Service</th>
          </tr>
          <tr>
            <td><?php echo $retrievedShippingId; ?></td>
            <td><?php echo $packageDetail; ?></td>
            <td>1</td>
            <td><?php echo $packageWeight; ?></td>
            <td><?php echo $width . "x" . $length . "x" . $depth; ?></td>
            <th><?php echo $serviceType; ?></th>
          </tr>
          </table>
          <div id='agreement'>
            <p><strong>NOT FOR DANGEROUS GOODS</strong></p>
            <p><strong>Agreement: </strong> We submit the goods described above for carriage and agree that the Terms and Conditions of Carriage and Other Services available at www.otscouriers.com.au</p><br>
            Sender Signature:__________________________ &nbsp; Date:_____________
          </div>
          <table id='driverUse'>
          <tr><th colspan="4">Driver's Use Only</th></tr>
          <tr>
            <td colspan="2">Pickup</td>
            <td colspan="2">Delivery</td>
          </tr>
          <tr>
            <td>Time:_______</td>
            <td>Date:_________</td>
            <td>Time:_______</td>
            <td>Date:_________</td>
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

    #printInstructions{
      display: none;
    }

    #connote-wrapper{
      height: 150mm;
      width: 230mm;
      margin: 0 auto;
      margin-top: 120px;
      background-color: #ffffff;
      outline: 2px solid #000000;
      outline-style: dashed;
    }

    #header{
      width: 230mm;
      height: 25mm;
      float: left;
    }

    #companyDetails{
      width: 115mm;
      float: left;
    }

    #comDetsLft {
      float: left;
      width: 240px;
      text-align: center !important;
    }

    #comDetsRht{
      float: right;
      margin-right: 10px;
      margin-top: 5px;
    }

    #companyDetails img{
      width: 200px;
      height: auto;
      margin-top: 20px;
      margin-left: 20px;
      float: left;
    }

    #barcodeArea{
      text-align: center !important;
    }

    #barcode{
      width: 115mm;
      float: right;
    }

    td, th{
      padding: 5px;
      text-align: left;
    }

    #sender table, #sender td, #sender th, #receiver table, #receiver td, #receiver th{
      border: 2px solid #888888;
      border-collapse: collapse;
    }

    #sender table tr, #receiver table tr{
      border-bottom: 2px solid #888888;
    }

    #sender table, #receiver table{
      width: 110mm;
    }

    #sender table{
      float: left;
      margin-left: 10px;
    }

    #receiver table{
      float: right;
      margin-right: 10px;
    }

    #connote-wrapper sup{
      font-size: 12px;
      font-weight: bold;
    }

    table{
      margin-left: 10px;
      border: 2px solid #888888;
      border-collapse: collapse;
    }

    .paymentAndShipmentDetails table, .paymentAndShipmentDetails tr, .paymentAndShipmentDetails th, .paymentAndShipmentDetails td{
      border: 2px solid #888888;
      border-collapse: collapse;
      font-size: 12px;
    }

    .paymentAndShipmentDetails{
      width: 225mm;
    }

    .paymentAndShipmentDetails th:nth-child(1){
      width: 80px;
    }

    .paymentAndShipmentDetails th:nth-child(3){
      width: 15px;
    }

    .paymentAndShipmentDetails th:nth-child(4){
      width: 30px;
    }

    .paymentAndShipmentDetails th:nth-child(5){
      width: 80px;
    }

    .paymentAndShipmentDetails th:nth-child(6){
      width: 100px;
    }

    p{
      font-size: 12px;
    }

    #agreement{
      width: 500px;
      padding-left: 5px;
      padding-top: 5px;
      float: left;
    }

    #driverUse{
      width: 100px;
      float: right;
      font-size: 12px;
      margin-right: 5px;
      margin-top: 5px;
      border: 2px solid #888888;
      border-collapse: collapse;

    }

  </style>
  <style type="text/css" media="print">
    @page {
      margin: 0;
      size: landscape;
    }

    #printInstructions{
      display: block;
      margin-top: 50px;
      margin-left: 50px;
    }


      BODY {
        PAGE-BREAK-BEFORE: always;
        width:100%;
        height:100%;
        margin-top: -20px;
        zoom: 75%;
        filter: progid:DXImageTransform.Microsoft.BasicImage(Rotation=3);
    }
  </style>

  <script>

  </script>

</html>

