<?php

/*****************************************************
 * 测试:设置人员
 *
 * 使用方法:
 * php assignUser.php
 * ***************************************************
 */


defined('BASICFINDER_ENV') or define('BASICFINDER_ENV', 'dev');

include __DIR__.'/../../autoload.php';

use BasicfinderSaas\SaasApi;

$saasapi = new SaasApi();

$account = [
    'username' => 'your email',
    'password' => 'your password',
    'app_key' => 'pc-passport',
    'app_version' => '1.0.0',
    'device_name' => 'Win32',
    'device_number' => '123456'
];
$result = $saasapi->site->login($account);

if (!empty($result['error']))
{
    var_dump($result);
    exit();
}

var_dump($result['data']);
$params = [
    "task_id" => 21001,
    "op" => "add",
    "user_id" => 38033
];
$assignUserResult = $saasapi->task->assignUser($params);
var_dump($assignUserResult);


