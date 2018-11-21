<?php
/**
 * Created by PhpStorm.
 * User: nedzo
 * Date: 21.11.18
 * Time: 13:35
 */

function url_for ($script_path) {
    //adding leading / if not here
    if ($script_path[0] != '/'){
        $script_path = "/" . $script_path;
    }

    return WWW_ROOT . $script_path;
}