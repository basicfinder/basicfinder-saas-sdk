<?php

namespace BasicfinderSaas\Model;

use BasicfinderSaas\Core\BaseApi;
use BasicfinderSaas\Core\BaseException;

class File extends BaseApi
{
    /**
     * 上传私有文件
     * @param $params
     * @return bool|mixed|string
     */
    public function uploadPrivateFile($params = array())
    {
        if (isset($params["file"])) {
            $exist = file_exists($params["file"]);
            if (!$exist) {
                throw new BaseException('Error! File "' . $params["file"] . '" Not Exist .', 500);
            }
            $info = pathinfo($params["file"]);
            $params["filename"] = $info["basename"];
            $params["file"] = file_get_contents($params["file"]);
        }
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
        if (isset($params["file"])) {
            $exist = file_exists($params["file"]);
            if (!$exist) {
                throw new BaseException('Error! File "' . $params["file"] . '" Not Exist .', 500);
            }
            $info = pathinfo($params["file"]);
            $params["filename"] = $info["basename"];
            $params["file"] = file_get_contents($params["file"]);
        }
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