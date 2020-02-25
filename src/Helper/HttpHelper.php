<?php

namespace BasicfinderSaas\Helper;

class HttpHelper
{
    /**
     * @param $url
     * @param array $data
     * @return bool|string
     */

    private static function uploadfileHeaders ($filename, $content)
    {
        $delimiter = uniqid();
        
        $eol = "\r\n";
        $upload = $param['file'];
        $filename = $param['filename'];
        unset($param['file']);
        unset($param['filename']);

        $data = '';
        foreach ($param as $name => $content)
        {
            $data .= "--" . $delimiter . "\r\n"
                . 'Content-Disposition: form-data; name="' . $name . "\"\r\n\r\n"
                . $content . "\r\n";
        }

        $data .= "--" . $delimiter . $eol
            . 'Content-Disposition: form-data; name="file"; filename="' . $filename . '"' . "\r\n"
            . 'Content-Type:application/octet-stream'."\r\n\r\n";

        $data .= $upload . "\r\n";
        $data .= "--" . $delimiter . "--\r\n";
        
        return [
            "Content-Type: multipart/form-data; boundary=" . $delimiter,
            "Content-Length: " . strlen($data)
        ];
    }

    public static function request($url,$params=array(),$requestMethod='GET',$headers=array())
    {
        $_logs = ['$url' => $url, '$requestMethod' => $requestMethod, '$headers' => $headers];
    
        $ci = curl_init();
        curl_setopt($ci, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ci, CURLOPT_USERAGENT, '1001 Magazine v1');
        curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ci, CURLOPT_TIMEOUT, 30);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ci, CURLOPT_ENCODING, "");
        curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ci, CURLOPT_HEADER, FALSE);
    
        $requestMethod = strtoupper($requestMethod);
        switch ($requestMethod) {
            case 'POST':
                curl_setopt($ci, CURLOPT_POST, TRUE);
                if ($params) {
                    curl_setopt($ci, CURLOPT_POSTFIELDS, $params);
                }
                else {
                    curl_setopt($ci, CURLOPT_POSTFIELDS, ''); // Don't know why: if not set,  413 Request Entity Too Large
                }
    
                if ($params && is_array($params))
                {
                    $params_ = [];
                    foreach ($params as $k => $v)
                    {
                        $l = strlen($v);
                        $params_[$k] = $l > 50 ? substr($v, 0, 50) . '###length:'.$l : $v;
                    }
                    $_logs['$params'] = $params;
                }
                else
                {
                    $l = strlen($params);
                    $_logs['$params'] = $l > 50 ? substr($params, 0, 50) . '###length:'.$l : $params;
                }
                break;
            case 'DELETE':
                curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'DELETE');
                if ($params) {
                    $url = "{$url}?{$params}";
                }
    
                $_logs['$url'] = $url;
                $_logs['$params'] = $params;
                break;
            case 'GET':
                if($params) {
                    //$sep = false === strpos($url,'?') ? '?' : '&';
                    //$url .= $sep . http_build_query($params);
                    foreach ($params as $k => $v)
                    {
                        $url .= (false === strpos($url,'?') ? '?' : '&') . $k.'='.$v;
                    }
                }
    
                $_logs['$url'] = $url;
                $_logs['$params'] = $params;
                break;
            case 'PUT':
                if($params) {
                    curl_setopt($ci, CURLOPT_CUSTOMREQUEST, "PUT");
                    curl_setopt($ci, CURLOPT_POSTFIELDS, $params);
                }
    
                $_logs['$url'] = $url;
                $_logs['$params'] = $params;
                break;
        }
    
        //$headers[] = "APIWWW: " . $_SERVER['REMOTE_ADDR'];
        curl_setopt($ci, CURLOPT_URL, $url );
        curl_setopt($ci, CURLOPT_HTTPHEADER, $headers );
        curl_setopt($ci, CURLINFO_HEADER_OUT, TRUE );
    
        $response = curl_exec($ci);
        $httpCode = curl_getinfo($ci, CURLINFO_HTTP_CODE);
        $httpTime = curl_getinfo($ci, CURLINFO_TOTAL_TIME);
        curl_close ($ci);
    
        $return = array(
            'time' => $httpTime,
            'error' => $httpCode == 200 ? 0 : $httpCode,
            'data' => $response,
            'message' => ''
        );
        //$httpInfo = curl_getinfo($ci);
        $_logs['$httpTime'] = $httpTime;
        $_logs['$httpCode'] = $httpCode;
        return $return;
    }
}