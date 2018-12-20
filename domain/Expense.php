<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 14/12/2018
 * Time: 16:45
 */

namespace domain;


use DateTime;

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
    public function setExpenseid($expenseid): void
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
    public function setExpensetype($expensetype): void
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
    public function setExpenseamount($expenseamount): void
    {
        $this->expenseamount = $expenseamount;
    }

    /**
     * @return mixed
     */
    public function getExpensestartdate($b = true)
    {
        //Boolean true if to display on table
        //Boolena false if to insert in database
        $timestamp = $this->expensestartdate;
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
     * @param mixed $expensestartdate
     */
    public function setExpensestartdate($expensestartdate): void
    {
        $this->expensestartdate = $expensestartdate;
    }

    public function getExpensedaysleft()
    {

        $datetime1 = new DateTime();
        $datetime2 = new DateTime($this->getExpenseenddate());
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
    public function getExpenseenddate()
    {

        $date = strtotime("+30 days", strtotime($this->expensestartdate));
        return date("Y-m-d", $date);

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
    public function setExpensepaid($expensepaid): void
    {
        $this->expensepaid = $expensepaid;
    }


}