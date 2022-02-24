<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$partner = $_POST['partner'];
$reporting = $_POST['reporting'];
$year = $_POST['year'];
$type = $_POST['type'];
$name=$_POST['name'];

$result[0]['name'] = 'China-Mongolia';
$result[0]['value']= 0.81;
$result[0]['own']= false;

$result[1]['name'] = 'ASEAN';
$result[1]['value']= 0.78;
$result[1]['own']= false;

$result[2]['name'] = $name;
$result[2]['value']= 0.71;
$result[2]['own']= true;

$result[3]['name'] = 'Asia-Pacific';
$result[3]['value']= 0.64;
$result[3]['own']= false;

echo json_encode($result);
?>
