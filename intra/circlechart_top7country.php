<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$countryFullList=$_POST['countryFullList'];
$input=$_POST['input'];
$selected=$_POST['selected'];
$countryMap=$_POST['countryMap'];

$selectCountry=$selected['label'];
$year=$input['year']['max'];
$type=$input['type'];

if($type == "Conventional"){
    $table = "ri_5bar_intra_con";
} else {
    $table = "ri_5bar_intra_sus";
}

for($i=0;$i<sizeof($countryMap);$i++){
    $avgData[$i]['y']=$db->avg($table,"score",[
        "reporter"=>[$selected['iso'],$countryMap[$i]],
        "partner"=>[$selected['iso'],$countryMap[$i]],
        "year"=>$year,
    ]);
    $avgData[$i]['y']= round($avgData[$i]['y'],3);
    $avgData[$i]['name']=$countryFullList[$i]['label'];
}
rsort($avgData);

for($i=0;$i<sizeof($avgData);$i++){
    if($avgData[$i]['name']==$selectCountry){
        $indexSelect=$i;
    }
}
$result=[];
$resultSize=7;
if(sizeof($countryMap)<8){
    $resultSize=sizeof($countryMap);
}
for($i=0;$i<$resultSize;$i++){
    $result[$i]=$avgData[$i];
}
echo json_encode($result);
?>