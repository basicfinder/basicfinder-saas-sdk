<?php

namespace BasicfinderSaas\Model;

use BasicfinderSaas\Core\BaseApi;

class DataManage extends BaseApi
{
    /**
     * 数据管理表单
     * @param $params
     * @return bool|mixed|string
     */
    public function form($params = array())
    {
        return $this->postWithAccessToken('/datamanage/form', $params);
    }

    /**
     * 数据管理创建
     * @param $params
     * 可选参数
        file_type	是	int	文件类别
     * @return bool|mixed|string
     */
    public function create($params = array())
    {
        return $this->postWithAccessToken('/datamanage/create', $params);
    }

    /**
     * 数据管理提交
     * @param $params
     * 可选参数
        data_manage_id	是	int	数据管理id
        name	是	string	数据的名称
        upload_type	是	string	上传类型,0:网页,1:ftp,2:阿里云,3:亚马逊云,4:谷歌云
        file_operate	是	string	特殊操作，0:无操作,1:按帧抽帧,2:按秒抽帧,3:语音分隔,4:相机参数
        file_type	是	string	文件大类,0:图片,1:语音,2:文本,3:视频,4:3D类
        cloud_param[bucket_name]	否	string	云的bucket名（数据集名，即私有云地址）
        cloud_param[key]	否	string	云的key
        cloud_param[secret_key]	否	string	云的secret key
        cloud_param[area_name]	否	string	地区名称（亚马逊使用）
        cloud_param[output_format]	否	string	输出格式（亚马逊使用）
        cloud_param[end_point]	否	string	endpoint（阿里云使用）
     * @return bool|mixed|string
     */
    public function submit($params = array())
    {
        return $this->postWithAccessToken('/datamanage/submit', $params);
    }

    /**
     * 数据管理删除
     * @param $params
     * 可选参数
        data_manage_id	是	int	数据管理id
     * 可选参数

     * @return bool|mixed|string
     */
    public function delete($params = array())
    {
        return $this->postWithAccessToken('/datamanage/delete', $params);
    }

    /**
     * 数据管理详情
     * @param $params
     * 可选参数
        data_manage_id	是	int	数据管理id
     * @return bool|mixed|string
     */
    public function detail($params = array())
    {
        return $this->postWithAccessToken('/datamanage/detail', $params);
    }

    /**
     * 数据管理列表
     * @param $params
     * 可选参数
        id	否	int	数据管理的id
        status	否	int	数据管理的状态
        name	否	String	名称
        time_begin	否	int	创建时间的开始值，时间戳格式
        time_end	否	int	创建时间的结束值，时间戳格式
        page	是	int	page
        limit	是	int	每页条数
        orderby	否	String	sort value
        sort	否	String	排序方式
        file_type	否	int	数据管理类别
        uploaded_file_type	否	int	上传后的文件类型，0默认分类，1视频文件，2图片文件（目前仅在视频类中使用）
     * @return bool|mixed|string
     */
    public function managerList($params = array())
    {
        return $this->postWithAccessToken('/datamanage/list', $params);
    }

    /**
     * 获取亚马逊云参数列表
     * @param $params
     * @return bool|mixed|string
     */
    public function getAmazonConfig($params = array())
    {
        return $this->postWithAccessToken('/datamanage/get-amazon-config', $params);
    }

    /**
     * 检测相机文件
     * @param $params
     * @return bool|mixed|string
     */
    public function checkCameraParamFile($params = array())
    {
        return $this->postWithAccessToken('/datamanage/check-camera-param-file', $params);
    }

    /**
     * 获取数据管理类型
     * @param $params
     * @return bool|mixed|string
     */
    public function uploadType($params = array())
    {
        return $this->postWithAccessToken('/datamanage/upload-type', $params);
    }


}