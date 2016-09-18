<?php
    session_start();
    
    if(isset($_SESSION['username']) && isset($_SESSION['loginSessionId'])){ //If the session has a username they are logged in
        $currentUsername = $_SESSION['username'];
            
            //SQL query to get the User ID
            $getAccount = $dbConnection->prepare("SELECT * FROM customers WHERE username='$currentUsername'");
            $getAccount->execute();
            $account = $getAccount->fetch();
            
            if($currentUsername == $account['username']){
                header("Location:".$_SESSION['webaddress']."");

            } else {
                header("Location: login.php");
            }

    } else {
        header("Location: login.php");

    }
?>