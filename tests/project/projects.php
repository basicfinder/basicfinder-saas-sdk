<?php

defined('BASICFINDER_ENV') or define('BASICFINDER_ENV', 'dev');

include __DIR__.'/../../autoload.php';

use BasicfinderSaas\BasicfinderSaas;


$saasapi = new BasicfinderSaas();

$params = [
    'username' => '1234566@qq.com',
    'password' => 'bf123456',
    'app_key' => 'pc-passport',
    'app_version' => '1.0.0',
    'device_name' => 'Win32',
    'device_number' => '111'
];
$result = $saasapi->user->login($params);

if (!empty($result['error']))
{
    var_dump($result);
    exit();
}
var_dump($result['data']);

$accesstoken = $saasapi->getAccessToken();
var_dump($accesstoken);

$userInfo = $saasapi->user->detail();
var_dump($userInfo);

$params = [
/**
 * 可选参数
keyword	        否	String	关键字搜索
type	        否	String	项目类型
name	        否	String	项目名称
start_time	    否	String	项目开始时间
end_time	    否	String	项目结束时间
status	        否	String	项目状态
orderby	        否	String	排序字段
sort	        否	int	排序方式（正序或倒序）
page	        否	int	页数
limit	        否	int	每页展示数据量
category_id	    否	int	项目类型id
user_id	        否	int	创建者id
project_id	    否	int	项目id
file_type	    否	int	项目标注类型（0标注类，1采集类，2外部标注）
is_base	        否	int	是否仅获取基础数据,0:否(默认),1:是
user_is_tender	否	int	是否获取租户已参与竞标信息,0:否(默认),1:是
*/
];
$list = $saasapi->project->projects($params);
var_dump($list);

