<?php

/*****************************************************
 * 测试:获取项目的项目列表
 * 
 * 使用方法:
 * php projects.php
 * ***************************************************
 */


defined('BASICFINDER_ENV') or define('BASICFINDER_ENV', 'dev');

include __DIR__.'/../../autoload.php';

use BasicfinderSaas\BasicfinderSaas;

$saasapi = new BasicfinderSaas();

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

$params = [
    'page' => 1,
    'count' => 10
];
$list = $saasapi->project->projects($params);
var_dump($list);

