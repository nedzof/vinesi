<?php


namespace service;

use dao\LeaseDAO;
use domain\Lease;
use http\HTTPException;
use http\HTTPStatusCode;

class LeaseServiceImpl
{

    public function createLease(Lease $lease)
    {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $leaseDAO = new LeaseDAO();
            //$lease->set(AuthServiceImpl::getInstance()->getCurrentUserId());
            return $leaseDAO->create($lease);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    public function readLease($leaseId)
    {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $leaseDAO = new LeaseDAO();
            return $leaseDAO->readById($leaseId);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    public function updateLease(Lease $lease)
    {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $leaseDAO = new LeaseDAO();
            return $leaseDAO->update($lease);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);

    }

    public function deleteLease($leaseId)
    {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $leaseDAO = new LeaseDAO();
            return $leaseDAO->delete($leaseId);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @return Lease[]
     * @ReturnType Lease[]
     * @throws HTTPException
     */
    public function findAllLeases()
    {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $leaseDAO = new LeaseDAO();
            return $leaseDAO->getAllLeasesAssoc();
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);

    }

    public function findLeaseById($id)
    {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $leaseDAO = new LeaseDAO();
            return $leaseDAO->getLeaseById($id);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
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
        if (AuthServiceImpl::getInstance()->verifyAuth()) {

            $leaseDAO = new LeaseDAO();
            return $leaseDAO->getLeaseIDfromTenantID($tenantid);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);

    }

    public function getRentAmountfromLeaseID($leaseid)
    {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $leaseDAO = new LeaseDAO();
            return $leaseDAO->getRentAmountfromLeaseID($leaseid);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }


}