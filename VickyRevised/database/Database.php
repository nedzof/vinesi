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

class Database
{
    private static $pdoInstance = null;

    protected function __construct()
    {
        /* $dsn = "pgsql:host=" . Config::get("database.host") .
             ";dbname=" . Config::get("database.name") .
             ";user=" . Config::get("database.user") .
             ";port=" . Config::get("database.port") .
             ";sslmode=require;password=" . Config::get("database.password") . ";";

         self::$pdoInstance = new PDO($dsn);*/
        self::$pdoInstance = new PDO (Config::get("database.dsn"), Config::get("database.user"), Config::get("database.password"));
        echo "successful";
        self::$pdoInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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