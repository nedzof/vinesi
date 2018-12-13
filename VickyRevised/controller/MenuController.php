<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 07/12/2018
 * Time: 16:49
 */

namespace controller;

use view\LayoutRendering;
use view\TemplateView;

class MenuController
{
    public static function menuView()
    {

        //echo (new TemplateView("menu.php"))->render();
        $contentView = new TemplateView("menu.php");
        LayoutRendering::basicLayout($contentView);
    }
}