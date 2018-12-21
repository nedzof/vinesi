<?php

require_once("config/Autoloader.php");

use controller\AgentPasswordResetController;
use controller\AuthController;
use controller\EmailController;
use controller\ErrorController;
use controller\ExpenseController;
use controller\InvoiceController;
use controller\LeaseController;
use controller\LoginController;
use controller\MenuController;
use controller\MonitoringController;
use controller\PDFController;
use controller\UserController;
use controller\UserPasswordResetController;
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

####################################################################################################

/*
 * First page Routing
 */
Router::route("GET", "/", function () {
    Router::redirect("/login");
});

/*
 * Login Routing
 */
Router::route("GET", "/login", function () {
    LoginController::loginView();

});


Router::route("POST", "/login", function () {
    AuthController::login();
    Router::redirect("/menu");
});

Router::route("GET", "/logout", function () {
    AuthController::logout();
    Router::redirect("/login");
});

####################################################################################################

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
####################################################################################################

/*
 * Monitoring
 */

Router::route("GET", "/monitoring", function () {
    MonitoringController::monitoringView();
});

####################################################################################################
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

Router::route("GET", "/expense/delete", function () {
    if (ExpenseController::deleteExpense()) {
        Router::redirect("/expense");
    }
});

####################################################################################################

//Invoice Routing
Router::route("GET", "/invoice", function () {
    InvoiceController::invoiceView();
});

Router::route("GET", "/invoice/getInvoiceAmountOfMonth", function () {
    InvoiceController::invoiceAmountOfMonth();
});


Router::route("GET", "/invoice/update", function () {
    InvoiceController::createInvoiceForm();

});

Router::route("POST", "/invoice/update", function () {
    if (InvoiceController::invoiceUpdateOrCreate()) {
        Router::redirect("/invoice");
    };
});

Router::route("GET", "/invoice/create", function () {
    InvoiceController::createInvoiceForm();

});


Router::route("POST", "/invoice/create", function () {
    if (InvoiceController::invoiceUpdateOrCreate()) {
        Router::redirect("/invoice");
        echo "<script>alert(\"CREATED\")</script>";
    }
});

Router::route("GET", "/invoice/delete", function () {
    if (InvoiceController::deleteInvoice()) {
        Router::redirect("/invoice");
    }
});

Router::route("GET", "/invoice/generateaverageinvoice", function () {
    InvoiceController::generateaverageinvoices();
    Router::redirect("/invoice");

});

Router::route("GET", "/invoice/billtenantbyrent", function () {
    InvoiceController::billTenantbyRent();
    Router::redirect("/invoice");
});

/*
 * Menu Routing
 */
Router::route("GET", "/menu", function () {
    MenuController::menuView();
});

/*
 * PDF
 */
Router::route("GET", "/lease/pdf", function () {
    PDFController::generatePDFlease();
});

Router::route("GET", "/expense/pdf", function () {
    PDFController::generatePDFexpense();
});

Router::route("GET", "/invoice/pdf", function () {
    PDFController::generatePDFinvoice();
});
/*
 * Email
 */
Router::route_auth("GET", "/lease/email", $authFunction, function () {
    EmailController::sendMeMyLeases();
    Router::redirect("/menu");
});

Router::route_auth("GET", "/expense/email", $authFunction, function () {
    EmailController::sendMeMyExpenses();
    Router::redirect("/expense");
});

Router::route_auth("GET", "/invoice/email", $authFunction, function () {
    EmailController::sendMeMyInvoices();
    Router::redirect("/invoice");
});
/*
 * Password
 */
Router::route("POST", "/password/request", function () {
    UserPasswordResetController::resetEmail();
    Router::redirect("/login");
});

Router::route("GET", "/password/request", function () {
    UserPasswordResetController::requestView();
});

Router::route("POST", "/password/reset", function () {
    UserPasswordResetController::reset();
    Router::redirect("/login");
});

Router::route("GET", "/password/reset", function () {
    UserPasswordResetController::resetView();
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