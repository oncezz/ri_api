<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$countryReportList=$_POST['countryReportList'];
$countryPartnerList=$_POST['countryPartnerList'];
$reportMap=$_POST['reportMap'];
$partnerMap=$_POST['partnerMap'];
$input=$_POST['input'];
$dimension=$_POST['dimMap'];
$dimPass=sizeof($dimension)/2;

$type=$input['type'];


$sizePartner=sizeof($partnerMap);
$sizeReport=sizeof($reportMap);
if($type == "Sustainable"){
    $table = "ri_build_sus";
} else {
    $table = "ri_build_con";
}
$result = [];
for($i=0;$i<$sizePartner;$i++){
    $count=0;
    for($j=0;$j<$sizeReport;$j++){
        $data=$db->count($table,[
            "reporting"=>$reportMap[$j],
            "partner"=>$partnerMap[$i]
        ]);
        if($data>=$dimPass){
            $count++;
        }
    }
    $result[$i]['name']=$countryPartnerList[$i]['label'];
    $result[$i]['data']=$count/$sizeReport*100;
}
echo json_encode($result);
?>