<?php

class Router {

	protected $default;

	protected $container = [];

	function __construct($default, array $container = [])
	{
		$this->default = $default;
		$this->container = $container;
	}

	public function getController()
	{
		//debug($_SERVER['PATH_INFO']);
		$controller = trim(ifsetor($_SERVER['PATH_INFO']), '/') ?: $this->default;
		if (class_exists($controller)) {
			$instance = $this->makeInstanceWithInjection($controller);
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

	public function makeInstanceWithInjection($class)
	{
		$init = []; // parameter values to the constructor
		$cr = new ReflectionClass($class);
		$constructor = $cr->getConstructor();
		if ($constructor) {
			$params = $constructor->getParameters();
			foreach ($params as $param) {
				$type = $param->getType();
				if ($type->isBuiltin()) {
					$init[] = $param->getDefaultValue();
				} else {
					$typeClass = method_exists($type, 'getName')
						? $type->getName()
						: $type->__toString();
					//					debug($typeClass);
					$init[] = $this->container[ $typeClass ];
				}
			}
		}
		$instance = new $class(...$init);
		return $instance;
	}

}
