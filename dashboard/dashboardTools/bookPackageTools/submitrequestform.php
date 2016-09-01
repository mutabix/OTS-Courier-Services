<form action="bookingconfirmation.php" method="POST" novalidate>
    <div class="radio">
        <label ><input type="radio" name="optradio" value="" />Cash</label>
    </div>
    <div class="radio">
        <label><input type="radio" name="optradio" value="" />Eftpos</label>
    </div>
    <div class="radio">
        <label><input type="radio" name="optradio" value="" />Cheque</label>
    </div>
    <br />

    <h4>Pickup Date</h4>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <select class="form-control" id="shipDateDay" name="shipDateDay">
                    <!--Use for loop later to optimise this-->
                    <option disabled selected>Day</option>
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <select class="form-control" id="shipDateDay" name="shipDateMonth">
                    <option disabled selected>Month</option>
                    <option value="1" disabled>January</option>
                    <option value="2" disabled>February</option>
                    <option value="3" disabled>March</option>
                    <option value="4" disabled>April</option>
                    <option value="5" disabled>May</option>
                    <option value="6" disabled>June</option>
                    <option value="7" disabled>July</option>
                    <option value="8" disabled>August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <select class="form-control" id="shipDateDay" name="shipDateYear">
                    <option disabled selected>Year</option>
                    <option value="2016">2016</option>
                </select>
            </div>
        </div> 
    </div>

    <h4>Pickup Time</h4>
    <div class="radio">
        <label class=""><input type="radio" name="optradio">ASAP</label>
    </div>
    <div class="radio">
        <label class=""><input type="radio" name="optradio">Before 12PM</label>
    </div>
    <div class="radio">
        <label class=""><input type="radio" name="optradio">After 12PM</label>
    </div>

    <br />

    <?php
        include("dashboardTools/bookPackageTools/deliverycostestimation.php");

        echo "<h5 style='margin-top:40px;'> $". number_format($total_cost_ex_gst, 2) ." subtotal</h5>";
        echo "<h5 style='margin-top:-10px; margin-bottom:-10px;''>". number_format($gst, 2) ." gst</h5>";
        echo "<hr class='special-subtotal-hr'>";
        echo "<h2 style='margin-top:-10px; margin-bottom:40px;'>". number_format($total_cost, 2) ." total</h2>";
    ?>

    <button type="submit" class="btn btn-info btn-fill pull-left" name="submitBooking">Submit Order</button>




</form>