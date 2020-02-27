<?php

/*****************************************************
 * 测试: 提交项目信息
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

//提交项目信息
$params = [
    "project_id" => 16619,
    "name" => "shuaiqun-ceshi",
    "site_id" => 363,
];
$submitResult = $saasapi->project->submit($params);
var_dump($submitResult);


//提交项目数据
$params = [
    "project_id" => 16619,
    "type" => 1,
    "datamanage_id" => 613,
];
$submitResult = $saasapi->project->submit($params);
var_dump($submitResult);


//提交项目模板
$params = [
    "project_id" => 16619,
    "type" => 1,
    "template_id" => 4264,
];
$submitResult = $saasapi->project->submit($params);
var_dump($submitResult);


//提交项目审核
$params = [
    "project_id" => 16619,
    "name" => "shuaiqun-ceshi",
    "type" => 1,
    "site_id" => 363,
    "template_id" => 4264,
    "category_id" => 11,
    "step_process_id"=> 5,
    "start_time"=> "1581995716",
    "end_time"=> "1584587716"
];
$submitResult = $saasapi->project->submit($params);
var_dump($submitResult);

