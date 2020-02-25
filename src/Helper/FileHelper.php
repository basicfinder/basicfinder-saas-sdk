<?php 
namespace BasicfinderSaas\Helper;

class FileHelper
{
    public static $mimeMagicFile = './mimeTypes.php';
    private static $_mimeTypes = [];
    protected static function loadMimeTypes($magicFile)
    {
        if ($magicFile === null) {
            $magicFile = static::$mimeMagicFile;
        }
        if (!isset(self::$_mimeTypes[$magicFile])) {
            self::$_mimeTypes[$magicFile] = require __DIR__.$magicFile;
        }
    
        return self::$_mimeTypes[$magicFile];
    }
    
    public static function getMimeTypeByExtension($file, $magicFile = null)
    {
        $mimeTypes = static::loadMimeTypes($magicFile);
    
        if (($ext = pathinfo($file, PATHINFO_EXTENSION)) !== '') {
            $ext = strtolower($ext);
            if (isset($mimeTypes[$ext])) {
                return $mimeTypes[$ext];
            }
        }
    
        return null;
    }
    
    
}