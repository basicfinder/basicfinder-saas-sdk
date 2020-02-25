<?php

/*****************************************************
 * 测试:发布项目的流程
 * 
 * 使用方法:
 * php publish.php
 * ***************************************************
 */


defined('BASICFINDER_ENV') or define('BASICFINDER_ENV', 'dev');

include __DIR__.'/../../autoload.php';

use BasicfinderSaas\SaasApi;

$saasapi = new SaasApi();

//登录账户
$account = require(__DIR__.'/../config/account.php');
$result = $saasapi->user->login($account);

if (!empty($result['error']))
{
    var_dump($result);
    exit();
}
var_dump($result['data']);

$userInfo = $saasapi->user->detail();
var_dump($userInfo);

//第一步, 创建项目
$params = [
    'page' => 1,
    'count' => 10
];
$list = $saasapi->project->projects($params);
var_dump($list);

