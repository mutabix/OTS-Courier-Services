<!doctype html>
<html lang="en">
<head>
  <title>Consignment Note</title>
  <style>
  @import 'https://fonts.googleapis.com/css?family=Open+Sans:400,700';
    body{
      font-family: 'Open Sans', sans-serif;
      font-size: 1em;
    }
/*Div CSS*/
    #container{
      width:14cm;
      height: 17cm;
      /*background-color: #da8d3c*/
    }
    #header{
      width:100%;
      height: 3cm;
      /*background-color: #b1eb67*/
    }
    #title{
      float:left;
      width:7cm;
      height: 3cm;
      /*background-color: #559143*/
    }
    #left_Con{
      float:left;
      width:60%;
      height:4cm;
      /*background-color: #b1b1b1*/
    }
    #right_Con{
      float:right;
      width:40%;
      height:4cm;
      /*background-color: #3d3d3d*/
    }
    #footer{
      width:14cm;
      height: 5cm;
      /*background-color: #1df5f5*/
    }
    #lower_Con{
      width: 14cm;
      height:4cm;
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

      <div id="title">
        <h1>OTS - Priority</h1>
      </div id="title">
    </div id="header">
    <!--Left Content-->
    <div id="left_Con">
      <text>~This is the C/N No.~</text><br>
      <text>~This is the company~</text><br>
      <text>~This is the destination address~</text><br>
      <text>~More destination address~</text><br>
    </text>
    </div id="left_Con">
    <!--Right Content-->
    <div id="right_Con">
      <rightAlign><text> 07 1234 5678 </text><br>
      <text>sales@OTS.com.au</text></rightAlign>
    </div id="right_Con">
    <!--Lower Content-->
    <div id="lower_Con">
      <b>From: </b> <text>~Sender~ </text> <rightAlign><b> Dispatch: </b><text> ~MM/DD/YYYY HH:MM AM/PM~ </text></rightAlign> <br>
        <text_Pad> ~Address~ </text_Pad> <br>
        <text_Pad> ~Address~ </text_Pad> <br>
        <text_Pad> ~Address~ </text_Pad>

    </div id="lower_Con">





  </div id="container">
  <div id="footer">

  </div id="footer">


</body>
