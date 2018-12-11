<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 11/12/2018
 * Time: 14:29
 */
namespace service;

use domain\Lease;

interface LeaseService{

    /**
     * @access public
     * @param Lease lease
     * @return Lease
     * @ParamType Lease lease
     * @ReturnType Lease
     */
    public function createLease(Lease $lease);

    /**
     * @access public
     * @param int leaseId
     * @return Lease
     * @ParamType leaseId int
     * @ReturnType Lease
     */
    public function readLease($leaseId);

    /**
     * @access public
     * @param Lease lease
     * @return Lease
     * @ParamType Lease lease
     * @ReturnType Lease
     */
    public function updateLease(Lease $lease);

    /**
     * @access public
     * @param int leaseId
     * @ParamType leaseId int
     */
    public function deleteLease($leaseId);

    /**
     * @access public
     * @return Lease[]
     * @ReturnType Lease[]
     */
    public function findAllLease();

}