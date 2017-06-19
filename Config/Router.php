<?php namespace Config;

	/**
	* 
	*/
	class Router
	{ 
		
		public static function run(Request $request)
		{
			$controller = $request->getController() . "Controller";
			print $controller;
			$ruta = ROOT . "Controllers" . DS . $controller. ".php";
			print $ruta;
			$method = $request->getMethod();
			$argument = $request->getArgument();
			if ($method == "index.php") {
				$method = "index";
			}
			if (is_readable($ruta)) {
				require_once $ruta;
				$mostrar = "Controllers\\" . $controller;
				$controller = new $mostrar;
				if (!isset($argument)) {
					call_user_func(array($controller, $method));
				}else{
					call_user_func(array($controller, $method), $argument);
				}
			}
		}
	}
?>