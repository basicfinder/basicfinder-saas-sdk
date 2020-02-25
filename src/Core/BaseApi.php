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
     * @param $uri
     * @param $params
     * @param bool $needAccessToken
     * @return bool|mixed|string
     */
    public function get($uri, $params, $needAccessToken = true)
    {
        return $this->api->request($uri, $params, $needAccessToken, 'GET');
    }

    /**
     * POST http request
     * @param $uri
     * @param $params
     * @param bool $needAccessToken
     * @return bool|mixed|string
     */
    public function post($uri, $params, $needAccessToken = true)
    {
        return $this->api->request($uri, $params, $needAccessToken, 'POST');
    }

    /**
     * PUT file http request
     * @param $uri
     * @param $params
     * @param bool $needAccessToken
     * @return bool|mixed|string
     */
    public function put($uri, $params, $needAccessToken = true)
    {
        return $this->api->request($uri, $params, $needAccessToken, 'PUT');
    }

}