<?php
session_start();
    //session_destroy();
      //session_unset();
    //$_SESSION['email'] = "";
    //$_SESSION['loginSessionId'] = "";
	session_unset(); //Unsets all session variable
    session_destroy(); 

    header("Location: ../index.php");
?>