<?php
include_once 'config.php';

function mb_ucfirst($string, $enc = 'UTF-8')
{
    return mb_strtoupper(mb_substr($string, 0, 1, $enc), $enc) .
        mb_substr($string, 1, mb_strlen($string, $enc), $enc);
}

spl_autoload_register(function ($class){
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $classPath = 'vendor'.DIRECTORY_SEPARATOR.$class.'.php';
    if(file_exists($classPath)){
        include_once $classPath;
        return true;
    }
    return false;
});

Route::init();