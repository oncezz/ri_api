<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$input=$_POST['input'];
$data=$_POST['data'];
$countryMap=$_POST['countryMap'];
$dimensionIndex=$_POST['dimension'];


$type = $input["type"];
$yearMax = $input['year']['max'];

if($type == "Sustainable"){
    $table = "ri_intra_allindi_sus";
} else {
    $table = "ri_intra_allindi_con";
}

$result=$db->select($table,[
    "reporter","partner","indicator"
],[
    "year"=>$yearMax,
    "dimension"=>$dimensionIndex,
    "reporter"=>$countryMap,
    "partner"=>$countryMap
]);
echo json_encode($result);
?>