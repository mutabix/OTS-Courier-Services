<?php
session_start();
$_SESSION['connoteNumber'] = $_GET[connote];

header("Location: ../../files/connote.php");
exit();

?>
