<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 18/12/2018
 * Time: 12:40
 */

namespace domain;

use http\HTTPException;

class Invoice
{

    protected $invoiceid;
    private $invoicetype;
    private $invoiceamount;
    private $invoicestartdate;
    private $invoicepaiddate;
    private $invoicecreator;
    private $invoicelease;

    /**
     * @return mixed
     */
    public function getInvoiceid()
    {
        return $this->invoiceid;
    }

    /**
     * @param mixed $invoiceid
     */
    public function setInvoiceid($invoiceid) :void
    {
        $this->invoiceid = $invoiceid;
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
    public function getInvocieamount()
    {
        return $this->invoiceamount;
    }

    /**
     * @param mixed $invoiceamount
     */
    public function setInvocieamount($invoiceamount) :void
    {
        $this->invoiceamount = $invoiceamount;
    }

    /**
     * @return mixed
     */
    public function getInvoicestartdate($b)
    {
        //Boolean true if to display on table
        //Boolena false if to insert in database
        $timestamp = $this->invoicestartdate;
        $date = null;
        if ($b) {
            $date = strftime('%Y-%m-%d', strtotime($timestamp));
        } else {
            $date = strftime('%Y-%m-%d %H:%M:%S.%f', strtotime($timestamp));
        }


        // $time = date('Gi.s', $timestamp);
        return $date;
    }

    /**
     * @param mixed $invoicestartdate
     */
    public function setInvoicestartdate($invoicestartdate) :void
    {
        $this->invoicestartdate = $invoicestartdate;
    }

    /**
     * @return mixed
     */
    public function getInvoicepaiddate($b)
    {
        //Boolean true if to display on table
        //Boolena false if to insert in database
        $timestamp = $this->invoicepaiddate;
        $date = null;
        if ($b) {
            $date = strftime('%Y-%m-%d', strtotime($timestamp));
        } else {
            $date = strftime('%Y-%m-%d %H:%M:%S.%f', strtotime($timestamp));
        }


        // $time = date('Gi.s', $timestamp);
        return $date;
    }

    /**
     * @param mixed $invoicepaiddate
     */
    public function setInvoicepaiddate($invoicepaiddate) :void
    {
        $this->invoicepaiddate = $invoicepaiddate;
    }

    /**
     * @return mixed
     */
    public function getInvoicecreator()
    {
        return $this->invoicecreator;
    }

    /**
     * @param mixed invoicecreator
     */
    public function setInvoicecreator($invoicecreator) :void
    {
        $this->invoicecreator = $invoicecreator;
    }

    /**
     * @return mixed
     */
    public function getInvoicelease()
    {
        return $this->invoicelease;
    }

    /**
     * @param mixed $invoicelease
     */
    public function setInvoicelease($invoicelease) :void
    {
        $this->invoicelease = $invoicelease;
    }




}