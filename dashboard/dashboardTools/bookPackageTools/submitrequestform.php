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

    <?php echo "<h3>Pickup Date: ". date("l d F Y") ."</h3>"; ?>
    <h3>Your package will be picked up in the next 2-3 hours</h3>

    <br />

    <?php
        include("dashboardTools/bookPackageTools/deliverycostestimation.php");

        echo "<h5 style='margin-top:40px;'> $". number_format($total_cost_ex_gst, 2) ." subtotal</h5>";
        echo "<h5 style='margin-top:-10px; margin-bottom:-10px;'> $". number_format($gst, 2) ." gst</h5>";
        echo "<hr class='special-subtotal-hr'>";
        echo "<h2 style='margin-top:-10px; margin-bottom:40px;'> $". number_format($total_cost, 2) ." total</h2>";
    ?>

    <button type="submit" class="btn btn-info btn-fill pull-left" name="submitBooking">Submit Order</button>




</form>