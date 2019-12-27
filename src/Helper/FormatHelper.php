<?php

namespace BasicfinderSaas\Helper;

class FormatHelper
{
    /**
     * @param array $data
     * @param string $errno
     * @param string $error
     * @return array
     */
    public static function result($data = array(), $errno = '', $error = '')
    {
        return array('data' => $data, 'error' => $errno, 'message' => $error);
    }

    /**
     * @param $uri
     * @param $data
     * @param $method
     */
    public static function methodGetProcess(&$uri, &$data, $method)
    {
        if ($method == 'GET' && !empty($data) ) {
            is_array($data) && $data = http_build_query($data);
            $uri = strpos($uri, '?') ? $uri . $data : $uri . '?' . $data;
            $data = [];
        }
    }
}