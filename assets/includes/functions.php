<?php	
function validateDimension($dimension)
{
	if($dimension != "")
	{
		if(is_numeric($dimension) == false)
		{
			echo 'Value is invalid';
		}
		else if($dimension > 105 || $dimension < 0)
		{
			echo 'Value is either too high or negative';
		}
	}
	else
	{
		echo 'A value must be entered';
	}
}

function validateSelectBox($name)
{
	if($name == "-")
	{
		echo 'Please make a selection';
	}
}
?>