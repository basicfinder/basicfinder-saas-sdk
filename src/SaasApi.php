<?php

namespace BasicfinderSaas;

use BasicfinderSaas\Core\BaseException;
use BasicfinderSaas\Helper\HttpHelper;
use BasicfinderSaas\Helper\FormatHelper;

/**
 *
 * @copyright www.basicfinder.com
 * @version v1 20191218
 * 
 */
class SaasApi
{
    private $access_token;
    private $appKey = null;
    private $appVersion = null;
    private $username = null;
    private $password = null;
    private $deviceName = 'Win32';
    private $deviceNumber = '111';
    private $language = 0; //0 中文   1 English
    private $systemVersion;
    private $userId;
    private $config;
    private $host;

    /**
     * BasicFinder constructor.
     */
    public function __construct()
    {
        $this->config = require __DIR__ . '/Config/server.php';
        if (defined('BASICFINDER_ENV') && BASICFINDER_ENV == 'dev') {
            $this->host = $this->config["api-dev"];
        } else {
            $this->host = $this->config["api-prod"];
        }
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param $access_token
     * @return bool
     */
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;
        return true;
    }

    /**
     * @param $uri
     * @param null $data
     * @param string $method
     * @return array
     */
    private function requestWithAccesstoken($uri, $data = null, $method = 'POST')
    {
        $loginResult = $this->getAccessToken();
        if ($loginResult['error']) {
            return $this->result('', $loginResult['error'], $loginResult['message']);
        }
        $result = $this->actualRequest($uri, $data, $method);
        if ($result) {
            $binResult = $result;
            $result = json_decode($result, true);
            if ($method == 'GET' && is_null($result)) {
                return $this->result($binResult);
            }
            if (!empty($result['error'])) {
                if ($result['error'] == 'site_auth_fail' || strpos($result['message'], '没有登录')) {
                    $this->getAccessToken(true);
                    return $this->noAuthRequest($uri, $data, $method);
                } else {
                    return $this->result($result["data"], $result["error"], $result["message"]);
                }
            }
            $this->saveLoginInfo($result);
            return $this->result($result["data"], $result["error"], $result["message"]);
        }
        return $this->result('', 'back_data_erro', '返回数据错误');
    }

    /**
     * @param $uri
     * @param $data
     * @param $method
     * @return bool|string
     */
    private function actualRequest($uri, $data, $method)
    {
        if (is_array($data)) {
            $data['access_token'] = $this->access_token;
        } else {
            $data = "access_token=" . $this->access_token . "&" . $data;
        }
        FormatHelper::methodGetProcess($uri, $data, $method);
        $url = $this->host . $uri;
        return HttpHelper::request($url, $data, $method);
    }

    /**
     * @param $uri
     * @param $data
     * @param $method
     * @return bool|mixed|string
     * @throws BaseException
     */
    private function noAuthRequest($uri, $data, $method)
    {
        $result = $this->actualRequest($uri, $data, $method);
        if ($result) {
            $binResult = $result;
            $result = json_decode($result, true);
            if ($method == 'GET' && is_null($result)) {
                return $this->result($binResult);
            }
            $this->saveLoginInfo($result);
            return $this->result($result["data"], $result["error"], $result["message"]);
        } else {
            return $this->result('', 'back_data_erro', '返回数据错误');
        }
    }

    /**
     * 获取access_token
     * @param bool $refresh
     * @return array
     */
    public function getAccessToken($refresh = false)
    {
        if (!$refresh && $this->access_token) {
            return $this->result($this->access_token);
        }

        $data = [
            'app_key' => $this->appKey,
            'app_version' => $this->appVersion,
            'username' => $this->username,
            'password' => $this->password,
            'device_name' => $this->deviceName,
            'device_number' => $this->deviceNumber
        ];
        $response = $this->user->login($data);
        if (!empty($response['error'])) {
            return $this->result('', $response['error'], $response['message']);
        }
        $result = $response['data'];
        if (empty($result['id'])) {
            return $this->result('', $result['error'], $result['message']);
        }
        if (empty($result['access_token'])) {
            return $this->result('', $result['error'], $result['message']);
        }
        $this->access_token = $result['access_token'];
        $this->userId = $result['id'];
        return $this->result($this->access_token);
    }

    /**
     * @param array $data
     * @param string $errno
     * @param string $error
     * @return array
     */
    private function result($data = array(), $errno = '', $error = '')
    {
        return FormatHelper::result($data, $errno, $error);
    }

    /**
     * @param $result
     */
    private function saveLoginInfo($result)
    {
        if (!empty($result["data"]) && !empty($result["data"]["access_token"]) && !empty($result["data"]["id"]) ) {
            $this->access_token = $result["data"]["access_token"];
            $this->userId = $result["data"]["id"];
        }
    }

    /**
     * @param $uri
     * @param $params
     * @return bool|mixed|string
     */
    public function request($uri, $params, $needAccessToken = true, $method = 'POST')
    {
        if ($needAccessToken) {
            return $this->requestWithAccesstoken($uri, $params, $method);
        } else {
            FormatHelper::methodGetProcess($uri, $params, $method);
            $result = HttpHelper::request($this->host . $uri, $params, $method);
            if ($result) {
                $binResult = $result;
                $result = json_decode($result, true);
                if ($method == 'GET' && is_null($result)) {
                    return $this->result($binResult);
                }
                $this->saveLoginInfo($result);
                return $this->result($result["data"], $result["error"], $result["message"]);
            }
            return $this->result($result, 'back_data_erro', '返回数据错误');
        }
    }

    /**
     * @param $class
     * @return Object
     * @throws BaseException
     */
    public function __get($class)
    {
        $class = \ucfirst($class);
        $classNameSpace = 'BasicfinderSaas\\Model\\' . $class;

        if (\class_exists($classNameSpace)) {
            return new $classNameSpace($this);
        }

        throw new BaseException('Error! BasicFinder Saas Sdk "' . $class . '" Not Found.', 404);
    }
}