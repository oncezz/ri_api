<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$partner = $_POST['partner'];
$reporting=$_POST['reporting'];
$type = $_POST['type'];
// echo $type;
// $type = "Sustatain";
if($type == "Conventional"){
    $table = "ri_eco_con";
} else {
    $table = "ri_eco_sus";
}

$cloneTable = $db->select($table,[
    "reporting","partner"
],[
    "reporting"=>$reporting,
    "partner"=>$partner,
]);
echo json_encode($cloneTable);
?>