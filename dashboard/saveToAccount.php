<?php
	session_start();
    include("../dbTools/dbConnect.php");
    include("checkLogin.php");

    $email = $_SESSION['username'];

    $checkSavedDetails = $dbConnection->prepare("SELECT * FROM tracking WHERE trackingNumber = :trackingNumber and customer = :customer");
    $checkSavedDetails->bindParam(':trackingNumber', $_GET['id']);
    $checkSavedDetails->bindParam(':customer', $email);

    try {
        $checkSavedDetails->execute();
    } catch(Exception $error) {
        echo 'Exception -> ';
        var_dump($error->getMessage());
    }

    //$details = $checkSavedDetails->fetch();
    $count = $checkSavedDetails->rowCount();
    echo $count;

    if($count == 0){
        $sql = "INSERT INTO tracking (trackingID, trackingNumber, customer) VALUES (DEFAULT, ".$_GET['id'].", '".$email."')";
        $result = $dbConnection->prepare($sql);
        try {
            $result->execute();
        } catch(Exception $error) {
            echo 'Exception -> ';
            var_dump($error->getMessage());
        }

        
    }

    header("Location: dashboard.php");
    exit();


	
?>