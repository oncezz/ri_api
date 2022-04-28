<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$selected=$_POST['selected'];
$reportMap=$_POST['reporter'];
$input=$_POST['input'];
$dim=$_POST['dimension'];
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
    "partner"=>$selected,
    "dimension"=>$dim,
    "year[<>]"=>$year
]);
echo json_encode($result);
?>