<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$input=$_POST['input'];
$data=$_POST['data'];
$countryMap=$_POST['countryMap'];
$dimensionIndex=$_POST['dimension'];
$indicatorIndex=$_POST['index'];

$type = $input["type"];
$yearMax = $input['year']['max'];
$yearMin = $input['year']['min'];
// $diffYear = floor(($yearMax - $yearMin)/2);

if($type == "Sustainable"){
    $table = "ri_intra_allindi_sus";
} else {
    $table = "ri_intra_allindi_con";
}

$result=$db->select($table,[
    "reporter","partner","year","score"
],[
    "reporter"=>$countryMap,
    "partner"=>$countryMap,
    "dimension"=>$dimensionIndex,
    "indicator"=>$indicatorIndex,
    "year[<>]"=>[$yearMin,$yearMax]
]);
echo json_encode($result);
// $numIndication=sizeof($data);
// for($i=0; $i< $numIndication;$i++){
//     $tempData[$i]['country']=$data[$i]['label'];
//     $tempData[$i]['data'][0]= rand(60,95)/100;
//     $tempData[$i]['data'][1]= rand(60,95)/100;
//     $tempData[$i]['dif']=$tempData[$i]['data'][1]-$tempData[$i]['data'][0];
// }
// echo json_encode($tempData);
?>