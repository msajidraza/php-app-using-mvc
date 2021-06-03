<?php
	require APP_ROOT . '/views/includes/head.php';
	?>
	
	
	<div class="container">
		<div class="login-wrapper" style="margin-top: 10%;">
			
			<h1>SIGN IN</h1>

			<form id="myForm" name="myForm">

				<input type="text" id="username" name="username" placeholder="Email *" onkeyup="clearError(this.id);">
				<span class="invalidInput" id="usernameError"></span>
				
				<input type="password" id="password" name="password" placeholder="Password *" onkeyup="clearError(this.id);">
				<span class="invalidInput" id="passwordError"></span>

				<button type="submit" id="btnsubmit" value="submit">Login</button>

				<p class="options">Not a registered user ? <a href="<?php echo APP_URL; ?>/users/register">Register</a> | <a href="<?php echo APP_URL; ?>/pages/index">Home</a></p>

			</form>

		</div>
		
	</div>

</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){

		$('#myForm').on('submit', function(e){
			e.preventDefault();

			var username  = $('#username').val();
			var password  = $('#password').val();
			
			if(username == '')
			{
				$('#username').focus();
				$('#usernameError').html('Please enter Username');
				return false;
			}
			else if(password == '')
			{
				$('#password').focus();
				$('#passwordError').html('Please enter Password');
				return false;
			}
			else
			{
				$.ajax({
					url        : '<?php echo APP_URL; ?>/users/validateLoginForm',
					method     : 'POST',					
					data       : $(this).serialize(),
					dataType   : 'json',
					beforeSend : function(){
						$("#btnsubmit").html('Signing In ...');
						$('#btnsubmit').attr('disabled', 'disabled');
					},
					success : function(data){ 

						if(data['status'] == 'error')
						{
							if(data['usernameError'] != '')
							{
								$('#usernameError').html(data['usernameError']);
							}
							else
							{
								$('#usernameError').html('');
							}

							if(data['passwordError'] != '')
							{
								$('#passwordError').html(data['passwordError']);
							}
							else
							{
								$('#passwordError').html('');
							}
							
							$('#btnsubmit').html('Login');
							$('#btnsubmit').attr('disabled', false);
						}
						if(data['status'] == 'success')
						{
							if(data['response'] == 'LoggedIn')
							{
								setTimeout(' window.location.href = "<?php echo APP_URL; ?>/users/profile"; ',500);
							}
							else
							{
								alert(data['response']);
								//$('#response').html(data['response']);

								$('#password').val('');
								$('#password').focus();
								$('#btnsubmit').html('Login');
								$('#btnsubmit').attr('disabled', false);
							}
						}
						
					}
				});
			}
			
		});

	});

	function clearError(elemId)
	{ 
		$('#'+elemId+'Error').html('');
	} 

</script>