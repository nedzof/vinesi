<?php

require_once('database_credentials.php');


function db_connection(){

    $dsn = "pgsql:host=" . DB_HOST_2 . ";dbname=" . DB_NAME_2 . ";user=" . DB_USER_2 . ";port=" . DB_PORT_2 . ";sslmode=require;password=" . DB_PASS_2 . ";";
    $db = new PDO($dsn);

        if ($db) {
            return $db;
        } else {
            return false;
        }

}


/*
function db_connection()
{
    $pdo = new PDO("mysql:host=" . DB_HOST_2 . ";dbname=" . DB_NAME_2, DB_USER_2, DB_PASS_2);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $pdo->prepare("SELECT * FROM " . 'usertable' . " WHERE username = :username AND password = :password");
    $query->bindParam(":username", $username);
    $query->bindParam(":password", $password);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        $formMessage = "Welcome " . $user['username'] . "!";
    } else {
        $formMessage = "Username or Password incorrect";

    }

}
*/

function db_disconnect($connection)
{
    if (isset($connection)) {
        mysqli_close($connection);
    }
}

function confirm_query($result_set)
{
    if (!$result_set && $result_set > 0) {
        exit("Database query failed.");
    }
    return true;
}

function db_escape($connection, $string)
{
    return mysqli_real_escape_string($connection, $string);
}


function confirm_result_set($result_set)
{
    if (!$result_set && $result_set > 0) {
        exit("Database query failed.");
    }
}

?>