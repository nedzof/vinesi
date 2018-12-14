<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 08.10.2017
 * Time: 14:39
 */

namespace service;

use dao\UserDAO;
use domain\User;
use Exception;
use http\HTTPStatusCode;


class AuthServiceImpl implements AuthService {

    private static $instance = null;

    private $currentUserId;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    protected function __construct() { }

    private function __clone() { }

    public function verifyAuth() {
        if (isset($this->currentUserId))
            return true;
        return false;
    }

    public function getCurrentUserId()
    {
        return $this->currentUserId;
    }

    public function verifyUser($email, $password)
    {
        $userDAO = new UserDAO();
        $user = $userDAO->findByEmail($email);
        if (!is_null($user)) {
            if (password_verify($password, $user->getUserhashedpassword())) {
                if (password_needs_rehash($user->getUserhashedpassword(), PASSWORD_DEFAULT)) {
                    $user->setUserhashedpassword(password_hash($password, PASSWORD_DEFAULT));
                    $userDAO->update($user);
                }
                $this->currentUserId = $user->getUserid();
                return true;
            }
        }
        return false;
    }

    public function readUser()
    {

        try {
            $userDAO = new UserDAO();
            return $userDAO->read($this->currentUserId);
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage() . "\n" . (HTTPStatusCode::HTTP_401_UNAUTHORIZED) . "\n";
            return null;
        }
    }

    public function editUser($name, $email, $password)
    {
        $user = new User(null, $name, $email, password_hash($password, PASSWORD_DEFAULT), null);
        $userDAO = new UserDAO();
        if ($this->verifyAuth()) {
            $user->setUserid($this->currentUserId);
            $userRead = $userDAO->read($this->currentUserId);
            if ($userRead->getUseremail() !== $user->getUseremail()) {
                if (!is_null($userDAO->findByEmail($email))) {
                    return false;
                }
            }
            $userDAO->update($user);
            return true;
        }else{
            if (!is_null($userDAO->findByEmail($email))) {
                return false;
            }
            $userDAO->create($user);
            return true;
        }
    }

    public function validateToken($token) {
        $tokenArray = explode(":", $token);
        if(count($tokenArray)>1) {
            $this->currentUserId = $tokenArray[0];
            return true;
        }
        return false;
    }


    public function issueToken($type = self::USER_TOKEN, $email = null)
    {
        try {
            return $this->currentUserId . ":" . bin2hex(random_bytes(20));
        } catch (Exception $e) {
            return "Caught exception: " . $e->getMessage();
        }
    }
}