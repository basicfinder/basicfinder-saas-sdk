<?php

namespace BasicfinderSaas\Model;

use BasicfinderSaas\Core\BaseApi;

class File extends BaseApi
{
    /**
     * 上传私有文件
     * @param $params
     * @return bool|mixed|string
     */
    public function uploadPrivateFile($params = array())
    {
        return $this->postWithAccessToken('/site/upload-private-file', $params);
    }
    
    /**
     * 下载私有文件
     * @param $params
     * @return bool|mixed|string
     */
    public function downloadPrivateFile($params = array())
    {
        return $this->get('/site/download-private-file', $params);
    }

    /**
     * 上传资源文件
     * @param $params
     * @return bool|mixed|string
     */
    public function uploadResourceFile($params = array())
    {
        return $this->postWithAccessToken('/site/upload-resource-file', $params);
    }

    /**
     * 下载资源文件
     * @param $params
     * @return bool|mixed|string
     */
    public function downloadResourceFile($params = array())
    {
        return $this->get('/site/download-resource-file', $params);
    }

}