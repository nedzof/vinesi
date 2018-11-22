<?php

include('../../private/functions.php');

//Null Coalescing Operator
$id = $_GET['id'] ?? '1';

//XSS Cross Site Scripting
echo h($id);

?>
