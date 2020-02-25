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
     * @return bool|mixed|string
     */
    public function create($params = array())
    {
        return $this->postWithAccessToken('/datamanage/create', $params);
    }

    /**
     * 数据管理删除
     * @param $params
     * @return bool|mixed|string
     */
    public function delete($params = array())
    {
        return $this->postWithAccessToken('/datamanage/delete', $params);
    }

    /**
     * 数据管理详情
     * @param $params
     * @return bool|mixed|string
     */
    public function detail($params = array())
    {
        return $this->postWithAccessToken('/datamanage/detail', $params);
    }

    /**
     * 数据管理列表
     * @param $params
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