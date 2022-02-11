<?php
require_once('../connection.php');
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
    $result[$i]['lastValue'] = (float)number_format($indexList[$diffYear],2);
}
echo json_encode($result);
?>