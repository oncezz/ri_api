<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$countryFullList=$_POST['countryFullList'];
$input=$_POST['input'];
$yearMax = $input['year']['max'];
$yearMin = $input['year']['min'];
$diffYear = $yearMax - $yearMin;
$dimension = $_POST['dimensionUse'];
// print_r($input['year']['max']);
// print_r($countryFullList);
$result = [];
for($i=0;$i<sizeof($dimension);$i++){
    $indexList = [];
    $result[$i]['name'] =  $dimension[$i];
    for($year = 0; $year <=$diffYear;$year ++){
        if($year == 0){
            $genValue = rand(5,30)/100;  
            $oldValue = $genValue;  
        }else {
            $genValue = rand(1,8)/100 + $oldValue;
            $oldValue = $genValue;
        }
        array_push($indexList, (float)number_format($genValue,2));
    }
    $result[$i]['data']= $indexList;
    $result[$i]['lastValue'] = $indexList[$diffYear];
}
echo json_encode($result);
?>

