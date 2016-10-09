<?php
session_start();
$_SESSION['connoteNumber'] = $_GET[coninv];

header("Location: ../../files/connote.php");
exit();

?>
