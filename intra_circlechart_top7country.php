<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$countryFullList=$_POST['countryFullList'];
$input=$_POST['input'];

$result[0]['name']="China";
$result[1]['name']="Vietnam";
$result[2]['name']="Thailand";
$result[3]['name']="South Korea";
$result[4]['name']="You group";
$result[5]['name']="Spain";
$result[6]['name']="Mlaysia";
$result[7]['name']="Peru";

$result[0]['value']=.93;
$result[1]['value']=.85;
$result[2]['value']=.8;
$result[3]['value']=.78;
$result[4]['value']=.7;
$result[5]['value']=.64;
$result[6]['value']=.6;
$result[7]['value']=.5;

echo json_encode($result);
?>