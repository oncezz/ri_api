<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$partner = $_POST['partner'];
$reporting = $_POST['reporting'];
$name=$_POST['name'];
$year = $_POST['year'];
$type = $_POST['type'];

if($type == "Sustainable"){
    $table = "ri_5bar_eco_sus";
} else {
    $table = "ri_5bar_eco_con";
}

$result =$db-> select($table,[
    "reporter","partner","score"
],[
    "reporter" => $reporting,
    "partner" => $partner,
    "year"=>$year
]) ;

echo json_encode($result);
?>
