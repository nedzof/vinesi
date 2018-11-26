<?php require_once('../../private/initialize.php'); ?>
<?php include ('../shared/header.php'); ?>


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

<div class="intro">
    <h2 class="text-center" style="margin-bottom: 40px;padding-top: 40px;"><strong>Controlling</strong></h2>
    <p class="text-center" style="color: #a2a8ae;">Monitoring the rent payments.</p>
</div>
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Unit</th>
                            <th>Name</th>
                            <th>Adress</th>
                            <th>Due Date</th>
                            <th>Amount due</th>
                            <th>Paid</th>
                            <th>Notes</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr style="background-color: #e7f7ed;">
                            <td>1.01</td>
                            <td>Sira Tamba</td>
                            <td>Auf der Wacht 1a, 4104 Oberwil, Switzerland</td>
                            <td>27.11.18</td>
                            <td>£547</td>
                            <td>£547</td>
                            <td>+1 parking spot</td>
                            <td>
                                <div class="btn-group" role="group"><button class="btn btn-info mt-2" type="submit" style="margin-right: 5px;"><i class="icon ion-edit"></i></button><button class="btn btn-info mt-2" type="submit"><i class="icon ion-android-delete"></i></button></div>
                            </td>
                        </tr>
                        <tr style="background-color: #ffe6e6;">
                            <td>1.02</td>
                            <td>Victoria Villar</td>
                            <td>Auf der Wacht 1b, 4104 Oberwil, Switzerland</td>
                            <td>27.11.18</td>
                            <td>£534</td>
                            <td>£0</td>
                            <td></td>
                            <td>
                                <div class="btn-group" role="group"><button class="btn btn-info mt-2" type="submit" style="margin-right: 5px;"><i class="icon ion-edit"></i></button><button class="btn btn-info mt-2" type="submit"><i class="icon ion-android-delete"></i></button></div>
                            </td>
                        </tr>
                        <tr style="background-color: #e7f7ed;">
                            <td>2.01</td>
                            <td>Nedzo Fetahovic</td>
                            <td>Auf der Wacht 8b, 4104 Oberwil, Switzerland</td>
                            <td>27.11.18</td>
                            <td>£386</td>
                            <td>£387</td>
                            <td></td>
                            <td>
                                <div class="btn-group" role="group"><button class="btn btn-info mt-2" type="submit" style="margin-right: 5px;"><i class="icon ion-edit"></i></button><button class="btn btn-info mt-2" type="submit"><i class="icon ion-android-delete"></i></button></div>
                            </td>
                        </tr>
                        <tr style="background-color: #ffe6e6;">
                            <td>2.02</td>
                            <td>Timothy Applewhite</td>
                            <td>Auf der Wacht 8b, 4104 Oberwil, Switzerland</td>
                            <td>27.11.18</td>
                            <td>£386</td>
                            <td>£0</td>
                            <td></td>
                            <td>
                                <div class="btn-group" role="group"><button class="btn btn-info mt-2" type="submit" style="margin-right: 5px;"><i class="icon ion-edit"></i></button><button class="btn btn-info mt-2" type="submit"><i class="icon ion-android-delete"></i></button></div>
                            </td>
                        </tr>
                        <tr style="background-color: #ffe6e6;">
                            <td>2.03</td>
                            <td>Nicola Niclaus</td>
                            <td>Auf der Wacht 8b, 4104 Oberwil, Switzerland</td>
                            <td>27.11.18</td>
                            <td>£386</td>
                            <td>£0</td>
                            <td></td>
                            <td>
                                <div class="btn-group" role="group"><button class="btn btn-info mt-2" type="submit" style="margin-right: 5px;"><i class="icon ion-edit"></i></button><button class="btn btn-info mt-2" type="submit"><i class="icon ion-android-delete"></i></button></div>
                            </td>
                        </tr>
                        <tr style="background-color: #ffe6e6;">
                            <td>3.01</td>
                            <td>Aymen Fathallah</td>
                            <td>Auf der Wacht 8b, 4104 Oberwil, Switzerland</td>
                            <td>27.11.18</td>
                            <td>£386</td>
                            <td>£0</td>
                            <td></td>
                            <td>
                                <div class="btn-group" role="group"><button class="btn btn-info mt-2" type="submit" style="margin-right: 5px;"><i class="icon ion-edit"></i></button><button class="btn btn-info mt-2" type="submit"><i class="icon ion-android-delete"></i></button></div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col d-flex justify-content-center align-items-center align-content-center align-self-center" style="padding: 26px;"><button class="btn btn-primary" type="button" style="margin: 0px;margin-right: 35px;background-color: #17a2b8;"><i class="icon ion-android-add" style="color: #ffffff;"></i></button><button class="btn btn-primary" type="button" style="margin-right: 35px;background-color: #17a2b8;"><i class="icon ion-printer"></i></button>
    <button
        class="btn btn-primary" type="button" style="background-color: #17a2b8;"><i class="icon ion-ios-email"></i></button>
</div>
<?php include "../shared/footer.php"?>

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
 * Time: 09:53
 */