<?php
	include("../../dbTools/dbConnect.php");
	include("checkLogin.php");

	session_start();
	$employeeArray = $_SESSION['employeeArray'];
	$employeeCount = $_SESSION['employeeCount'];

	for($i=0; $i<=$employeeCount; $i++){
		//print_r(explode('-',$_POST['cur_Mon-1'],0));

		$currentEmployee = $employeeArray[$i];
		$curMon = 'cur_Mon-'.$currentEmployee;
		$curTues = 'cur_Tues-'.$currentEmployee;
		$curWed = 'cur_Wed-'.$currentEmployee;
		$curThurs = 'cur_Thurs-'.$currentEmployee;
		$curFri = 'cur_Fri-'.$currentEmployee;
		$nexMon = 'nex_Mon-'.$currentEmployee;
		$nexTues = 'nex_Tues-'.$currentEmployee;
		$nexWed = 'nex_Wed-'.$currentEmployee;
		$nexThurs = 'nex_Thurs-'.$currentEmployee;
		$nexFri = 'nex_Fri-'.$currentEmployee;

		$updateShiftSQL = "UPDATE Shift_Management 
						   SET cur_Mon=:cur_Mon,
						   	   cur_Tues=:cur_Tues,
						   	   cur_Wed=:cur_Wed,
						   	   cur_Thurs=:cur_Thurs,
						   	   cur_Fri=:cur_Fri,
						   	   nex_Mon=:nex_Mon,
						   	   nex_Tues=:nex_Tues,
						   	   nex_Wed=:nex_Wed,
						   	   nex_Thurs=:nex_Thurs,
						   	   nex_Fri=:nex_Fri
						   WHERE employeeID=:employeeID";

		$updateShift = $dbConnection->prepare($updateShiftSQL);

		$updateShift->bindParam(':cur_Mon', $_POST[$curMon]);
		$updateShift->bindParam(':cur_Tues', $_POST[$curTues]);
		$updateShift->bindParam(':cur_Wed', $_POST[$curWed]);
		$updateShift->bindParam(':cur_Thurs', $_POST[$curThurs]);
		$updateShift->bindParam(':cur_Fri', $_POST[$curFri]);
		$updateShift->bindParam(':nex_Mon', $_POST[$nexMon]);
		$updateShift->bindParam(':nex_Tues', $_POST[$nexTues]);
		$updateShift->bindParam(':nex_Wed', $_POST[$nexWed]);
		$updateShift->bindParam(':nex_Thurs', $_POST[$nexThurs]);
		$updateShift->bindParam(':nex_Fri', $_POST[$nexFri]);
		$updateShift->bindParam(':employeeID', $currentEmployee);


		try {
	        $updateShift->execute();
	        echo "done";
	    } catch(Exception $error) {
	        echo 'Exception -> ';
	        var_dump($error->getMessage());
	    }

	}

	header('Location: shiftManagementCoor.php');
	exit();


?>