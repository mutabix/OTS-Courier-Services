<html>
<?php
	require 'validate.inc';
	$errors = array();
	validateEmail($errors, $_REQUEST, 'email');
	
	if ($errors)
	{
		echo 'Errors:<br/>';
		foreach ($errors as $field => $error)
			echo "$field $error</br>";
	}
	else
		echo 'Data OK!';
?>
</html>
