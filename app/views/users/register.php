<?php
	require APP_ROOT . '/views/includes/head.php';
	?>
	
	
	<div class="container">
		<div class="login-wrapper">
			
			<h1>REGISTER</h1>

			<form action="<?php echo APP_URL; ?>/users/register" method="POST">

				<input type="text" name="name" placeholder="Your Name *">
				<span class="invalidInput">
					<?php echo $data['nameError']; ?>
				</span>

				<input type="text" name="email" placeholder="Your Email *">
				<span class="invalidInput">
					<?php echo $data['emailError']; ?>
				</span>

				<input type="password" name="password" placeholder="Password at least 8 char *">
				<span class="invalidInput">
					<?php echo $data['passwordError']; ?>
				</span>

				<input type="password" name="confirmPassword" placeholder="Confirm Password *">
				<span class="invalidInput">
					<?php echo $data['confirmPasswordError']; ?>
				</span>

				<input type="text" name="phone" placeholder="Phone *">
				<span class="invalidInput">
					<?php echo $data['phoneError']; ?>
				</span>

				<input type="text" name="address" placeholder="Your Address *">
				<span class="invalidInput">
					<?php echo $data['addressError']; ?>
				</span>

				<input type="text" name="city" placeholder="Your City *">
				<span class="invalidInput">
					<?php echo $data['cityError']; ?>
				</span>

				<input type="text" name="state" placeholder="Your State *">
				<span class="invalidInput">
					<?php echo $data['stateError']; ?>
				</span>				

				<input type="text" name="country" placeholder="Your Country *">
				<span class="invalidInput">
					<?php echo $data['countryError']; ?>
				</span>

				<input type="text" name="zip" placeholder="Your Zip Code *">
				<span class="invalidInput">
					<?php echo $data['zipError']; ?>
				</span>

				<input type="text" name="time_zone" placeholder="Your Time Zone *">
				<span class="invalidInput">
					<?php echo $data['time_zoneError']; ?>
				</span>

				<input type="file" name="profile_pic" placeholder="Your Pic">
				<span class="invalidInput">
					<?php echo $data['profile_picError']; ?>
				</span>

				<button type="submit" id="btnsubmit" value="submit">Submit</button>

				<p class="options">Already a member ? <a href="<?php echo APP_URL; ?>/users/login">Sign In</a></p>

			</form>

		</div>
		
	</div>

</body>
</html>