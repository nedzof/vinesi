<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 18/12/2018
 * Time: 12:40
 */

namespace domain;

use DateTime;

class Invoice
{

    protected $invoiceid;
    private $invoicetype;
    private $invoiceamount;
    private $invoicestartdate;
    private $invoicelease;
    private $invoicepaid;

    /**
     * @param mixed $invoiceid
     */
    public function getInvoiceid()
    {
        return $this->invoiceid;
    }

    /**
     * @return mixed
     */
    public function getInvoicetype()
    {
        return $this->invoicetype;
    }

    /**
     * @param mixed $invoicetype
     */
    public function setInvoicetype($invoicetype) :void
    {
        $this->invoicetype = $invoicetype;
    }

    /**
     * @return mixed
     */
    public function getInvoiceamount()
    {
        return $this->invoiceamount;
    }

    /**
     * @param mixed $invoiceamount
     */
    public function setInvoiceamount($invoiceamount): void
    {
        $this->invoiceamount = $invoiceamount;
    }

    /**
     * @return mixed
     */
    /**
     * @return mixed
     */
    public function getInvoicestartdate($b = true)
    {
        //Boolean true if to display on table
        //Boolena false if to insert in database
        $timestamp = $this->invoicestartdate;
        $date = true;
        if ($b) {
            $date = strftime('%Y-%m-%d', strtotime($timestamp));
        } else {
            $date = strftime('%Y-%m-%d %H:%M:%S.%f', strtotime($timestamp));
        }


        // $time = date('Gi.s', $timestamp);
        return $date;
    }

    /**
     * @return mixed
     */
    public function getInvoiceenddate()
    {

        $date = strtotime("+30 days", strtotime($this->invoicestartdate));
        return date("Y-m-d", $date);

    }


    /**
     * @return mixed
     */
    public function getInvoiceleaseid()
    {
        return $this->invoicelease;
    }

    /**
     * @param mixed $invoicelease
     */
    public function setInvoiceleaseid($invoicelease): void
    {
        $this->invoicelease = $invoicelease;
    }

    public function getInvoicedaysleft()
    {

        $datetime1 = new DateTime();
        $datetime2 = new DateTime($this->getInvoiceenddate());
        $interval = $datetime1->diff($datetime2);
        $difference = $interval->format('%R%a days');
        if ($difference < 0) {
            return 'Expired since ' . $difference;
        } else {
            return $difference;
        }

    }

    /**
     * @return mixed
     */
    public function getInvoicepaid()
    {
        return $this->invoicepaid;
    }

    /**
     * @param mixed $invoicepaid
     */
    public function setInvoicepaid($invoicepaid): void
    {
        $this->invoicepaid = $invoicepaid;
    }


}