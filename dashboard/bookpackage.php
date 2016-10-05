<?php
    session_start();
    include("../dbTools/dbConnect.php");
    include("../dbTools/checkLogin.php");
    
    include("bookPackageTools/inputSenderData.php");

    //session_start();
    $_SESSION['webaddress'] = "bookpackage.php";
    include("../dbTools/checkLogin.php");

    //Set variables
    include ("dashboardTools/bookPackageTools/assignBookingVariables.php");

    if(!(isset($_SESSION['senderDetails'] [0]))){
        $getCustomerDetails = $dbConnection->prepare("SELECT * FROM customers WHERE email = :email");
        $getCustomerDetails->bindParam(':email', $_SESSION['username']);

        try {
            $getCustomerDetails->execute();
        } catch(Exception $error) {
            echo 'Exception -> ';
            var_dump($error->getMessage());
        }

        $customerDetails = $getCustomerDetails->fetch();
        //$customerDetails['companyName'];

        $_SESSION['senderDetails'] [0] = $customerDetails['companyName'];
        $_SESSION['senderDetails'] [1] = $customerDetails['firstName'];
        $_SESSION['senderDetails'] [2] = $customerDetails['lastName'];
        $_SESSION['senderDetails'] [3] = $customerDetails['email'];
        $_SESSION['senderDetails'] [4] = $customerDetails['mobileNumber'];
        $_SESSION['senderDetails'] [5] = $customerDetails['addressLine1'];
        $_SESSION['senderDetails'] [6] = $customerDetails['addressLine2'];
        $_SESSION['senderDetails'] [7] = $customerDetails['suburb'];
        $_SESSION['senderDetails'] [9] = $customerDetails['postcode'];
    }
?>

<!doctype html>
<html lang="en">
<head>
	<title>Book Package</title>

    <?php include("includes/styling_scripts/meta.html"); ?>
    <?php include("includes/styling_scripts/css.html"); ?>
    <?php include("includes/styling_scripts/fonts-icons.html"); ?>
    <?php include("includes/styling_scripts/javascript.html"); ?>
    
    <script>
        function checkPackageType(){
            var packageTypeSelected = document.getElementById("packageType").selectedIndex;
            if(packageTypeSelected >= 1 && packageTypeSelected <= 3){
                document.getElementById('packageWidth').value = "0";
                document.getElementById('packageLength').value = "0";
                document.getElementById('packageDepth').value = "0";

                document.getElementById('packageWidth').disabled = true;
                document.getElementById('packageLength').disabled = true;
                document.getElementById('packageDepth').disabled = true;
            } else {
                if(document.getElementById('packageWidth').value == 0 && document.getElementById('packageLength').value == 0 && document.getElementById('packageDepth').value == 0){
                    document.getElementById('packageWidth').value = "";
                    document.getElementById('packageLength').value = "";
                    document.getElementById('packageDepth').value = "";
                }

                document.getElementById('packageWidth').disabled = false;
                document.getElementById('packageLength').disabled = false;
                document.getElementById('packageDepth').disabled = false;
            }
        }

    </script>
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

                <ul class="nav nav-tabs">
                    <li class="active"><a href="#senders-details-tab">Senders Details</a></li>
                    <li><a href="#receivers-details-tab">Receivers Details</a></li>
                    <li><a href="#package-details-tab">Package Details</a></li>
                    <li><a href="#extras-tab">Extras</a></li>
                    <li><a href="#submit-tab">Submit</a></li>
                </ul>

                <?php
                    $errorsExist = false;

                    //Checks to see if data is set
                    if (isset($senderFirstName) && isset($senderLastName) && isset($senderEmail) && isset($senderMobile) && isset($senderAddressLine1) && isset($senderSuburb) && isset($senderState) && isset($senderPostcode) && isset($receiverFirstName) && isset($receiverLastName) && isset($receiverEmail) && isset($receiverMobile) && isset($receiverAddressLine1) && isset($receiverSuburb) && isset($receiverState) && isset($receiverPostcode) && isset($noOfPackages) && isset($serviceTypeID) && isset($totalValue)) {
                        
                        

                        /*require ("dashboardTools/bookPackageTools/validation.php");
                        //$errorsExist = true;
                        //validateData();
                        if(!(validateEmail($senderEmail))){
                            $errorsExist = true;
                            $errors[$errorCount] = "Sender Email Invalid";
                            $errorCount++;
                        }

                        if(!(validateEmail($receiverEmail))){
                            $errorsExist = true;
                            $errors[$errorCount] = "Sender Email Invalid";
                            $errorCount++;
                        }

                        if(!(validatePhoneNumber($senderMobile))){
                            $errorsExist = true;
                            $errors[$errorCount] = "Sender Mobile Number Invalid";
                            $errorCount++;
                        }

                        if(!(validatePhoneNumber($receiverMobile))){
                            $errorsExist = true;
                            $errors[$errorCount] = "Sender Mobile Number Invalid";
                            $errorCount++;
                        }

                        if(!(validatePostcode($senderPostcode))){
                            $errorsExist = true;
                            $errors[$errorCount] = "Sender Postcode Invalid";
                            $errorCount++;
                        }

                        if(!(validatePostcode($receiverPostcode))){
                            $errorsExist = true;
                            $errors[$errorCount] = "Sender Postcode Invalid";
                            $errorCount++;
                        }

                        if(!(validateSize($packageWidth))){
                            $errorsExist = true;
                            $errors[$errorCount] = "Package Width Invalid";
                            $errorCount++;
                        }

                        if(!(validateSize($packageLength))){
                            $errorsExist = true;
                            $errors[$errorCount] = "Package Length Invalid";
                            $errorCount++;
                        }

                        if(!(validateSize($packageDepth))){
                            $errorsExist = true;
                            $errors[$errorCount] = "Package Depth Invalid";
                            $errorCount++;
                        } 

                        if(!(isset($_POST["detailsCorrectCheckbox"]))){
                            $errorsExist = true;
                            $errors[$errorCount] = "Please Confirm That All The Details You Have Entered Are Correct";
                            $errorCount++;
                        }

                        if(!(isset($_POST["termsAcceptCheckbox"]))){
                            $errorsExist = true;
                            $errors[$errorCount] = "Please Accept Our Terms And Conditions";
                            $errorCount++;
                        }*/

                        include ("dashboardTools/bookPackageTools/errorPopupNotification.php");
                    

                        if ($errorsExist) {
                            include ("dashboardTools/bookPackageTools/bookingform.php");

                        } else {

                            //echo 'form submitted successfully with no errors'; //Debugging Tool
                            //include ("dashboardTools/bookPackageTools/insertBookingIntoDatabase.php");
                            header("Location: submitrequestpickup.php");
                            exit();
                        }
                    } else {
                        include ("dashboardTools/bookPackageTools/bookingform.php");
                    }
                ?>

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
<!--<script src="demo.js"></script>-->

</html>