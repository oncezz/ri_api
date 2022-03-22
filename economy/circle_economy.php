<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$partner = $_POST['partner'];
$reporting=$_POST['reporting'];

// echo $reporting;
// $economic[0] = "AFG";
// $economic[1]="BTN";
// $economic[2]="LAO";
// $economic[3]="NPL";
$type = $_POST['type'];
// echo $type;
// $type = "Sustatain";

if($type == "Conventional"){
    $table = "ri_eco_con";
} else {
    $table = "ri_eco_sus";
}

$result = $db->count($table,[
    "reporting"=>$reporting,
    "partner"=>$partner
]);
// echo $result;

$total = 0;
for($i=0;$i<sizeof($reporting);$i++){
    for($j=0;$j<sizeof($partner);$j++){
        if($reporting[$i]!=$partner[$j]){
            $total++;
        }
    }
}
// echo $total;
$percent = round($result/$total *100);
echo $percent;
?>