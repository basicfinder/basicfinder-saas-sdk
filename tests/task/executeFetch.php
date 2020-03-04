<?php

/*****************************************************
 * 测试:领取任务
 *
 * 使用方法:
 * php executeFetch.php
 * ***************************************************
 */


defined('BASICFINDER_ENV') or define('BASICFINDER_ENV', 'dev');

include __DIR__.'/../../autoload.php';

use BasicfinderSaas\SaasApi;

$saasapi = new SaasApi();

$account = [
    'username' => 'your email',
    'password' => 'your password',
    'app_key' => 'pc-team',
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
    "project_id" => 16630,
    "task_id" => 21001,
    "data_sort" => 0,
    "op" => "fetch"
];
$executeResult = $saasapi->task->executeFetch($params);
var_dump($executeResult);


