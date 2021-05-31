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
				'title' => 'Home Page',
				'msg'   => 'Hi Sajid'
			];

			$this->view('index', $data);
		}
	}