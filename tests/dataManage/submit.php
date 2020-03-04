<?php

/*****************************************************
 * 测试:数据管理提交
 *
 * 使用方法:
 * php submit.php
 * ***************************************************
 */


defined('BASICFINDER_ENV') or define('BASICFINDER_ENV', 'dev');

include __DIR__.'/../../autoload.php';

use BasicfinderSaas\SaasApi;

$saasapi = new SaasApi();

$account = [
    'username' => 'your email',
    'password' => 'your password',
    'app_key' => 'pc-root',
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
    "data_manage_id"=> 648,
    "name" => "ceshi-shuaiqun",
    "upload_type" => 0,
    "file_operate" => 0,
    "file_type"=> 0
];
$submitResult = $saasapi->datamanage->submit($params);
var_dump($submitResult);


