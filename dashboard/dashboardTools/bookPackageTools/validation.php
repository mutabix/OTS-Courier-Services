<?php

    function validateData(){
        $errors = array();
        $errorCount = 0;

        $anerror = validateEmail("matthew.d.magingmail.com");
        echo $anerror;
        $errorsExist = true;

        if(!(validateEmail("matthew.d.magingmail.com"))){
            $errorsExist = true;
            $errors[$errorCount] = "Sender Email Invalid";
            $errorCount++;
        }

        if(!(validatePhoneNumber($senderMobile))){
            $errorsExist = true;
            $errors[$errorCount] = "Sender Mobile Number Invalid";
            $errorCount++;
        }

        if(!(validatePostcode($senderPostcode))){
            $errorsExist = true;
            $errors[$errorCount] = "Sender Postcode Invalid";
            $errorCount++;
        }

        if(!(validateEmail($receiverEmail))){
            $errorsExist = true;
            $errors[$errorCount] = "Receiver Email Invalid";
            $errorCount++;
        }

        if(!(validatePhoneNumber($receiverMobile))){
            $errorsExist = true;
            $errors[$errorCount] = "Receiver Mobile Number Invalid";
            $errorCount++;
        }

        if(!(validatePostcode($receiverPostcode))){
            $errorsExist = true;
            $errors[$errorCount] = "Receiver Postcode Invalid";
            $errorCount++;
        }

        if(!(validateSize($packageWidth))){
            $errorsExist = true;
            $errors[$errorCount] = "Package Width Invalid";
            $errorCount++;
        }

        if(!(validateSize($packageLength))){
            $errorsExist = true;
            $errors[$errorCount] = "Package Length Invalid";
            $errorCount++;
        }

        if(!(validateSize($packageDepth))){
            $errorsExist = true;
            $errors[$errorCount] = "Package Depth Invalid";
            $errorCount++;
        } 

        if(!(isset($_POST["detailsCorrectCheckbox"]))){
            $errorsExist = true;
            $errors[$errorCount] = "Please Confirm That All The Details You Have Entered Are Correct";
            $errorCount++;
        }

        if(!(isset($_POST["termsAcceptCheckbox"]))){
            $errorsExist = true;
            $errors[$errorCount] = "Please Accept Our Terms And Conditions";
            $errorCount++;
        }
    }

    function validateEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        } else {
            return false;
        }
    }

    function validatePhoneNumber($phone){
        $phoneRegex = "/^\({0,1}((0|\+61)(2|4|3|7|8)){0,1}\){0,1}(\ |-){0,1}[0-9]{2}(\ |-){0,1}[0-9]{2}(\ |-){0,1}[0-9]{1}(\ |-){0,1}[0-9]{3}$/"; //Credit to Dwayne from I like kill nerd for the regex - http://ilikekillnerds.com/2014/08/regular-expression-for-validating-australian-phone-numbers-including-landline-and-mobile/

        if(preg_match($phoneRegex, $phone)) {
            return true;
        } else {
            return false;
        }
    }

    function validateStandardWords1and30($wordInput){ //Between 1 and 30 characters
        $standardWordsRegex = "/^[a-zA-Z]{1,30}$/";

        if(preg_match($standardWordsRegex, $wordInput)) {
            // echo "valid";
            return true;
        } else {
            // echo "invalid";
            return false;
        }
    }

    function validateStandardWords1and128($wordInput){ //Between 1 and 128 characters
        //$standardWordsRegex = "/^[a-zA-Z ]*$/";
        $standardWordsRegex = "/^[a-zA-Z]{1,128}$/";

        if(preg_match($standardWordsRegex, $wordInput)) {
            // echo "valid";
            return true;
        } else {
            // echo "invalid";
            return false;
        }
    }

    function validateStandardWords0and128($wordInput){ //Between 0 and 128 characters
        //$standardWordsRegex = "/^[a-zA-Z ]*$/";
        $standardWordsRegex = "/^[a-zA-Z]{0,128}$/";

        if(preg_match($standardWordsRegex, $wordInput)) {
            // echo "valid";
            return true;
        } else {
            // echo "invalid";
            return false;
        }
    }

    function validatePostcode($postcode){
        //$postcodeRegex = "/^[0-9]{4}$/";
        $postcodelength = strlen((string)$postcode);

        if($postcodelength == 4) {
            // echo "valid";
            return true;
        } else {
            // echo "invalid";
            return false;
        }
    }

    function validateNumber1and3($numbers){
        $standardNumberRegex = "/^[0-9]{1,3}$/";

        if(preg_match($standardNumberRegex, $numbers)) {
            // echo "valid";
            return true;
        } else {
            // echo "invalid";
            return false;
        }
    }

    function validateSize($size){
        if($size >= 0 || $size < 100){
            return true;
        } else {
            return false;
        }
    }
?>