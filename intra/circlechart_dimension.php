<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$countryFullList=$_POST['countryFullList'];
$input=$_POST['input'];

$result[0]['name']="Trade and investment";
$result[1]['name']="Financial";
$result[2]['name']="Regional value chains";
$result[3]['name']="Infrastructure";
$result[4]['name']="Movement of people";
$result[5]['name']="Regional cooperation";
$result[6]['name']="Digital economy";
$result[7]['name']="Average group index";



// $result[0]['color']="#64C1E8";
// $result[1]['color']="#D85B63";
// $result[2]['color']="#D680AD";
// $result[3]['color']="#88643A";
// $result[4]['color']="#C0BA80";
// $result[5]['color']="#FDC47D";
// $result[6]['color']="#EA3B46";
$result[7]['color']="#F99704";

$result[7]['y']=0;
for($i=0;$i<7;$i++){
    $result[$i]['y']=rand(35,99)/100;
    $result[7]['y']+=$result[$i]['y'];
}
$result[7]['y']=round($result[7]['y']/7,2);


echo json_encode($result);
?>