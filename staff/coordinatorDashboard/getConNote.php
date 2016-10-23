<?php
session_start();
$_SESSION['connoteNumber'] = $_GET[connote];
//echo $_SESSION['connoteNumber'] ;
header("Location: ../../files/connote.php");
exit();

?>
