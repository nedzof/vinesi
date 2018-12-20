<?php

namespace controller;

use dao\ExpenseDAO;
use dao\InvoiceDAO;
use dao\LeaseDAO;
use service\AuthServiceImpl;
use service\EmailServiceClient;
use view\TemplateView;

class EmailController
{
    public static function sendMeMyLeases()
    {
        $emailView = new TemplateView("lease_PDF.php");
        $emailView->leasing = (new LeaseDAO())->getAllLeases();
        return EmailServiceClient::sendEmail(AuthServiceImpl::getInstance()->readUser()->getUseremail(), "My current leases", $emailView->render());
    }

    public static function sendMeMyExpenses()
    {
        $emailView = new TemplateView("expense_PDF.php");
        $emailView->spending = (new ExpenseDAO())->getAllExpenses();
        return EmailServiceClient::sendEmail(AuthServiceImpl::getInstance()->readUser()->getUseremail(), "My current expenses", $emailView->render());
    }

    public static function sendMeMyInvoices()
    {
        $emailView = new TemplateView("invoice_PDF.php");
        $emailView->invoicing = (new InvoiceDAO())->getAllInvoice();
        return EmailServiceClient::sendEmail(AuthServiceImpl::getInstance()->readUser()->getUseremail(), "My current invoices", $emailView->render());
    }
}