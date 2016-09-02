<!doctype html>
<html lang="en">
<head>
  <title>Cinsignment_Note</title>
  <style>
  @import 'https://fonts.googleapis.com/css?family=Open+Sans:400,700';
    body{
      font-family: 'Open Sans', sans-serif;
      font-size: 1em;
    }
/*Div CSS*/
    #container{
      width:21cm;
      height: 29.7cm;
      background-color: #da8d3c
    }
    #header{
      width:100%;
      height: 3cm;
      background-color: #b1eb67
    }
    #logo{
      width:2.5cm;
      height:2.5cm;
      float:left;
      margin:0.25cm;
      background-color: #124422
    }
    #title{
      float:right;
      width:10cm;
      height: 3cm;
      background-color: #559143
    }
    #left_Con{
      float:left;
      width:50%;
      height:10cm;
      background-color: #b1b1b1
    }
    #right_Con{
      float:right;
      width:50%;
      height:10cm;
      background-color: #3d3d3d
    }
    #table_Con{
      width:100%;
    }
    #footer{
      width:100%;
      height: 5cm;
      background-color: #305219
    }
    #footer_Aligner{
      display: inline-block;
      height: 100%;
      vertical-align: bottom;
      width: 3px;
      background: red;
    }
    #footer_Con{
      display: inline-block;
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
    </div id="left_Con">
    <!--Right Content-->
    <div id="right_Con">
    </div id="right_Con">
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
          <td> 1 </td>
          <td> Fluttershy Doll </td>
          <td> Less than total </td>
          <td> A lot less </td>
          <td> A Billion </td>
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
    <div id="footer">
      <div id="footer_Aligner"></div>
      <div id="footer_Con">

      </div id="footer_Con">

    </div id="footer">



  </div id="container">



</body>
