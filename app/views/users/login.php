<?php
	require APP_ROOT . '/views/includes/head.php';
	?>
	
	<div>
		<h3>Welcome to Registration App in MVC</h3>
	</div>

	<div class="container">
		<div class="login-wrapper">
			
			<h3>Register</h3>

			<form action="<?php echo APP_URL; ?>/users/login" method="POST">

				<input type="text" name="username" placeholder="Your Email *">
				<span class="invalidInput">
					<?php echo $data['usernameError']; ?>
				</span>

				<input type="text" name="username" placeholder="Your Email *">
				<span class="invalidInput">
					<?php echo $data['usernameError']; ?>
				</span>

				<input type="text" name="username" placeholder="Your Email *">
				<span class="invalidInput">
					<?php echo $data['usernameError']; ?>
				</span>

				<input type="text" name="username" placeholder="Your Email *">
				<span class="invalidInput">
					<?php echo $data['usernameError']; ?>
				</span>

				<input type="text" name="username" placeholder="Your Email *">
				<span class="invalidInput">
					<?php echo $data['usernameError']; ?>
				</span>

				<button type="submit" id="btnsubmit" value="submit">Submit</button>

				<p class="options">Already a member ? <a href="<?php echo APP_URL; ?>/users/login">Sign In</a></p>

			</form>

		</div>
		
	</div>

</body>
</html>