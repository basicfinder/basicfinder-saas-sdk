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
    private $userId;
    private $access_token;
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
    
    public function setUserId($userId)
    {
        return $this->userId = $userId;
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
     * 获取access_token
     * @param bool $refresh
     * @return array
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }

    /**
     * @param $uri
     * @param $data
     * @param $method
     * @return bool|mixed|string
     * @throws BaseException
     */
    public function request($uri, $data, $method = 'POST', $headers = [])
    {
        $requestResult = HttpHelper::request($this->host . $uri, $data, $method, $headers = []);
        if (!empty($requestResult['error']))
        {
            return FormatHelper::result('', $requestResult['error'], $requestResult['message']);
        }
        $requestData = json_decode($requestResult['data'], true);
        
        //登录时, 保存登录后的用户id和access_token
        if ($uri == '/site/login')
        {
            $loginResult = $requestData;
            
            if (!empty($loginResult['error']))
            {
                return $loginResult;
            }
            elseif (empty($loginResult['data']))
            {
                return $loginResult;
            }
            $userInfo = $loginResult['data'];
            
            if (!empty($userInfo['id']) && !empty($userInfo['access_token']))
            {
                $this->setUserId($userInfo['id']);
                $this->setAccessToken($userInfo['access_token']);
            }
        }
        
        return $requestData;
    }
    
    /**
     * @param $uri
     * @param null $data
     * @param string $method
     * @return array
     */
    public function requestWithAccesstoken($uri, $data = null, $method = 'POST', $headers = [])
    {
        $data = (array)$data;
        $data['access_token'] = $this->getAccessToken();
        
        $requestResult = HttpHelper::request($this->host . $uri, $data, $method, $headers);
        if (!empty($requestResult['error']))
        {
            return FormatHelper::result('', $requestResult['error'], $requestResult['message']);
        }
        $requestData = json_decode($requestResult['data'], true);
        
        return $requestData;
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

        if (\class_exists($classNameSpace))
        {
            return new $classNameSpace($this);
        }

        throw new BaseException('Error! BasicFinder Saas Sdk "' . $class . '" Not Found.', 404);
    }
}