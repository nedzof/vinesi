<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 14/12/2018
 * Time: 16:45
 */

namespace domain;


class Expense
{
    protected $expenseid;
    private $expensetype;
    private $expenseamount;
    private $expensestartdate;
    private $expensepaid;

    /**
     * @return mixed
     */
    public function getExpenseid()
    {
        return $this->expenseid;
    }

    /**
     * @param mixed $expenseid
     */
    public function setExpenseid($expenseid):void
    {
        $this->expenseid = $expenseid;
    }

    /**
     * @return mixed
     */
    public function getExpensetype()
    {
        return $this->expensetype;
    }

    /**
     * @param mixed $expensetype
     */
    public function setExpensetype($expensetype):void
    {
        $this->expensetype = $expensetype;
    }

    /**
     * @return mixed
     */
    public function getExpenseamount()
    {
        return $this->expenseamount;
    }

    /**
     * @param mixed $expenseamount
     */
    public function setExpenseamount($expenseamount):void
    {
        $this->expenseamount = $expenseamount;
    }

    /**
     * @return mixed
     */
    public function getExpensestartdate()
    {
        return $this->expensestartdate;
    }

    /**
     * @param mixed $expensestartdate
     */
    public function setExpensestartdate($expensestartdate):void
    {
        $this->expensestartdate = $expensestartdate;
    }

    /**
     * @return mixed
     */
    public function getExpensepaid()
    {
        return $this->expensepaid;
    }

    /**
     * @param mixed $expensepaid
     */
    public function setExpensepaid($expensepaid):void
    {
        $this->expensepaid = $expensepaid;
    }



}