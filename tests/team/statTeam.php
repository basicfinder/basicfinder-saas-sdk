<?php

/*****************************************************
 * 测试:获取团队绩效
 *
 * 使用方法:
 * php statTeam.php
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
    "page" => 1,
    "limit" => 10
];
$statResult = $saasapi->team->statTeam($params);
var_dump($statResult);


