<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$countryFullList=$_POST['countryFullList'];
$countryMap=$_POST['countryMap'];
$input=$_POST['input'];
$yearMax = $input['year']['max'];
$yearMin = $input['year']['min'];

$type=$input['type'];
if($type == "Sustainable"){
    $table = "ri_intra_sus_alldim";
} else {
    $table = "ri_intra_con_alldim";
}

$result =$db->select($table,[
    "dimension",
    "score",
    "year"
],[
    "reporter"=>$countryMap,
    "partner"=>$countryMap,
    "year[<>]"=>[$yearMin,$yearMax]
]);

echo json_encode($result);
?>

