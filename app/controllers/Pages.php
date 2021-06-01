<?php

	/**
	 * 
	 */
	class Pages extends Controller
	{
		
		public function __construct()
		{
			//$this->userModel = $this->model('User'); 
		}

		public function index()
		{
			$data = [
				'title' => 'Home Page'
			];

			$this->view('index', $data);
		}
	}