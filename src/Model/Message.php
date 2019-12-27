<?php

namespace BasicfinderSaas\Model;

use BasicfinderSaas\Core\BaseApi;

class Message extends BaseApi
{
    /**
     * 平台公告列表
     * @param $params
     * @return bool|mixed|string
     */
    public function noticeList($params = array())
    {
        $default = ["limit" => 10, "page" => 1];
        $params = array_merge($default, $params);
        return $this->post('/notice/list', $params);
    }

    /**
     * 发送公告
     * @param $params
     * @return bool|mixed|string
     */
    public function create($params = array())
    {
        return $this->post('/notice/create', $params);
    }

    /**
     * 编辑公告
     * @param $params
     * @return bool|mixed|string
     */
    public function update($params = array())
    {
        return $this->post('/notice/update', $params);
    }

    /**
     * 删除公告
     * @param $params
     * @return bool|mixed|string
     */
    public function delete($params = array())
    {
        return $this->post('/notice/delete', $params);
    }

    /**
     * 系统通知
     * @param $params
     * @return bool|mixed|string
     */
    public function messageList($params = array())
    {
        $default = ["limit" => 10, "page" => 1];
        $params = array_merge($default, $params);
        return $this->post('/message/list', $params);
    }

    /**
     * 发送通知
     * @param $params
     * @return bool|mixed|string
     */
    public function send($params = array())
    {
        return $this->post('/message/send', $params);
    }

    /**
     * 撤销通知
     * @param $params
     * @return bool|mixed|string
     */
    public function revoke($params = array())
    {
        return $this->post('/message/revoke', $params);
    }

    /**
     * 我的消息列表
     * @param $params
     * @return bool|mixed|string
     */
    public function userMessages($params = array())
    {
        return $this->post('/message/user-messages', $params);
    }

}