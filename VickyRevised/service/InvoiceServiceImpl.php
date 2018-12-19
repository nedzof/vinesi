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

class InvoiceServiceImpl implements InvoiceService
{
    /**
     * @access public
     * @param Invoice invoice
     * @return Invoice
     * @ParamType Invoice invoice
     * @ReturnType Invoice
     * @throws HTTPException
     */
    public function createInvoice(Invoice $invoice){
        //if(AuthServiceImpl::getInstance()->verifyAuth()) {
        $invoiceDAO = new InvoiceDAO();
        //$invoice->set(AuthServiceImpl::getInstance()->getCurrentUserId());
        return $invoiceDAO->create($invoice);
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
    public function readInvoice($invoiceId){
        if(AuthServiceImpl::getInstance()->verifyAuth()) {
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
    public function updateInvoice(Invoice $invoice){
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
    public function deleteInvoice($invoiceId){
        //if(AuthServiceImpl::getInstance()->verifyAuth()) {
        $invoiceDAO = new InvoiceDAO();
        return $invoiceDAO->delete($invoiceId);
        //}
    }

    /**
     * @access public
     * @return Invoice[]
     * @ReturnType Invoice[]
     * @throws HTTPException
     */
    public function findAllInvoice(){

        if(AuthServiceImpl::getInstance()->verifyAuth()){
            $invoiceDAO = new InvoiceDAO();
            return $invoiceDAO->getAllInvoice();
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    public function findInvoiceById($id)
    {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $invoiceDAO = new InvoiceDAO();
            return $invoiceDAO->getInvoiceById($id);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    public function billTenantsbyExpense($month)
    {
        $sum = (new ExpenseServiceImpl())->getExpenseSumImpl();
        $count = (new TenantServiceImpl())->getNumberOfTenantsImpl();
        $billamount = $sum / $count;

        $invoiceDAO = new InvoiceDAO();
        $invoiceArray = [];
        for ($i = 1; $i = $count; $i++) {
            $inv = new Invoice();
            $inv->setInvoiceamount($billamount);
            $inv->setInvoicepaid(0);
            $inv->setInvoiceleaseid('HAHHA');
            $inv->setInvoicetype('Rent');
            $inv->setInvoicestartdate(date($month));
            $invoiceDAO->createInvoice($inv);
        }

    }

}