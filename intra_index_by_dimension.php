<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$countryFullList=$_POST['countryFullList'];
$input=$_POST['input'];
$yearMax = $input['year']['max'];
$yearMin = $input['year']['min'];
$diffYear = $yearMax - $yearMin;
$dimension = ['Trade and Investment', 'Financial', 'Regional Value chains', 'Infrastructure','Movement of people', 'Regulatory cooperation','Digital economy'];
// print_r($input['year']['max']);
// print_r($countryFullList);
$result = [];
for($i=0;$i<sizeof($dimension);$i++){
    $indexList = [];
    $result[$i]['name'] =  $dimension[$i];
    for($year = 0; $year <=$diffYear;$year ++){
        $genValue = rand(20,99)/100;        
        array_push($indexList, $genValue);
    }
    $result[$i]['data']= $indexList;
    $result[$i]['lastValue'] = $indexList[$diffYear];
}
echo json_encode($result);
?>

