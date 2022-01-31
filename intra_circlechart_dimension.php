<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$countryFullList=$_POST['countryFullList'];
$input=$_POST['input'];

$result[0]['name']="Trade and Investment";
$result[1]['name']="Digital Economy";
$result[2]['name']="Financial";
$result[3]['name']="Regional Value Chains";
$result[4]['name']="Average Index";
$result[5]['name']="Infrastructure";
$result[6]['name']="Movement of People";
$result[7]['name']="Regional Cooperation";

$result[0]['value']=.91;
$result[1]['value']=.90;
$result[2]['value']=.83;
$result[3]['value']=.73;
$result[4]['value']=.71;
$result[5]['value']=.62;
$result[6]['value']=.6;
$result[7]['value']=.4;

echo json_encode($result);
?>