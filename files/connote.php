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
      height: 150mm;
      width: 230mm;
      margin: 0 auto;
      margin-top: 120px;
      background-color: #ffffff;
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

