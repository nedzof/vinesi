<?php


namespace service;

use dao\PropertyDAO;
use domain\Property;

/**
 * Created by PhpStorm.
 * User: nedzo
 * Date: 14.12.18
 * Time: 11:28
 */
class PropertyServiceImpl implements PropertyService
{

    public function getDropDownProperties($id){
        $propertylist = [];

        $result = (new PropertyDAO())->readAll();

        for ($i = 0; $i < count($result); $i++) {
            $row = $result[$i];
            $propertyid = $row['propertyid'];
            $propertyid == $id ?

                $propertylist[$i] = "<option selected='selected' value='$propertyid'>$propertyid</option>" :
                $propertylist[$i] = "<option value='$propertyid'>$propertyid</option>";
        }

        return $propertylist;
    }


    /**
     * @access public
     * @param Property property
     * @return Property
     * @ParamType Property property
     * @ReturnType Property
     */
    public function createProperty(Property $property)
    {
        // TODO: Implement createProperty() method.
    }

    /**
     * @access public
     * @param int propertyId
     * @return Property
     * @ParamType propertyId int
     * @ReturnType Property
     */
    public function readProperty($propertyId)
    {
        // TODO: Implement readProperty() method.
    }

    /**
     * @access public
     * @param Property property
     * @return Property
     * @ParamType Property property
     * @ReturnType Property
     */
    public function updateProperty(Property $property)
    {
        // TODO: Implement updateProperty() method.
    }

    /**
     * @access public
     * @param int propertyId
     * @ParamType propertyId int
     */
    public function deleteProperty($propertyId)
    {
        // TODO: Implement deleteProperty() method.
    }

    /**
     * @access public
     * @return Property[]
     * @ReturnType Property[]
     */
    public function findAllPropertys()
    {
        // TODO: Implement findAllPropertys() method.
    }
}