<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$partner = $_POST['partner'];
$reporting = $_POST['reporting'];
$year = $_POST['year'];
$type = $_POST['type'];
$name=$_POST['name'];
$dim =$_POST['dimension'];


if($type == "Sustainable"){
    $table = "ri_5bar_buildyourown_sus";
} else {
    $table = "ri_5bar_buildyourown_con";
}

$result =$db->select($table,["dimension","reporter","partner","score","year"],[
    "reporter" => $reporting,
    "partner" => $partner,
    "year"=>$year,
    "dimension"=>$dim
]) ;
echo json_encode($result);
?>
