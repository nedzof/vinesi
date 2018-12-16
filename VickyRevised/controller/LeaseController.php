<?php

namespace controller;

use dao\LeaseDAO;
use domain\Lease;
use http\HTTPException;
use http\HTTPStatusCode;
use service\LeaseServiceImpl;
use view\LayoutRendering;
use view\TemplateView;

/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 07/12/2018
 * Time: 17:39
 */
class LeaseController{


    public static function leaseView()
    {
        try {

            $contentView = new TemplateView("lease.php");
            $contentView->leases = (new LeaseDAO())->getAllLeases();
            LayoutRendering::basicLayout($contentView);

            /*
            $contentView = new TemplateView("lease.php");
            $contentView->leases = (new LeaseServiceImpl())->findAllLeases();
            LayoutRendering::basicLayout($contentView);
*/
        } catch (HTTPException $e) {
            HTTPStatusCode::HTTP_401_UNAUTHORIZED;

        }
    }

    public static function leaseUpdateOrCreate()
    {
        try {
        $lease = new Lease();
            $lease->setLeaseid($_POST["leaseid"] ?? 0);
            $lease->setLeasemonthylrent($_POST["leasemonthlyrent"] ?? 0);
            $lease->setLeaseutilities($_POST["leaseutilities"] ?? 0);
        $lease->setLeasepaymentmethod($_POST["leasepaymentmethod"] ?? "");
        $lease->setLeasedeposit($_POST["leasedeposit"] ?? 0);
            $lease->setLeasestart($_POST["leasestart"] ?? date("Y-m-d"));
            $lease->setLeaseend($_POST["leaseend"] ?? date("Y-m-d"));
        $lease->setPropertytablePropertyid($_POST["propertytable_propertyid"] ?? null);
        $lease->setTenttableTenantid($_POST["tenttable_tenantid"] ?? null);


            if ($lease->getLeaseid() == null) {
                return (new LeaseServiceImpl())->createLease($lease);
            } else {
                return (new LeaseServiceImpl())->updateLease($lease);

            }

        } catch (HTTPException $e) {

        }

    }

    public static function deleteLease()
    {
        $id = $_GET["id"] ?? 0;
        (new LeaseServiceImpl())->deleteLease($id);
    }

    public static function createForm()
    {
        $id = $_GET["id"] ?? 0;
        try {
            $contentView = new TemplateView("lease_form.php");
            if ($id != 0) {
                $contentView->lease = (new LeaseDAO())->getLeaseById($id);
            }
            LayoutRendering::basicLayout($contentView);
        } catch (HTTPException $e) {
            HTTPStatusCode::HTTP_401_UNAUTHORIZED;
        }
    }

}