<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$partner = $_POST['partner'];
$reporting = $_POST['reporting'];

// print_r($economic);
$result = rand(10,98);
echo $result;
?>