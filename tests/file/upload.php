<?php

/*****************************************************
 * 测试:获取项目的项目列表
 * 
 * 使用方法:
 * php login.php
 * ***************************************************
 */


defined('BASICFINDER_ENV') or define('BASICFINDER_ENV', 'dev');

include __DIR__.'/../../autoload.php';

use BasicfinderSaas\SaasApi;

//---------------------------------------

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

//---------------------------------------

$params = [
    "project_id" => 15291,
    "type" => "attachment",
    //            "file" => "C:/Users/admin/Desktop/imgs/l00.jpg"
    //"file" => "@E:\basicfinder_file\data\imgerr.zip",
    "file" => "@https://www.basicfinder.com/_nuxt/img/243d715.png",
    //"file" => "@E3333"
    /**
     * 可选参数
*                必填
*          dict	否	string	词库文件上传
team_user_import	否	string	团队用户导入
user_import	        否	string	用户导入
deploy_path	        否	string	数据部署
user_idcard	        否	string	用户身份认证
type	            否	string	类型
*/
];
$result = $saasapi->file->uploadPrivateFile($params);
var_dump($result);

