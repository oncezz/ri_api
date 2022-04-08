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
    $table = "ri_intra_con_alldim";
} else {
    $table = "ri_intra_sus_alldim";
}

$result=$db->select($table,[
    "reporter","partner","dimension","score"
],[
    "OR"=>[
        "reporter"=>$selected['iso'],
        "partner"=>$selected['iso']
    ],
    "reporter"=>$countryMap,
    "partner"=>$countryMap,
    "year"=>$year,
]);

echo json_encode($result);
?>