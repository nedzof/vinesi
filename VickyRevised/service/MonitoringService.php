<?php
/**
 * Created by PhpStorm.
 * User: Nedzo
 * Date: 18.12.2018
 * Time: 21:05
 */

class MonitoringService
{
    public static function getLastMonths($numberOfMonths)
    {
        for ($i = 1; $i <= $numberOfMonths; $i++) {
            $months[] = date("Y-m%", strtotime(date('Y-m-01') . " -$i months"));
        }

    }

    //Needed for dataset comparison between accounts receivables and accounts payables
    public static function getPayments($numberOfMonths)
    {

    }

}