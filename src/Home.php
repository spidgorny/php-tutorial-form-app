<?php

class Home {

	function render(array $placeholders = [])
	{
		$heading = 'hello world';
		$form = new Template(__DIR__.'/../template/form.phtml');
		$placeholders += ['heading' => $heading];
		$content = $form->render($placeholders);
		return $content;
	}

}
