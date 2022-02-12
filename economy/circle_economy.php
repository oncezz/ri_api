<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$partner = $_POST['partner'];
$reporting = $_POST['reporting'];
$input = $_POST['input'];

$result = rand(60,98);
echo $result;
?>