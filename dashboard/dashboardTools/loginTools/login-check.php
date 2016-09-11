<?php
	$loginPassword = sha1($loginPassword);

	$checkLogin = $dbConnection->prepare("SELECT * FROM customers WHERE email = :email and password = :password");

	$checkLogin->bindParam(':email', $loginEmail);
    $checkLogin->bindParam(':password', $loginPassword);

    try {
        $checkLogin->execute();

    } catch(Exception $error) {
        echo 'Exception -> ';
        var_dump($error->getMessage());
    }

    $login = $checkLogin->fetch();
    $retrievedUsername = $login['email'];
    $retrievedPassword = $login['password'];

    //Double Check Login
    if($loginEmail == $retrievedUsername && $loginPassword == $retrievedPassword){
            $_SESSION['username'] = $username; //Current session username
            $_SESSION['loginSessionId'] = mt_rand();
            $credentialsMatch = true;
        }
    else{
        	$credentialsMatch = false;
    }


?>