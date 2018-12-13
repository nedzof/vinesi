<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 05/12/2018
 * Time: 10:27
 */

namespace config;

class Autoloader
{
    public static function autoload($str) {
        $newPath = str_replace('\\', '/', $str);
        $fileName = $newPath . '.php';

        if (file_exists($fileName)) {
            include_once($fileName);
        } else {
            return false;
        }
    }
}

spl_autoload_register('configurations\Autoloader::autoload');