<?php


namespace domain;

class Property
{
    private $propertyid;
    private $propertyrooms;

    /**
     * @return mixed
     */
    public function getPropertyid()
    {
        return $this->propertyid;
    }

    /**
     * @return mixed
     */
    public function getPropertyrooms()
    {
        return $this->propertyrooms;
    }

    /**
     * @param mixed $propertyrooms
     */
    public function setPropertyrooms($propertyrooms): void
    {
        $this->propertyrooms = $propertyrooms;
    }


}