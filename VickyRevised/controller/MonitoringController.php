<?php

namespace controller;

use view\LayoutRendering;
use view\TemplateView;

/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 07/12/2018
 * Time: 17:40
 */
class MonitoringController
{


    public static function monitoringView()
    {
        $contentView = new TemplateView("monitoring.php");
        //$contentView->leases = (new MonitoringDAO())->getChartData();
        LayoutRendering::basicLayout($contentView);
    }
}