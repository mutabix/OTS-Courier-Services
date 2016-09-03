<?php
	$height = $_SESSION['shipmentDetails'] [3];
	$width = $_SESSION['shipmentDetails'] [1];
	$length = $_SESSION['shipmentDetails'] [2];

	$serviceTypeID = $_SESSION['shipmentDetails'] [4];
	$packageTypeID = $_SESSION['shipmentDetails'] [5];

	$pickup_state_id = $_SESSION['senderDetails'] [8];
	$delivery_state_id = $_SESSION['receiverDetails'] [8];

	$flat_rate_sat = 15;
	$flat_rate_box = 25;

	$sat_type_cost_1_kg = 0.0;
	$sat_type_cost_3_kg = 5.0;
	$sat_type_cost_5_kg = 7.5;

	$box_type_cost_1_kg = 0.0;
	$box_type_cost_3_kg = 5.0;
	$box_type_cost_5_kg = 10.0;
	$box_type_cost_10_kg = 25.0;
	$box_type_cost_20_kg = 45.0;

	$delivery_location_within_state = 5.0;
	$delivery_location_outside_state = 15.0;

	$service_type_std_cost = 0.0;
	$service_type_exp_cost = 5.0;
	$service_type_ovnt_cost = 15.0;

	if($serviceTypeID == 1){
		$service_type_std_cost = $service_type_std_cost;
	} else if($serviceTypeID == 2){
		$service_type_std_cost = $service_type_exp_cost;
	} else if($serviceTypeID == 3){
		$service_type_std_cost = $service_type_ovnt_cost;
	}

	if(isset($length) && isset($width) && isset($height)){
		$volume_of_box = $length * $width * $height;
		$dimensional_cost = (($length * 0.3) + ($width * 0.3) + ($height * 0.3));
	}

	if($packageTypeID == "1"){
		$sat_type_cost = $sat_type_cost_1_kg;
	} else if($packageTypeID == "2"){
		$sat_type_cost = $sat_type_cost_3_kg;
	} else if ($packageTypeID == "3"){
		$sat_type_cost = $sat_type_cost_5_kg;
	}

	else if($packageTypeID == "4"){
		$box_type_cost = $box_type_cost_1_kg;
	} else if($packageTypeID == "5"){
		$box_type_cost = $box_type_cost_3_kg;
	} else if($packageTypeID == "6"){
		$box_type_cost = $box_type_cost_5_kg;
	} else if($packageTypeID == "7"){
		$box_type_cost = $box_type_cost_10_kg;
	} else if($packageTypeID == "8"){
		$box_type_cost = $box_type_cost_20_kg;
	}

	if($packageTypeID == "1" || $packageTypeID == "2" || $packageTypeID == "3"){
		$total_cost = $flat_rate_sat + $sat_type_cost + $service_type_std_cost;
	} else {
		if($pickup_state_id == $delivery_state_id){
			$delivery_location_fee = $delivery_location_within_state;
		} else{
			$delivery_location_fee = $delivery_location_outside_state;
		}

		$total_cost = $flat_rate_box + $box_type_cost + $dimensional_cost + $delivery_location_fee + $service_type_std_cost;
	}

	$total_cost = round($total_cost*2) / 2;
	$total_cost_ex_gst = $total_cost * 0.9;
	$gst = $total_cost - $total_cost_ex_gst;
?>