<?php

namespace BasicfinderSaas\Model;

use BasicfinderSaas\Core\BaseApi;

class Word extends BaseApi
{
    /**
     * 词库列表
     * @param $params
     * @return bool|mixed|string
     */
    public function dictList($params = array())
    {
        return $this->post('/dict/list', $params);
    }

    /**
     * 词库表单
     * @param $params
     * @return bool|mixed|string
     */
    public function form($params = array())
    {
        return $this->post('/dict/form', $params);
    }

    /**
     * 创建词库
     * @param $params
     * @return bool|mixed|string
     */
    public function create($params = array())
    {
        return $this->post('/dict/create', $params);
    }

    /**
     * 删除词库
     * @param $params
     * @return bool|mixed|string
     */
    public function delete($params = array())
    {
        return $this->post('/dict/delete', $params);
    }

}