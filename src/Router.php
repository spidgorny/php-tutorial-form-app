<?php

class Router {

	protected $default;

	function __construct($default)
	{
		$this->default = $default;
	}

	public function getController()
	{
		//debug($_SERVER['PATH_INFO']);
		$controller = trim(ifsetor($_SERVER['PATH_INFO']), '/') ?: $this->default;
		if (class_exists($controller)) {
			$instance = new $controller();
			return $instance;
		}
		return null;
	}

	public function dispatch()
	{
		$controller = $this->getController();
		if ($controller) {
			$content = $controller->render();
		} else {
			http_response_code(404);
			$content = '<h1>404 Not Found';
		}
		return $content;
	}

}
