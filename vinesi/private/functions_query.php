<?php
/**
 * Created by PhpStorm.
 * User: Nedzo
 * Date: 21.11.2018
 * Time: 09:27
 */

require_once('initialize.php');

/*
 * • PDOStatement::execute is used to execute an INSERT, an UPDATE, or DELETE query.
• PDOStatement::fetch is used to retrieve one row of data from the database.
• PDOStatement::fetchAll is used to retrieve multiple rows of data from the database.
• PDO::prepare prepares an SQL query to be executed, creating a so-called prepared statement.
 */

function getExpenseTable()
{
    global $db;
    $sql = "SELECT * FROM expensetable";
    $result = mysqli_query($db, $sql);
    return $result;
}

function getPropertyByIds()
{
    global $db;
    $sql = mysqli_query($db, "SELECT propertyID, propertyLeasedBy FROM propertytable ORDER BY propertyID;");
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function getLeaseTable()
{
    global $db;
    $sql = "SELECT * FROM leasetable";
    $statement_handler = $db->prepare($sql);
    $statement_handler->execute();
    $result = $statement_handler->fetchAll(PDO::FETCH_ASSOC);
    confirm_result_set($result);
    return $result;
}

function getLeaseTable_By_ID($key)
{
    global $db;
    $sql = "SELECT * FROM leasetable WHERE leaseid=  $key ";
    $statement_handler = $db->prepare($sql);
    $statement_handler->execute();
    $result = $statement_handler->fetchAll(PDO::FETCH_ASSOC);
    confirm_result_set($result);
    return $result; //return assoc array;
}

function deleteLeaseTable_By_ID($key)
{
    global $db;
    $sql = "DELETE FROM expensetable WHERE expenseID =' " . $key . "'";
    $result = mysqli_query($db, $sql);
    mysqli_free_result($result);

}

function getTenantLastNameById($id){

    global $db;
    $sql = "SELECT tenantlastname FROM tenanttable WHERE tenantid = $id";
    $statement_handler = $db->prepare($sql);
    $statement_handler->execute();
    $result = $statement_handler->fetch(PDO::FETCH_ASSOC);
    confirm_result_set($result);
    return $result;
}

function insertLeaseTable($leaseMonthlyRent, $leaseUtilities, $leasePaymentMethod, $leaseDeposit, $leaseStart, $leaseEnd, $propertytable_propertyID, $tenanttable_tenantID)
{
    global $db;
    $sql = "INSERT INTO leasetable " ;
    $sql .= "(leaseMonthlyRent, leaseUtilities, leasePaymentMethod, leaseDeposit, leaseStart, leaseEnd, propertytable_propertyID, tenanttable_tenantID) ";
    $sql .= "VALUES (";
    $sql .= "'" . $leaseMonthlyRent . "', ";
    $sql .= "'" . $leaseUtilities . "', ";
    $sql .= "'" . $leasePaymentMethod . "' ,";
    $sql .= "'" . $leaseDeposit . "',";
    $sql .= "'" . $leaseStart . "', ";
    $sql .= "'" . $leaseEnd . "', ";
    $sql .= "'" . $propertytable_propertyID . "', ";
    $sql .= "'" . $tenanttable_tenantID . "'";
    $sql .= ")";

    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function updateLeaseTable($entry)
{
    global $db;

    $sql = "UPDATE leasetable SET ";
    $sql .= "leaseMonthlyRent='" . $entry['leaseMonthlyRent'] . "', ";
    $sql .= "leaseUtilities='" . $entry['leaseUtilities'] . "', ";
    $sql .= "leasePaymentMethod='" . $entry['leasePaymentMethod'] . "', ";
    $sql .= "leaseDeposit='" . $entry['leaseDeposit'] . "', ";
    $sql .= "leaseStart='" . $entry['leaseStart'] . "', ";
    $sql .= "leaseEnd='" . $entry['leaseEnd'] . "', ";
    $sql .= "propertytable_propertyID='" . $entry['propertytable_propertyID'] . "', ";
    $sql .= "tenanttable_tenantID='" . $entry['tenanttable_tenantID'] . "' ";
    $sql .= "WHERE leaseID='" . $entry['leaseID'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    } else {
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}


function insertUserTable($userLastName, $userEmail, $userhashedpassword, $userstatus){

    global $db;

    $sql = "INSERT INTO public.usertable (userid, userlastname, useremail, userhashedpassword, userstatus) VALUES (DEFAULT, '$userLastName', '$userEmail', '$userhashedpassword', $userstatus)";
   // $db->exec($sql);

    $statement_handler = $db->prepare($sql);
    $statement_handler->execute();
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