<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 18/12/2018
 * Time: 12:41
 */

namespace dao;

use domain\Invoice;
use Exception;
use PDO;


class InvoiceDAO extends BasicDAO
{
    public function createInvoice(Invoice $invoice)
    {

        try {
            $sql = "INSERT INTO invoicetable (invoiceid, invoicetype, invoiceamount, invoiceleaseid, invoicestartdate, invoicepaid) 
            VALUES (DEFAULT, :invoicetype, :invoiceamount, :invoiceleaseid, :invoicestartdate, :invoicepaid)";
            $stmt = $this->pdoInstance->prepare($sql);

            $stmt->bindValue(':invoicetype', $invoice->getInvoicetype());
            $stmt->bindValue(':invoiceamount', $invoice->getInvoiceamount());
            $stmt->bindValue(':invoiceleaseid', $invoice->getInvoiceleaseid());
            $stmt->bindValue(':invoicestartdate', $invoice->getInvoicestartdate());
            $stmt->bindValue(':invoicepaid', $invoice->getInvoicepaid());
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
                invoiceleaseid= :invoiceleaseid,
                invoicestartdate = :invoicestartdate,
                invoicepaid = :invoicepaid
                WHERE invoiceid = :id');
            $stmt->bindValue(':invoicetype', $invoice->getInvoicetype());
            $stmt->bindValue(':invoiceamount', $invoice->getInvoiceamount());
            $stmt->bindValue(':invoiceleaseid', $invoice->getInvoiceleaseid());
            $stmt->bindValue(':invoicestartdate', $invoice->getInvoicestartdate(true));
            $stmt->bindValue(':invoicepaid', $invoice->getInvoicepaid());
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

    public function billTenantsbyExpense($billamount, $count)
    {
        for ($i = 1; $i = $count; $i++) {
            $inv = new Invoice();
            $inv->setInvoiceamount($billamount);
            $inv->setInvoicepaid(0);
            $inv->setInvoiceleaseid('HAHHA');
            $inv->setInvoicetype('Rent');
            $inv->setInvoicestartdate(date("Y-m-d"));
        }
    }

    public function getAllInvoiceAmountsOfMonth()
    {
        $sql = "SELECT SUM(invoiceamount) AS suminvoiceamount, invoiceleaseid FROM invoicetable WHERE ( EXTRACT( MONTH FROM invoicestartdate) = EXTRACT ( MONTH FROM NOW() ) ) GROUP BY invoiceleaseid;";
        $stmt = $this->pdoInstance->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results);
        return null;
    }
}