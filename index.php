<?php

require_once __DIR__.'/bootstrap.php';

$heading = 'hello world';
$form = new Template(__DIR__.'/template/form.phtml');
$content = $form->render(['heading' => $heading]);

$layout = new Template(__DIR__.'/template/layout.phtml');
echo $layout->render(['content' => $content]);

