<?php
    session_start();
    include ("../dbTools/dbConnect.php");

    $loginEmail = $_POST["loginEmail"];
    $loginPassword = $_POST["loginPassword"];
    $credentialsMatch = false;
    if(isset($loginEmail) && isset($loginPassword)){
        $loginPassword = sha1($loginPassword);
        $checkLogin = $dbConnection->prepare("SELECT * FROM customers WHERE email = :email and password = :password");
        $checkLogin->bindParam(':email', $loginEmail);
        $checkLogin->bindParam(':password', $loginPassword);

        try {
            $checkLogin->execute();
        } catch(Exception $error) {
            echo 'Exception -> ';
            var_dump($error->getMessage());
        }

        $login = $checkLogin->fetch();
        $retrievedUsername = $login['email'];
        $retrievedPassword = $login['password'];
        //Double Check Login
        if($loginEmail == $retrievedUsername && $loginPassword == $retrievedPassword){
                $_SESSION['username'] = $loginEmail; //Current session username
                $_SESSION['loginSessionId'] = mt_rand();
                $credentialsMatch = true;
            }
        else{
                $credentialsMatch = false;
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <title>Login</title>

    <?php include("includes/styling_scripts/meta.html"); ?>
    <?php include("includes/styling_scripts/css.html"); ?>
    <?php include("includes/styling_scripts/fonts-icons.html"); ?>
    <?php include("includes/styling_scripts/javascript.html"); ?>
</head>
<body>

<div class="wrapper">
    <div class="container-fluid">
        <?php
            if(isset($loginEmail) && isset($loginPassword)){
            //include ("dashboardTools/loginTools/login-check.php");
                if(!$credentialsMatch){
                    echo "Email or Password Incorrect";
                    require ("dashboardTools/loginTools/login-form.php");
                } else {
                    header("Location: dashboard.php");
                    //exit();
                }
            } else {
                require ("dashboardTools/loginTools/login-form.php");
            }
        ?>
        
    </div>
</div>
</body>
    <style type="text/css">
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
            top: 50%;
            transform: translateY(+50%);
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