<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$countryReportList=$_POST['countryReportList'];
$countryPartnerList=$_POST['countryPartnerList'];
$reportMap=$_POST['reportMap'];
$partnerMap=$_POST['partnerMap'];
$input=$_POST['input'];
$type=$input['type'];

$result = [];
$sizePartner=sizeof($partnerMap);
$sizeReport=sizeof($reportMap);
if($type == "Conventional"){
    $table = "ri_eco_con";
} else {
    $table = "ri_eco_sus";
}

for($i=0;$i<$sizePartner;$i++){
  
    $data=$db->count($table,[
        "reporting"=>$reportMap,
        "partner"=>$partnerMap[$i],
        ]);
    $result[$i]['data']=$data/$sizeReport*100;
    $result[$i]['name']=$countryPartnerList[$i]['label'];
}
echo json_encode($result);
?>