<?php

namespace BasicfinderSaas\Helper;

class HttpHelper
{
    public static function request($url,$params=array(),$requestMethod='GET',$headers=array())
    {
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
                
                //处理上传文件
                if ($params && is_array($params))
                {
                    $fileName = '';
                    $filePath = '';
                    foreach ($params as $k => $v)
                    {
                        if (substr($v, 0, 1) === '@')
                        {
                            $fileName = $k;
                            $filePath = substr($v, 1);
                            break;
                        }
                    }
                    
                    $fileMime = FileHelper::getMimeTypeByExtension($filePath);
                    if ($fileMime)
                    {
                        $fileContents = @file_get_contents($filePath);
                        if ($fileContents)
                        {
                            list($params, $headers) = self::uploadfile($filePath, $fileContents, $fileMime, $params);
                        }
                    }
                    
                }
                
                if ($params) {
                    curl_setopt($ci, CURLOPT_POSTFIELDS, $params);
                }
                else {
                    curl_setopt($ci, CURLOPT_POSTFIELDS, ''); // Don't know why: if not set,  413 Request Entity Too Large
                }
    
                break;
            case 'DELETE':
                curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'DELETE');
                if ($params) {
                    $url = "{$url}?{$params}";
                }
    
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
    
                break;
            case 'PUT':
                if($params) {
                    curl_setopt($ci, CURLOPT_CUSTOMREQUEST, "PUT");
                    curl_setopt($ci, CURLOPT_POSTFIELDS, $params);
                }
    
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
        return $return;
    }
    
    /**
     * @param $url
     * @param array $data
     * @return bool|string
     */
    
    private static function uploadfile($filename, $content, $fileMime, $otherParams)
    {
        $delimiter = uniqid();
    
        $data = '';
        if ($otherParams)
        {
            foreach ($otherParams as $_key => $_val)
            {
                $data .= "--" . $delimiter . "\r\n"
                    . 'Content-Disposition: form-data; name="' . $_key . "\"\r\n\r\n"
                        . $_val . "\r\n";
            }
        }
        
    
        $data .= "--" . $delimiter . "\r\n"
            . 'Content-Disposition: form-data; name="file"; filename="' . $filename . '"' . "\r\n"
                . 'Content-Type:'.$fileMime."\r\n\r\n";
    
        $data .= $content . "\r\n";
        $data .= "--" . $delimiter . "--\r\n";
    
    
        $headers = [
            "Content-Type: multipart/form-data; boundary=" . $delimiter,
            "Content-Length: " . strlen($data)
        ];
    
        return [$data, $headers];
    }
}