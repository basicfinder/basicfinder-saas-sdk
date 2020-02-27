<?php

/*****************************************************
 * 测试:获取资源
 *
 * 使用方法:
 * php resource.php
 * ***************************************************
 */


defined('BASICFINDER_ENV') or define('BASICFINDER_ENV', 'dev');

include __DIR__.'/../../autoload.php';

use BasicfinderSaas\SaasApi;

$saasapi = new SaasApi();

$account = [
    'username' => '1234566@qq.com',
    'password' => 'bf123456',
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
    "project_id" => 16630,
    "data_id" => 102291,
    "type" => 'ori',
];
$resourceResult = $saasapi->task->resource($params);
var_dump($resourceResult);


