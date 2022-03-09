<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$selected = $_POST['selected'];
$input=$_POST['input'];
$index = $_POST['index'];

if($input['type']=="Conventional"){
    if($index==0){
        $gendata = 5;
    } else if($index ==1){
        $gendata =3;
    } else if($index == 2){
        $gendata = 4;
    } else if($index ==3){
        $gendata = 4;
    } else if($index==4){
        $gendata = 4;
    } else if($index == 5){
        $gendata = 4;
    } else {
        $gendata = 4;     
    }
}else {
    if($index==0){
        $gendata = 4;
    } else if($index ==1){
        $gendata =3;
    } else if($index == 2){
        $gendata = 3;
    } else if($index ==3){
        $gendata = 3;
    } else if($index==4){
        $gendata = 2;
    } else if($index == 5){
        $gendata = 4;
    } else {
        $gendata = 4;     
    }
}
$result[0] = [];
$result[1] = [];

for($i=1;$i<=$gendata;$i++){
    array_push( $result[0],rand(30,70)/100);
    array_push( $result[1],rand(30,70)/100);
}
echo json_encode($result);
?>