<?php

class Home {

	public $error;

	function render()
	{
		$heading = 'hello world';
		$form = new Template(__DIR__.'/../template/form.phtml');
		$content = $form->render(['heading' => $heading, 'error' => $this->error]);

		$layout = new Template(__DIR__.'/../template/layout.phtml');
		return $layout->render(['content' => $content]);
	}

}
