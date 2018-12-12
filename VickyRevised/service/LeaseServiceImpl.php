<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 11/12/2018
 * Time: 14:36
 */

namespace service;

use dao\LeaseDAO;
use domain\Lease;
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
            $lease->setLeaseid(AuthServiceImpl::getInstance()->getCurrentUserId());
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
        if(AuthServiceImpl::getInstance()->verifyAuth()) {
            $leaseDAO = new LeaseDAO();
            return $leaseDAO->update($lease);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @param int leaseId
     * @ParamType leaseId int
     */
    public function deleteLease($leaseId)
    {
        if(AuthServiceImpl::getInstance()->verifyAuth()) {
            $leaseDAO = new LeaseDAO();
            $lease = new Lease();
            $lease->setLeaseid($leaseId);
            $leaseDAO->delete($lease);
        }
    }

    /**
     * @access public
     * @return Lease[]
     * @ReturnType Lease[]
     * @throws HTTPException
     */
    public function findAll()
    {
        if(AuthServiceImpl::getInstance()->verifyAuth()){
            $leaseDAO = new LeaseDAO();
            return $leaseDAO->readAll();
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
}