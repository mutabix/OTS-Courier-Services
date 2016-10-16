<?php
    session_start();
    include ("../dbTools/dbConnect.php");

    
?>

<!doctype html>
<html lang="en">
<head>
    <title>Staff Login</title>

    <?php include("includes/styling_scripts/meta.html"); ?>
    <?php include("includes/styling_scripts/css.html"); ?>
    <?php include("includes/styling_scripts/fonts-icons.html"); ?>
    <?php include("includes/styling_scripts/javascript.html"); ?>
</head>
<body>

<div class="wrapper">
    <div class="container-fluid">
        <div class='card col-md-3 col-centered vertical-center'>
            <div class='row'>
                <p>Sorry You Are Not Authorised To View This Page</p>
            </div>
        </div>
        
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