<?php
require_once('../connection.php');
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

$result[0]['value']=rand(93,99)/100;
$result[1]['value']=rand(85,95)/100;
$result[2]['value']=rand(80,85)/100;
$result[3]['value']=rand(75,80)/100;
$result[4]['value']=rand(65,75)/100;
$result[5]['value']=rand(55,65)/100;
$result[6]['value']=rand(45,55)/100;
$result[7]['value']=rand(30,45)/100;

echo json_encode($result);
?>