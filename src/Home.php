<?php

class Home {

	function render(array $placeholders = [])
	{
		$heading = 'hello world';
		$form = new Template(__DIR__.'/../template/form.phtml');
		$placeholders += ['heading' => $heading];
		$content = $form->render($placeholders);

		$layout = new Template(__DIR__.'/../template/layout.phtml');
		return $layout->render(['content' => $content]);
	}

}
