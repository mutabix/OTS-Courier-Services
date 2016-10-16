<?php
    //session_start();
    //$_SESSION['username'] = "";
    //echo $_SESSION['username'];

session_start();

    if(!(isset($_SESSION['username']))){
        header("Location: login.php");
    }

    $getLogin = $dbConnection->prepare("SELECT employeeID, employeeStatus FROM employees WHERE email = :email");
    $getLogin->bindParam(':email', $_SESSION['username']);

    try {
        $getLogin->execute();
    } catch(Exception $error) {
        echo 'Exception -> ';
        var_dump($error->getMessage());
    }

    $employeeDetails = $getLogin->fetch();
    $employeeID = $employeeDetails['employeeID'];
    $_SESSION['employeeID'] = $employeeID;

    $employeeStatus = $employeeDetails['employeeStatus'];

    if($employeeStatus != 0){
    	header("Location: notAuthorised.php");
    }
?>