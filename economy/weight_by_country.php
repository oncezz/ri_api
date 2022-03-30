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
$divideCount=0;

for($i=0;$i<$sizePartner;$i++){
  
    $data=$db->count($table,[
        "reporting"=>$reportMap,
        "partner"=>$partnerMap[$i],
        ]);
    $result[$i]['data']=$data;
    $divideCount+=$data;
    $result[$i]['name']=$countryPartnerList[$i]['label'];
}
for($i=0;$i<$sizePartner;$i++){
    $result[$i]['data']= round($result[$i]['data']/$divideCount*100,1);
}
echo json_encode($result);
?>