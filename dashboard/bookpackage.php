<?php
    include("../includes/dbTools/dbConnect.php");
?>

<!doctype html>
<html lang="en">
<head>
	<title>Book Package</title>

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
        <a class="navbar-brand" href="#">Book a Package</a>
        <?php include("includes/navbar-mobile-close.html"); ?>


        <div class="content">
            <div class="container-fluid">
                <form>
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#senders-details-tab">Senders Details</a></li>
                        <li><a href="#receivers-details-tab">Receivers Details</a></li>
                        <li><a href="#package-details-tab">Package Details</a></li>
                        <li><a href="#extras-tab">Extras</a></li>
                        <li><a href="#submit-tab">Submit</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="senders-details-tab" class="tab-pane fade in active">
                            <h4>Senders Details</h4>
                            <div class="card" style="padding-left:10px; padding-top:10px;">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="companynameinput">Company Name</label>
                                            <input type="text" class="form-control" placeholder="Company Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="firstnameinput">First Name</label>
                                            <input type="text" class="form-control" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="lastnameinput">Last Name</label>
                                            <input type="text" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="emailinput">Email</label>
                                            <input type="text" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="mobileinput">Mobile Number</label>
                                            <input type="text" class="form-control" placeholder="Mobile Number">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="address1input">Address 1</label>
                                            <input type="text" class="form-control" placeholder="Address 1">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="address2input">Address 2</label>
                                            <input type="text" class="form-control" placeholder="Address 2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="suburbinput">Suburb</label>
                                            <input type="text" class="form-control" placeholder="Suburb">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="stateinput">State</label>
                                            <input type="text" class="form-control" placeholder="State">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="postcodeinput">Postcode</label>
                                            <input type="text" class="form-control" placeholder="Postcode">
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
                                            <label for="companynameinput">Company Name</label>
                                            <input type="text" class="form-control" placeholder="Company Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="firstnameinput">First Name</label>
                                            <input type="text" class="form-control" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="lastnameinput">Last Name</label>
                                            <input type="text" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="emailinput">Email</label>
                                            <input type="text" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="mobileinput">Mobile Number</label>
                                            <input type="text" class="form-control" placeholder="Mobile Number">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="address1input">Address 1</label>
                                            <input type="text" class="form-control" placeholder="Address 1">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="address2input">Address 2</label>
                                            <input type="text" class="form-control" placeholder="Address 2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="suburbinput">Suburb</label>
                                            <input type="text" class="form-control" placeholder="Suburb">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="stateinput">State</label>
                                            <input type="text" class="form-control" placeholder="State">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="postcodeinput">Postcode</label>
                                            <input type="text" class="form-control" placeholder="Postcode">
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
                                            <label for="no-packages-input">No. of Packages</label>
                                            <input type="number" class="form-control" placeholder="0">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="weight-input">Weight (kg)</label>
                                            <input type="number" class="form-control" placeholder="Weight">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="width-input">Width (mm)</label>
                                            <input type="number" class="form-control" placeholder="Width">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="length-input">Length (kg)</label>
                                            <input type="number" class="form-control" placeholder="Length">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="depth-input">Depth (kg)</label>
                                            <input type="number" class="form-control" placeholder="Depth">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="service-type-input">Service Type</label>
                                            <input type="text" class="form-control" placeholder="Service Type">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="total-value-input">Total Carriage Value</label>
                                            <input type="text" class="form-control" placeholder="$0.00">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="ship-date-input">Ship Date</label>
                                            <input type="date" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="extras-tab" class="tab-pane fade">
                            <h4>Package Details</h4>
                            <p>We currently do not offer any extra. Our appologies for any inconvenience</p>
                        </div>
                        <div id="submit-tab" class="tab-pane fade">
                            <h4>Submit Order</h4>
                            <p>Please check all details in the previous tabs</p>
                            <!--Future release print summary inside this tab<-->
                            
                            <label class="checkbox">
                                <input type="checkbox" value="" data-toggle="checkbox">
                                <p>I confirm that all the details I have entered are correct and accurate</p>
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" value="" data-toggle="checkbox">
                                <p>I accept the terms and conditions</p>
                            </label>

                            <h4 style="margin-top:40px;">$0.00 subtotal</h4>
                            <h4 style="margin-top:-10px; margin-bottom:-10px;">$0.00 gst</h4>
                            <hr class="special-subtotal-hr">
                            <h2 style="margin-top:-10px; margin-bottom:40px;">$0.00 total</h2>

                            <button type="submit" class="btn btn-info btn-fill pull-left">Book Order</button>

                            

             





                        </div>
                    </div>
                </form>

                <script>
                    $(document).ready(function(){
                        $(".nav-tabs a").click(function(){
                            $(this).tab('show');
                        });
                    });
                </script>
                <style>
                    .special-subtotal-hr {
                        border: 0;
                        height: 1px;
                        background: #ec7d46;
                        background-image: linear-gradient(to right, #eca650, #ec7d46, #eca650);
                    }
                </style>
            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>


</html>
