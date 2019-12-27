<?php
namespace BasicfinderSaas\Model;

use BasicfinderSaas\Core\BaseApi;
use BasicfinderSaas\Helper\FormatHelper;

class User extends BaseApi
{
    /**
     * 通过用户名和密码，获取用户身份凭证（access_token）。后续接口都会通过验证access_token来获取用户信息，以实现各个功能的操作。
     * @param $params
     * @return bool|mixed|string
     */
    public function login($params = array())
    {
        return $this->post('/site/login', $params, false);
    }

    /**
     * 通过user_id字段获取对应的用户详情信息（用户的租户、团队、ftp、角色等）
     * @param $params
     * @return bool|mixed|string
     */
    public function detail($params = array())
    {
        if (empty($params) or !isset($params["user_id"])) {
            $params['user_id'] = $this->getUserId();
        }
        return $this->post('/user/detail', $params);
    }

    /**
     * 查询用户的操作记录列表
     * @param $params
     * @return bool|mixed|string
     */
    public function records($params = array())
    {
        $default = ["user_id" => $this->getUserId(), "limit" => 10, "page" => 1];
        $params = array_merge($default, $params);
        return $this->post('/user/records', $params);
    }

    /**
     * 获取到用户的使用设备信息列表
     * @param $params
     * @return bool|mixed|string
     */
    public function devices($params = array())
    {
        $default = ["user_id" => $this->getUserId(), "limit" => 10, "page" => 1];
        $params = array_merge($default, $params);
        return $this->post('/user/devices', $params);
    }

    /**
     * 众包注册
     * @param $params
     * @return bool|mixed|string
     */
    public function signupCrowdsourcing($params = array())
    {
        return $this->post('/site/signup-crowdsourcing', $params, false);
    }

    /**
     * 众包登录
     * @param $params
     * @return bool|mixed|string
     */
    public function loginCrowdsourcing($params = array())
    {
        return $this->post('/site/login-crowdsourcing', $params, false);
    }

    /**
     * 用户提交资质审核
     * @param $params
     * @return bool|mixed|string
     */
    public function submitQualification($params = array())
    {
        return $this->post('/user/submit-qualification', $params);
    }

    /**
     * 用户审核资质列表
     * @param $params
     * @return bool|mixed|string
     */
    public function qualifications($params = array())
    {
        return $this->post('/user/qualifications', $params);
    }

    /**
     * 用户审核资质更新
     * @param $params
     * @return bool|mixed|string
     */
    public function updateQualification($params = array())
    {
        return $this->post('/user/update-qualification', $params);
    }

    /**
     * 用户电子支付信息列表
     * @param $params
     * @return bool|mixed|string
     */
    public function epaies($params = array())
    {
        return $this->post('/user/epaies', $params);
    }

    /**
     * 添加用户电子支付信息
     * @param $params
     * @return bool|mixed|string
     */
    public function createEpay($params = array())
    {
        return $this->post('/user/create-epay', $params);
    }

    /**
     * 修改用户电子支付信息
     * @param $params
     * @return bool|mixed|string
     */
    public function updateEpay($params = array())
    {
        return $this->post('/user/update-epay', $params);
    }

    /**
     * 用户统计
     * @param $params
     * @return bool|mixed|string
     */
    public function stat($params = array())
    {
        return $this->post('/user/stat', $params);
    }

    /**
     * 获取配置信息
     * @param $params
     * @return bool|mixed|string
     */
    public function publicConfig($params = array())
    {
        return $this->post('/site/public-config', $params);
    }

    /**
     * 用户注册
     * @return bool|mixed|string
     */
    public function create($params = array())
    {
        return $this->post('/user/create', $params);
    }

    /**
     * 用户列表
     * @param $params
     * @return bool|mixed|string
     */
    public function users($params = array())
    {
        return $this->post('/user/users', $params);
    }

    /**
     * 用户表单
     * @param $params
     * @return bool|mixed|string
     */
    public function form($params = array())
    {
        return $this->post('/user/form', $params);
    }

    /**
     * 编辑用户
     * @param $params
     * @return bool|mixed|string
     */
    public function update($params = array())
    {
        return $this->post('/user/update', $params);
    }

}
