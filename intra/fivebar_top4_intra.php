<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$economic = $_POST['economic'];
$name=$_POST['name'];
$year = $_POST['year'];
$type = $_POST['type'];

if($type == "Sustainable"){
    $table = "ri_5bar_intra_sus";
} else {
    $table = "ri_5bar_intra_con";
}

$result =$db-> select($table,[
    "reporter","partner","score"
],[
    "reporter" => $economic,
    "partner" => $economic,
    "year"=>$year
]) ;

echo json_encode($result);
?>
