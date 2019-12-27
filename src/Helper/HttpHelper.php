<?php

namespace BasicfinderSaas\Helper;

class HttpHelper
{
    protected static $delimiter;
    /**
     * @param $url
     * @param array $data
     * @return bool|string
     */

    private static function buildData ($param) {
        self::$delimiter = uniqid();
        $data = '';
        $eol = "\r\n";
        $upload = $param['file'];
        $filename = $param['filename'];
        unset($param['file']);
        unset($param['filename']);

        foreach ($param as $name => $content) {
            $data .= "--" . self::$delimiter . "\r\n"
                . 'Content-Disposition: form-data; name="' . $name . "\"\r\n\r\n"
                . $content . "\r\n";
        }

        $data .= "--" . self::$delimiter . $eol
            . 'Content-Disposition: form-data; name="file"; filename="' . $filename . '"' . "\r\n"
            . 'Content-Type:application/octet-stream'."\r\n\r\n";

        $data .= $upload . "\r\n";
        $data .= "--" . self::$delimiter . "--\r\n";
        return $data;
    }

    public static function request($url, $data = array(), $method = 'POST')
    {
        set_time_limit(0);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        if (!empty($data)) {
            if ($method == 'PUT') {
                $data = self::buildData($data);
                curl_setopt($curl, CURLOPT_HTTPHEADER, [
                    "Content-Type: multipart/form-data; boundary=" . self::$delimiter,
                    "Content-Length: " . strlen($data)
                ]);
            }
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT,60);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
}