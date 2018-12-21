<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 22.09.2017
 * Time: 15:13
 */

namespace database;

use config\Config;
use PDO;
use PDOException;

class Database
{
    private static $pdoInstance = null;

    protected function __construct()
    {


            self::$pdoInstance = new PDO (Config::get("database.dsn"), Config::get("database.user"), Config::get("database.password"));
            self::$pdoInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



//        $_host = Config::get("database.host");
//        $_dbname = Config::get("database.name");
//        $_user = Config::get("database.user");
//        $_port = Config::get("database.port");
//        $_password = Config::get("database.password");
//
//        $connection_string="dsn=pgsql:host=$_host;dbname=$_dbname;user=$_user;password=$_password";
//        parse_str($connection_string, $params);
//
//        //$dsn = "pgsql:host=$_host;port=$_port;dbname=$_dbname;user=$_user;password=$_password";
//
//        try {
//            // create a PostgreSQL database connection
//            //self::$pdoInstance = new PDO($dsn);
//            self::$pdoInstance = new PDO($params['dsn'], @$params['username'], @$params['password']);
//
//            // display a message if connected to the PostgreSQL successfully
//            if (self::$pdoInstance) {
//                // echo "Connected to the <strong>$_dbname</strong> database successfully!";
//                self::$pdoInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            }
//        } catch (PDOException $e) {
//            echo $e->getMessage();
//            echo $e->getLine();
//        }


        /* self::$pdoInstance = new PDO($dsn, $user, )
       //  self::$pdoInstance = new PDO (Config::get("database.dsn"), Config::get("database.user"), Config::get("database.password"));
         echo "successful";*/
    }

    public static function connect()
    {
        if (self::$pdoInstance) {
            return self::$pdoInstance;
        }

        new self();

        return self::$pdoInstance;
    }

}