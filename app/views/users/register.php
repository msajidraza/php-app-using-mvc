<?php
	require APP_ROOT . '/views/includes/head.php';

	$timezones = array (
		'(GMT-11:00) Midway Island' => 'Pacific/Midway',
		'(GMT-11:00) Samoa' => 'Pacific/Samoa',
		'(GMT-10:00) Hawaii' => 'Pacific/Honolulu',
		'(GMT-09:00) Alaska' => 'US/Alaska',
		'(GMT-08:00) Pacific Time (US &amp; Canada)' => 'America/Los_Angeles',
		'(GMT-08:00) Tijuana' => 'America/Tijuana',
		'(GMT-07:00) Arizona' => 'US/Arizona',
		'(GMT-07:00) Chihuahua' => 'America/Chihuahua',
		'(GMT-07:00) La Paz' => 'America/Chihuahua',
		'(GMT-07:00) Mazatlan' => 'America/Mazatlan',
		'(GMT-07:00) Mountain Time (US &amp; Canada)' => 'US/Mountain',
		'(GMT-06:00) Central America' => 'America/Managua',
		'(GMT-06:00) Central Time (US &amp; Canada)' => 'US/Central',
		'(GMT-06:00) Guadalajara' => 'America/Mexico_City',
		'(GMT-06:00) Mexico City' => 'America/Mexico_City',
		'(GMT-06:00) Monterrey' => 'America/Monterrey',
		'(GMT-06:00) Saskatchewan' => 'Canada/Saskatchewan',
		'(GMT-05:00) Bogota' => 'America/Bogota',
		'(GMT-05:00) Eastern Time (US &amp; Canada)' => 'US/Eastern',
		'(GMT-05:00) Indiana (East)' => 'US/East-Indiana',
		'(GMT-05:00) Lima' => 'America/Lima',
		'(GMT-05:00) Quito' => 'America/Bogota',
		'(GMT-04:00) Atlantic Time (Canada)' => 'Canada/Atlantic',
		'(GMT-04:30) Caracas' => 'America/Caracas',
		'(GMT-04:00) La Paz' => 'America/La_Paz',
		'(GMT-04:00) Santiago' => 'America/Santiago',
		'(GMT-03:30) Newfoundland' => 'Canada/Newfoundland',
		'(GMT-03:00) Brasilia' => 'America/Sao_Paulo',
		'(GMT-03:00) Buenos Aires' => 'America/Argentina/Buenos_Aires',
		'(GMT-03:00) Georgetown' => 'America/Argentina/Buenos_Aires',
		'(GMT-03:00) Greenland' => 'America/Godthab',
		'(GMT-02:00) Mid-Atlantic' => 'America/Noronha',
		'(GMT-01:00) Azores' => 'Atlantic/Azores',
		'(GMT-01:00) Cape Verde Is.' => 'Atlantic/Cape_Verde',
		'(GMT+00:00) Casablanca' => 'Africa/Casablanca',
		'(GMT+00:00) Edinburgh' => 'Europe/London',
		'(GMT+00:00) Greenwich Mean Time : Dublin' => 'Etc/Greenwich',
		'(GMT+00:00) Lisbon' => 'Europe/Lisbon',
		'(GMT+00:00) London' => 'Europe/London',
		'(GMT+00:00) Monrovia' => 'Africa/Monrovia',
		'(GMT+00:00) UTC' => 'UTC',
		'(GMT+01:00) Amsterdam' => 'Europe/Amsterdam',
		'(GMT+01:00) Belgrade' => 'Europe/Belgrade',
		'(GMT+01:00) Berlin' => 'Europe/Berlin',
		'(GMT+01:00) Bern' => 'Europe/Berlin',
		'(GMT+01:00) Bratislava' => 'Europe/Bratislava',
		'(GMT+01:00) Brussels' => 'Europe/Brussels',
		'(GMT+01:00) Budapest' => 'Europe/Budapest',
		'(GMT+01:00) Copenhagen' => 'Europe/Copenhagen',
		'(GMT+01:00) Ljubljana' => 'Europe/Ljubljana',
		'(GMT+01:00) Madrid' => 'Europe/Madrid',
		'(GMT+01:00) Paris' => 'Europe/Paris',
		'(GMT+01:00) Prague' => 'Europe/Prague',
		'(GMT+01:00) Rome' => 'Europe/Rome',
		'(GMT+01:00) Sarajevo' => 'Europe/Sarajevo',
		'(GMT+01:00) Skopje' => 'Europe/Skopje',
		'(GMT+01:00) Stockholm' => 'Europe/Stockholm',
		'(GMT+01:00) Vienna' => 'Europe/Vienna',
		'(GMT+01:00) Warsaw' => 'Europe/Warsaw',
		'(GMT+01:00) West Central Africa' => 'Africa/Lagos',
		'(GMT+01:00) Zagreb' => 'Europe/Zagreb',
		'(GMT+02:00) Athens' => 'Europe/Athens',
		'(GMT+02:00) Bucharest' => 'Europe/Bucharest',
		'(GMT+02:00) Cairo' => 'Africa/Cairo',
		'(GMT+02:00) Harare' => 'Africa/Harare',
		'(GMT+02:00) Helsinki' => 'Europe/Helsinki',
		'(GMT+02:00) Istanbul' => 'Europe/Istanbul',
		'(GMT+02:00) Jerusalem' => 'Asia/Jerusalem',
		'(GMT+02:00) Kyiv' => 'Europe/Helsinki',
		'(GMT+02:00) Pretoria' => 'Africa/Johannesburg',
		'(GMT+02:00) Riga' => 'Europe/Riga',
		'(GMT+02:00) Sofia' => 'Europe/Sofia',
		'(GMT+02:00) Tallinn' => 'Europe/Tallinn',
		'(GMT+02:00) Vilnius' => 'Europe/Vilnius',
		'(GMT+03:00) Baghdad' => 'Asia/Baghdad',
		'(GMT+03:00) Kuwait' => 'Asia/Kuwait',
		'(GMT+03:00) Minsk' => 'Europe/Minsk',
		'(GMT+03:00) Nairobi' => 'Africa/Nairobi',
		'(GMT+03:00) Riyadh' => 'Asia/Riyadh',
		'(GMT+03:00) Volgograd' => 'Europe/Volgograd',
		'(GMT+03:30) Tehran' => 'Asia/Tehran',
		'(GMT+04:00) Abu Dhabi' => 'Asia/Muscat',
		'(GMT+04:00) Baku' => 'Asia/Baku',
		'(GMT+04:00) Moscow' => 'Europe/Moscow',
		'(GMT+04:00) Muscat' => 'Asia/Muscat',
		'(GMT+04:00) St. Petersburg' => 'Europe/Moscow',
		'(GMT+04:00) Tbilisi' => 'Asia/Tbilisi',
		'(GMT+04:00) Yerevan' => 'Asia/Yerevan',
		'(GMT+04:30) Kabul' => 'Asia/Kabul',
		'(GMT+05:00) Islamabad' => 'Asia/Karachi',
		'(GMT+05:00) Karachi' => 'Asia/Karachi',
		'(GMT+05:00) Tashkent' => 'Asia/Tashkent',
		'(GMT+05:30) Chennai' => 'Asia/Calcutta',
		'(GMT+05:30) Kolkata' => 'Asia/Kolkata',
		'(GMT+05:30) Mumbai' => 'Asia/Calcutta',
		'(GMT+05:30) New Delhi' => 'Asia/Calcutta',
		'(GMT+05:30) Sri Jayawardenepura' => 'Asia/Calcutta',
		'(GMT+05:45) Kathmandu' => 'Asia/Katmandu',
		'(GMT+06:00) Almaty' => 'Asia/Almaty',
		'(GMT+06:00) Astana' => 'Asia/Dhaka',
		'(GMT+06:00) Dhaka' => 'Asia/Dhaka',
		'(GMT+06:00) Ekaterinburg' => 'Asia/Yekaterinburg',
		'(GMT+06:30) Rangoon' => 'Asia/Rangoon',
		'(GMT+07:00) Bangkok' => 'Asia/Bangkok',
		'(GMT+07:00) Hanoi' => 'Asia/Bangkok',
		'(GMT+07:00) Jakarta' => 'Asia/Jakarta',
		'(GMT+07:00) Novosibirsk' => 'Asia/Novosibirsk',
		'(GMT+08:00) Beijing' => 'Asia/Hong_Kong',
		'(GMT+08:00) Chongqing' => 'Asia/Chongqing',
		'(GMT+08:00) Hong Kong' => 'Asia/Hong_Kong',
		'(GMT+08:00) Krasnoyarsk' => 'Asia/Krasnoyarsk',
		'(GMT+08:00) Kuala Lumpur' => 'Asia/Kuala_Lumpur',
		'(GMT+08:00) Perth' => 'Australia/Perth',
		'(GMT+08:00) Singapore' => 'Asia/Singapore',
		'(GMT+08:00) Taipei' => 'Asia/Taipei',
		'(GMT+08:00) Ulaan Bataar' => 'Asia/Ulan_Bator',
		'(GMT+08:00) Urumqi' => 'Asia/Urumqi',
		'(GMT+09:00) Irkutsk' => 'Asia/Irkutsk',
		'(GMT+09:00) Osaka' => 'Asia/Tokyo',
		'(GMT+09:00) Sapporo' => 'Asia/Tokyo',
		'(GMT+09:00) Seoul' => 'Asia/Seoul',
		'(GMT+09:00) Tokyo' => 'Asia/Tokyo',
		'(GMT+09:30) Adelaide' => 'Australia/Adelaide',
		'(GMT+09:30) Darwin' => 'Australia/Darwin',
		'(GMT+10:00) Brisbane' => 'Australia/Brisbane',
		'(GMT+10:00) Canberra' => 'Australia/Canberra',
		'(GMT+10:00) Guam' => 'Pacific/Guam',
		'(GMT+10:00) Hobart' => 'Australia/Hobart',
		'(GMT+10:00) Melbourne' => 'Australia/Melbourne',
		'(GMT+10:00) Port Moresby' => 'Pacific/Port_Moresby',
		'(GMT+10:00) Sydney' => 'Australia/Sydney',
		'(GMT+10:00) Yakutsk' => 'Asia/Yakutsk',
		'(GMT+11:00) Vladivostok' => 'Asia/Vladivostok',
		'(GMT+12:00) Auckland' => 'Pacific/Auckland',
		'(GMT+12:00) Fiji' => 'Pacific/Fiji',
		'(GMT+12:00) International Date Line West' => 'Pacific/Kwajalein',
		'(GMT+12:00) Kamchatka' => 'Asia/Kamchatka',
		'(GMT+12:00) Magadan' => 'Asia/Magadan',
		'(GMT+12:00) Marshall Is.' => 'Pacific/Fiji',
		'(GMT+12:00) New Caledonia' => 'Asia/Magadan',
		'(GMT+12:00) Solomon Is.' => 'Asia/Magadan',
		'(GMT+12:00) Wellington' => 'Pacific/Auckland',
		'(GMT+13:00) Nuku\'alofa' => 'Pacific/Tongatapu'
	);
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
				
				<select id="time_zone" name="time_zone">
					<option value="">Select time zone *</option>
					<?php foreach($timezones as $key => $value) 
					{
						?>
						<option value="<?php echo $key.' - '.$value; ?>"><?php echo $key.' - '.$value; ?></option>
						<?php
					}	
					?>
				</select>
				<span class="invalidInput" id="time_zoneError"></span>
				
				<button type="submit" id="btnsubmit" value="submit">Register Now</button>

				<p class="options">Already a member ? <a href="<?php echo APP_URL; ?>/users/login">Sign In</a>  | <a href="<?php echo APP_URL; ?>/pages/index">Home</a></p>

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


		$('#myForm').on('submit', function(e)
		{
			e.preventDefault();
			
			if($('#name').val() == '')
			{
				$('#name').focus();
				$('#nameError').html('Please enter you full name');
				return false;
			}
			else if($('#password').val() == '')
			{
				$('#password').focus();
				$('#passwordError').html('Please enter the password');
				return false;
			}
			else if($('#confirmPassword').val() == '')
			{
				$('#confirmPassword').focus();
				$('#confirmPasswordError').html('Please enter confirm password');
				return false;
			}
			else if($('#password').val() != $('#password').val())
			{
				$('#confirmPassword').focus();
				$('#confirmPasswordError').html('Confirm Password does not match');
				return false;
			}
			else if($('#email').val() == '')
			{
				$('#email').focus();
				$('#emailError').html('Please enter email');
				return false;
			}
			else if($('#phone').val() == '')
			{
				$('#phone').focus();
				$('#phoneError').html('Please enter phone');
				return false;
			}
			else if($('#address').val() == '')
			{
				$('#address').focus();
				$('#usernameError').html('Please enter address');
				return false;
			}
			else if($('#city').val() == '')
			{
				$('#city').focus();
				$('#cityError').html('Please enter city');
				return false;
			}
			else if($('#state').val() == '')
			{
				$('#state').focus();
				$('#stateError').html('Please enter state');
				return false;
			}
			else if($('#country').val() == '')
			{
				$('#country').focus();
				$('#countryError').html('Please enter country');
				return false;
			}
			else if($('#zip').val() == '')
			{
				$('#zip').focus();
				$('#zipError').html('Please enter Zip Code');
				return false;
			}
			else if($('#time_zone').val() == '')
			{
				$('#time_zone').focus();
				$('#time_zoneError').html('Please select time zone');
				return false;
			}
			else
			{
				if( confirm('Are you sure to submit the form ?') )
				{
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
								setTimeout(' window.location.href = "<?php echo APP_URL; ?>/users/login"; ',500);
								alert(data['response']);
							}
							
						}
					});
				}
				else
				{
					alert('You pressed cancel');
				}
			}
		});

	});

</script>