<?php

/*****************************************************
 * 测试: 配置项目：分配任务
 *
 * 使用方法:
 * php setTask.php
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
    "project_id" => "16630",
    "tasks[0][id]" => "21001",
    "tasks[0][name]" => "图片标注(2)-l00.zip-执行",
    "tasks[0][platform_type]" => "0",
    "tasks[0][platform_id]" => "1421",
    "tasks[0][receive_count]" => "5",
    "tasks[0][receive_expire]" => "3600",
    "tasks[0][is_load_result]" => "0",
    "tasks[0][start_time]" => "1582776007",
    "tasks[0][end_time]" => "1585368007",
    "tasks[1][id]" => "21002",
    "tasks[1][name]" => "图片标注(2)-l00.zip-审核",
    "tasks[1][platform_type]" => "0",
    "tasks[1][platform_id]" => "1421",
    "tasks[1][receive_count]" => "5",
    "tasks[1][receive_expire]" => "3600",
    "tasks[1][is_load_result]" => "0",
    "tasks[1][start_time]" => "1582776007",
    "tasks[1][end_time]" => "1585368007",
    "tasks[2][id]" => "21003",
    "tasks[2][name]" => "图片标注(2)-l00.zip-验收",
    "tasks[2][platform_type]" => "4",
    "tasks[2][platform_id]" => "363",
    "tasks[2][receive_count]" => "5",
    "tasks[2][receive_expire]" => "3600",
    "tasks[2][is_load_result]" => "0",
    "tasks[2][start_time]" => "1582776007",
    "tasks[2][end_time]" => "1585368007"
];
$setTaskResult = $saasapi->project->setTask($params);
var_dump($setTaskResult);


