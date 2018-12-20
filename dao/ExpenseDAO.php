<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 14/12/2018
 * Time: 17:50
 */

namespace dao;


use domain\Expense;
use Exception;
use PDO;

class ExpenseDAO extends BasicDAO
{
    public function create(Expense $expense)
    {
        try {
            $sql = "INSERT INTO expensetable (expenseid, expensetype, expenseamount, expensestartdate, expensepaid) 
            VALUES (DEFAULT, :expensetype, :expenseamount, :expensestartdate, :expensepaid)";
            $stmt = $this->pdoInstance->prepare($sql);

            $stmt->bindValue(':expensetype', $expense->getExpensetype());
            $stmt->bindValue(':expenseamount', $expense->getExpenseamount());
            $stmt->bindValue(':expensestartdate', $expense->getExpensestartdate());
            $stmt->bindValue(':expensepaid', $expense->getExpensepaid());

            $stmt->execute();
        } catch (Exception $e) {
            echo "<script>alert(\"FIX YOOO SHIT\")</script>";

            return false;
        }
        return true;
    }


    public function readById($expenseid)
    {
        $stmt = $this->pdoInstance->prepare('SELECT * FROM expensetable WHERE id = :id;');
        $stmt->bindValue(':id', $expenseid);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, Expense::class)[0];
        }
        return null;
    }

    public function readAll()
    {
        $stmt = $this->pdoInstance->prepare('SELECT * FROM expensetable');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, Expense::class);
            return $result;

        }
        return null;

    }

    public function update(Expense $expense)
    {
        try {
            $this->pdoInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->pdoInstance->prepare('
        UPDATE expensetable SET
        expensetype = :expensetype,
        expenseamount = :expenseamount,
        expensestartdate = :expensestartdate,
        expensepaid = :expensepaid 
        WHERE expenseid = :id');
            $stmt->bindValue(':expensetype', $expense->getExpensetype());
            $stmt->bindValue(':expenseamount', $expense->getExpenseamount());
            $stmt->bindValue(':expensestartdate', $expense->getExpensestartdate());
            $stmt->bindValue(':expensepaid', $expense->getExpensepaid());
            $stmt->bindValue(':id', $expense->getExpenseid());
            $stmt->execute() or die("SQL Error in: " . $stmt->queryString . " - " . $stmt->errorInfo()[2]);
            return true;
        } catch (Exception $e) {
            return false;
        }

    }

    public function delete(Expense $expense)
    {
        try {
            $stmt = $this->pdoInstance->prepare('DELETE FROM expensetable WHERE expenseid = :id');
            $stmt->bindValue(':id', $expense->getExpenseid());
            $stmt->execute();
        } catch (Exception $e) {
            echo "<script>alert(\"FIX YOOO SHIT\")</script>";

        }
        return true;
    }

    public function getAllExpenses()
    {
        $stmt = $this->pdoInstance->prepare('SELECT * FROM expensetable ORDER BY expenseid;');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Expense::class);
    }

    public function getExpenseById($expenseID)
    {
        $stmt = $this->pdoInstance->prepare('SELECT * FROM expensetable WHERE expenseid = :id LIMIT 1');
        $stmt->bindValue(':id', $expenseID);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll(\PDO::FETCH_CLASS, Expense::class)[0];
            return $result;
        }
        return null;
    }

    public function getExpenseSum()
    {
        $sql = "SELECT SUM(expenseamount) AS totalsum FROM expensetable";
        $stmt = $this->pdoInstance->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC)['totalsum'];
        return $result;
    }

}