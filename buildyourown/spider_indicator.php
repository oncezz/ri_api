<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$reportMap=$_POST['reporter'];
$partnerMap=$_POST['partner'];
$input=$_POST['input'];
$dimension=$_POST['dim'];
$year[0]=$input['year']['min'];
$year[1]=$input['year']['max'];
$type=$input['type'];

if($type == "Sustainable"){
    $table = "ri_intra_allindi_sus";
} else {
    $table = "ri_intra_allindi_con";
}
$result=$db->select($table,[
    "reporter","partner","year","dimension","score","indicator"
],[
    "reporter"=>$reportMap,
    "partner"=>$partnerMap,
    "dimension"=>$dimension,
    "year[<>]"=>$year
]);
echo json_encode($result);
?>