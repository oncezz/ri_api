<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$countryFullList=$_POST['countryFullList'];
$input=$_POST['input'];
$dimension = ['Trade and Investment', 'Financial', 'Regional Value chains', 'Infrastructure','Movement of people', 'Regulatory cooperation','Digital economy'];

$result = [];
for($i=0;$i<sizeof($dimension);$i++){
    $result[$i]['name'] =  $dimension[$i];
    $result[$i]['data'] = rand(40,90);
}
echo json_encode($result);
?>