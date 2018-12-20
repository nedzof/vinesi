<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 18/12/2018
 * Time: 12:41
 */

namespace service;


use dao\InvoiceDAO;
use domain\Invoice;

class InvoiceServiceImpl
{

    public function createInvoice(Invoice $invoice)
    {
        $invoiceDAO = new InvoiceDAO();
        return $invoiceDAO->createInvoice($invoice);

    }

    public function readInvoice($invoiceId)
    {
        $invoiceDAO = new InvoiceDAO();
        return $invoiceDAO->readById($invoiceId);

    }


    public function updateInvoice(Invoice $invoice)
    {
        $invoiceDAO = new InvoiceDAO();
        return $invoiceDAO->update($invoice);

    }

    public function deleteInvoice($invoiceId)
    {
        $invoiceDAO = new InvoiceDAO();
        return $invoiceDAO->delete($invoiceId);

    }

    public function findAllInvoice()
    {

        $invoiceDAO = new InvoiceDAO();
        return $invoiceDAO->getAllInvoice();
    }


    public function findInvoiceById($id)
    {
        $invoiceDAO = new InvoiceDAO();
        return $invoiceDAO->getInvoiceById($id);

    }

    public function billTenantsbyExpense()
    {

        // get sum of all expenses Amount
        $expensesSum = (new ExpenseServiceImpl())->getExpenseSumImpl();

        // get array of all tenants
        $tenantDetails = (new TenantServiceImpl())->getAllTenantDetails();

        //echo '<pre>';
        //print_r($tenantDetails);die;

        $tenantAmount = count($tenantDetails);

        // calculate average
        $averageExpenseAmount = intval($expensesSum / $tenantAmount);

        $invoiceDAO = new InvoiceDAO();
        $mydate = date("Y-01-01");

        for ($i = 0; $i < $tenantAmount; $i++) {
            $leaseID = (new LeaseServiceImpl())->getLeaseIDfromTenantID($tenantDetails[$i]['tenantid']);
            $inv = new Invoice();
            $inv->setInvoiceamount($averageExpenseAmount);
            $inv->setInvoicepaid(0);
            $inv->setInvoiceleaseid($leaseID);
            $inv->setInvoicetype('Annual Expense');
            $inv->setInvoicestartdate($mydate);
            $invoiceDAO->createInvoice($inv);
        }


    }

    public function invoiceAmountOfMonth()
    {
        $invoiceDAO = new InvoiceDAO();
        $invoiceDAO->getAllInvoiceAmountsOfMonth();


    }

    public function billTenantbyRentImpl()
    {

        $leaseDetails = (new LeaseServiceImpl())->findAllLeases();
        $leaseAmount = count($leaseDetails);
        $mydate = date("Y-m-01");


        for ($i = 0; $i < $leaseAmount; $i++) {
            $leaseID = $leaseDetails[$i]['leaseid'];
            $leasemonthlyrent = (new LeaseServiceImpl())->getRentAmountfromLeaseID($leaseID);
            $inv = new Invoice();
            $inv->setInvoiceamount($leasemonthlyrent);
            $inv->setInvoicepaid(0);
            $inv->setInvoiceleaseid($leaseID);
            $inv->setInvoicetype('Monthly Rent');
            $inv->setInvoicestartdate($mydate);
            (new InvoiceDAO())->createInvoice($inv);

        }


    }

}