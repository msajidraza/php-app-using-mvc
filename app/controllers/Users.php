<?php

	
	class Users extends Controller
	{
		
		public function __construct()
		{
			$this->userModel = $this->model('User'); 
		}

        public function validateInputs()
        {           
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
                //'profile_pic' => trim($_POST['profile_pic']),

                'status' => 'success',
                'response' => '',
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
                //'profile_picError' => ''
            ];  

            $nameValidation = "/^[a-zA-Z ]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
            $phoneValidation = "/^[0-9]*$/";
            $addressValidation = "/^[a-zA-Z0-9 ]*$/";

            // Validate name on letters
            if (empty($data['name'])) 
            {
                $data['nameError'] = 'Please enter your name.';
                $data['status'] = 'error';
            } 
            elseif (!preg_match($nameValidation, $data['name'])) 
            {
                $data['nameError'] = 'Name can only contain letters.';
                $data['status'] = 'error';
            }

            // Validate email
            if (empty($data['email'])) 
            {
                $data['emailError'] = 'Please enter email address.';
                $data['status'] = 'error';
            } 
            elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) 
            {
                $data['emailError'] = 'Please enter the correct format.';
                $data['status'] = 'error';
            } 
            else 
            {
                // Check if email exists.
                if ($this->userModel->findUserByEmail($data['email'])) 
                {
                    $data['emailError'] = 'This Email is already taken.';
                    $data['status'] = 'error';
                }
            }

            // Validate password on length, numeric values,
            if(empty($data['password']))
            {
                $data['passwordError'] = 'Please enter password.';
                $data['status'] = 'error';
            } 
            elseif(strlen($data['password']) < 8)
            {
                $data['passwordError'] = 'Password must be at least 8 characters';
                $data['status'] = 'error';
            } 
            elseif (preg_match($passwordValidation, $data['password'])) 
            {
                $data['passwordError'] = 'Password must be alpa numeric value.';
                $data['status'] = 'error';
            }

            // Validate confirm password
            if (empty($data['confirmPassword'])) 
            {
                $data['confirmPasswordError'] = 'Please enter confirm password.';
                $data['status'] = 'error';
            } 
            else 
            {
                if ($data['password'] != $data['confirmPassword']) 
                {
                    $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                    $data['status'] = 'error';
                }
            }

            
            
            if (empty($data['phone'])) 
            {
                $data['phoneError'] = 'Please enter your phone number.';
                $data['status'] = 'error';
            } 
            elseif (!preg_match($phoneValidation, $data['phone'])) 
            {
                $data['phoneError'] = 'Phone can only contain mumbers.';
                $data['status'] = 'error';
            }


            
            if (empty($data['address'])) 
            {
                $data['addressError'] = 'Please enter your address.';
                $data['status'] = 'error';
            } 
            elseif (!preg_match($addressValidation, $data['address'])) 
            {
                $data['addressError'] = 'Address can only contain letters and numbers.';
                $data['status'] = 'error';
            }

            
            if (empty($data['city'])) 
            {
                $data['cityError'] = 'Please enter your city.';
                $data['status'] = 'error';
            } 
            elseif (!preg_match($nameValidation, $data['city'])) 
            {
                $data['cityError'] = 'city can only contain letters.';
                $data['status'] = 'error';
            }

            
            if (empty($data['state'])) 
            {
                $data['stateError'] = 'Please enter your state.';
                $data['status'] = 'error';
            } 
            elseif (!preg_match($nameValidation, $data['state'])) 
            {
                $data['stateError'] = 'State can only contain letters.';
                $data['status'] = 'error';
            }
         
            if (empty($data['country'])) 
            {
                $data['countryError'] = 'Please enter your country.';
                $data['status'] = 'error';
            } 
            elseif (!preg_match($nameValidation, $data['country'])) 
            {
                $data['countryError'] = 'Country can only contain letters.';
                $data['status'] = 'error';
            }

            if (empty($data['zip'])) 
            {
                $data['zipError'] = 'Please enter your zip code.';
                $data['status'] = 'error';
            } 
            elseif (!preg_match($phoneValidation, $data['zip'])) 
            {
                $data['zipError'] = 'Zip Code can only contain numbers.';
                $data['status'] = 'error';
            }
            
            //print_r($data); die();

            // Make sure that errors are empty
            if ($data['status'] == 'error') 
            {
                $data['response'] = 'validation failed';
                echo json_encode($data);
            }
            elseif ($data['status'] == 'success') 
            {                                       
                // Hash password
                //$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register user from model function
                if ($this->userModel->register($data)) 
                {
                    $data['response'] = 'Registration done successfully';

                    echo json_encode($data);
                    //Redirect to the login page
                    //header('location: ' . APP_URL . '/users/login');
                } 
                else 
                {
                    //die('Something went wrong.');
                    $data['response'] = 'Something went wrong.';
                    echo json_encode($data);
                }
            } 
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
				//'profile_pic' => '',

				'error' => false,
	            'success' => '',
	            'response' => '',
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
				//'profile_picError' => '',
			];
			
			$this->view('users/register', $data);
		}

		public function login()
		{
			$data = [
				'title' => 'Sign In Page',
                'username' => '',
                'password' => '',
				'usernameError' => '',
				'passwordError' => ''
			];

			$this->view('users/login', $data);
		}

        public function validateLoginForm()
        {       
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),

                'status' => 'success',
                'response' => '',
                'usernameError' => '',
                'passwordError' => ''
            ]; 

            // Check username is empty
            if (empty($data['username'])) 
            {
                $data['usernameError'] = 'Please enter username (i.e. Email).';
                $data['status'] = 'error';
            } 
            // Check username is empty
            if (empty($data['password'])) 
            {
                $data['usernameError'] = 'Please enter password.';
                $data['status'] = 'error';
            }  

            // Make sure that errors are empty
            if ($data['status'] == 'error') 
            {
                $data['response'] = 'validation failed';
                echo json_encode($data);
            }
            elseif ($data['status'] == 'success') 
            {  
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                if($loggedInUser)
                {
                    $data['response'] = 'LoggedIn';
                    $this->createUserSession($loggedInUser);
                    echo json_encode($data);
                }
                else 
                {
                    $data['response'] = 'Sorry! username or password is incorrect.';
                    echo json_encode($data);
                }
            } 

        }

        public function profile()
        {
            $data = [];
            $this->view('users/profile', $data);
        }

		public function createUserSession($user) 
		{
	        $_SESSION['user_id'] = $user->id;
	        $_SESSION['name'] = $user->name;
	        $_SESSION['email'] = $user->email;
            $_SESSION['phone'] = $user->phone;
            $_SESSION['address'] = $user->address;
            $_SESSION['city'] = $user->city;
            $_SESSION['state'] = $user->state;
            $_SESSION['country'] = $user->country;
            $_SESSION['zip'] = $user->zip;
            $_SESSION['time_zone'] = $user->time_zone;
            $_SESSION['profile_pic'] = $user->profile_pic;

	        //header('location:' . APP_URL . '/users/profile');
	    }

	    public function logout() 
	    {
	        unset($_SESSION['user_id']);
	        unset($_SESSION['name']);
	        unset($_SESSION['email']);
            unset($_SESSION['phone']);
            unset($_SESSION['address']);
            unset($_SESSION['city']);
            unset($_SESSION['state']);
            unset($_SESSION['country']);
            unset($_SESSION['zip']);
            unset($_SESSION['time_zone']);
            unset($_SESSION['profile_pic']);

	        header('location:' . APP_URL . '/pages/index');
	    }
	}