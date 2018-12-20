<?php

namespace domain;

/**
 * @access public
 * @author andreas.martin
 */
class AuthToken
{
    /**
     * @AttributeType int
     */
    private $id;
    /**
     * @AttributeType String
     */
    private $selector;
    /**
     * @AttributeType String
     */
    private $validator;

    /**
     * @AssociationType int
     * @AssociationMultiplicity 1
     */
    private $userid;
    /**
     * @AttributeType int
     */
    private $type;

    /**
     * @access public
     * @return int
     * @ReturnType int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @access public
     * @param int id
     * @return void
     * @ParamType id int
     * @ReturnType void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @access public
     * @return String
     * @ReturnType String
     */
    public function getSelector()
    {
        return $this->selector;
    }

    /**
     * @access public
     * @param String selector
     * @return void
     * @ParamType selector String
     * @ReturnType void
     */
    public function setSelector($selector)
    {
        $this->selector = $selector;
    }

    /**
     * @access public
     * @return String
     * @ReturnType String
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @access public
     * @param String validator
     * @return void
     * @ParamType validator String
     * @ReturnType void
     */
    public function setValidator($validator)
    {
        $this->validator = $validator;
    }


    /**
     * @access public
     * @return int
     * @ReturnType int
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @access public
     * @param int userid
     * @return void
     * @ParamType userid int
     * @ReturnType void
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @access public
     * @return int
     * @ReturnType int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @access public
     * @param int type
     * @return void
     * @ParamType type int
     * @ReturnType void
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}

?>