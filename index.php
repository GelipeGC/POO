<?php

	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . DS);

	require_once("Config/Autoload.php");
	Config\Autoload::run();
	Config\Router::run(new Config\Request());



?>