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

for($i=0;$i<$sizeCountry;$i++){
  
    $data=$db->count($table,[
        "OR"=>[
            "reporting"=>$countryMap[$i],
            "partner"=>$countryMap[$i]
        ],
        "reporting"=>$countryMap,
        "partner"=>$countryMap,
       
        ]);
    $result[$i]['data']=$data/($sizeCountry*2-2)*100;
  
    $result[$i]['name']=$countryFullList[$i]['label'];
}
// $result[$i]['data']=$data/(sizeCountry*(sizeCountry-1));

// for($i=0;$i<sizeof($countryFullList);$i++){
//     $result[$i]['name'] =  $countryFullList[$i]['label'];
//     $result[$i]['data'] = rand(40,90);
// }
echo json_encode($result);
?>