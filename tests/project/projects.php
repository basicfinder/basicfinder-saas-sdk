<?php

/**
 * 
 * php projects.php
 * 
 */


defined('BASICFINDER_ENV') or define('BASICFINDER_ENV', 'dev');

include __DIR__.'/../../autoload.php';

use BasicfinderSaas\BasicfinderSaas;


$saasapi = new BasicfinderSaas();

$params = [
    'username' => '1234566@qq.com',
    'password' => 'bf123456',
    'app_key' => 'pc-passport',
    'app_version' => '1.0.0',
    'device_name' => 'Win32',
    'device_number' => '111'
];
$result = $saasapi->user->login($params);

if (!empty($result['error']))
{
    var_dump($result);
    exit();
}
var_dump($result['data']);

$userInfo = $saasapi->user->detail();
var_dump($userInfo);

$params = [
    'page' => 1,
    'count' => 10
];
$list = $saasapi->project->projects($params);
var_dump($list);

