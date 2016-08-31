<form action="bookpackage.php" method="POST" novalidate>
    <div class="tab-content">
        <div id="senders-details-tab" class="tab-pane fade in active">
            <h4>Senders Details</h4>
            <div class="card" style="padding-left:10px; padding-top:10px;">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="senderCompanyName">Company Name</label>
                            <input type="text" class="form-control" placeholder="Company Name" id="senderCompanyName">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="senderFirstName">First Name</label>
                            <input type="text" class="form-control" placeholder="First Name" id="senderFirstName">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="senderLastName">Last Name</label>
                            <input type="text" class="form-control" placeholder="Last Name" id="senderLastName">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="senderEmail">Email</label>
                            <input type="text" class="form-control" placeholder="Email" id="senderEmail">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="senderMobile">Mobile Number</label>
                            <input type="text" class="form-control" placeholder="Mobile Number" id="senderMobile">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="senderAddressLine1">Address 1</label>
                            <input type="text" class="form-control" placeholder="Address 1" id="senderAddressLine1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="senderAddressLine2">Address 2</label>
                            <input type="text" class="form-control" placeholder="Address 2" id="senderAddressLine2">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="senderSuburb">Suburb</label>
                            <input type="text" class="form-control" placeholder="Suburb" id="senderSuburb">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="senderState">State</label>
                            <input type="text" class="form-control" placeholder="State" id="senderState">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="senderPostcode">Postcode</label>
                            <input type="text" class="form-control" placeholder="Postcode" id="senderPostcode">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="receivers-details-tab" class="tab-pane fade">
            <!--RECEIVERS DETAILS-->
            <h4>Receivers Details</h4>
            <div class="card" style="padding-left:10px; padding-top:10px;">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="receiverCompanyName">Company Name</label>
                            <input type="text" class="form-control" placeholder="Company Name" id="receiverCompanyName">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="receiverFirstName">First Name</label>
                            <input type="text" class="form-control" placeholder="First Name" id="receiverFirstName">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="receiverLastName">Last Name</label>
                            <input type="text" class="form-control" placeholder="Last Name" id="receiverLastName">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="receiverEmail">Email</label>
                            <input type="text" class="form-control" placeholder="Email" id="receiverEmail">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="receiverMobile">Mobile Number</label>
                            <input type="text" class="form-control" placeholder="Mobile Number" id="receiverMobile">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="receiverAddressLine1">Address 1</label>
                            <input type="text" class="form-control" placeholder="Address 1" id="receiverAddressLine1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="receiverAddressLine2">Address 2</label>
                            <input type="text" class="form-control" placeholder="Address 2" id="receiverAddressLine2">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="receiverSuburb">Suburb</label>
                            <input type="text" class="form-control" placeholder="Suburb" id="receiverSuburb">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="receiverState">State</label>
                            <input type="text" class="form-control" placeholder="State" id="receiverState">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="receiverPostcode">Postcode</label>
                            <input type="text" class="form-control" placeholder="Postcode" id="receiverPostcode">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="package-details-tab" class="tab-pane fade">
            <h4>Package Details</h4>
            <div class="card" style="padding-left:10px; padding-top:10px;">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="noOfPackages">No. of Packages</label>
                            <input type="number" class="form-control" placeholder="0" id="noOfPackages">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="packageWeight">Weight (kg)</label>
                            <input type="number" class="form-control" placeholder="Weight" id="packageWeight">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="packageWidth">Width (mm)</label>
                            <input type="number" class="form-control" placeholder="Width" id="packageWidth">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="packageLength">Length (kg)</label>
                            <input type="number" class="form-control" placeholder="Length" id="packageLength">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="packageDepth">Depth (kg)</label>
                            <input type="number" class="form-control" placeholder="Depth" id="packageDepth">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="serviceTypeID">Service Type</label>
                            <input type="text" class="form-control" placeholder="Service Type" id="serviceTypeID">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="totalValue">Total Carriage Value</label>
                            <input type="text" class="form-control" placeholder="$0.00" id="totalValue">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="shipDate">Ship Date</label>
                            <input type="date" class="form-control" placeholder="" id="shipDate">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="extras-tab" class="tab-pane fade">
            <h4>Extras</h4>
            <p>We currently do not offer any extra. Our appologies for any inconvenience</p>
        </div>
        <div id="submit-tab" class="tab-pane fade">
            <h4>Submit Order</h4>
            <p>Please check all details in the previous tabs</p>
            <!--Future release print summary inside this tab<-->
            
            <label class="checkbox">
                <input type="checkbox" value="" data-toggle="checkbox" required>
                <p>I confirm that all the details I have entered are correct and accurate</p>
            </label>
            <label class="checkbox">
                <input type="checkbox" value="" data-toggle="checkbox" requried>
                <p>I accept the terms and conditions</p>
            </label>

            <h4 style="margin-top:40px;">$0.00 subtotal</h4>
            <h4 style="margin-top:-10px; margin-bottom:-10px;">$0.00 gst</h4>
            <hr class="special-subtotal-hr">
            <h2 style="margin-top:-10px; margin-bottom:40px;">$0.00 total</h2>

            <button type="submit" class="btn btn-info btn-fill pull-left" id="submitBooking">Book Order</button>
        </div>
    </div>
</form>