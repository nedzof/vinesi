<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 14/12/2018
 * Time: 17:50
 */

namespace dao;


use domain\Expense;
use PDO;

class ExpenseDAO extends BasicDAO
{
/*
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
*/
    public function getAllExpenses()
    {
        $stmt = $this->pdoInstance->prepare('SELECT * FROM expensetable ORDER BY expenseid;');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Expense::class);
    }
/*
    public function getLeaseById($expenseID)
    {
        $stmt = $this->pdoInstance->prepare('SELECT * FROM expensetable WHERE expenseid = :id LIMIT 1');
        $stmt->bindValue(':id', $expenseID);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll(\PDO::FETCH_CLASS, Expense::class)[0];
            return $result;
        }
        return null;
    }*/
}