<?php

	
	class Users extends Controller
	{
		
		public function __construct()
		{
			//$this->userModel = $this->model('User'); 
		}

		public function login()
		{
			$data = [
				'title' => 'Home Page',
				'usernameError' => '',
				'passwordError' => ''

			];

			$this->view('users/login', $data);
		}
	}