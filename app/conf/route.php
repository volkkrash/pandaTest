<?php

class Route {

	static function start() {
		$controllerName = 'Todo';
		$actionName = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		if (!empty($routes[1])) {	
			$controllerName = (substr($routes[1], 0, 1 ) === "?") ? $controllerName : $routes[1];
		}

		if (!empty($routes[2])) {
			$actionName = $routes[2];
		}
		$modelName = ucfirst($controllerName.'Model');
		$controllerName = ucfirst($controllerName.'Controller');
		$modelPath = "app/models/".$modelName.".php";
		if(file_exists($modelPath)) {
			include $modelPath;
		}

		$controllerPath = "app/controllers/".$controllerName.".php";
		if(file_exists($controllerPath)) {
			include $controllerPath;
			$controller = new $controllerName;
			
			if(method_exists($controller, $actionName)){
				$controller->$actionName();
			}
			else{
				Route::ErrorPage404();
			}
		} else {
			Route::ErrorPage404();
		}
		
		
	}

	function ErrorPage404() {
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
		header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
	}
}