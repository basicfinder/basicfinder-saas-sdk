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
    
}