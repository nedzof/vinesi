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
use service\PDFServiceClient;
use view\TemplateView;

class PDFController
{

    public static function generatePDFlease()
    {
        $pdfView = new TemplateView("lease_PDF.php");
        $pdfView->leasing = (new LeaseDAO())->getAllLeases();
        $result = PDFServiceClient::sendPDF($pdfView->render());
        header("Content-Type: application/pdf", NULL, 200);
        echo $result;
    }

    public static function generatePDFexpense()
    {
        $pdfView = new TemplateView("expense_PDF.php");
        $pdfView->spending = (new ExpenseDAO())->getAllExpenses();
        $result = PDFServiceClient::sendPDF($pdfView->render());
        header("Content-Type: application/pdf", NULL, 200);
        echo $result;
    }

    public static function generatePDFinvoice()
    {
        $pdfView = new TemplateView("invoice_PDF.php");
        $pdfView->invoicing = (new InvoiceDAO())->getAllInvoice();
        $result = PDFServiceClient::sendPDF($pdfView->render());
        header("Content-Type: application/pdf", NULL, 200);
        echo $result;
    }

}