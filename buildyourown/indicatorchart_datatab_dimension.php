<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$input=$_POST['input'];
$reportMap=$_POST['reportMap'];
$partnerMap=$_POST['partnerMap'];
$dimensionIndex=$_POST['dimension'];
$indicatorIndex=$_POST['index'];

$type = $input["type"];
$yearMax = $input['year']['max'];
$yearMin = $input['year']['min'];


if($type == "Sustainable"){
    $table = "ri_intra_allindi_sus";
} else {
    $table = "ri_intra_allindi_con";
}

$result=$db->select($table,[
    "reporter","partner","year","score"
],[
    "reporter"=>$reportMap,
    "partner"=>$partnerMap,
    "dimension"=>$dimensionIndex,
    "indicator"=>$indicatorIndex,
    "year[<>]"=>[$yearMin,$yearMax]
]);
echo json_encode($result);
?>