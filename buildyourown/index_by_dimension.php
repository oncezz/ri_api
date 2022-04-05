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
if($type == "Sustainable"){
    $table = "ri_5bar_buildyourown_sus";
} else {
    $table = "ri_5bar_buildyourown_con";
}

$result =$db->select($table,[
    "reporter",
    "partner",
    "dimension",
    "score",
    "year"
],[
    "dimension"=>$dimension,
    "reporter"=>$reportMap,
    "partner"=>$partnerMap,
    "year[<>]"=>[$yearMin,$yearMax]
]);

echo json_encode($result);
?>

