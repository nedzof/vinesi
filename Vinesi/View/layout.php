<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 19/11/2018
 * Time: 16:07
 */
function layoutAddContent($content) {
    require_once ("header.php");
    require_once ($content);
    require_once ("footer.php");
}