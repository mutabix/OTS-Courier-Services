<?php
	if(!(isset($_SESSION['employeeEmail']))){
	    header("Location: login.php");
	}
?>