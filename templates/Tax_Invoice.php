<!doctype html>
<html lang="en">
<head>
  <title>Tax Invoice</title>
  <style>
  @import 'https://fonts.googleapis.com/css?family=Open+Sans:400,700';
    body{
      font-family: 'Open Sans', sans-serif;
      font-size: 1em;
    }
/*Div CSS*/
    #container{
      width:21cm;
      height: 24.7cm;
      /*background-color: #da8d3c*/
    }
    #header{
      width:100%;
      height: 3cm;
      /*background-color: #b1eb67*/
    }
    #logo{
      width:2.5cm;
      height:2.5cm;
      float:left;
      margin:0.25cm;
      /*background-color: #124422*/
    }
    #title{
      float:right;
      width:10cm;
      height: 3cm;
      /*background-color: #559143*/
    }
    #left_Con{
      float:left;
      width:50%;
      height:4cm;
      /*background-color: #b1b1b1*/
    }
    #right_Con{
      float:right;
      width:50%;
      height:4cm;
      /*background-color: #3d3d3d*/
    }
    #table_Con{
      width:100%;
    }
    #footer{
      width:21cm;
      height: 5cm;
      /*background-color: #1df5f5*/
    }
    #lower_Con{
      width: 100%;
      height:8cm;
      /*background-color: #2c7f8b;*/
    }
    rightAlign{
      float: right;
    }
    text{
      padding: 15px;

    }
    text_Pad{
      padding-left: 43px;
    }

/*Table CSS*/
    table{

    }
    table, th, td{
      border: 2px solid black;
      border-collapse:collapse;
    }
    th, td{
      padding: 5px;
    }
    th{
      background-color: orange;
      color: white;
    }
    .itemNumber{
      width: 2cm;
    }
    .description{
      width: 10cm;
    }
    .price{
      width: 3cm;
    }
    .empty{
      border-bottom-color: white;
      border-left-color: white;
      border-right-color: white;
    }
    .emptyR{
      border-bottom-color: white;
      border-left-color: white;
    }
    .total{
      font-weight: 700;
    }


  </style>

<head/>

<body>
  <!--Container-->
  <div id="container">
    <!--Header-->
    <div id="header">
      <div id="logo">
      </div id="logo">

      <div id="title">
        <h1>Tax Invoice</h1>
      </div id="title">
    </div id="header">
    <!--Left Content-->
    <div id="left_Con">
      <text>On the Spot: Courier Services</text><br>
      <text>237 Imaginary Ln</text> Ln<br>
      <text>Brisbane 4000</text><br>
      <text>Queensland, Australia</text><br>
    </text>
    </div id="left_Con">
    <!--Right Content-->
    <div id="right_Con">
      <rightAlign><text> 07 1234 5678 </text><br>
      <text>sales@OTS.com.au</text></rightAlign>
    </div id="right_Con">
    <!--Lower Content-->
    <div id="lower_Con">
      <b>Date: </b> <text>~Date Data~</text> <rightAlign><b> Invoice Number: </b><text> ~Invoice Data~ </text></rightAlign> <br> <br>
      <b>To: </b> <text> ~Recipient Address~ </text> <br>
                  <text_Pad> ~Recipient Address~ </text_Pad> <br>
                  <text_Pad> ~Recipient Address~ </text_Pad>

    </div id="lower_Con">
    <!--Table Content-->
    <div id="table_Con">
      <table>

        <tr>
          <th class="itemNumber"> Item Number </th>
          <th class="description"> Item Description </th>
          <th class="price"> Unit Price </th>
          <th class="price"> GST </th>
          <th class="price"> Totals </th>
        </tr>

        <tr>
          <td> ~Item no.~ </td>
          <td> ~Item Description~ </td>
          <td> ~Cost of shipment~ </td>
          <td> ~GST cost~ </td>
          <td> ~Total Cost~ </td>
        </tr>

        <tr>
          <td class="empty"> </td>
          <td class="empty"> </td>
          <td class="emptyR"> </td>
          <td class="total"> Total </td>
          <td align="left"> A billion </td>

        </tr>

      </table>
    </div id="table_Con">




  </div id="container">
  <div id="footer">

  </div id="footer">


</body>
