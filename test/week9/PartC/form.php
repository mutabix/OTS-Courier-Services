<!doctype html>
<html>
    <head>
		<title>Register</title>
		<link href="mystyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
<?php
	$errors = array();
	if (isset($_POST['email']))
	{
		require 'validate.inc';
		validateEmail($errors, $_POST, 'email');
		// validate surna
		// ...
		if ($errors)
		{
			echo '<h1>Invalid, correct the following errors:</h1>';
			foreach ($errors as $field => $error)
				echo "$field $error</br>";
			// redisplay the form
			include 'form.inc';
		}
		else
			echo 'form submitted successfully with no errors';
	}
	else
	{
		include 'form.inc';
	}
?>

	</body>
</html>