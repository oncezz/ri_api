<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$countryFullList=$_POST['countryFullList'];
$input=$_POST['input'];

$result = [];
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
echo json_encode($result);
?>