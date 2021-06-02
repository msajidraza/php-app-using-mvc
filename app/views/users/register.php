<?php
	require APP_ROOT . '/views/includes/head.php';
	?>
	
	
	<div class="container">
		<div class="login-wrapper">
			
			<h1>REGISTER</h1>

			<form id="myForm" name="myForm" method="POST">

				<input type="text" id="name" name="name" placeholder="Your Name *">
				<span class="invalidInput" id="nameError"></span>

				<input type="text" id="email" name="email" placeholder="Your Email *">
				<span class="invalidInput" id="emailError"></span>

				<input type="password" id="password" name="password" placeholder="Password at least 8 char *">
				<span class="invalidInput" id="passwordError"></span>

				<input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password *">
				<span class="invalidInput" id="confirmPasswordError"></span>

				<input type="text" id="phone" name="phone" placeholder="Phone *">
				<span class="invalidInput" id="phoneError"></span>

				<input type="text" id="address" name="address" placeholder="Your Address *">
				<span class="invalidInput" id="addressError"></span>

				<input type="text" id="city" name="city" placeholder="Your City *">
				<span class="invalidInput" id="cityError"></span>

				<input type="text" id="state" name="state" placeholder="Your State *">
				<span class="invalidInput" id="stateError"></span>

				<input type="text" id="country" name="country" placeholder="Your Country *">
				<span class="invalidInput" id="countryError"></span>

				<input type="text" id="zip" name="zip" placeholder="Your Zip Code *">
				<span class="invalidInput" id="zipError"></span>

				<input type="text" id="time_zone" name="time_zone" placeholder="Your Time Zone *">
				<span class="invalidInput" id="time_zoneError"></span>

				<!-- <input type="file" name="profile_pic" placeholder="Your Pic"> -->
				<!-- <span class="invalidInput">
					<?php // echo $data['profile_picError']; ?>
				</span> -->

				<button type="submit" id="btnsubmit" value="submit">Submit</button>

				<p class="options">Already a member ? <a href="<?php echo APP_URL; ?>/users/login">Sign In</a></p>

			</form>

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

					if(data['status'] == 'error')
					{
						if(data['nameError'] != '')
						{
							$('#nameError').html(data['nameError']);
						}
						else
						{
							$('#nameError').html('');
						}

						if(data['emailError'] != '')
						{
							$('#emailError').html(data['emailError']);
						}
						else
						{
							$('#emailError').html('');
						}

						if(data['passwordError'] != '')
						{
							$('#passwordError').html(data['passwordError']);
						}
						else
						{
							$('#passwordError').html('');
						}

						if(data['confirmPasswordError'] != '')
						{
							$('#confirmPasswordError').html(data['confirmPasswordError']);
						}
						else
						{
							$('#confirmPasswordError').html('');
						}

						if(data['phoneError'] != '')
						{
							$('#phoneError').html(data['phoneError']);
						}
						else
						{
							$('#phoneError').html('');
						}

						if(data['addressError'] != '')
						{
							$('#addressError').html(data['addressError']);
						}
						else
						{
							$('#addressError').html('');
						}

						if(data['cityError'] != '')
						{
							$('#cityError').html(data['cityError']);
						}
						else
						{
							$('#cityError').html('');
						}

						if(data['stateError'] != '')
						{
							$('#stateError').html(data['stateError']);
						}
						else
						{
							$('#stateError').html('');
						}

						if(data['countryError'] != '')
						{
							$('#countryError').html(data['countryError']);
						}
						else
						{
							$('#countryError').html('');
						}

						if(data['zipError'] != '')
						{
							$('#zipError').html(data['zipError']);
						}
						else
						{
							$('#zipError').html('');
						}

						if(data['time_zoneError'] != '')
						{
							$('#time_zoneError').html(data['time_zoneError']);
						}
						else
						{
							$('#time_zoneError').html('');
						}
						$('#btnsubmit').html('Submit');
						$('#btnsubmit').attr('disabled', false);
					}
					if(data['status'] == 'success')
					{
						alert(data['response']);
						//$('#response').html(data['response']);

						$('#btnsubmit').html('Submit');
						$('#btnsubmit').attr('disabled', false);
						$('#myForm')[0].reset();

						/*$('#nameError').html('');
						$('#emailError').html('');
						$('#passwordError').html('');
						$('#phoneError').html('');
						$('#addressError').html('');
						$('#cityError').html('');
						$('#stateError').html('');
						$('#countryError').html('');
						$('#zipError').html('');
						$('#time_zoneError').html('');*/
					}
					
				}
			});
		});

	});

</script>