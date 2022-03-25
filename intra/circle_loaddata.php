<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$economic = $_POST['economic'];

$type = $_POST['type'];
// echo $type;
// $type = "Sustatain";
if($type == "Conventional"){
    $table = "ri_intra_con";
} else {
    $table = "ri_intra_sus";
}

$cloneTable = $db->select($table,[
    "reporting","partner"
],[
    "reporting"=>$economic,
    "partner"=>$economic,
]);
echo json_encode($cloneTable);
?>