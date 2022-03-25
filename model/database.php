<?php
$dsn = 'mysql:host=acw2033ndw0at1t7.cbetxkdyhwsb.us-east-1.rds.amazonaws.com; dbname=zippy-used-auto-vehicles';
$username = 'rypt0rqqsxeitja2';
$password = 'y64a17ql2flmkv91';

try {
    $db = new PDO($dsn, $username, $password);
}
catch (PDOException $e) {
    $error = "Database Error: ";
    $error .= $e->getMessage();
    include('view/error.php');
    exit();
}


?>
