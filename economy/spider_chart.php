<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$selected = $_POST['selected'];
$input=$_POST['input'];
$result[0] = [];
$result[1] = [];
for($i=1;$i<=7;$i++){
    array_push( $result[0],rand(30,70));
    array_push( $result[1],rand(30,70));
}
echo json_encode($result);
?>