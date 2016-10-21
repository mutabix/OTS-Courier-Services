<?php
	session_start();

    if(!(isset($_SESSION['username']))){
        header("Location: login.php");
    }

    if(isset($_SESSION['employeeStatus'])){
    	header("Location: notAuthorised.php");
        exit();
    }

    $getCustomerDetails = $dbConnection->prepare("SELECT customerID FROM customers WHERE email = :email");
    $getCustomerDetails->bindParam(':email', $_SESSION['username']);

    try {
        $getCustomerDetails->execute();
    } catch(Exception $error) {
        echo 'Exception -> ';
        var_dump($error->getMessage());
    }

    $customerID = $getCustomerDetails->fetch();
    $_SESSION['customerIdLogin'] = $customerID['customerID'];

?>