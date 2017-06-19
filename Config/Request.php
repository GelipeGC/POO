<?php namespace Config;

	/**
	* 
	*/
	class Request 
	{
		private $controller;
		private $method;
		private $argument;
		
		function __construct()
		{
			if (isset($_GET['url'])) {
				$ruta = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
				$ruta = explode("/", $ruta);
				$ruta = array_filter($ruta);
				if ($ruta[0] == "index.php") {
					$this->controller = "estudiantes";
				}else{
					$this->controller = strtolower(array_shift($ruta));

				}
				$this->method = strtolower(array_shift($ruta));
				if (!$this->method) {
					$this->method = "index";
					
				}
				$this->argument = $ruta;
			}
		}

		public function getController()
		{
			return $this->controller;
		}

		public function getMethod()
		{
			return $this->method;
		}

		public function getArgument()
		{
			return $this->argument;
		}
	}

?>