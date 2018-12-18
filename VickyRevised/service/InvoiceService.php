<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 18/12/2018
 * Time: 12:41
 */
namespace service;

use domain\Invoice;

interface InvoiceService{

    /**
     * @access public
     * @param Invoice invoice
     * @return Invoice
     * @ParamType Invoice invoice
     * @ReturnType Invoice
     */
    public function createInvoice(Invoice $invoice);

    /**
     * @access public
     * @param int invoiceId
     * @return Invoice
     * @ParamType invoiceId int
     * @ReturnType Invoice
     */
    public function readInvoice($invoiceId);

    /**
     * @access public
     * @param Invoice invoice
     * @return Invoice
     * @ParamType Invoice invoice
     * @ReturnType Invoice
     */
    public function updateInvoice(Invoice $invoice);

    /**
     * @access public
     * @param int invoiceId
     * @ParamType invoiceId int
     */
    public function deleteInvoice($invoiceId);

    /**
     * @access public
     * @return Invoice[]
     * @ReturnType Invoice[]
     */
    public function findAllInvoice();

}