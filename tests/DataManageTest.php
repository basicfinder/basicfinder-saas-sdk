<?php
namespace BasicfinderSaas\Test;

use BasicfinderSaas\BasicfinderSaas;
use BasicfinderSaas\Model\DataManage;

class DataManageTest
{
    private $saas;

    public function __construct()
    {
        $this->saas = new BasicfinderSaas();
        $this->saas->auth('1234566@qq.com', 'bf123456', 'pc-passport',
            '1.0.0', 'Win32', '111');}

    /**
     * 数据管理表单
     * @return mixed
     */
    public function form()
    {
        $params = [];
        return $this->saas->dataManage->form($params);
        /**
         * 返回结果
         * {
            "error": "",
            "message": "",
            "data": {
                "ftp": {
                    "id": "331",
                    "user_id": "32360",
                    "ftp_host": "ftp://192.168.1.153",
                    "ftp_username": "ftpuser32360",
                    "ftp_password": "pazwljxiyodbte",
                    "ftp_home": "/basicfinder/www/saas.basicfinder.com/api/uploadfile/32360",
                    "status": "0",
                    "created_at": "1566959135",
                    "updated_at": "0"
                },
                "deploy_path": "/32360/1573719956",
                "ftp_path": "/1573719956",
                "datamanage": {
                    "files": []
                }
            }
        }
         */
    }

    /**
     * 数据管理创建
     * @return mixed
     */
    public function create()
    {
        $params = [
            /**
             * 参数	              是否必须	  类型	 说明
            access_token	            是	String	access_token用户，用户唯一标识
            name	                    是	String	数据的名称
            deploy_path	                是	String	上传的文件的路径（来自datamanage/form表单生成）
            upload_type	                是	String	上传类型。0.网页。1.ftp。2.阿里云。3.亚马逊云。4.谷歌云
            file_operate	            是	String	特殊操作，0.无操作。1.按帧抽帧。2.按秒抽帧。3.语音分隔。4.相机参数
            file_type	                是	String	文件大类，0.图片。1.语音。2.文本。3.视频。4.3D类
            cloud_param[bucket_name]	否	String	云的bucket名（数据集名，即私有云地址）
            cloud_param[key]	        否	String	云的key
            cloud_param[secret_key]	    否	String	云的secret key
            cloud_param[area_name]	    否	String	地区名称（亚马逊使用）
            cloud_param[output_format]	否	String	输出格式（亚马逊使用）
            cloud_param[end_point]	    否	String	endpoint（阿里云使用）
             */
        ];
        return $this->saas->dataManage->create($params);
        /**
         * 返回结果
         * {
            "error": "",
            "message": "",
            "data": {
                "id": "7"
            }
          }
         */
    }

    /**
     * 数据管理删除
     * @return mixed
     */
    public function delete()
    {
        $params = [
            /**
             * 参数	              是否必须	  类型	 说明
            data_manage_id	            是	string	删除的id，多个格式：1,2,3
             */
        ];
        return $this->saas->dataManage->delete($params);
        /**
         * 返回结果
         * {
            "error": "",
            "message": "",
            "data": {
                "data_manage_id": [
                    "3",
                    "4"
                ]
            }
        }
         */
    }

    /**
     * 数据管理详情
     * @return mixed
     */
    public function detail()
    {
        $params = [
            /**
             * 参数	              是否必须	  类型	 说明
            data_manage_id	            是	string	删除的id，多个格式：1,2,3
             */
        ];
        return $this->saas->dataManage->detail($params);
        /**
         * 返回数据
         * {
            "error": "",
            "message": "",
            "data": {
                "id": "59",
                "user_id": "32360",
                "name": "test48",
                "save_path": "/32360/1574326766/uploadfile_struct_20191121091351.txt",
                "upload_path": "/32360/1574326766",
                "uploadType": "3",
                "fileType": "0",
                "file_operate": "0",
                "file_size_total": "0.000",
                "file_count": "0",
                "status": "0",
                "file_content": "",
                "cloud_config": {
                "key": "AKIAUXHLIG3Q",
                "secret_key": "YEWWhEG0qzvnvkn1DO6Vv",
                "bucket_name": "basic-ai-customer",
                "area_name": "",
                "output_format": ""
            },
            "created_at": "1574327631",
            "updated_at": "1574327631",
            "ftp": {
                "id": "331",
                "user_id": "32360",
                "ftp_host": "ftp://192.168.1.153",
                "ftp_username": "ftpuser32360",
                "ftp_password": "pazwljxiyodbte",
                "ftp_home": "/basicfinder/www/saas.basicfinder.com/api/uploadfile/32360",
                "status": "0",
                "created_at": "1566959135",
                "updated_at": "0"
            },
            "project": [],
            "statuses": [
                "正常",
                "已删除",
                "被root删除",
                "等待",
                "执行中"
            ],
            "files": []
            }
        }
         */
    }

    /**
     * 数据管理列表
     * @return mixed
     */
    public function managerList()
    {
        $params = [
            "page" => 1,
            "limit" => 5
            /**
             * 参数	              是否必须	  类型	 说明
                id	                    否	int	    数据管理的id
                status	                否	int	    数据管理的状态
                name	                否	String	名称
                time_begin	            否	int	    创建时间的开始值，时间戳格式
                time_end	            否	int	    创建时间的结束值，时间戳格式
                orderby	                否	String	排序字段
                sort	                否	String	排序方式
                file_type	            否	int	    数据管理类别
                uploaded_file_type	    否	int	    上传后的文件类型，0默认分类，1视频文件，2图片文件（目前仅在视频类中使用）
             */
        ];
        return $this->saas->dataManage->managerList($params);
        /**
         * 返回数据
         * {
            "error": "",
            "message": "",
            "data": {
                "page": "1",
                "limit": "10",
                "sort": "desc",
                "orderby": "id",
                "id": "",
                "status": "",
                "name": "",
                "time_begin": "",
                "time_end": "",
                "list": [
                    {
                    "id": "297",
                    "user_id": "32360",
                    "name": "test92",
                    "save_path": "/32360/1575857264/uploadfile_struct_20191209033304.txt",
                    "upload_path": "/32360/1575857264",
                    "upload_type": "0",
                    "file_type": "0",
                    "file_operate": "0",
                    "file_size_total": "0.83 MB",
                    "file_count": "6",
                    "status": "0",
                    "file_content": "",
                    "cloud_config": "",
                    "parse_start_time": "1575862384",
                    "parse_end_time": "1575862384",
                    "parse_progress": "100",
                    "parse_message": [
                        "成功解包4 个文件, 2 个文件被忽视.",
                        " gif,webp 为错误文件格式"
                    ],
                    "created_at": "1575857345",
                    "updated_at": "1575862384",
                    "ftp": {
                        "id": "331",
                        "user_id": "32360",
                        "ftp_host": "ftp://192.168.1.153",
                        "ftp_username": "ftpuser32360",
                        "ftp_password": "pazwljxiyodbte",
                        "ftp_home": "/basicfinder/www/saas.basicfinder.com/api/uploadfile/32360",
                        "status": "0",
                        "created_at": "1566959135",
                        "updated_at": "0"
                    }
                    },
                ],
                "statuses": [
                    "正常",
                    "已删除",
                    "被root删除",
                    "等待",
                    "执行中"
                ],
                "file_type": [
                    "图片类",
                    "语音类",
                    "文本类",
                    "视频类",
                    "3D类"
                ],
                "upload_type": [
                    "网页上传",
                    "ftp上传",
                    "阿里云",
                    "亚马逊云",
                    "谷歌云"
                ],
                "count": "73",
                "amount": "MB"
            }
        }
         */
    }

    /**
     * 获取亚马逊云参数列表
     * @return mixed
     */
    public function getAmazonConfig()
    {
        $params = [];
        return $this->saas->dataManage->getAmazonConfig($params);
        /**
         * 返回结果
         *{
            "error": "",
            "message": "",
            "data": {
                "area_name": [
                    "us-east-2",
                    "us-east-1",
                    "us-west-1",
                    "us-west-2",
                    "ap-east-1",
                    "ap-south-1",
                    "ap-northeast-2",
                    "ap-southeast-1",
                    "ap-southeast-2",
                    "ca-central-1",
                    "cn-north-1",
                    "cn-northwest-1",
                    "eu-central-1",
                    "eu-west-1",
                    "eu-west-2",
                    "eu-west-3",
                    "eu-north-1",
                    "me-south-1",
                    "sa-east-1",
                    "us-gov-east-1",
                    "us-gov-west-1"
                ],
                "return_format": [
                    "json",
                    "txt",
                    "table"
                ]
            }
          }
         */
    }

    /**
     * 检测相机文件
     * @return mixed
     */
    public function checkCameraParamFile()
    {
        $params = [
            /**
             * deploy_path	是	int	上传路径
                file_name	是	int	相机参数的文件名
             */
        ];
        return $this->saas->dataManage->checkCameraParamFile($params);
        /**
         * 返回数据
         * {
                "error": "",
                "message": "相机参数正确",
                "data": [
                    "yes"
                ]
         * }
         */
    }

    /**
     * 获取数据管理类型
     * @return mixed
     */
    public function uploadType()
    {
        $params = [];
        return $this->saas->dataManage->uploadType($params);
        /**
         * 返回数据
         *{
            "error": "",
            "message": "",
            "data": [
                "视频类",
                "图片类",
                "文本类",
                "语音类",
                "3D类"
            ]
        }
         */
    }

}