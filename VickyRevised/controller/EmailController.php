<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 01.11.2017
 * Time: 13:51
 */

namespace controller;

use dao\ExpenseDAO;
use dao\InvoiceDAO;
use dao\LeaseDAO;
use service\AuthServiceImpl;
use service\CustomerServiceImpl;
use service\EmailServiceClient;
use view\TemplateView;

class EmailController
{
    public static function sendMeMyLeases()
    {
        $emailView = new TemplateView("lease_PDF.php");
        $emailView->leasing = (new LeaseDAO())->getAllLeases();
        return EmailServiceClient::sendEmail(AuthServiceImpl::getInstance()->readUser()->getUseremail(), "My current customers", $emailView->render());
    }

    public static function sendMeMyExpenses()
    {
        $emailView = new TemplateView("expense_PDF.php");
        $emailView->spending = (new ExpenseDAO())->getAllExpenses();
        return EmailServiceClient::sendEmail(AuthServiceImpl::getInstance()->readUser()->getUseremail(), "My current customers", $emailView->render());
    }

    public static function sendMeMyInvoices()
    {
        $emailView = new TemplateView("invoice_PDF.php");
        $emailView->invoicing = (new InvoiceDAO())->getAllInvoice();
        return EmailServiceClient::sendEmail(AuthServiceImpl::getInstance()->readUser()->getUseremail(), "My current customers", $emailView->render());
    }
}