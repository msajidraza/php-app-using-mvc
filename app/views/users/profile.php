<?php 
	session_start();

	if(!isset($_SESSION['user_id']))
	{
		header('location:' . APP_URL . '/pages/index');
	} 

	require APP_ROOT . '/views/includes/head.php';

	$tarr = explode(' - ', $_SESSION['time_zone']);
	$timezoneIden = $tarr[1];
	date_default_timezone_set($timezoneIden);
	
	$currentTime = date('H:i:s');
	?>
	
	
	<div class="container">
		<div class="profile-wrapper">
			<div>
				<div style="float: left; width: 60%; margin-bottom: 30px;">
					<h2>YOUR PROFILE</h2>
				</div>
				<div style="float: right; width: 40%; margin-bottom: 30px; text-align: right;">
					<a href="<?php echo APP_URL; ?>/users/logout" class="btn-logout">Sign Out</a>
				</div>
			</div>
			<div style="clear: both;"></div>
			<div>
				<div style="float: left; width: 30%;">
					<img src="<?php echo APP_URL; ?>/public/img/ppics/<?php echo $_SESSION['profile_pic']; ?>" width="256" height="256">
				</div>
				<div style="float: left; width: 35%;">
					<div class="profile-value"><?php echo $_SESSION['name']; ?></div>
					<div class="profile-label">Name</div>

					<div class="profile-value"><?php echo $_SESSION['email']; ?></div>
					<div class="profile-label">Email</div>

					<div class="profile-value"><?php echo $_SESSION['phone']; ?></div>
					<div class="profile-label">Phone</div>

					<div class="profile-value"><?php echo $_SESSION['address']; ?></div>
					<div class="profile-label">Address</div>

					<div class="profile-value"><?php echo $_SESSION['city']; ?></div>
					<div class="profile-label">City</div>

				</div>
			    <div style="float: left; width: 35%;">
					<div class="profile-value"><?php echo $_SESSION['state']; ?></div>
					<div class="profile-label">State</div>

					<div class="profile-value"><?php echo $_SESSION['country']; ?></div>
					<div class="profile-label">Country</div>

					<div class="profile-value"><?php echo $_SESSION['zip']; ?></div>
					<div class="profile-label">Zip Code</div>

					<div class="profile-value"><?php echo $currentTime; ?></div>
					<div class="profile-label">Current Time</div>
					
					<div class="profile-value"><?php echo $_SESSION['time_zone']; ?></div>
					<div class="profile-label">Time Zone</div>

				</div>
		    </div>

		</div>
		
	</div>

</body>
</html>

