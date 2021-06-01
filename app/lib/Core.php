<?php

	/**
	 * 
	 */
	class Core
	{
		protected $currentController = 'Pages';
		protected $currentMethod = 'index';
		protected $params = [];

		public function __construct()
		{

			$url = $this->getUrl();

			if(file_exists('../app/Controllers/' . ucwords($url[0]) . '.php'))
			{
				$this->currentController = ucwords($url[0]);
				unset($url[0]);
			}
			
			// Require Controller
			require_once '../app/Controllers/' . $this->currentController . '.php';

			// Instantiate the Controller
			$this->currentController = new $this->currentController;

			// Second part of the url
			if(isset($url[1]))
			{
				if ( method_exists($this->currentController, $url[1]) ) 
				{
					$this->currentMethod = $url[1];
					unset($url[1]);
				}
			}

			// Get params
			$this->params = $url ? array_values($url) : [];

			call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
		}



		public function getUrl()
		{
	    	if(isset($_GET['url']))
	    	{
		        $url = rtrim($_GET['url'], '/');
		        $url = filter_var($url, FILTER_SANITIZE_URL);
		        $url = explode('/', $url);
		        return $url;
	        }
	    }
	}