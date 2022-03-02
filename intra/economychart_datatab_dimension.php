<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$input=$_POST['input'];
$data=$_POST['data'];
$dimension=$_POST['dimension'];



$numIndication=sizeof($data);
for($i=0; $i< $numIndication;$i++){
    $tempData[$i]['country']=$data[$i]['label'];
    $tempData[$i]['data'][0]= rand(60,95)/100;
    $tempData[$i]['data'][1]= rand(60,95)/100;
    $tempData[$i]['dif']=$tempData[$i]['data'][1]-$tempData[$i]['data'][0];
}
echo json_encode($tempData);
?>