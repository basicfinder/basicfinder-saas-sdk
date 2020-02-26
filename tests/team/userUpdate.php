<?php

/*****************************************************
 * 测试:修改团队成员信息
 *
 * 使用方法:
 * php userUpdate.php
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
    "user_id" => 38096,
    "team_id" => 1435,
    "nickname" => "ceshiqqq",
    "email" => "xtnkfe73025@chacuo.net",
    "password" => "bfxxxxxx1",
    "status" => 1,
    "roles" => "team_manager"
];
$userUpdateResult = $saasapi->team->userUpdate($params);
var_dump($userUpdateResult);


