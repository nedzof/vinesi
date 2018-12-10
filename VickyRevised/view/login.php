<?php
/**
 * Created by PhpStorm.
 * User: Nedzo
 * Date: 06.11.2018
 * Time: 09:49
 */

//Php Login in form
$connection = mysqli_connect("localhost","root","root","testdb");
if (isset($_POST['btnSubmit'])){
    $txtEmail = $_POST['txtEmail'];
    $txtPass = $_POST['txtPass'];

    $query = "SELECT * FROM usertable WHERE EMAIL='{$txtEmail}' AND userPassword='{$txtPass}'";
    $result = mysqli_query($connection,$query);

    if($result=mysqli_fetch_array($result)){
        echo "<script>
            alert(\"Login Successful\");
        </script>";
    } else{

        echo "<script>
            alert(\"Login Failed\");
        </script>";
    }
}