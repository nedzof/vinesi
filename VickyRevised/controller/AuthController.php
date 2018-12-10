<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 07/12/2018
 * Time: 16:39
 */

namespace controller;

use service\AuthServiceImpl;

class AuthController{
    public static function authenticate(){
        if (isset($_SESSION["login"])) {
            if(AuthServiceImpl::getInstance()->validateToken($_SESSION["login"]["token"])) {
                return true;
            }
        }
        return false;
    }

    public static function login(){
        $authService = AuthServiceImpl::getInstance();
        if ($authService->verifyUser($_POST["email"], $_POST["password"])) {
            session_regenerate_id(true);
            $_SESSION["login"]["token"] = $authService->issueToken();
        }
    }
}