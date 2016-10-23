<form action='bookpackage.php' method='POST' novalidate>
    <div class='tab-content'>
        <div id='senders-details-tab' class='tab-pane fade in active'>
            <h4>Senders Details</h4>
            <div class='card' style='padding-left:10px; padding-top:10px;'>
                <div class='row'>
                    <div class='col-md-5'>
                        <div class='form-group'>
                            <label for='senderCompanyName'>Company Name</label>
                            <?php echo "<input type='text' class='form-control' placeholder='Company Name' name='senderCompanyName' value='". $_SESSION['senderDetails'] [0] ."'>" ?>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-5'>
                        <div class='form-group'>
                            <label for='senderFirstName'>First Name</label>
                            <?php echo "<input type='text' class='form-control' placeholder='First Name' name='senderFirstName' value='". $_SESSION['senderDetails'] [1] ."'>" ?>
                        </div>
                    </div>
                    <div class='col-md-5'>
                        <div class='form-group'>
                            <label for='senderLastName'>Last Name</label>
                            <?php echo "<input type='text' class='form-control' placeholder='Last Name' name='senderLastName' value='". $_SESSION['senderDetails'] [2] ."'>" ?>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-5'>
                        <div class='form-group'>
                            <label for='senderEmail'>Email</label>
                            <?php echo "<input type='text' class='form-control' placeholder='Email' name='senderEmail' value='". $_SESSION['senderDetails'] [3] ."'>" ?>
                        </div>
                    </div>
                    <div class='col-md-5'>
                        <div class='form-group'>
                            <label for='senderMobile'>Mobile Number</label>
                            <?php echo "<input type='number' class='form-control' placeholder='Mobile Number' name='senderMobile' value='". $_SESSION['senderDetails'] [4] ."'>" ?>
                        </div>
                    </div>
                </div>

                <div class='row'>
                    <div class='col-md-10'>
                        <div class='form-group'>
                            <label for='senderAddressLine1'>Address 1</label>
                            <?php echo "<input type='text' class='form-control' placeholder='Address 1' name='senderAddressLine1' value='". $_SESSION['senderDetails'] [5] ."'>" ?>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-10'>
                        <div class='form-group'>
                            <label for='senderAddressLine2'>Address 2</label>
                            <?php echo "<input type='text' class='form-control' placeholder='Address 2' name='senderAddressLine2' value='". $_SESSION['senderDetails'] [6] ."'>" ?>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-10'>
                        <div class='form-group'>
                            <label for='senderSuburb'>Suburb</label>
                            <?php echo "<input type='text' class='form-control' placeholder='Suburb' name='senderSuburb' value='". $_SESSION['senderDetails'] [7] ."'>" ?>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-5'>
                        <div class='form-group'>

                            <?php echo "<script> var postcode = '".$_SESSION['senderDetails'] [8]."'; </script>"; ?>

                            <label for='senderState'>State / Territory</label>
                            <select class='form-control' id='senderState' name='senderState'>
                                <option selected disabled>Select State / Territory</option>
                                <option id='QLD'>QLD</option>
                                <option id='NSW'>NSW</option>
                                <option id='ACT'>ACT</option>
                                <option id='VIC'>VIC</option>
                                <option id='SA'>SA</option>
                                <option id='NT'>NT</option>
                                <option id='WA'>WA</option>
                                <option id='TAS' disabled>TAS - We do not offer shipping to Tasmania right now</option>
                            </select>
                        </div>
                        <script>document.getElementById(postcode).selected = true</script>
                    </div>
                    <div class='col-md-5'>
                        <div class='form-group'>
                            <label for='senderPostcode'>Postcode</label>
                            <?php echo "<input type='number' class='form-control' placeholder='Postcode' name='senderPostcode' value='". $_SESSION['senderDetails'] [9] ."'>" ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id='receivers-details-tab' class='tab-pane fade'>
            <!--RECEIVERS DETAILS-->
            <h4>Receivers Details</h4>
            <div class='card' style='padding-left:10px; padding-top:10px;'>
                <div class='row'>
                    <div class='col-md-5'>
                        <div class='form-group'>
                            <label for='receiverCompanyName'>Company Name</label>
                            <?php echo "<input type='text' class='form-control' placeholder='Company Name' name='receiverCompanyName' value='". $_SESSION['receiverDetails'] [0] ."'>" ?>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-5'>
                        <div class='form-group'>
                            <label for='receiverFirstName'>First Name</label>
                            <?php echo "<input type='text' class='form-control' placeholder='First Name' name='receiverFirstName' value='". $_SESSION['receiverDetails'] [1] ."'>" ?>
                        </div>
                    </div>
                    <div class='col-md-5'>
                        <div class='form-group'>
                            <label for='receiverLastName'>Last Name</label>
                            <?php echo "<input type='text' class='form-control' placeholder='Last Name' name='receiverLastName' value='". $_SESSION['receiverDetails'] [2] ."'>" ?>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-5'>
                        <div class='form-group'>
                            <label for='receiverEmail'>Email</label>
                            <?php echo "<input type='text' class='form-control' placeholder='Email' name='receiverEmail' value='". $_SESSION['receiverDetails'] [3] ."''>" ?>
                        </div>
                    </div>
                    <div class='col-md-5'>
                        <div class='form-group'>
                            <label for='receiverMobile'>Mobile Number</label>
                            <?php echo "<input type='number' class='form-control' placeholder='Mobile Number' name='receiverMobile' value='". $_SESSION['receiverDetails'] [4] ."'>" ?>
                        </div>
                    </div>
                </div>

                <div class='row'>
                    <div class='col-md-10'>
                        <div class='form-group'>
                            <label for='receiverAddressLine1'>Address 1</label>
                            <?php echo "<input type='text' class='form-control' placeholder='Address 1' name='receiverAddressLine1' value='". $_SESSION['receiverDetails'] [5] ."'>" ?>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-10'>
                        <div class='form-group'>
                            <label for='receiverAddressLine2'>Address 2</label>
                            <?php echo "<input type='text' class='form-control' placeholder='Address 2' name='receiverAddressLine2' value='". $_SESSION['receiverDetails'] [6] ."'>" ?>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-10'>
                        <div class='form-group'>
                            <label for='receiverSuburb'>Suburb</label>
                            <?php echo "<input type='text' class='form-control' placeholder='Suburb' name='receiverSuburb' value='". $_SESSION['receiverDetails'] [7] ."'>" ?>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-5'>
                        <div class='form-group'>
                            <div class='form-group'>
                                <label for='receiverState'>State / Territory</label>
                                <select class='form-control' id='receiverState' name='receiverState'>
                                    <option selected disabled>Select State / Territory</option>
                                    <option>QLD</option>
                                    <option>NSW</option>
                                    <option>ACT</option>
                                    <option>VIC</option>
                                    <option>SA</option>
                                    <option>NT</option>
                                    <option>WA</option>
                                    <option disabled>TAS</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-5'>
                        <div class='form-group'>
                            <label for='receiverPostcode'>Postcode</label>
                            <?php echo "<input type='number' class='form-control' placeholder='Postcode' name='receiverPostcode' value='". $_SESSION['receiverDetails'] [9] ."'>" ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id='package-details-tab' class='tab-pane fade'>
            <h4>Package Details</h4>
            <div class='card' style='padding-left:10px; padding-top:10px;'>
                <div class='row'>
                    <div class='col-md-2'>
                        <div class='form-group'>
                            <label for='noOfPackages'>No. of Packages</label>
                            <?php echo "<input type='number' class='form-control' placeholder='0' name='noOfPackages' disabled value='". $_SESSION['shipmentDetails'] [0] ."'>" ?>
                        </div>
                    </div>
                    <div class='col-md-3'>
                        <div class='form-group'>
                            <label for='packageWidth'>Width (cm)</label>
                            <?php echo "<input type='number' class='form-control' placeholder='Width' name='packageWidth' id='packageWidth' value='". $_SESSION['shipmentDetails'] [1] ."'>" ?>
                        </div>
                    </div>
                    <div class='col-md-3'>
                        <div class='form-group'>
                            <label for='packageLength'>Length (cm)</label>
                            <?php echo "<input type='number' class='form-control' placeholder='Length' name='packageLength' id='packageLength' value='". $_SESSION['shipmentDetails'] [2] ."'>" ?>
                        </div>
                    </div>
                    <div class='col-md-3'>
                        <div class='form-group'>
                            <label for='packageDepth'>Depth (cm)</label>
                            <?php echo "<input type='number' class='form-control' placeholder='Depth' name='packageDepth' id='packageDepth' value='". $_SESSION['shipmentDetails'] [3] ."'>" ?>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-4'>
                        <div class='form-group'>
                            <label for='serviceTypeID'>Service Type</label>
                            <select class='form-control' id='serviceType' name='serviceType'>
                                <!--Use for loop later to optimise this-->
                                <option disabled selected value='0'>Select Service</option>
                                <option value='1'>Standard 2-5 Days</option>
                                <option value='2'>Express 1-3 Days (+$5.00)</option>
                                <option value='3'>Overnight (+$15.00)</option>
                            </select>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class='form-group'>
                            <label for='packageType'>Package Type</label>
                            <select class='form-control' id='packageType' name='packageType' onchange='checkPackageType()'>
                                <!--Use for loop later to optimise this-->
                                <option disabled selected value='0'>Select Package Type</option>
                                <option value='1'>1kg Satchel</option>
                                <option value='2'>3kg Satchel (+$5.00)</option>
                                <option value='3'>5kg Satchel (+$7.50)</option>
                                <option value='4'>1kg Box</option>
                                <option value='5'>3kg Box (+$5.00)</option>
                                <option value='6'>5kg Box (+$10.00)</option>
                                <option value='7'>10kg Box (+$25.00)</option>
                                <option value='8'>20kg Box (+$45.00)</option>
                            </select>
                        </div>
                    </div>



                    <div class='col-md-3'>
                        <div class='form-group'>
                            <label for='totalValue'>Total Carriage Value</label>
                            <?php echo "<input type='number' class='form-control' placeholder='$0.00' step='any' name='totalValue' value='". $_SESSION['shipmentDetails'] [6] ."'>" ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id='extras-tab' class='tab-pane fade'>
            <h4>Extras</h4>
            <p>We currently do not offer any extras. Our appologies for any inconvenience</p>
        </div>
        <div id='submit-tab' class='tab-pane fade'>
            <h4>Submit Order</h4>
            <p>Please check all details in the previous tabs</p>
            <!--Future release print summary inside this tab<-->
            
            <label class='checkbox'>
                <?php echo "<input type='checkbox' name='detailsCorrectCheckbox' value='' data-toggle='checkbox' required>" ?>
                <p>I confirm that all the details I have entered are correct and accurate</p>
            </label>
            <label class='checkbox'>
                <?php echo "<input type='checkbox' name='termsAcceptCheckbox' value='' data-toggle='checkbox' requried>" ?>
                <p>I accept the terms and conditions</p>
            </label>

            <h4>On the next page you will select the pickup time and date. Payment details will also be shown on the next page</h4>

            <button type='submit' class='btn btn-info btn-fill pull-left' name='submitBooking'>Submit Order</button>
        </div>
    </div>
</form>