<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$report=$_POST['report'];
$partner=$_POST['partner'];
$dataBase=$_POST['dataBase'];
$compareType=$_POST['compareType'];
$disaggregation=$_POST['disaggregation'];

for($i=0;$i<sizeof($report);$i++){

    $result[$i]['label']=$report[$i]['label'];
    $result[$i]['iso']=$report[$i]['iso'];
    for($j=0;$j<sizeof($partner);$j++){
        if($i==$j){
            $result[$i]['data'][$j]=-1 ;
        }
       else{$result[$i]['data'][$j]= rand(40,120) ;}
    }
}
echo json_encode($result);
?>