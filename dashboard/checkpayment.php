<?php
    include("../includes/dbTools/dbConnect.php");

    session_start();
?>

<!doctype html>
<html lang="en">
<head>
	<title>Payment & Delivery Status</title>

    <?php include("includes/styling_scripts/meta.html"); ?>
    <?php include("includes/styling_scripts/css.html"); ?>
    <?php include("includes/styling_scripts/fonts-icons.html"); ?>
    <?php include("includes/styling_scripts/javascript.html"); ?>

    <style media="screen">
      h1{
        padding-left: 35px;
      }
      thead{
        background-color: #ffa60e !important;
      }
      thead th{
        color: #FFFFFF !important;
      }
    </style>
</head>
<body>

<div class="wrapper">
    <?php include("includes/sidebar.html"); ?>

    <div class="main-panel">
        <?php include("includes/navbar-mobile-open.html"); ?>
        <a class="navbar-brand" href="#">Payment/Delivery Status</a>
        <?php include("includes/navbar-mobile-close.html"); ?>

        <div class="content">

            <div class="container-fluid">
              <table class="table">
                <thead>
                  <tr>
                    <th>Order Number</th>
                    <th>Consignment Number</th>
                    <th>Order Type</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>124878639</td>
                    <td>Pick-Up</td>
                    <td>Cleared</td>
                    <td>In Transit to Pick-Up</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>146997463</td>
                    <td>Delivery</td>
                    <td>Cleared</td>
                    <td>In Transit to Warehouse</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>916339777</td>
                    <td>Pick Up</td>
                    <td>Pending</td>
                    <td>Pending Dispatch from Warehouse</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>175737790</td>
                    <td>Pick Up</td>
                    <td>Cleared</td>
                    <td>In Transit to Delivery</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>575027152</td>
                    <td>Delivery</td>
                    <td>Cleared</td>
                    <td>In Transit to Delivery</td>
                  </tr>
                  <tr>
                    <th scope="row">6</th>
                    <td>949176434</td>
                    <td>Pick-Up</td>
                    <td>Pending</td>
                    <td>In Transit to Warehouse</td>
                  </tr>
                </tbody>
              </table>



            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>


</html>
