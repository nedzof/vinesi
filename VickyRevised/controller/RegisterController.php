<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 07/12/2018
 * Time: 10:12
 */

namespace controller;

use view\TemplateView;

class RegisterController
{

    public static function registerView()
    {
        echo (new TemplateView("register.php"))->render();
    }

}
