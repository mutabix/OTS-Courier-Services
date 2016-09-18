<?php
    //session_start();
    //$_SESSION['username'] = "";
    //echo $_SESSION['username'];

//session_start();


    if(!(isset($_SESSION['username']))){
        header("Location: login.php");
    }

    /*if($_SESSION['username'] == ""){
        header("Location: login.php");
    }*/
?>