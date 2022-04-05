<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$countryFullList=$_POST['countryFullList'];
$countryMap=$_POST['countryMap'];
$input=$_POST['input'];

$type=$input['type'];
$countrySize=sizeof($countryMap);

if($type == "Conventional"){
    $table = "ri_build_con";
} else {
    $table = "ri_build_sus";
}

$result = $db->select($table,[
    "reporting",
    "partner",
    "dim"
],[
    "reporting"=>$countryMap,
    "partner"=>$countryMap,
]);

// for($i=0;$i<$dimensionSize;$i++){
//     $result[$i]['name'] =  $dimensioName[$i];
//     $result[$i]['data'] = $db->count($table,[
//         "reporting"=>$countryMap,
//         "partner"=>$countryMap,
//         "dim"=>$i+1,
       
//     ]);
//     // $count+=$result[$i]['data'];
// }

// for($i=0;$i<$dimensionSize;$i++){
//     $result[$i]['data']*=100;
//     $result[$i]['data']/=($countrySize-1)*$countrySize;
//     $result[$i]['data']=round( $result[$i]['data'],2);
// }
echo json_encode($result);
?>