<?php require_once ('../database.php'); ?>
<?php require_once('../../private/initialize.php'); ?>




<!DOCTYPE html>
<html>
<head>
    <title>
        <meta charset="UTF-8">
        <title>Database Connection with PDO</title>
    </title>
</head>
<body>
<h1>Connection with PDO</h1>
<?php

class MyClass
{
    protected $variable = 'I am protected variable!';
}

$closure = function () {
    return $this->variable;
};

$result = Closure::bind($closure, new MyClass(), 'MyClass');
echo $result();
?>
</body>
</html>