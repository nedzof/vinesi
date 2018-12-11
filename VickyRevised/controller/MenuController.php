<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 07/12/2018
 * Time: 16:49
 */

namespace controller;

use view\TemplateView;

class MenuController
{
    public static function leaseView()
    {

    }

    public static function invoiceView()
    {

    }

    public static function expensesView()
    {

    }

    public static function controllingView()
    {

    }

    public static function menuView()
    {

        echo (new TemplateView("menu.php"))->render();
        // $contentView = new TemplateView("menu.php");
        // LayoutRendering::basicLayout($contentView);
    }
}