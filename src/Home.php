<?php

class Home {

	function render()
	{
		$heading = 'hello world';
		$form = new Template(__DIR__.'/../template/form.phtml');
		$content = $form->render(['heading' => $heading]);

		$layout = new Template(__DIR__.'/../template/layout.phtml');
		return $layout->render(['content' => $content]);
	}

}
