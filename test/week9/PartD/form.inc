		<h1>Register</h1>
		<form action="form.php" method="POST">
		<fieldset>
			<legend>Person Details</legend>

			<?php
			    require('fields.inc');
				input_field($errors, 'fname', 'First Name');
				input_field($errors, 'email', 'Email');
				date_field($errors, 'dob', 'Birthday');
			?>
		
			<div class="field">
			<label for="pass">Password:</label>
			<input name="passwd" type="password" id="pass"/>
			</div>		

			<div class="field">
			<label for="VIP">VIP?:</label>
			<input name="VIP" type="checkbox" id="vip"/>
			</div>	

			<div class="field">
			<label>Gender:</label>
			Male <input name="sex" type="radio" id="male" value="Male"/>
			Female <input name="sex" type="radio" id="female" value="Female"/>	
			</div>	

			<div class="field">
			<label for="address">Address:</label>
			<textarea name="address" id="address" rows="3" cols="40"></textarea>
			</div>	

			<div class="field">
			<label for="number">Child Number:</label>
			<select name="number" id="number">
				<option value="1st">First</option>
				<option value="2st">Seconds</option>				
			</select>
			</div>	
			
			<div class="field">
			<label for="log">Log file name:</label>
			<input name="logfile" id="log" type="file">
			</div>				
		
			<input name="register" type="submit" value="Register"/>
		</fieldset>