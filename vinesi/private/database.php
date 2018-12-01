<?php

require_once('database_credentials.php');

function db_connection() {
    $connection = pg_connect(DB_HOST_2, DB_NAME_2, DB_USER_2, DB_PASS_2);
    //$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    if(mysqli_connect_errno()) {
        $msg = "Database connection failed: ";
        $msg .= mysqli_connect_error();
        $msg .= " (" . mysqli_connect_errno() . ")";
        exit($msg);
    }
    return $connection;
}


function db_disconnect($connection) {
    if(isset($connection)) {
        mysqli_close($connection);
    }
}

function confirm_query($result_set) {
    if(!$result_set && $result_set > 0) {
        exit("Database query failed.");
    }
    return true;
}

function db_escape($connection, $string) {
    return mysqli_real_escape_string($connection, $string);
}



function confirm_result_set($result_set) {
    if (!$result_set && $result_set>0) {
        exit("Database query failed.");
    }
}

?>
-