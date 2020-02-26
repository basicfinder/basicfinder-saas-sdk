<?php
namespace BasicfinderSaas\Model;

use BasicfinderSaas\Core\BaseApi;

class Site extends BaseApi
{
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
     * 通过用户名和密码，获取用户身份凭证（access_token）。后续接口都会通过验证access_token来获取用户信息，以实现各个功能的操作。
     * @param $params
     * 可选参数
     *  username  是   String  账号
     *  password  是   String  密码
     *  app_key   是   String  应用平台
     *  app_version  是   String 应用版本号
     *  device_name  是   String   登录设备名称
     *  device_number 是  String   登录设备号
     * @return bool|mixed|string
     */
    public function login($params = array())
    {
        return $this->post('/site/login', $params);
    }
}