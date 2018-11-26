<?php
/**
 * Created by PhpStorm.
 * User: Nedzo
 * Date: 21.11.2018
 * Time: 09:27
 */

include ('dbh.php');

function getExpenseTable(): string
{
    $sql = "SELECT * FROM expensetable";
    return $sql;
}


function getLeaseTable(): string
{
    $sql = "SELECT * FROM leasetable";
    return $sql;
}

function getLeaseTableID($key): string
{
    $sql = "SELECT * FROM leasetable WHERE leaseID = $key";
    return $sql;
}

function getInvoiceTable(): string
{
    $sql = "SELECT * FROM invoicetable";
    return $sql;
}