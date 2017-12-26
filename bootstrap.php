<?php

function autoloader($class)
{
	$folders = ['/src/'];
	foreach ($folders as $f) {
		$path = __DIR__ . $f . $class . '.php';
		if (is_file($path)) {
			/** @noinspection PhpIncludeInspection */
			require_once $path;

			return;
		}
	}
}

spl_autoload_register('autoloader');

function ifsetor(&$variable, $default = NULL)
{
	if (isset($variable)) {
		$tmp = $variable;
	} else {
		$tmp = $default;
	}

	return $tmp;
}

function debug(...$vars)
{
	echo '<pre>';
	var_dump(sizeof($vars) == 1 ? $vars[0] : $vars);
	echo '</pre>';
}

function http_redirect($url)
{
	header('Location: /'.$url);
	die;
}
