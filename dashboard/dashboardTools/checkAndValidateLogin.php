<?php
	if(!(isset($_SESSION["loginID"])) && !(isset($_SESSION["customerID"]))) {
        if($_SESSION["loginID"] == "" && $_SESSION["customerID"] == ""){
            header("Location: ../login.php");
        }
    }
?>