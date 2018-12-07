<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 07/12/2018
 * Time: 10:12
 */

class LoginController{

    public static function loginView(){
        echo (new TemplateView("login.php"))->render();
    }

    public static function newPassword(){

    }
}
