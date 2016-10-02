<?php
    session_start();
    include("../dbTools/dbConnect.php");
?>

<!doctype html>
<html lang="en">
<head>
    <title>Notification Manager</title>

    <?php include("includes/styling_scripts/meta.html"); ?>
    <?php include("includes/styling_scripts/css.html"); ?>
    <?php include("includes/styling_scripts/fonts-icons.html"); ?>
    <?php include("includes/styling_scripts/javascript.html"); ?>
</head>
<body>

<div class="wrapper">
    <?php include("includes/sidebar.html"); ?>

    <div class="main-panel">
        <?php include("includes/navbar-mobile-open.html"); ?>
        <a class="navbar-brand">Notification Manager</a>
        <?php include("includes/navbar-mobile-close.html"); ?>
		<?php $Recipients = "Employees" ?>

        <div class="content">
            <div class="container-fluid">
				<form action='dashboardTools/logNotification.php' method='POST' novalidate>
					<h3><B>Notification:</B></h3>
					<div class='form-group'>
						<label for='loginEmail'>Message:</label><br>
						<textarea name="noteMessage" rows="2" cols="120"><?php echo $noteMessage;?></textarea><br>
						<b>Notification Type:</b><br>
						<input type="radio" name="Type" checked="checked" <?php if (isset($Type) && $Type=="Coordinator") echo "checked";?> value="Coordinator">Coordinator Message<br>
						<input type="radio" name="Type" <?php if (isset($Type) && $Type=="Emergency") echo "checked";?> value="Emergency">Emergency Message<br><br>
						<b>Recipients:</b><br>
						<input type="radio" name="Recipients" <?php if (isset($Recipients) && $Recipients=="Employees") echo "checked";?> value="Employees">All<br>
						<input type="radio" name="Recipients" <?php if (isset($Recipients) && $Recipients=="Drivers") echo "checked";?> value="Drivers">Only Drivers<br>
						<input type="radio" name="Recipients" <?php if (isset($Recipients) && $Recipients=="Customers") echo "checked";?> value="Customers">Only Customers<br>
						<input type="radio" name="Recipients" <?php if (isset($Recipients) && $Recipients=="Other") echo "checked";?> value="Other">Other (Please Specify Email Address): <input type='message' class='form-control' placeholder='Other Recipient' name='otherName'><br><br>
						
						<button type='submit' class='btn btn-info btn-fill' name='submitLogin' style='padding-left: 30px; padding-right: 30px;'>Send Notification</button>
					</div>
				</form>
            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>


</html>
