<?php
	session_start();
    include("../dbTools/dbConnect.php");
    include("checkLogin.php");

    $email = $_SESSION['username'];

	$sql = "DELETE FROM tracking WHERE trackingNumber=".$_GET['id']." AND customer='".$email."'";
	$result = $dbConnection->prepare($sql);
	try {
        $result->execute();
    } catch(Exception $error) {
        echo 'Exception -> ';
        var_dump($error->getMessage());
    }


	header("Location: dashboard.php");
	exit();
?>