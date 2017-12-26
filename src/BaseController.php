<?php
/**
 * Created by PhpStorm.
 * User: Slawa
 * Date: 2017-12-18
 * Time: 04:00
 */

class BaseController {

	use HTMLHelpers;

	static function href(array $params = [])
	{
		$url = static::class;
		if ($params) {
			$url .= '?' . http_build_query($params);
		}
		return $url;
	}

	/**
	 * Parses a path like /{$controller}/{$action}
	 * and returns an $action part.
	 */
	function getAction() {
		$path = explode('/', trim($_SERVER['PATH_INFO'], '/'));
		$action = ifsetor($path[1]);
		return $action;
	}

	/**
	 * @throws Exception
	 */
	function render() {
		$action = $this->getAction();
		$method = $action.'Action';
		if (method_exists($this, $method)) {
			$content = $this->$method();
		} else {
			$content = $this->index();
		}
		return $content;
	}

	/**
	 * @throws Exception
	 * @return string
	 */
	function index() {
		throw new Exception('Override the index action in '.get_class($this));
	}

}
