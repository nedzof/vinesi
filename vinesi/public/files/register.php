<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Vinesi</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="../assets/css/-Login-form-Page-BS4-.css">
    <link rel="stylesheet" href="../assets/css/Data-Summary-Panel---3-Column-Overview--Mobile-Responsive.css">
    <link rel="stylesheet" href="../assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="../assets/css/Data-Table.css">
    <link rel="stylesheet" href="../assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="../assets/css/Projects-Horizontal.css">
    <link rel="stylesheet" href="../assets/css/register.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/Team-Clean.css">
</head>

<body>
<div class="container-fluid">
    <div class="row mh-100vh">
        <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">
            <div class="m-auto w-lg-75 w-xl-50">
                <h2 class="text-info font-weight-light mb-5"><i class="fa fa-ravelry"></i>&nbsp;Vinesi</h2>
                <form action="register.php" method="post">
                    <div class="form-group"><label class="text-secondary">Name</label><input class="form-control" type="text" required=""></div>
                    <div class="form-group"><label class="text-secondary">Email</label><input class="form-control" type="text" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,15}$" inputmode="email"></div>
                    <div class="form-group"><label class="text-secondary">Password</label><input class="form-control" type="password" required=""></div>
                    <div class="form-group"><label class="text-secondary">Confirm Password</label><input class="form-control" type="password" required=""></div>
                    <button class="btn btn-info mt-2" type="submit">Register</button></form>
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-end" id="bg-block" style="background-image: url(&quot;assets/img/image_20170210_195645_4289.jpg&quot;);background-size: cover;background-position: center center;">
            <p class="ml-auto small text-dark mb-2"><em>Photo by&nbsp;</em><a href="https://unsplash.com/photos/v0zVmWULYTg?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText" target="_blank" class="text-dark"><em>Aldain Austria</em></a><br></p>
        </div>
    </div>
</div>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
</body>

</html>

<?php
/**
 * Created by PhpStorm.
 * User: Nedzo
 * Date: 06.11.2018
 * Time: 09:50
 */

if (isset($_POST['submit'])) {

    require_once('dbh.php');

    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['first']);
    $email = mysqli_real_escape_string($conn, $_POST['first']);
    $uid = mysqli_real_escape_string($conn, $_POST['first']);
    $password = mysqli_real_escape_string($conn, $_POST['first']);

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

                $sql = "SELECT * FROM 'usertable' WHERE userLastName='$last'";
                $result = mysqli_query($conn, $sql);
                $resultcheck = mysqli_num_rows($result);

                if($resultcheck > 0){
                    header("Location: /register.php?register=usertaken");
                    exit();
                } else {
                    //Hashing password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO usertable (userLastName, userEmail, userPassword, userStatus) VALUES ($last, $email, $hashedPassword, 0)";
                    mysqli_query($conn, $sql);
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