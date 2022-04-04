<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$countryFullList=$_POST['countryFullList'];
$countryMap=$_POST['countryMap'];
$input=$_POST['input'];
$yearMax = $input['year']['max'];
$yearMin = $input['year']['min'];
$diffYear = $yearMax - $yearMin;
$type=$input['type'];

if($type == "Sustainable"){
    $table = "ri_5bar_intra_sus";
} else {
    $table = "ri_5bar_intra_con";
}
$result=[];
for($i=$yearMin;$i<=$yearMax;$i++){
    $tempScore=$db->avg($table,"score",[
                    "reporter"=>$countryMap,
                    "partner"=>$countryMap,
                    "year"=>$i
                ]);
     array_push($result, round($tempScore,4));
}

echo json_encode($result);
?>

