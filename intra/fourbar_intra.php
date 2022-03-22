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



$result[0]['name'] = 'China-Mongolia';
$result[0]['value']= 0.91;
$result[0]['own']= false;

$result[1]['name'] = 'ASEAN';
$result[1]['value']= 0.84;
$result[1]['own']= false;

$result[2]['name'] = $name;
$result[2]['value']= 0.74;
$result[2]['own']= false;

$result[3]['name'] = 'Asia-Pacific';
$result[3]['value']= 0.56;
$result[3]['own']= false;

$result[4]['name'] = $name;
$result[4]['value']= round($yourScoreAvg,2);
$result[4]['own']= true;
echo json_encode($result);
?>
