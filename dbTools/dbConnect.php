<?php
    //Database connection info
    $host = "d6q8diwwdmy5c9k9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $dbusername = "tgs66cq1wippa93b";
    $dbpassword = "xi7mibqw1s765w4q";
    $dbname = "vrtepy2jtdixgvmr";

    try {
        //DATABASE CONNECTION
        $dbConnection = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully"; //Debugging
    }
    catch(PDOException $error) { //Should make a error page
        //echo "Connection failed: " . $error->getMessage(); //Debugging
    }
?>