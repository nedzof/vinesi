<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 07/12/2018
 * Time: 10:58
 */
require_once("config/Autoloader.php");
use router\Router;
use Controller\AuthController;
use Controller\LoginController;
use http\HTTPException;

ini_set( 'session.cookie_httponly', 1 );
session_start();

$authFunction = function () {
    if (AuthController::authenticate())
        return true;
    Router::redirect("/login");
    return false;
};

//Login actions
Router::route("GET", "/login", function () {
    LoginController::loginView();
});

Router::route("POST", "/login", function (){
    AuthController::login();
    Router::redirect("/menu");
});

//Menu actions
Router::route( "GET", "/menu", function (){
    Router::redirect("/tenancies");
});

Router::route("GET", "/menu", function () {
    Router::redirect("/expenses_tbl");
});

Router::route("GET", "/menu", function () {
    Router::redirect("/controlling");
});

Router::route("GET", "/menu", function () {
    Router::redirect("/computation_tbl");
});
//Tenancies/leases actions

//Computation actions
Router::route("GET", "/computation_tbl", function (){

});