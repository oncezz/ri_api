<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$countryFullList=$_POST['countryFullList'];
$input=$_POST['input'];

$result = [];
for($i=0;$i<sizeof($countryFullList);$i++){
    $result[$i]['name'] =  $countryFullList[$i]['label'];
    $result[$i]['data'] = rand(10,35)/100;
}
echo json_encode($result);
?>