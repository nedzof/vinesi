<?php
/**
 * Created by PhpStorm.
 * User: Nedzo
 * Date: 06.11.2018
 * Time: 09:50
 */

if (isset($_POST['submit'])) {

    include_once 'dbh.php';

    $first = mysqli_real_escape_string($connection, $_POST['first']);
    $last = mysqli_real_escape_string($connection, $_POST['first']);
    $email = mysqli_real_escape_string($connection, $_POST['first']);
    $uid = mysqli_real_escape_string($connection, $_POST['first']);
    $password = mysqli_real_escape_string($connection, $_POST['first']);

    if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($password)){
        header("Location: /register.php?register=empty");
        exit();

    } else{
        //Check format first and last name
        if (!preg_match("/^[a-zA-Z]*$/",$first) || !preg_match("/^[a-zA-Z]*$",$last)){
            header("Location: /register.php?register=invalid");
            exit();

        } else{
            //Check email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: /register.php?register=invalidEmail");
                exit();
            } else{

                $sql = "SELECT * FROM usertable WHERE userLastName='$last'";
                $result = mysqli_query($connection, $sql);
                $resultcheck = mysqli_num_rows($result);

                if($resultcheck > 0){
                    header("Location: /register.php?register=usertaken");
                    exit();
                } else {
                    //Hashing password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO usertable (userLastName, userEmail, userPassword, userStatus) VALUES ($last, $email, $hashedPassword, 0)";
                    mysqli_query($connection, $sql);
                    header("Location: /register.php?register=success");
                    exit();
                }
            }
        }
    }

} else {
   // header("Location: /register.php");
    header("Location: home.php?register=success");
    exit();
}