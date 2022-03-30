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

for($i=0;$i<sizeof($partnerMap);$i++){
    for($j=$yearMin;$j<=$yearMax;$j++){
    $avg=[];
    $avg=$db->select($table,"score",[
        "reporter"=>$reportMap,
        "partner"=>$partnerMap[$i],
        "year"=>$j,
        "dimension"=>$dimMap,
        "GROUP" =>[
            "reporter"
        ]
        ]);
    
    // echo "array :";
    // print_r($avg);
    
    // echo " \n\n";
    $temp=array_sum($avg)/sizeof($avg);
    // echo " avg :";
    // echo $temp;
    $result[$i]['data'][$j-$yearMin]=round($temp,4);
    }
    // echo " \r";
    
    $result[$i]['name']=$countryPartnerList[$i]['label'];
    $result[$i]['lastValue']=$result[$i]['data'][sizeof($result[$i]['data'])-1];
}

echo json_encode($result);
?>