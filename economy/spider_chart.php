<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$selected=$_POST['selected'];
$reportMap=$_POST['reporter'];
$input=$_POST['input'];
$year[0]=$input['year']['min'];
$year[1]=$input['year']['max'];
$type=$input['type'];

if($type == "Sustainable"){
    $table = "ri_5bar_buildyourown_sus";
} else {
    $table = "ri_5bar_buildyourown_con";
}
$result=$db->select($table,[
    "reporter","partner","year","dimension","score"
],[
    "reporter"=>$reportMap,
    "partner"=>$selected,
    "year[<>]"=>$year
]);
echo json_encode($result);
?>