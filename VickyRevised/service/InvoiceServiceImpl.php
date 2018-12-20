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
use http\HTTPException;
use http\HTTPStatusCode;

class InvoiceServiceImpl
{
    /**
     * @access public
     * @param Invoice invoice
     * @return Invoice
     * @ParamType Invoice invoice
     * @ReturnType Invoice
     * @throws HTTPException
     */
    public function createInvoice(Invoice $invoice)
    {
        //if(AuthServiceImpl::getInstance()->verifyAuth()) {
        $invoiceDAO = new InvoiceDAO();
        //$invoice->set(AuthServiceImpl::getInstance()->getCurrentUserId());
        return $invoiceDAO->createInvoice($invoice);
        //}
        //throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @param int invoiceId
     * @return Invoice
     * @ParamType invoiceId int
     * @ReturnType Invoice
     * @throws HTTPException
     */
    public function readInvoice($invoiceId)
    {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $invoiceDAO = new InvoiceDAO();
            return $invoiceDAO->readById($invoiceId);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @param Invoice invoice
     * @return Invoice
     * @ParamType Invoice invoice
     * @ReturnType Invoice
     * @throws HTTPException
     */
    public function updateInvoice(Invoice $invoice)
    {
        //if (AuthServiceImpl::getInstance()->verifyAuth()) {
        $invoiceDAO = new InvoiceDAO();
        return $invoiceDAO->update($invoice);
        //}
        //throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @param int invoiceId
     * @ParamType invoiceId int
     */
    public function deleteInvoice($invoiceId)
    {
        //if(AuthServiceImpl::getInstance()->verifyAuth()) {
        $invoiceDAO = new InvoiceDAO();
        return $invoiceDAO->delete($invoiceId);
        //}
    }

    public function findAllInvoice()
    {

        // if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $invoiceDAO = new InvoiceDAO();
            return $invoiceDAO->getAllInvoice();
        //}
        //throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }


    public function findInvoiceById($id)
    {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $invoiceDAO = new InvoiceDAO();
            return $invoiceDAO->getInvoiceById($id);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
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
            $inv->setInvoicetype('Yeary Expenses');
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

            echo '<pre>', print_r($leaseDetails, 1), '</pre>';

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