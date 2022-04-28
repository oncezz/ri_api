<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$input=$_POST['input'];
$partnerMap=$_POST['partnerMap'];
$reporterMap=$_POST['reportMap'];
$dimensionIndex=$_POST['index'];
$indicator=$_POST['indicator'];

$type = $input["type"];
$yearMax = $input['year']['max'];
$yearMin = $input['year']['min'];
$diffYear = floor(($yearMax - $yearMin)/2);

if($type == "Sustainable"){
    $table = "ri_intra_allindi_sus";
} else {
    $table = "ri_intra_allindi_con";
}

for($i=0;$i<sizeof($indicator);$i++){
    $result[$i][0]=$db->avg($table,"score",[
        "reporter"=>$reporterMap,
        "partner"=>$partnerMap,
        "dimension"=>$dimensionIndex,
        "indicator"=>$i+1,
        "year[<>]"=>[$yearMin,$yearMin+$diffYear]
    ]);
    $result[$i][1]=$db->avg($table,"score",[
        "reporter"=>$reporterMap,
        "partner"=>$partnerMap,
        "dimension"=>$dimensionIndex,
        "indicator"=>$i+1,
        "year[<>]"=>[$yearMax-$diffYear,$yearMax]
    ]);
}
$numIndication = sizeof($result);
for($i=0; $i< $numIndication;$i++){
    $tempData[$i]['catName']=$indicator[$i];
    $tempData[$i]['data'][0]= round($result[$i][0],4);
    $tempData[$i]['data'][1]= round($result[$i][1],4);
    $tempData[$i]['dif']=$tempData[$i]['data'][1]-$tempData[$i]['data'][0];
}
echo json_encode($tempData);
?>