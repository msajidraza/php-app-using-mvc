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
				'title' => 'Registration Page',
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
	}