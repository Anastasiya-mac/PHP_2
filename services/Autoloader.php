<?php
namespace services;

class Autoloader
{
    public $paths = [
        'models',
        'services'
    ];

    public function loadClass(string $classname)
    {
        $filename = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT'] . "/myFolder/{$classname}.php");
        if(file_exists($filename)) {
            require $filename;
            return true;
        }
    return false;
    }
}