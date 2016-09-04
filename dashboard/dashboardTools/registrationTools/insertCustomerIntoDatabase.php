<?php
        /*$checkEmail = $dbConnection->prepare("SELECT * FROM customers WHERE email = :email");
        $checkEmail->bindParam(':email', $email);

        try {
            $checkEmail->execute();

        } catch(Exception $error) {
            echo 'Exception -> ';
            var_dump($error->getMessage());
        }

        $checkEmail = $checkEmail->fetch();
        $retrievedEmail = $checkEmail['email'];

        if($retrievedEmail == $email){
            echo "The email you entered is already registered";
            $emailValid = false;
        } else {
            $emailValid = true;
        }

        if($password != $confirmPassword){
            echo "Passwords do not match";
            $passwordsMatch = false;
        } else {
            $passwordsMatch = true;
        }*/

            $customerID = rand();

            //INSERT INTO DATABASE
            $addCustomer = $dbConnection->prepare("INSERT INTO customers (customerID, companyName, firstName, lastName, email, mobileNumber, addressLine1, addressLine2, suburb, state, postcode, password) VALUES (:customerID, :companyName, :firstName, :lastName, :email, :mobileNumber, :addressLine1, :addressLine2, :suburb, :state, :postcode, :password)");

            $addCustomer->bindParam(':customerID', $customerID);
            $addCustomer->bindParam(':companyName', $companyName);
            $addCustomer->bindParam(':firstName', $firstName);
            $addCustomer->bindParam(':lastName', $lastName);
            $addCustomer->bindParam(':email', $email);
            $addCustomer->bindParam(':mobileNumber', $mobileNumber);
            $addCustomer->bindParam(':addressLine1', $addressLine1);
            $addCustomer->bindParam(':addressLine2', $addressLine2);
            $addCustomer->bindParam(':suburb', $suburb);
            $addCustomer->bindParam(':state', $state);
            $addCustomer->bindParam(':postcode', $postcode);
            $addCustomer->bindParam(':password', $password);

            try {
                $addCustomer->execute(); //Executes $addCustomer - adds the data into the database
                //echo "executed";

            } catch(Exception $error) {
                echo 'Exception -> ';
                var_dump($error->getMessage());
            }
        
    
?>