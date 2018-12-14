<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 11/12/2018
 * Time: 14:29
 */
namespace service;

use domain\Property;

interface PropertyService{

    /**
     * @access public
     * @param Property property
     * @return Property
     * @ParamType Property property
     * @ReturnType Property
     */
    public function createProperty(Property $property);

    /**
     * @access public
     * @param int propertyId
     * @return Property
     * @ParamType propertyId int
     * @ReturnType Property
     */
    public function readProperty($propertyId);

    /**
     * @access public
     * @param Property property
     * @return Property
     * @ParamType Property property
     * @ReturnType Property
     */
    public function updateProperty(Property $property);

    /**
     * @access public
     * @param int propertyId
     * @ParamType propertyId int
     */
    public function deleteProperty($propertyId);

    /**
     * @access public
     * @return Property[]
     * @ReturnType Property[]
     */
    public function findAllPropertys();

}