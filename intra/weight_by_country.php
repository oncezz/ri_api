<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$countryFullList=$_POST['countryFullList'];
$countryMap=$_POST['countryMap'];
$input=$_POST['input'];
$type=$input['type'];

$result = [];
$sizeCountry=sizeof($countryMap);
if($type == "Conventional"){
    $table = "ri_intra_con";
} else {
    $table = "ri_intra_sus";
}
$divideCount=0;

for($i=0;$i<$sizeCountry;$i++){
  
    $data=$db->count($table,[
        "OR"=>[
            "reporting"=>$countryMap[$i],
            "partner"=>$countryMap[$i]
        ],
        "reporting"=>$countryMap,
        "partner"=>$countryMap,
       
        ]);
    $result[$i]['data']=$data;
    $divideCount+=$data;
    // $result[$i]['data'][$j-$yearMin]=round($avg,2);
    $result[$i]['name']=$countryFullList[$i]['label'];
}
// echo $divideCount;
for($i=0;$i<$sizeCountry;$i++){
    $result[$i]['data']= round($result[$i]['data']/$divideCount*100,1);
}
echo json_encode($result);
?>