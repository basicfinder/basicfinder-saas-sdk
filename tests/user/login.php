<?php

require(__DIR__ . '/../../src/BasicfinderSaas.php');
use BasicfinderSaas\BasicfinderSaas;


$saas = new BasicfinderSaas();

$saas->auth('liujianping@basicfinder.com', 'bf123456');
var_dump($saas->user->detail());


