<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$countryReportList=$_POST['countryReportList'];
$countryPartnerList=$_POST['countryPartnerList'];
$reportMap=$_POST['reportMap'];
$partnerMap=$_POST['partnerMap'];
$dimMap=$_POST['dimMap'];
$input=$_POST['input'];
$yearMax = $input['year']['max'];
$yearMin = $input['year']['min'];
$type=$input['type'];

$result = [];
if($type == "Sustainable"){
    $table = "ri_5bar_buildyourown_sus";
} else {
    $table = "ri_5bar_buildyourown_con";
}


$avg=$db->select($table,["reporter","partner","year","score","dimension"],[
    "reporter"=>$reportMap,
    "partner"=>$partnerMap,
    "year[<>]"=>[$yearMin,$yearMax],
    "dimension"=>$dimMap,
]);
echo json_encode($avg);
?>