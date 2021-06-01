<?php
	require APP_ROOT . '/views/includes/head.php';
	?>
	
	
	<div class="container">
		<div class="login-wrapper">
			
			<h1>SIGN IN</h1>

			<form action="<?php echo APP_URL; ?>/users/login" method="POST">

				<input type="text" name="username" placeholder="Email *">
				<span class="invalidInput">
					<?php echo $data['usernameError']; ?>
				</span>
				
				<input type="password" name="password" placeholder="Password *">
				<span class="invalidInput">
					<?php echo $data['passwordError']; ?>
				</span>

				<button type="submit" id="btnsubmit" value="submit">Submit</button>

				<p class="options">Not a registered user ? <a href="<?php echo APP_URL; ?>/users/register">Register</a></p>

			</form>

		</div>
		
	</div>

</body>
</html>