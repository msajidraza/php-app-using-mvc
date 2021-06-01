<?php

	
	class Users extends Controller
	{
		
		public function __construct()
		{
			$this->userModel = $this->model('User'); 
		}

		public function register()
		{
			$data = [
				//'title' => 'Registration Page',
				'name' => '',
				'email' => '',
				'password' => '',
				'confirmPassword' => '',
				'phone' => '',
				'address' => '',
				'city' => '',
				'state' => '',
				'country' => '',
				'zip' => '',
				'time_zone' => '',
				'profile_pic' => '',

				'nameError' => '',
				'emailError' => '',
				'passwordError' => '',
				'confirmPasswordError' => '',
				'phoneError' => '',
				'addressError' => '',
				'cityError' => '',
				'stateError' => '',
				'countryError' => '',
				'zipError' => '',
				'time_zoneError' => '',
				'profile_picError' => '',
			];

			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
		        // Process form
		        // Sanitize POST data
		        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		              $data = [
		                'name' => trim($_POST['name']),
		                'email' => trim($_POST['email']),
		                'password' => trim($_POST['password']),
		                'confirmPassword' => trim($_POST['confirmPassword']),
		                'phone' => trim($_POST['phone']),
		                'address' => trim($_POST['address']),
		                'city' => trim($_POST['city']),
		                'state' => trim($_POST['state']),
		                'country' => trim($_POST['country']),
		                'zip' => trim($_POST['zip']),
		                'time_zone' => trim($_POST['time_zone']),
		                'profile_pic' => trim($_POST['profile_pic']),

		                'nameError' => '',
		                'emailError' => '',
		                'passwordError' => '',
		                'confirmPasswordError' => '',
		                'phoneError' => '',
		                'addressError' => '',
		                'cityError' => '',
		                'stateError' => '',
		                'countryError' => '',
		                'zipError' => '',
		                'time_zoneError' => '',
		                'profile_picError' => ''
		            ];

		            $nameValidation = "/^[a-zA-Z ]*$/";
		            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
		            $phoneValidation = "/^[0-9]*$/";
		            $addressValidation = "/^[a-zA-Z0-9 ]*$/";

		            // Validate name on letters
		            if (empty($data['name'])) 
		            {
		                $data['nameError'] = 'Please enter your name.';
		            } 
		            elseif (!preg_match($nameValidation, $data['name'])) 
		            {
		                $data['nameError'] = 'Name can only contain letters.';
		            }

		            // Validate email
		            if (empty($data['email'])) 
		            {
		                $data['emailError'] = 'Please enter email address.';
		            } 
		            elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) 
		            {
		                $data['emailError'] = 'Please enter the correct format.';
		            } 
		            else 
		            {
		                // Check if email exists.
		                if ($this->userModel->findUserByEmail($data['email'])) 
		                {
		                	$data['emailError'] = 'This Email is already taken.';
		                }
		            }

		            // Validate password on length, numeric values,
		            if(empty($data['password']))
		            {
		              $data['passwordError'] = 'Please enter password.';
		            } 
		            elseif(strlen($data['password']) < 8)
		            {
		              $data['passwordError'] = 'Password must be at least 8 characters';
		            } 
		            elseif (preg_match($passwordValidation, $data['password'])) 
		            {
		              $data['passwordError'] = 'Password must be have at least one numeric value.';
		            }

		            // Validate confirm password
		            if (empty($data['confirmPassword'])) 
		            {
		                $data['confirmPasswordError'] = 'Please enter confirm password.';
		            } 
		            else 
		            {
		                if ($data['password'] != $data['confirmPassword']) 
		                {
		                	$data['confirmPasswordError'] = 'Passwords do not match, please try again.';
		                }
		            }

		            
		            
		            if (empty($data['phone'])) 
		            {
		                $data['phoneError'] = 'Please enter your phone number.';
		            } 
		            elseif (!preg_match($phoneValidation, $data['phone'])) 
		            {
		                $data['phoneError'] = 'Phone can only contain mumbers.';
		            }


		            
		            if (empty($data['address'])) 
		            {
		                $data['addressError'] = 'Please enter your address.';
		            } 
		            elseif (!preg_match($addressValidation, $data['address'])) 
		            {
		                $data['addressError'] = 'Address can only contain letters and numbers.';
		            }

		            
		            if (empty($data['city'])) 
		            {
		                $data['cityError'] = 'Please enter your city.';
		            } 
		            elseif (!preg_match($nameValidation, $data['city'])) 
		            {
		                $data['cityError'] = 'city can only contain letters.';
		            }

		            
		            if (empty($data['state'])) 
		            {
		                $data['stateError'] = 'Please enter your state.';
		            } 
		            elseif (!preg_match($nameValidation, $data['state'])) 
		            {
		                $data['stateError'] = 'State can only contain letters.';
		            }

		            
		            if (empty($data['country'])) 
		            {
		                $data['countryError'] = 'Please enter your country.';
		            } 
		            elseif (!preg_match($nameValidation, $data['country'])) 
		            {
		                $data['countryError'] = 'Country can only contain letters.';
		            }

		            if (empty($data['zip'])) 
		            {
		                $data['zipError'] = 'Please enter your zip code.';
		            } 
		            elseif (!preg_match($phoneValidation, $data['zip'])) 
		            {
		                $data['zipError'] = 'Zip Code can only contain numbers.';
		            }
		            

		            // Make sure that errors are empty
		            if( empty($data['nameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError']) && empty($data['phoneError']) && empty($data['addressError']) && empty($data['cityError']) && empty($data['stateError']) && empty($data['countryError']) && empty($data['zipError']) ) {

		                // Hash password
		                //$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

		                // Register user from model function
		                if ($this->userModel->register($data)) 
		                {
		                    //Redirect to the login page
		                    header('location: ' . APP_URL . '/users/login');
		                } 
		                else 
		                {
		                    die('Something went wrong.');
		                }
		            }
		        }


			$this->view('users/register', $data);
		}

		public function login()
		{
			$data = [
				'title' => 'Sign In Page',
				'usernameError' => '',
				'passwordError' => ''

			];

			$this->view('users/login', $data);
		}


		public function createUserSession($user) 
		{
	        $_SESSION['user_id'] = $user->id;
	        $_SESSION['username'] = $user->username;
	        $_SESSION['email'] = $user->email;
	        header('location:' . APP_URL . '/pages/index');
	    }

	    public function logout() 
	    {
	        unset($_SESSION['user_id']);
	        unset($_SESSION['username']);
	        unset($_SESSION['email']);
	        header('location:' . APP_URL . '/users/login');
	    }
	}