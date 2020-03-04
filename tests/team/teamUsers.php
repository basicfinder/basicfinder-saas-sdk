<?php

/*****************************************************
 * 测试:获取团队成员列表
 *
 * 使用方法:
 * php teamUsers.php
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
    "team_id" => 1435,
    "limit"=>10,
    "page"=> 1
];
$usersResult = $saasapi->team->users($params);
var_dump($usersResult);


