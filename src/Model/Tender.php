<?php
namespace BasicfinderSaas\Model;

use BasicfinderSaas\Core\BaseApi;

class Tender extends BaseApi
{
    /**
     * 竞标更新
     * @param $params
     * @return bool|mixed|string
     */
    public function update($params = array())
    {
        return $this->postWithAccessToken('/tender/update', $params);
    }

    /**
     * 申请竞标
     * @param $params
     * @return bool|mixed|string
     */
    public function applySubmit($params = array())
    {
        return $this->postWithAccessToken('/tender/apply-submit', $params);
    }

    /**
     * 申请竞标列表
     * @param $params
     * @return bool|mixed|string
     */
    public function applyList($params = array())
    {
        return $this->postWithAccessToken('/tender/apply-list', $params);
    }

    /**
     * 申请竞标详细
     * @param $params
     * @return bool|mixed|string
     */
    public function applyDetail($params = array())
    {
        return $this->postWithAccessToken('/tender/apply-detail', $params);
    }

    /**
     * 处理申请
     * @param $params
     * @return bool|mixed|string
     */
    public function applyUpdate($params = array())
    {
        return $this->postWithAccessToken('/tender/apply-update', $params);
    }

}