<?php

/*****************************************************
 * 测试:获取用户表单
 *
 * 使用方法:
 * php form.php
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
$result = $saasapi->user->login($account);

if (!empty($result['error']))
{
    var_dump($result);
    exit();
}
var_dump($result['data']);

$params = [

];
$formResult = $saasapi->user->form($params);
var_dump($formResult);

