<?php

/*****************************************************
 * 测试:创建模板
 *
 * 使用方法:
 * php templateCreate.php
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
    //模板信息
    "config" => '[{"type":"layout","column0":{"span":18,"children":[{"type":"task-file-placeholder","header":"","tips":"","id":"6bddee58-fd67-4d77-a4a4-cf120d461a82","anchor":"image_url"},{"type":"image-label-tool","id":"2acae707-3962-4b97-9f11-111421d22326","supportShapeType":["rect","polygon"],"advanceTool":[]}]},"column1":{"span":6,"children":[]},"id":"b15bb729-5bac-4a4f-b868-fc3cbce0ee98","ratio":3,"scene":"edit"}]',
    //模板名称
    "name" => "xxxx",
    //模板类型
    "type" => 1,
    "site_id" => 363,
    //模板分类id
    "category_id" => 11
];
$createResult = $saasapi->template->create($params);
var_dump($createResult);


