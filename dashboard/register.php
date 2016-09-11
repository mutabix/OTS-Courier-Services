<?php
    include ("../dbTools/dbConnect.php");

    session_start();

    $companyName = $_POST["companyName"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $mobileNumber = $_POST["mobileNumber"];
    $addressLine1 = $_POST["addressLine1"];
    $addressLine2 = $_POST["addressLine2"];
    $suburb = $_POST["suburb"];
    $state = $_POST["state"];
    $postcode = $_POST["postcode"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    $password = sha1($password);
    $confirmPassword = sha1($confirmPassword);

    $emailValid = false;
    $passwordsMatch = false;
?>

<!doctype html>
<html lang="en">
<head>
	<title>Register</title>

    <?php include("includes/styling_scripts/meta.html"); ?>
    <?php include("includes/styling_scripts/css.html"); ?>
    <?php include("includes/styling_scripts/fonts-icons.html"); ?>
    <?php include("includes/styling_scripts/javascript.html"); ?>
</head>
<body>

<div class="wrapper">
    <div class="container-fluid">
        <?php
            if(isset($firstName) && isset($lastName) && isset($email) && isset($mobileNumber) && isset($addressLine1) && isset($suburb) && isset($state) && isset($postcode) && isset($password) && isset($confirmPassword)){
            //include ("dashboardTools/loginTools/login-check.php");
                $checkEmail = $dbConnection->prepare("SELECT * FROM customers WHERE email = :email");
                $checkEmail->bindParam(':email', $email);

                try {
                    $checkEmail->execute();

                } catch(Exception $error) {
                    echo 'Exception -> ';
                    var_dump($error->getMessage());
                }

                $checkEmail = $checkEmail->fetch();
                $retrievedEmail = $checkEmail['email'];

                if($retrievedEmail == $email){
                    echo "The email you entered is already registered";
                    $emailValid = false;
                } else {
                    $emailValid = true;
                }

                if($password != $confirmPassword){
                    echo "Passwords do not match";
                    $passwordsMatch = false;
                } else {
                    $passwordsMatch = true;
                }

                if(!$passwordsMatch || !$emailValid){
                    require ("dashboardTools/registrationTools/registration-form.php");

                } else {
                    require ("dashboardTools/registrationTools/insertCustomerIntoDatabase.php");
                    header("Location: dashboard.php");
                    exit();
                }

            } else {
                require ("dashboardTools/registrationTools/registration-form.php");
            }
        ?>
    </div>
</div>
</body>
<style>
    body {
        background: url(../assets/img/full_page_bkg_img.png) no-repeat center center fixed !important;
        -webkit-background-size: cover !important;
        -moz-background-size: cover !important;
        -o-background-size: cover !important;
        background-size: cover !important;

    }

    .col-centered{
        float: none;
        margin: 0 auto;
        text-align: center; 
    }

    .vertical-center {
        top: 10%;
        transform: translateY(+10%);
        float:none;
        margin: 0 auto;
    }

    .white-custom-button {
        background-color: #ffffff !important;
        border-color: #ffffff !important;
        color: #5A5B5C !important;
    }

    .white-custom-button:hover {
        background-color: #faebd7 !important;
        border-color: #faebd7 !important;
    }

</style>
</html>
