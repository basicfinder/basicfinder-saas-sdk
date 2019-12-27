<?php
namespace BasicfinderSaas\Core;

use BasicfinderSaas\BasicfinderSaas;

class BaseApi
{
    /**
     * @var BasicfinderSaas
     */
    private $saas;

    public function __construct(BasicfinderSaas $saas)
    {
        $this->saas = $saas;
    }

    /**
     * @return mixed
     */
    protected function getUserId()
    {
        return $this->saas->getUserId();
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
        return $this->saas->request($uri, $params, $needAccessToken, 'GET');
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
        return $this->saas->request($uri, $params, $needAccessToken, 'POST');
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
        return $this->saas->request($uri, $params, $needAccessToken, 'PUT');
    }

}