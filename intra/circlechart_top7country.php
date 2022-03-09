<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$countryFullList=$_POST['countryFullList'];
$input=$_POST['input'];
$selected=$_POST['selected'];


$result[0]['y']=rand(30,99)/100;
$result[1]['y']=rand(30,99)/100;
$result[2]['y']=rand(30,99)/100;
$result[3]['y']=rand(30,99)/100;
$result[4]['y']=rand(30,99)/100;
$result[5]['y']=rand(30,99)/100;
$result[6]['y']=rand(30,99)/100;
$result[7]['y']=rand(30,99)/100;

$result[0]['name']="China";
$result[1]['name']="Vietnam";
$result[2]['name']="Thailand";
$result[3]['name']="South Korea";
$result[4]['name']="Your group";
$result[5]['name']="Spain";
$result[6]['name']="Mlaysia";
$result[7]['name']="Peru";

// $result[0]['color']="#8DBDD9";
// $result[1]['color']="#C0E0DB";
// $result[2]['color']="#E8B0CB";
// $result[3]['color']="#EB1E63";
$result[4]['color']="#F99704";
// $result[5]['color']="#2D9687";
// $result[6]['color']="#2381B8";
// $result[7]['color']="#C4C4C4";

echo json_encode($result);
?>