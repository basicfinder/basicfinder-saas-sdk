<?php

/*****************************************************
 * 测试: 配置项目：设置批次
 *
 * 使用方法:
 * php assignData.php
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

$paths = json_encode(['bDAwLnppcA_c_c']);
$params = [
    "project_id" => 16630,
    "assign_type" => 1,
    "paths" => $paths
];
$assignDataResult = $saasapi->project->assignData($params);
var_dump($assignDataResult);


