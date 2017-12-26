<?php

class Home extends BaseController {

	function index()
	{
		$content = '<a href="'.$this->e(ListData::href()).'">List People</a>';
		return $content;
	}

	function sayHiAction() {
		return 'hi';
	}

}
