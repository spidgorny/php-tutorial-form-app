<?php
/**
 * Created by PhpStorm.
 * User: Slawa
 * Date: 2017-12-18
 * Time: 04:00
 */

class BaseController {

	function e($string)
	{
		return htmlspecialchars($string, ENT_QUOTES);
	}

	static function href(array $params = [])
	{
		$url = static::class;
		if ($params) {
			$url .= '?' . http_build_query($params);
		}
		return $url;
	}

}