<?php

    include("../../dbTools/dbConnect.php");
?>

<!doctype html>
<html lang="en">
<head>
	<title>Employee Dashboard</title>

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
              $total = $dbConnection->query('SELECT COUNT(*)
              FROM payments')->fetchColumn();

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


              $result = $dbConnection->prepare('SELECT *
              FROM payments
              LIMIT :limit
              OFFSET :offset');
              $result->bindParam(':limit', $limit, PDO::PARAM_INT);
              $result->bindParam(':offset', $offset, PDO::PARAM_INT);
              $result->execute();



              ?>
				<table class="table table-hover">
					<thead>
						<tr>
							<th><strong>Tax Invoice ID</strong></th>
							<th><strong>Shipment ID</strong></th>
							<th><strong>Ppayment Amount</strong></th>
							<th><strong>Payment Type</strong></th>
							<th><strong>Payment Status</strong></th>
              <th><strong>Start Date</strong></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
            <?php
              foreach ($result as $payments) {
                $conResult = $dbConnection->prepare('SELECT *
                FROM connotes WHERE shippingId = :shippingId LIMIT 1');
                $conResult->bindParam(':shippingId', $payments['shipmentId']);
                try {
                    $conResult->execute();
                } catch(Exception $error) {
                    echo 'Exception -> ';
                    var_dump($error->getMessage());
                }
                $connoteNumbertest = $conResult->fetch();
                $connoteNumber = $connoteNumber['connoteNumber'];

                echo '<tr>';
                  echo '<td>';
                    echo $payments['taxInvoiceID'];
                  echo '</td>';
                  echo '<td>';
                    echo $payments['shipmentId'];
                  echo '</td>';
                  echo '<td>';
                    echo $payments['paymentAmount'];
                  echo '</td>';
                  echo '<td>';
                  if ($payments['paymentType'] == 0)
                    {
                      echo 'Cash';
                    }else if ($payments['paymentType'] == 1)
                      {
                        echo 'EFTPOS';
                      }else if ($payments['paymentType'] == 2)
                        {
                          echo 'Cheque';
                        }else{
                          echo 'Unknown Payment Type';
                          }
                  echo '</td>';
                  echo '<td>';
                  if ($payments['paymentStatus'] == 0)
                    {
                      echo 'Pending';
                    }else if ($payments['paymentType'] == 1)
                      {
                        echo 'Complete';
                        }else{
                          echo 'Unknown Payment Type';
                          }
                  echo '<td>';
                  echo $payments['generatedDate'];
                  echo '</td>';
                  echo '<td>';
                  echo '<a href="getTaxInvoice.php?taxinv='.$payments['taxInvoiceID'].'" class="btn btn-info" target="_blank" role="button">Tax Invoice</a>';
                  echo '</td>';
                  echo '<td>';
                  echo $connoteNumber;
                  echo '<a href="getConNote.php?connote='.$connoteNumber.'" class="btn btn-info" target="_blank" role="button">Consignment Note</a>';
                  echo '</td>';
                echo '</tr>';
              }
              echo '</tbody>
              </table>';


            ?>
          </tbody>

        </div>
      </div>
    </div>
</div>

</body>


</html>
