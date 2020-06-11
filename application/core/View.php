<?php

namespace application\core;

class View {

	public $path;
	public $route;
	public $layout = 'wing';
	public $vars = [];

	public function __construct($route) { 

		$this->route = $route;
		$this->path = $route['controller'].'/'.$route['action'];  

	}

	public function render($title = "", $vars = []) {

		// extract($vars);
		if(!empty($vars)) $this->vars = $vars;    
		
		if(file_exists('application/views/'.$this->path.'.php')) {

			ob_start();

			require 'application/views/'.$this->path.'.php';    
		
			$content = ob_get_clean();

			require 'application/views/layouts/' .$this->layout.'.php';

		} else 
			echo '<p style="color:red;"><b>View '.$this->path.' Not Found!</b></p>';			

	}

	public function redirect($url) {

		header('location: '.$url);
		exit;		

	}

	public static function errCode($code) {

		http_response_code($code);
		$path = 'application/views/errors/'.$code.'.php';
		if(file_exists($path))
			require $path;
			 
		exit;

	}
}