<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$input=$_POST['input'];
$data=$_POST['data'];
$dimension=$_POST['dimension'];
$index=$_POST['index'];


$numIndication=sizeof($data);
for($i=0; $i< $numIndication;$i++){
    $tempData[$i]['country']=$data[$i]['label'];
    $tempData[$i]['data1']= rand(60,95)/100;
    $tempData[$i]['data2']= rand(60,95)/100;
    $tempData[$i]['dif']=$tempData[$i]['data2']-$tempData[$i]['data1'];
}
echo json_encode($tempData);
?>