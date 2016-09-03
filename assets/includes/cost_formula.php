<?php	
	$flat_rate_sat = 15 * 0.9;
	$flat_rate_box = 25 * 0.9;

	$sat_type_cost_1_kg = 0.0;
	$sat_type_cost_3_kg = 5.0 * 0.9;
	$sat_type_cost_5_kg = 7.5 * 0.9;

	$box_type_cost_1_kg = 0.0 * 0.9;
	$box_type_cost_3_kg = 5.0 * 0.9;
	$box_type_cost_5_kg = 10.0 * 0.9;
	$box_type_cost_10_kg = 25.0 * 0.9;
	$box_type_cost_20_kg = 45.0 * 0.9;

	$delivery_location_within_state = 5.0 * 0.9;
	$delivery_location_outside_state = 15.0 * 0.9;

	if(isset($length) && isset($width) && isset($height)){
		$volume_of_box = $length * $width * $height;
		$dimensional_cost = (($length * 0.3) + ($width * 0.3) + ($height * 0.3)) * 0.9;
	}

	if($package_type == "satchel_1_kg"){
		$sat_type_cost = $sat_type_cost_1_kg;
	} else if($package_type == "satchel_3_kg"){
		$sat_type_cost = $sat_type_cost_3_kg;
	} else if ($package_type == "satchel_5_kg"){
		$sat_type_cost = $sat_type_cost_5_kg;
	}

	else if($package_type == "box_1_kg"){
		$box_type_cost = $box_type_cost_1_kg;
	} else if($package_type == "box_3_kg"){
		$box_type_cost = $box_type_cost_3_kg;
	} else if($package_type == "box_5_kg"){
		$box_type_cost = $box_type_cost_5_kg;
	} else if($package_type == "box_10_kg"){
		$box_type_cost = $box_type_cost_10_kg;
	} else if($package_type == "box_20_kg"){
		$box_type_cost = $box_type_cost_20_kg;
	}

	if($package_type == "satchel_1_kg" || $package_type == "satchel_3_kg" || $package_type == "satchel_5_kg"){
		$total_cost = $flat_rate_sat + $sat_type_cost;
	} else {
		if($pickup_state == $delivery_state){
			$delivery_location_fee = $delivery_location_within_state;
		} else{
			$delivery_location_fee = $delivery_location_outside_state;
		}

		$total_cost_ex_gst = $flat_rate_box + $box_type_cost + $dimensional_cost + $delivery_location_fee;
		$gst = $total_cost_ex_gst * 0.1;
		$total_cost = $total_cost_ex_gst + $gst;
	}
?>