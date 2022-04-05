<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$input=$_POST['input'];
$countryReportList=$_POST['countryReportList'];
$reportMap=$_POST['reportMap'];
$countryPartnerList=$_POST['countryPartnerList'];
$partnerMap=$_POST['partnerMap'];

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
    "reporter"=>$reportMap,
    "partner"=>$partnerMap,
    "year[<>]"=>[$yearMin,$yearMax]
]);

echo json_encode($result);
?>

