<?php

class App {

	private $controller = 'home';
	private $method ="index";
	private $parameters = array();

	public function __construct(){

		$url = $this->parseUrl();
		
		// #Checking if the controller exists 
		if (file_exists('../app/controller/'.$url[0].'.php')){

			$this->controller = $url[0];
			unset($url[0]);
		}
		include_once '../app/controller/'.$this->controller.'.php';
		$this->constroller = new $this->controller;

			// #Checking if a method exists 
		if (!empty($url[1])){

			if (method_exists($this->controller, $url[1])){

				$this->method = $url[1];
				unset($url[1]);

			}else{
					// Show error, the page was not found.
				call_user_func_array(array($this->controller, 'notFound'), array());
			}
			
		}

		if(!empty($url))
			$this->parameters = array_values($url);

		// #Call to the corresponding controller and/or functions.
		call_user_func_array(array($this->controller, $this->method), $this->parameters);
		
	}

	public function parseUrl(){
		
		if(isset($_GET['url']))
			return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));

	}

}