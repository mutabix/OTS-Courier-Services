<?php
    session_start();
    include("../dbTools/dbConnect.php");

    $email = $_SESSION['username'];
    $getTrackingNumbers = $dbConnection->prepare("SELECT trackingNumber FROM tracking WHERE customer = :customerEmail LIMIT 20");
    $getTrackingNumbers->bindParam(':customerEmail', $email);
    $getTrackingNumbers->execute();
    $count = 0;
    $pendingCount = 0;
    $readyCount = 0;
    $processingCount = 0;
    $deliveryCount = 0;

    $trackingNumber = array();
    $trackingStatus = array();


    foreach ($getTrackingNumbers as $trackingNumberFetch){
        $trackingNumber[$count] = $trackingNumberFetch['trackingNumber'];
        $count++;
    }

    for ($i=0; $i<count($trackingNumber); $i++){
        $currentTrackingNumber = $trackingNumber[$i];
        $getTrackingDetails = $dbConnection->prepare("SELECT shipmentStatusCode FROM shipments WHERE trackingNumber = :trackingNumber");
        $getTrackingDetails->bindParam(':trackingNumber', $currentTrackingNumber);

        try {
            $getTrackingDetails->execute();
        } catch(Exception $error) {
            echo 'Exception -> ';
            var_dump($error->getMessage());
        }
        $shipmentStatusCodeFetch = $getTrackingDetails->fetch();
        $shipmentStatusCode = $shipmentStatusCodeFetch['shipmentStatusCode'];

        if($shipmentStatusCode == 0){
            $pendingCount++;
            $trackingStatus[$i] = "Pending";
        } else if ($shipmentStatusCode == 1){
            $readyCount++;
            $trackingStatus[$i] = "Ready for Pickup";
        } else if ($shipmentStatusCode == 2){
            $processingCount++;
            $trackingStatus[$i] = "Processing";
        } else if ($shipmentStatusCode == 3){
            $deliveryCount++;
            $trackingStatus[$i] = "Ready for Delivery";
        } else if ($shipmentStatusCode == 4){
            $trackingStatus[$i] = "Delivered";
        }
    }

?>
<!doctype html>
<html lang="en">
<head>
	<title>Dashboard</title>

    <?php include("includes/styling_scripts/meta.html"); ?>
    <?php include("includes/styling_scripts/css.html"); ?>
    <?php include("includes/styling_scripts/fonts-icons.html"); ?>
    <?php include("includes/styling_scripts/javascript.html"); ?>

</head>
<body>

<div class="wrapper">
    <?php include("includes/sidebar.html"); ?>

    <div class="main-panel">
        <?php include("includes/navbar-mobile-open.html"); ?>
        <a class="navbar-brand" href="#">Check Payments</a>
        <?php include("includes/navbar-mobile-close.html"); ?>


        <div class="content">
            <div class="container-fluid">
              <?php
              //Below: Pagination code adapted by Reeve from http://stackoverflow.com/questions/3705318/simple-php-pagination-script
              /*$total = $dbConnection->query('SELECT COUNT(*)
              FROM tracking WHERE customer = :customerEmail')->fetchColumn();

              $limit = 11;

              $pages = ceil($total / $limit);

              $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array
              ('options' => array
                ('default' => 1,
                 'min_range' => 1,
                ),
              )));

              $offset = ($page - 1) * $limit;

              $start = $offset + 1;
              $end = min(($offset + $limit), $total);

              $prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';
              $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';
              echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';
              //Above: Pagination code adapted by Reeve from http://stackoverflow.com/questions/3705318/simple-php-pagination-script


              $myBookingsData = $dbConnection->prepare('SELECT *
              FROM bookings
              LIMIT :limit
              OFFSET :offset');
              $myBookingsData->bindParam(':limit', $limit, PDO::PARAM_INT);
              $myBookingsData->bindParam(':offset', $offset, PDO::PARAM_INT);
              $myBookingsData->execute();*/

              ?>
              <h2> Saved Tracking Numbers</h2>
              <table class="table">
                  <tbody>
                  <?php
                  //echo count($trackingNumber);
                      for ($i=0; $i<count($trackingNumber); $i++){
                          echo "<tr>";
                              echo "<td>";
                              echo $trackingNumber[$i];
                              echo "</td>";
                              echo "<td>";
                              echo $trackingStatus[$i];
                              echo "</td>";
                              echo "<td class='td-actions text-right'>";
                                  echo "<button type='button' rel='tooltip' title='Edit Task' class='btn btn-info btn-simple btn-xs href='#'>";
                                      echo "<i class='fa fa-edit'></i>";
                                  echo "</button>";
                              echo "</td>";
                          echo "</tr>";
                      }
                  ?>
                  
              </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>

</body>


</html>
