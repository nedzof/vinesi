<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.11.2017
 * Time: 08:09
 */

namespace service;

use dao\LeaseDAO;
use domain\Lease;
use http\HTTPException;
use http\HTTPStatusCode;

class LeaseServiceImpl implements LeaseService
{
    /**
     * @access public
     * @param Lease lease
     * @return Lease
     * @ParamType lease Lease
     * @ReturnType Lease
     * @throws HTTPException
     */
    public function createLease(Lease $lease) {
        //if(AuthServiceImpl::getInstance()->verifyAuth()) {
            $leaseDAO = new LeaseDAO();
            //$lease->set(AuthServiceImpl::getInstance()->getCurrentUserId());
            return $leaseDAO->create($lease);
        //}
        //throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @param int leaseId
     * @return Lease
     * @ParamType leaseId int
     * @ReturnType Lease
     * @throws HTTPException
     */
    public function readLease($leaseId)
    {
        if(AuthServiceImpl::getInstance()->verifyAuth()) {
            $leaseDAO = new LeaseDAO();
            return $leaseDAO->readById($leaseId);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @param Lease lease
     * @return Lease
     * @ParamType lease Lease
     * @ReturnType Lease
     * @throws HTTPException
     */
    public function updateLease(Lease $lease)
    {
        //if (AuthServiceImpl::getInstance()->verifyAuth()) {
        $leaseDAO = new LeaseDAO();
        return $leaseDAO->update($lease);
        //}
        //throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);

    }

    /**
     * @access public
     * @param int leaseId
     * @ParamType leaseId int
     */
    public function deleteLease($leaseId)
    {
        //if(AuthServiceImpl::getInstance()->verifyAuth()) {
            $leaseDAO = new LeaseDAO();
        return $leaseDAO->delete($leaseId);
        //}
    }

    /**
     * @access public
     * @return Lease[]
     * @ReturnType Lease[]
     * @throws HTTPException
     */
    public function findAllLeases()
    {
        if(AuthServiceImpl::getInstance()->verifyAuth()){
            $leaseDAO = new LeaseDAO();
            return $leaseDAO->getAllLeases();
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


}