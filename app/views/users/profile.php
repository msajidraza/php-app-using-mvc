<?php 
	session_start();

	if(!isset($_SESSION['user_id']))
	{
		header('location:' . APP_URL . '/pages/index');
	} 

	require APP_ROOT . '/views/includes/head.php';
	?>
	
	
	<div class="container">
		<div class="login-wrapper">
			
			<h1>YOUR PROFILE</h1>

			

				<span>Profile Pic</span> : <span class="userVal" id="profile_pic"><?php echo $_SESSION['profile_pic']; ?></span><br />
				<span>Name</span> : <span class="userVal" id="name"><?php echo $_SESSION['name']; ?></span><br />
				<span>Email</span> : <span class="userVal" id="email"><?php echo $_SESSION['email']; ?></span><br />
				<span>Phone</span> : <span class="userVal" id="phone"><?php echo $_SESSION['phone']; ?></span><br />
				<span>Address</span> : <span class="userVal" id="address"><?php echo $_SESSION['address']; ?></span><br />
				<span>City</span> : <span class="userVal" id="city"><?php echo $_SESSION['city']; ?></span><br />
				<span>State</span> : <span class="userVal" id="state"><?php echo $_SESSION['state']; ?></span><br />
				<span>Country</span> : <span class="userVal" id="country"><?php echo $_SESSION['country']; ?></span><br />
				<span>Zip Code</span> : <span class="userVal" id="zip"><?php echo $_SESSION['zip']; ?></span><br />
				<span>Time Zone</span> : <span class="userVal" id="time_zone"><?php echo $_SESSION['time_zone']; ?></span><br />				

				<p class="options"><a href="<?php echo APP_URL; ?>/users/logout">Sign Out</a></p>

			

		</div>
		
	</div>

</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){

		$('#myForm').on('submit', function(e){
			e.preventDefault();
			$.ajax({
				url        : '<?php echo APP_URL; ?>/users/validateInputs',
				method     : 'POST',
				data       : $(this).serialize(),
				dataType   : 'json',
				beforeSend : function(){
					$('#btnsubmit').html('Processing...');
					$('#btnsubmit').attr('disabled', 'disabled');
				},
				success : function(data){
					
					if(data['status'] == 'success')
					{
						alert(data['response']);
						//$('#response').html(data['response']);

						$('#btnsubmit').html('Submit');
						$('#btnsubmit').attr('disabled', false);
						$('#myForm')[0].reset();
					}

				}
			});
		});

	});
</script>