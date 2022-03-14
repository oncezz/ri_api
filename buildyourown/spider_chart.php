<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$selected = $_POST['selected'];
$input=$_POST['input'];
$dimension=$_POST['indicator'];

for($i=0;$i<sizeof($dimension);$i++){
    $result[$i]['data'][0]=rand(30,99);
    $result[$i]['data'][1]=rand(30,99);
    $result[$i][name]=$dimension[$i]['name'];
}
echo json_encode($result);
?>