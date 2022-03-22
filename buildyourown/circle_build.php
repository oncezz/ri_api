<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$partner = $_POST['partner'];
$reporting=$_POST['reporting'];
$type = $_POST['type'];
$dimension=$_POST['dimension'];
// echo $type;
// $type = "Sustatain";
if($type == "Conventional"){
    $table = "ri_build_con";
} else {
    $table = "ri_build_sus";
}
$dimSize=sizeof($dimension);
$total = 0;
$result=0;

$cloneTable = $db->select($table,[
    "reporting","partner","dim"
],[
    "reporting"=>$reporting,
    "partner"=>$partner,
    "dim"=>$dimension
]);

// for($i=0;$i<sizeof($reporting);$i++){
//     for($j=0;$j<sizeof($partner);$j++){
//         if($reporting[$i]!=$partner[$j]){
//             $total++;
//             $eachPair = $db->count($table,[
//                 "reporting"=>$reporting[$i],
//                 "partner"=>$partner[$j],
//                 "dim"=>$dimension
//             ]);
//             if($eachPair/$dimSize>=0.5){
//                 $result++;
//             }
//         }
//     }
// }
// $percent = round($result/($total) *100);
echo json_encode($cloneTable);
?>