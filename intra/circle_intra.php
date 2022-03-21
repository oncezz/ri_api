<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$economic = $_POST['economic'];
// $economic[0] = "AFG";
// $economic[1]="BTN";
// $economic[2]="LAO";
// $economic[3]="NPL";
$type = $_POST['type'];
// echo $type;
// $type = "Sustatain";
// print_r($economic);
if($type == "Conventional"){
    $table = "ri_intra_con";
} else {
    $table = "ri_intra_sus";
}

$result = $db->count($table,[
    "reporting"=>$economic,
    "partner"=>$economic
]);
// echo $result;
$total = sizeof($economic)* (sizeof($economic)-1);
$percent = round($result/$total *100);
echo $percent;
?>