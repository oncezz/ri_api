<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$countryFullList=$_POST['countryFullList'];
$input=$_POST['input'];
$yearMax = $input['year']['max'];
$yearMin = $input['year']['min'];
$diffYear = $yearMax - $yearMin;

// print_r($input['year']['max']);
// print_r($countryFullList);
$result = [];
for($i=0;$i<sizeof($countryFullList);$i++){
    $indexList = [];
    $result[$i]['name'] =  $countryFullList[$i]['label'];
    for($year = 0; $year <=$diffYear;$year ++){
        $genValue = rand(1,99)/100;        
        array_push($indexList, $genValue);
    }
    $result[$i]['data']= $indexList;
    $result[$i]['lastValue'] = $indexList[$diffYear];
}
echo json_encode($result);
?>