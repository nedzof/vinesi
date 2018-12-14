<?php

use dao\PropertyDAO;
use domain\Property;

/**
 * Created by PhpStorm.
 * User: nedzo
 * Date: 14.12.18
 * Time: 11:28
 */

class PropertyServiceImpl {


    public function getDropDownProperties($id){
        $propertylist = [];

        $result = (new PropertyDAO())->readAll();
        for ($i = 0; $i < count($result); $i++)
        {
            $row = $result[$i];

            $propertyid = $row['propertyid'];
            $propertyid == $id ?

                $propertylist[$i] = "<option selected='selected' value='$propertyid'>$propertyid</option>" :
                $propertylist[$i] = "<option value='$propertyid'>$propertyid</option>";
        }

        return $propertylist;
    }


}