<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$input=$_POST['input'];
$countryReportList=$_POST['countryReportList'];
$reportMap=$_POST['reportMap'];
$countryPartnerList=$_POST['countryPartnerList'];
$partnerMap=$_POST['partnerMap'];
$dimension=$_POST['dimension'];

$yearMax = $input['year']['max'];
$yearMin = $input['year']['min'];

$type=$input['type'];
if($type == "Conventional"){
    $table = "ri_build_con";
} else {
    $table = "ri_build_sus";
}

$result = $db->select($table,[
    "reporting",
    "partner",
    "dim"
],[
    "reporting"=>$reportMap,
    "partner"=>$partnerMap,
    "dim"=>$dimension
]);

echo json_encode($result);
?>