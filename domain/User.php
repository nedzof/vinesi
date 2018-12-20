<?php
/**
 * Created by PhpStorm.
 * User: nedzo
 * Date: 10.12.18
 * Time: 13:05
 */

namespace domain;

class User
{

    private $userid;
    private $userlastname;
    private $useremail;
    private $userhashedpassword;
    private $userstatus;

    /**
     * User constructor.
     * @param $userid
     * @param $userlastname
     * @param $useremail
     * @param $userhashedpassword
     * @param $userstatus
     */

    public static function createUserFromArray($array): User
    {
        $userid = $array->userid;
        $userlastname = $array->userlastname;
        $useremail = $array->useremail;
        $userhashedpassword = $array->userhashedpassword;
        $userstatus = $array->userstatus;

        return new User($userid, $userlastname, $useremail, $userhashedpassword, $userstatus);

    }

    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param mixed $userid
     */
    public function setUserid($userid): void
    {
        $this->userid = $userid;
    }

    /**
     * @return mixed
     */
    public function getUserlastname()
    {
        return $this->userlastname;
    }

    /**
     * @param mixed $userlastname
     */
    public function setUserlastname($userlastname): void
    {
        $this->userlastname = $userlastname;
    }

    /**
     * @return mixed
     */
    public function getUseremail()
    {
        return $this->useremail;
    }

    /**
     * @param mixed $useremail
     */
    public function setUseremail($useremail): void
    {
        $this->useremail = $useremail;
    }

    /**
     * @return mixed
     */
    public function getUserhashedpassword()
    {
        return $this->userhashedpassword;
    }

    /**
     * @param mixed $userhashedpassword
     */
    public function setUserhashedpassword($userhashedpassword): void
    {
        $this->userhashedpassword = $userhashedpassword;
    }

    /**
     * @return mixed
     */
    public function getUserstatus()
    {
        return $this->userstatus;
    }

    /**
     * @param mixed $userstatus
     */
    public function setUserstatus($userstatus): void
    {
        $this->userstatus = $userstatus;
    }

}