<?php

require_once __DIR__.'/bootstrap.php';

$router = new Router(Home::class, [
	StorageInterface::class => new FileStorage(__DIR__.'/db/people.json'),
]);
echo $router->dispatch();
