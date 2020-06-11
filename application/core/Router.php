<?php

namespace application\core;

use application\core\View;

class Router {

	private $_routes    = [];
	private $_params    = [];
	private $_getParams = [];

	function __construct() {
		$arr = require 'application/config/routes.php';
		foreach($arr as $k => $v)
			$this->add($k, $v);
	}
	
	// exit(var_dump ($this->_routes) );

	public function add($route, $params) {

		$regExpRoute = '!^'.$route.'$!';	
		$this->_routes[$regExpRoute] = $params;

	}

	public function match() {  

		$url = 'http' . (($_SERVER['SERVER_PORT'] == 443) ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$urlparts = parse_url($url);                
		// $urlparts['path'] = preg_replace('!\/'.BASE_URL.'\/!iu', '', $urlparts['path']);
						 
		if(isset($urlparts['query']))
			parse_str($urlparts['query'], $this->_getParams);  
		
		foreach($this->_routes as $route => $params)
			if(preg_match($route, $urlparts['path'], $matches)) {    
				$this->_params = $params;  
				
				// echo $route.' == '.$urlparts['path']."<br>";	
				
			return true;					
			}  
			// else echo $route.' !!= '.$urlparts['path']."<br>";
			
		return false;
	}
	
	public function run() {     
		
		if($this->match()) {      
			$controllerPath = "application\\controllers\\".ucfirst($this->_params['controller']).'Controller';
			// $controllerPath = "application\controllers\\".$this->mb_ucfirst($this->_params['controller']).'Controller';  
			
			// exit( var_dump( $controllerPath ) );
			
			if(class_exists($controllerPath, TRUE)) {        
				$action = $this->_params['action'].'Action';
				if(method_exists($controllerPath, $action)) {
					$controller = new $controllerPath($this->_params);
					$controller->$action();
				}	
				else
					View::errCode(404);						
			}
			else
				View::errCode(404);			
		}	
		else
			View::errCode(404);

	}
	
	public function mb_ucfirst($text) {
		return mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);
	}	
	
}