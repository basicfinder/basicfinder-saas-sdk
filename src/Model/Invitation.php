<?php
namespace BasicfinderSaas\Model;

use BasicfinderSaas\Core\BaseApi;

class Invitation extends BaseApi
{
    /**
     * 生成邀请链接
     * @param $params
     * @return bool|mixed|string
     */
    public function create($params = array())
    {
        return $this->post('/invitation/create', $params);
    }

    /**
     * 邀请用户列表
     * @param $params
     * @return bool|mixed|string
     */
    public function userList($params = array())
    {
        return $this->post('/invitation/user-list', $params);
    }
}