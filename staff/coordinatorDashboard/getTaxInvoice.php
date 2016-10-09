<?php
session_start();
$_SESSION['taxInvoiceNumber'] = $_GET[taxinv];

header("Location: ../../files/taxInvoice.php");
exit();

?>
