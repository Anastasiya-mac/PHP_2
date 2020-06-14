<?php
namespace app\services;

class Autoloader
{   private $fileExrention = ".php";

    public function loadClass(string $classname)
    {   $classname = str_replace("app\\", ROOT_DIR, $classname);
        $filename = str_replace('\\', '/', "{$classname}{$this->fileExrention}"); 
        if(file_exists($filename)) {
            require $filename;
            return true;
        }
    return false;
    }
}