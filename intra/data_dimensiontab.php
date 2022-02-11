<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$countryList = $_POST['data'];
$input = $_POST['input'];
$selected = $_POST['selected'];

?>