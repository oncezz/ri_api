<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$countryReportList=$_POST['countryReportList'];
$countryPartnerList=$_POST['countryPartnerList'];
$reportMap=$_POST['reportMap'];
$partnerMap=$_POST['partnerMap'];
$input=$_POST['input'];
$yearMax = $input['year']['max'];
$yearMin = $input['year']['min'];
$type=$input['type'];


$result = [];
if($type == "Sustainable"){
    $table = "ri_5bar_eco_sus";
} else {
    $table = "ri_5bar_eco_con";
}

for($i=0;$i<sizeof($partnerMap);$i++){
    for($j=$yearMin;$j<=$yearMax;$j++){

    $avg=$db->avg($table,"score",[
        "reporter"=>$reportMap,
        "partner"=>$partnerMap[$i],
        "year"=>$j
        ]);
    // $result[$i]['data'][$j-$yearMin]=$avg;
    $result[$i]['data'][$j-$yearMin]=round($avg,4);
    
    }
    $result[$i]['name']=$countryPartnerList[$i]['label'];
    $result[$i]['lastValue']=$result[$i]['data'][sizeof($result[$i]['data'])-1];
}
echo json_encode($result);

?>
