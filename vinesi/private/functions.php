<?php
/**
 * Created by PhpStorm.
 * User: nedzo
 * Date: 21.11.18
 * Time: 13:35
 */

include ('initialize.php');

function url_for ($script_path) {
    //adding leading / if not here
    if ($script_path[0] != '/'){
        $script_path = "/" . $script_path;
    }

    $_wwwRoot = WWW_ROOT . $script_path;
    return $_wwwRoot;
}

echo WWW_ROOT;
echo 'Here is from function.php';
echo url_for('files/home.php');