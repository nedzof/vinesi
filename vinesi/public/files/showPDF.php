<?php

include('../../private/initialize.php');

//Null Coalescing Operator
$id = $_GET['id'] ?? '1';

//XSS Cross Site Scripting
echo h($id);

?>
