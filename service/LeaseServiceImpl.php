<?php


namespace service;

use dao\LeaseDAO;
use domain\Lease;
use http\HTTPException;

class LeaseServiceImpl
{

    public function createLease(Lease $lease)
    {
        $leaseDAO = new LeaseDAO();
        return $leaseDAO->create($lease);

    }

    public function readLease($leaseId)
    {
        $leaseDAO = new LeaseDAO();
        return $leaseDAO->readById($leaseId);

    }

    public function updateLease(Lease $lease)
    {
        $leaseDAO = new LeaseDAO();
        return $leaseDAO->update($lease);


    }

    public function deleteLease($leaseId)
    {
        $leaseDAO = new LeaseDAO();
        return $leaseDAO->delete($leaseId);

    }

    /**
     * @access public
     * @return Lease[]
     * @ReturnType Lease[]
     * @throws HTTPException
     */
    public function findAllLeases()
    {
        $leaseDAO = new LeaseDAO();
        return $leaseDAO->getAllLeasesAssoc();

    }

    public function findLeaseById($id)
    {
        $leaseDAO = new LeaseDAO();
        return $leaseDAO->getLeaseById($id);

    }

    public function getDropDownLeases($id)
    {
        $leaselist = [];

        $result = (new LeaseDAO())->readAll();

        for ($i = 0; $i < count($result); $i++) {
            $row = $result[$i];
            $leaseid = $row['leaseid'];
            $name = $leaseid;

            $leaseid == $id ?

                $leaselist[$i] = "<option selected='selected' value='$leaseid'>$name</option>" :
                $leaselist[$i] = "<option value='$leaseid'>$name</option>";
        }


        return $leaselist;


    }

    public function getLeaseIDfromTenantID($tenantid)
    {

        $leaseDAO = new LeaseDAO();
        return $leaseDAO->getLeaseIDfromTenantID($tenantid);


    }

    public function getRentAmountfromLeaseID($leaseid)
    {
        $leaseDAO = new LeaseDAO();
        return $leaseDAO->getRentAmountfromLeaseID($leaseid);

    }


}