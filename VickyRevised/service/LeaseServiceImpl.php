<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 11/12/2018
 * Time: 14:36
 */

namespace service;

use domain\Lease;
use dao\LeaseDAO;
use http\HTTPException;
use http\HTTPStatusCode;

class LeaseServiceImpl implements LeaseService {

    /**
     * @access public
     * @param Lease lease
     * @return Lease
     * @ParamType lease Lease
     * @ReturnType Lease
     * @throws HTTPException
     */
    public function createLease(Lease $lease) {
        if(AuthServiceImpl::getInstance()->verifyAuth()) {
            $leaseDAO = new LeaseDAO();
           // $lease->setAgentId(AuthServiceImpl::getInstance()->getCurrentAgentId());
            return $leaseDAO->create($lease);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
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
            return $leaseDAO->read($leaseId);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    public function updateLease(Lease $lease)
    {
        // TODO: Implement updateLease() method.
    }

    public function deleteLease($leaseId)
    {
        // TODO: Implement deleteLease() method.
    }

    public function findAllLease()
    {
        // TODO: Implement findAllLease() method.
    }
}