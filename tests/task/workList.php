<?php

/*****************************************************
 * 测试:获取作业列表
 *
 * 使用方法:
 * php workList.php
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
    "task_id" => 21001,
    "limit" => 5, //	    是	int	每页展示数据量
    "page" => 1,  //	    是	int	页数
];
$workListResult = $saasapi->task->workList($params);
var_dump($workListResult);


