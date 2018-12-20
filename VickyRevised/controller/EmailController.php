<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 01.11.2017
 * Time: 13:51
 */

namespace controller;

use dao\LeaseDAO;
use service\AuthServiceImpl;
use service\CustomerServiceImpl;
use service\EmailServiceClient;
use view\TemplateView;

class EmailController
{
    public static function sendMeMyLeases()
    {
        $emailView = new TemplateView("lease_PDF.php");
        $emailView->leasing = (new LeaseDAO())->getAllLeases();
        return EmailServiceClient::sendEmail(AuthServiceImpl::getInstance()->readUser()->getUseremail(), "My current customers", $emailView->render());
    }
}