<form action="submitrequestpickup.php" method="POST" novalidate>
    <div class="radio">
        <label ><input type="radio" name="optradio" value="1" />Cash</label>
    </div>
    <div class="radio">
        <label><input type="radio" name="optradio" value="2" />Eftpos</label>
    </div>
    <div class="radio">
        <label><input type="radio" name="optradio" value="3" />Cheque</label>
    </div>
    <br />

    <?php
        date_default_timezone_set('Australia/Brisbane');

        //$date=date("l d F Y");
        //date_add($date,date_interval_create_from_date_string("2 days"));
        //echo date_format($date,"Y-m-d");

        $date = date("l d F Y");

        
        

        $todayDay = date('w');

        if($todayDay == 6){
            $pickupDateInfo = date('l d F Y', strtotime($date. ' + 2 days'));
            $pickupTimeInfo = ", 1:00pm - 4:00 pm";

        } else if($todayDay == 0){
            $pickupDateInfo = date('l d F Y', strtotime($date. ' + 1 days'));
            $pickupTimeInfo = ", 1:00pm - 4:00 pm";
        } else{
            $pickupDateInfo = date('l d F Y');
            $pickupTimeInfo = "(Today), 1:00pm - 4:00 pm";
        }

        $pickupTime = date('H');
        
        if($pickupTime > 11) {
            if($todayDay == 5){ //If Past 12:00pm and a friday
                $pickupDateInfo = date('l d F Y', strtotime($date. ' + 3 days'));
            } else {
                switch($todayDay){
                    case 1:
                        $pickupDateInfo = date('l d F Y', strtotime($date. ' + 1 days'));
                        $pickupTimeInfo = "(Tomorrow), 1:00pm - 4:00 pm";
                        break;
                    case 2:
                        $pickupDateInfo = date('l d F Y', strtotime($date. ' + 1 days'));
                        $pickupTimeInfo = "(Tomorrow), 1:00pm - 4:00 pm";
                        break;
                    case 3:
                        $pickupDateInfo = date('l d F Y', strtotime($date. ' + 1 days'));
                        $pickupTimeInfo = "(Tomorrow), 1:00pm - 4:00 pm";
                        break;
                    case 4:
                        $pickupDateInfo = date('l d F Y', strtotime($date. ' + 1 days'));
                        $pickupTimeInfo = "(Tomorrow), 1:00pm - 4:00 pm";
                        break;
                }
            }
        }

        echo "<h3>Your Package will be Picked Up: ". $pickupDateInfo . $pickupTimeInfo ."</h3>";
        


    ?>
    <br />

    <?php    
        include("dashboardTools/bookPackageTools/deliverycostestimation.php");

        echo "<h5 style='margin-top:40px;'> $". number_format($total_cost_ex_gst, 2) ." subtotal</h5>";
        echo "<h5 style='margin-top:-10px; margin-bottom:-10px;'> $". number_format($gst, 2) ." gst</h5>";
        echo "<hr class='special-subtotal-hr'>";
        echo "<h2 style='margin-top:-10px; margin-bottom:40px;'> $". number_format($total_cost, 2) ." total</h2>";
        $_SESSION['totalCost'] = $total_cost;
    ?>

    <button type="submit" class="btn btn-info btn-fill pull-left" name="submitBooking">Submit Order</button>




</form>