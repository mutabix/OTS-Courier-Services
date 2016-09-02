<?php

	function validateData(){
		$errors = array();
		if(!validateEmail($senderEmail)){
			$errorsExist = true;
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

	function standardWords1and30($wordInput){ //Between 1 and 30 characters
		$standardWordsRegex = "/^[a-zA-Z]{1,30}$/";

		if(preg_match($standardWordsRegex, $wordInput)) {
			// echo "valid";
			return true;
        } else {
        	// echo "invalid";
        	return false;
        }
	}

	function standardWords1and128($wordInput){ //Between 1 and 128 characters
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

	function standardWords0and128($wordInput){ //Between 0 and 128 characters
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
		$postcodeRegex = "/^[0-9]{4}$/";

		if(preg_match($postcodeRegex, $postcode)) {
			// echo "valid";
			return true;
        } else {
        	// echo "invalid";
        	return false;
        }
	}

	function validateNumber1and3(){
		$standardNumberRegex = "/^[0-9]{1,3}$/";
		$numbers = "53";

		if(preg_match($standardNumberRegex, $numbers)) {
			// echo "valid";
			return true;
        } else {
        	// echo "invalid";
        	return false;
        }
	}


?>