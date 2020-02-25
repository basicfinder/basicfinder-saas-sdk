<?php

namespace BasicfinderSaas\Model;

use BasicfinderSaas\Core\BaseApi;

class Finance extends BaseApi
{
    /**
     * 收入列表
     * @param $params
     * @return bool|mixed|string
     */
    public function moneys($params = array())
    {
        return $this->postWithAccessToken('/money/moneys', $params);
    }

    /**
     * 金额详细
     * @param $params
     * @return bool|mixed|string
     */
    public function moneyDetail($params = array())
    {
        return $this->postWithAccessToken('/money/money-detail', $params);
    }

    /**
     * 提现列表
     * @param $params
     * @return bool|mixed|string
     */
    public function withdrawals($params = array())
    {
        return $this->postWithAccessToken('/money/withdrawals', $params);
    }

    /**
     * 提现表单
     * @param $params
     * @return bool|mixed|string
     */
    public function withdrawalForm($params = array())
    {
        return $this->postWithAccessToken('/money/withdrawal-form', $params);
    }

    /**
     * 申请提现
     * @param $params
     * @return bool|mixed|string
     */
    public function withdrawalCreate($params = array())
    {
        return $this->postWithAccessToken('/money/withdrawal-create', $params);
    }

    /**
     * 提现审核
     * @param $params
     * @return bool|mixed|string
     */
    public function withdrawalUpdate($params = array())
    {
        return $this->postWithAccessToken('/money/withdrawal-update', $params);
    }

    /**
     * 用户任务财务列表
     * @param $params
     * @return bool|mixed|string
     */
    public function tasks($params = array())
    {
        return $this->postWithAccessToken('/money/tasks', $params);
    }

    /**
     * 用户任务作业财务列表
     * @param $params
     * @return bool|mixed|string
     */
    public function works($params = array())
    {
        return $this->postWithAccessToken('/money/works', $params);
    }


}