<?php
namespace BasicfinderSaas\Test;

use BasicfinderSaas\BasicfinderSaas;

class FileTest
{
    private $saas;
    public function __construct()
    {
        $this->saas = new BasicfinderSaas();
        $this->saas->auth('1234566@qq.com', 'bf123456', 'pc-passport', '1.0.0', 'Win32', '111');
    }

    /**
     * 上传私有文件
     * @return mixed
     */
    public function uploadPrivateFile()
    {
        $params = [
            "project_id" => 15291,
            "type" => "attachment",
//            "file" => "C:/Users/admin/Desktop/imgs/l00.jpg"
            "file" => "C:/Users/admin/Desktop/imgs/l00.zip"
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
        return $this->saas->file->uploadPrivateFile($params);
        /**
         * 返回数据
         * array(3) { ["data"]=> array(5) { ["urlpath"]=> string(31) "/38032/15291/attachment/l00.jpg" ["md5"]=> string(32) "e4433255f143ac1edea713d2c13233ea" ["key"]=> string(46) "LzM4MDMyLzE1MjkxL2F0dGFjaG1lbnQvbDAwLmpwZw_c_c" ["url"]=> string(78) "site/download-private-file?file=LzM4MDMyLzE1MjkxL2F0dGFjaG1lbnQvbDAwLmpwZw_c_c" ["uri"]=> string(113) "http://devsaas.api.basicfinder.com/site/download-private-file?file=LzM4MDMyLzE1MjkxL2F0dGFjaG1lbnQvbDAwLmpwZw_c_c" } ["error"]=> string(0) "" ["message"]=> string(0) "" }
         */
    }

    /**
     * 下载私有文件
     * @return mixed
     */
    public function downloadPrivateFile()
    {
        $params["file"] = 'LzM4MDMyLzE1MjkxL2F0dGFjaG1lbnQvbDAwLmpwZw_c_c';
        return $this->saas->file->downloadPrivateFile($params);
        /**
         * 返回数据
         * array(3) { ["data"]=> "binary data" ["error"]=> string(0) "" ["message"]=> string(0) "" }
         */
    }

    /**
     * 上传资源文件
     * @return mixed
     */
    public function uploadResourceFile()
    {
        $params = [
            "project_id" => 15291,
            "file" => "C:/Users/admin/Desktop/imgs/l00.zip"
        ];
        return $this->saas->file->uploadResourceFile($params);
        /**
         * 返回结果
         * array ( 'data' => array ( 'urlpath' => '/38032/15291/l00.zip', 'md5' => '509a6f33ac9d62c24f11dcf75501e398', 'key' => 'LzM4MDMyLzE1MjkxL2wwMC56aXA_c', 'url' => 'site/download-resource-file?file=LzM4MDMyLzE1MjkxL2wwMC56aXA_c', 'uri' => 'http://devsaas.api.basicfinder.com/site/download-resource-file?file=LzM4MDMyLzE1MjkxL2wwMC56aXA_c', ), 'error' => '', 'message' => '', )
         */
    }

    /**
     * 下载资源文件
     * @return mixed
     */
    public function downloadResourceFile()
    {
        $params = [
            "file" => "LzM4MDMyLzE1MjkxL2wwMC56aXA_c"
        ];
        return $this->saas->file->downloadResourceFile($params);
        /**
         * 返回结果
         *array("data" => "binary data", "error" => "", "message" => "")
         */
    }
}