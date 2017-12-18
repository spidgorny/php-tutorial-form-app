<?php

class Template {

	protected $filename;

	function __construct($filename)
	{
		$this->filename = $filename;
	}

	function render(array $variables = [])
	{
		ob_start();
		extract($variables);
		/** @noinspection PhpIncludeInspection */
		require $this->filename;
		return ob_get_clean();
	}

}
