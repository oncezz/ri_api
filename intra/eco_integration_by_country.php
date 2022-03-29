<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$countryFullList=$_POST['countryFullList'];
$countryMap=$_POST['countryMap'];
$input=$_POST['input'];
$yearMax = $input['year']['max'];
$yearMin = $input['year']['min'];
$type=$input['type'];
$diffYear = $yearMax - $yearMin;

// print_r($input['year']['max']);
// print_r($countryFullList);

$result = [];
if($type == "Sustainable"){
    $table = "ri_5bar_intra_sus";
} else {
    $table = "ri_5bar_intra_con";
}

for($i=0;$i<sizeof($countryMap);$i++){
    for($j=$yearMin;$j<=$yearMax;$j++){

    $avg=$db->avg($table,"score",[
        "OR"=>[
            "reporter"=>$countryMap[$i],
            "partner"=>$countryMap[$i]
        ],
        "reporter"=>$countryMap,
        "partner"=>$countryMap,
        "year"=>$j
        ]);
    $result[$i]['data'][$j-$yearMin]=$avg;
    // $result[$i]['data'][$j-$yearMin]=round($avg,2);
    
    }
    $result[$i]['name']=$countryFullList[$i]['label'];
    $result[$i]['lastValue']=$result[$i]['data'][sizeof($result[$i]['data'])-1];
}
echo json_encode($result);

?>