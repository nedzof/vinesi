<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 18/12/2018
 * Time: 12:41
 */

namespace dao;

use domain\Invoice;
use PDO;
use Exception;


class InvoiceDAO extends BasicDAO
{
    public function create(Invoice $invoice)
    {

        try {
            $sql = "INSERT INTO invoicetable (invoiceid, invoicetype, invoiceamount, invoicestartdate, invoicepaiddate, invoicecreator, invoicelease) 
            VALUES (DEFAULT, :invoicetype, :invoiceamount, :invoicestartdate, :invoicepaiddate, :invoicecreator, :invoicelease)";
            $stmt = $this->pdoInstance->prepare($sql);

            $stmt->bindValue(':invoicetype', $invoice->getInvoicetype());
            $stmt->bindValue(':invoiceamount', $invoice->getInvocieamount());
            $stmt->bindValue(':invoicestartdate', $invoice->getInvoicestartdate(true));
            $stmt->bindValue(':invoicepaiddate', $invoice->getInvoicepaiddate(true));
            $stmt->bindValue(':invoicecreator', $invoice->getInvoicecreator());
            $stmt->bindValue(':invoicelease', $invoice->getInvoicelease());
            $stmt->execute();
        } catch (Exception $e) {
            $a = ($invoice->getInvoiceid());
            echo "<script>alert(\"$a\")</script>";

            echo "<script>alert(\"FIX YOOO SHIT\")</script>";

            return false;
        }
        return true;

    }


    public function readById($invoiceid)
    {
        $stmt = $this->pdoInstance->prepare('SELECT * FROM invoicetable WHERE invoiceid = :id;');
        $stmt->bindValue(':id', $invoiceid);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, Invoice::class)[0];
        }
        return null;
    }

    public function readAll()
    {
        $stmt = $this->pdoInstance->prepare('SELECT * FROM invoicetable');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, Invoice::class);
            return $result;

        }
        return null;


    }

    public function update(Invoice $invoice)
    {

        try {
            $this->pdoInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->pdoInstance->prepare('
                UPDATE invoicetable SET 
                invoicetype = :invoicetype,
                invoiceamount = :invoiceamount,
                invoicestartdate= :invoicestartdate,
                invoicepaiddate= :invoicepaiddate,
                invoicecreator = :invoicecreator,
                invoicelease = :invoicelease
                WHERE invoiceid = :id');
            $stmt->bindValue(':invoicetype', $invoice->getInvoicetype());
            $stmt->bindValue(':invoiceamount', $invoice->getInvocieamount());
            $stmt->bindValue(':invoicestartdate', $invoice->getInvoicestartdate(true));
            $stmt->bindValue(':invoicepaiddate', $invoice->getInvoicepaiddate(true));
            $stmt->bindValue(':invoicecreator', $invoice->getInvoicecreator());
            $stmt->bindValue(':invoicelease', $invoice->getInvoicelease());
            $stmt->bindValue(':id', $invoice->getInvoiceid());
            $stmt->execute() or die("SQL Error in: " . $stmt->queryString . " - " . $stmt->errorInfo()[2]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }


    public function delete($invoiceid)
    {
        $stmt = $this->pdoInstance->prepare('DELETE FROM invoicetable WHERE invoiceid = :id');
        $stmt->bindValue(':id', $invoiceid);
        $stmt->execute();
        return true;
    }


    public function getAllInvoice()
    {
        $stmt = $this->pdoInstance->prepare('SELECT * FROM invoicetable ORDER BY invoiceid;');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Invoice::class);


    }

    public function getInvoiceById($invoiceid)
    {
        $stmt = $this->pdoInstance->prepare('SELECT * FROM invoicetable WHERE invoiceid = :id LIMIT 1');
        $stmt->bindValue(':id', $invoiceid);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll(\PDO::FETCH_CLASS, Invoice::class)[0];
            return $result;
        }
        return null;
    }
}