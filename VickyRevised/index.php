<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 12.09.2017
 * Time: 21:30
 */
require_once("config/Autoloader.php");

use controller\AuthController;
use controller\ErrorController;
use controller\LeaseController;
use controller\ExpenseController;
use controller\LoginController;
use controller\MenuController;
use controller\RegisterController;
use controller\UserController;
use http\HTTPException;
use http\HTTPHeader;
use http\HTTPStatusCode;
use router\Router;
use service\ServiceEndpoint;

ini_set('session.cookie_httponly', 1);
session_start();

$authFunction = function () {
    if (AuthController::authenticate())
        return true;
    Router::redirect("/login");
    return false;
};

/*
 * Login Routing
 */
Router::route("GET", "/login", function () {
    LoginController::loginView();

});

Router::route("POST", "/login", function () {
    if (AuthController::login() == true) {
        Router::redirect("/menu");
    } else {
        echo "<script>alert(\"invalid username/password.  Please try again\")</script>";
        echo "<script>window.location='login'</script>";

    }
});

Router::route("GET", "/logout", function () {
    AuthController::logout();
    Router::redirect("/login");
});


/*
 * Register Routing
 */
Router::route("GET", "/register", function () {
    RegisterController::registerView();
});

Router::route("POST", "/register", function () {
    if (UserController::register())
        Router::redirect("/logout");
});


/*
 *  Lease
 */

Router::route("GET", "/lease", function () {
    LeaseController::leaseView();

});

Router::route("GET", "/lease/update", function () {
    LeaseController::createForm();

});

Router::route("POST", "/lease/update", function () {
    if (LeaseController::leaseUpdateOrCreate()) {
        Router::redirect("/lease");

    };
    // Router::redirect("/lease");


});

Router::route("GET", "/lease/create", function () {
    LeaseController::createForm();

});


Router::route("POST", "/lease/create", function () {
    if (LeaseController::leaseUpdateOrCreate()) {
        Router::redirect("/lease");
    }
});

Router::route("GET", "/lease/delete", function () {
    if (LeaseController::deleteLease()) {
        Router::redirect("/lease");
    }
});

Router::route("DELETE", "/lease/delete/{id}", function ($id) {
    echo "<script>alert(\"IN\")</script>";
    if (LeaseController::deleteLease($id)) {
        Router::redirect("/lease");
    }
});

/*
 *  Expense Routing
 */

Router::route("GET", "/expense", function () {
    ExpenseController::expenseView();
});

Router::route("GET", "/expense/update", function () {
    ExpenseController::createExpenseForm();

    });

Router::route("POST", "/expense/update", function () {
        if (ExpenseController::expenseUpdateOrCreate()) {
        Router::redirect("/expense");
        };
    });

Router::route("GET", "/expense/create", function () {
    ExpenseController::createExpenseForm();

    });

Router::route("POST", "/expense/create", function () {
    if (ExpenseController::expenseUpdateOrCreate()) {
        Router::redirect("/expense");
        echo "<script>alert(\"CREATED\")</script>";
    }
});

Router::route("POST", "/expense/delete", function ($id) {
    ExpenseController::deleteExpense($id);
    Router::redirect("/expense");
    echo "<script>alert(\"DELETED\")</script>";
    });

Router::route("DELETE", "/expense/delete/{id}", function ($id) {
     if (ExpenseController::deleteExpense($id)) {
        Router::redirect("/expense");
     }
    });



/*
 * Menu Routing
 */
Router::route("GET", "/menu", function () {
    MenuController::menuView();
});


try {
    HTTPHeader::setHeader("Access-Control-Allow-Origin: *");
    HTTPHeader::setHeader("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS, HEAD");
    HTTPHeader::setHeader("Access-Control-Allow-Headers: Authorization, Location, Origin, Content-Type, X-Requested-With");
    if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
        HTTPHeader::setStatusHeader(HTTPStatusCode::HTTP_204_NO_CONTENT);
    } else {
        Router::call_route($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO']);
    }
} catch (HTTPException $exception) {
    $exception->getHeader();
    ErrorController::show404();
}