<?php
namespace BasicfinderSaas\Core;

use BasicfinderSaas\SaasApi;

class BaseApi
{
    /**
     * @var BasicfinderSaas
     */
    private $api;

    public function __construct(SaasApi $api)
    {
        $this->api = $api;
    }

    /**
     * @return mixed
     */
    protected function getUserId()
    {
        return $this->api->getUserId();
    }
    
    /**
     * GET http request
     * 
     * @param $uri
     * @param $params
     * @return bool|mixed|string
     */
    public function get($uri, $params)
    {
        return $this->api->request($uri, $params, 'GET');
    }
    
    public function getWithAccessToken($uri, $params)
    {
        return $this->api->requestWithAccesstoken($uri, $params, 'GET');
    }

    /**
     * POST http request
     * 
     * @param $uri
     * @param $params
     * @return bool|mixed|string
     */
    public function post($uri, $params, $headers = [])
    {
        return $this->api->request($uri, $params, 'POST', $headers);
    }
    
    public function postWithAccessToken($uri, $params, $headers = [])
    {
        return $this->api->requestWithAccessToken($uri, $params, 'POST', $headers);
    }
    
}