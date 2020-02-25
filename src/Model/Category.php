<?php

namespace BasicfinderSaas\Model;

use BasicfinderSaas\Core\BaseApi;

class Category extends BaseApi
{
    /**
     * 分类列表
     * @param $params
     * @return bool|mixed|string
     */
    public function categories($params = array())
    {
        return $this->postWithAccessToken('/category/categories', $params);
    }

    /**
     * 创建分类
     * @param $params
     * @return bool|mixed|string
     */
    public function create($params = array())
    {
        $params = http_build_query($params);
        return $this->postWithAccessToken('/category/create', $params);
    }

    /**
     * 编辑分类
     * @param $params
     * @return bool|mixed|string
     */
    public function update($params = array())
    {
        $params = http_build_query($params);
        return $this->postWithAccessToken('/category/update', $params);
    }

    /**
     * 删除分类
     * @param $params
     * @return bool|mixed|string
     */
    public function delete($params = array())
    {
        return $this->postWithAccessToken('/category/delete', $params);
    }

}