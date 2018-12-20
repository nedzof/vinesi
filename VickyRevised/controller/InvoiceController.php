<?php
namespace controller;

use dao\InvoiceDAO;
use domain\Invoice;
use http\HTTPException;
use http\HTTPStatusCode;
use service\InvoiceServiceImpl;
use view\LayoutRendering;
use view\TemplateView;

/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 07/12/2018
 * Time: 17:39
 */
class InvoiceController{
    public static function InvoiceView(){
        try {

            $contentView = new TemplateView("invoice.php");
            $contentView->invoices = (new InvoiceDAO())->getAllInvoice();
            LayoutRendering::basicLayout($contentView);

            /*
            $contentView = new TemplateView("lease.php");
            $contentView->leases = (new LeaseServiceImpl())->findAllLeases();
            LayoutRendering::basicLayout($contentView);
*/
        } catch (HTTPException $e) {
            HTTPStatusCode::HTTP_401_UNAUTHORIZED;

        }
    }

    public static function invoiceUpdateOrCreate(){

        try {
            $invoice = new Invoice();
            $invoice->setInvoiceid($_POST["invoiceid"] ?? null);
            $invoice->setInvoicetype($_POST["invoicetype"] ?? "");
            $invoice->setInvoiceamount($_POST["invoiceamount"] ?? 0);
            $invoice->setInvoiceleaseid($_POST["invoiceleaseid"] ?? null);
            $invoice->setInvoicestartdate($_POST["invoicestartdate"] ?? date("Y-m-d"));
            $invoice->setInvoicepaid($_POST["invoicepaid"] ?? 0);


            if ($invoice->getInvoiceid() == null) {
                return (new InvoiceServiceImpl())->createInvoice($invoice);
            } else {
                return (new InvoiceServiceImpl())->updateInvoice($invoice);

            }

        } catch (HTTPException $e) {

        }

    }
    public static function deleteInvoice(){

        $id = $_GET['id'];
        return (new InvoiceServiceImpl())->deleteInvoice($id);
    }

    public static function createInvoiceForm()
    {
        $id = $_GET["id"] ?? 0;
        try {
            $contentView = new TemplateView("invoice_form.php");
            if ($id != 0) {
                $contentView->invoices = (new InvoiceDAO())->getInvoiceById($id);
            }
            LayoutRendering::basicLayout($contentView);
        } catch (HTTPException $e) {
            HTTPStatusCode::HTTP_401_UNAUTHORIZED;
        }
    }

    public static function generateaverageinvoices()
    {
        (new InvoiceServiceImpl)->billTenantsbyExpense();
    }

    public static function invoiceAmountOfMonth()
    {
        (new InvoiceServiceImpl)->invoiceAmountOfMonth();
    }
}