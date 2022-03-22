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

$yourScoreAvg =$db-> avg($table,"score",[
    "reporter" => $economic,
    "partner" => $economic,
    "year"=>$year
]) ;
$result[0]['name'] = $name;
$result[0]['value']= round($yourScoreAvg,2);
$result[0]['own']= true;
echo json_encode($result);
?>
