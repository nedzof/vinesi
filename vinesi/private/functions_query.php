<?php
/**
 * Created by PhpStorm.
 * User: Nedzo
 * Date: 21.11.2018
 * Time: 09:27
 */

require_once('initialize.php');

function getExpenseTable()
{
    global $db;
    $sql = "SELECT * FROM 'expensetable'";
    $result = mysqli_query($db, $sql);
    return $result;
}


function getLeaseTable()
{
    global $db;
    $sql = "SELECT * FROM leasetable";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function getLeaseTable_By_ID($key)
{
    global $db;
    $sql = "SELECT * FROM leasetable WHERE leaseID=' ".$key ."'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $row; //return assoc array;
}

function deleteLeaseTable_By_ID($key)
{
    global $db;
    $sql = "DELETE FROM expensetable WHERE expenseID =' " . $key . "'";
    $result = mysqli_query($db, $sql);
    mysqli_free_result($result);

}

function insertLeaseTable($key)
    {
        global $db;
        $sql = "DELETE FROM expensetable WHERE expenseID =' ".$key ."'";
        $result = mysqli_query($db, $sql);
        mysqli_free_result($result);
    }



function getInvoiceTable()
{
    $sql = "SELECT * FROM invoicetable";
    return $sql;
}

function getPropertyTable()
{
    $sql = "SELECT * FROM propertytable";
    return $sql;
}

function getUserTable()
{
    $sql = "SELECT * FROM usertable";
    return $sql;
}