<?php
	require APP_ROOT . '/views/includes/head.php';
	?>
	
	
	<div class="container">
		<div class="login-wrapper">
			
			<h1>REGISTER</h1>

			<div id='preview' style="width: 100%; margin: 20px auto;">
            	<img src="<?php echo APP_URL; ?>/public/img/male.png" width="128" height="128">
            </div>

			<div>
                <form id="imageform" method="post" enctype="multipart/form-data" action='<?php echo APP_URL; ?>/users/uploadProfilePic'>
                    <span id="pimg"><input type="file" id="profileimg" name="profileimg" placeholder="Upload your pic (upto 2MB)" /></span>
                </form>
            </div>


			<form id="myForm" name="myForm" method="POST">

				<input type="hidden" id="profile_pic" name="profile_pic">

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
				
				<button type="submit" id="btnsubmit" value="submit">Register Now</button>

				<p class="options">Already a member ? <a href="<?php echo APP_URL; ?>/users/login">Sign In</a></p>

			</form>

		</div>
		
	</div>

</body>
</html> 
<script type="text/javascript" src="<?php echo APP_URL; ?>/public/js/jquery.form.js"></script>
<script type="text/javascript">

	$(document).ready(function(){

		$('#profileimg').change(function(){ 
			$("#preview").html('');
			$("#preview").html('<img src="<?php echo APP_URL; ?>/public/img/preloader.gif" width="128" height="128" alt="Uploading...."/>');
			$("#imageform").ajaxForm({
				target: '#preview',
				success: function(data) {
					var profile_pic = $('#actual_pic_name').val();
					$('#profile_pic').val(profile_pic);

					//document.getElementById('profile_pic').value = profile_pic;
				}
			}).submit();
		});


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
						$('#btnsubmit').html('Register Now');
						$('#btnsubmit').attr('disabled', false);
					}
					if(data['status'] == 'success')
					{
						alert(data['response']);
						//$('#response').html(data['response']);

						$('#btnsubmit').html('Register Now');
						$('#btnsubmit').attr('disabled', false);
						$('#imageForm')[0].reset();
						$('#myForm')[0].reset();
						$('#preview').html('<img src="<?php echo APP_URL; ?>/public/img/male.png" width="128" height="128">');

						/*
						$('#nameError').html('');
						$('#emailError').html('');
						$('#passwordError').html('');
						$('#phoneError').html('');
						$('#addressError').html('');
						$('#cityError').html('');
						$('#stateError').html('');
						$('#countryError').html('');
						$('#zipError').html('');
						$('#time_zoneError').html('');
						*/
					}
					
				}
			});
		});

	});

</script>