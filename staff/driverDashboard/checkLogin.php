<?php
	session_start();


    if(!(isset($_SESSION['username']))){
        header("Location: login.php");
        exit();
    }

    if($_SESSION['employeeStatus'] != 0){ //0-Driver
    	header("Location: ../notAuthorised.php");
        exit();
    }

    $getEmployeeDetails = $dbConnection->prepare("SELECT employeeID FROM employees WHERE email = :email");
    $getEmployeeDetails->bindParam(':email', $_SESSION['username']);

    try {
        $getEmployeeDetails->execute();
    } catch(Exception $error) {
        echo 'Exception -> ';
        var_dump($error->getMessage());
    }

    $employeeID = $getEmployeeDetails->fetch();
    $_SESSION['employeeID'] = $employeeID['employeeID'];

    
?>