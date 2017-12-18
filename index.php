<?php

require_once __DIR__.'/bootstrap.php';

$router = new Router(Home::class);
echo $router->dispatch();
