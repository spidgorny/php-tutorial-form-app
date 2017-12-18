<?php

function autoloader($class)
{
	$folders = ['/src/'];
	foreach ($folders as $f) {
		$path = __DIR__.$f.$class.'.php';
		if (is_file($path)) {
			/** @noinspection PhpIncludeInspection */
			require_once $path;
			return;
		}
	}
}

spl_autoload_register('autoloader');
