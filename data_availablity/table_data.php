<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$report=$_POST['report'];                   // country report
$partner=$_POST['partner'];                 // country partner
$dataBase=$_POST['dataBase'];               // database type  'digi'= DigiSRII  ,  'all'= ALL Data
$compareType=$_POST['compareType'];         // 'group'= Economy group,  'specific'= report, partner ; when compare 'group' report=partner
$disaggregation=$_POST['disaggregation'];   // 'pair'=Pair , 'dimension'=Dimension and indicator

for($i=0;$i<sizeof($report);$i++){

    $result[$i]['label']=$report[$i]['label'];
    $result[$i]['iso']=$report[$i]['iso'];
    for($k=0;$k<8;$k++){
    for($j=0;$j<sizeof($partner);$j++){
        

        if($report[$i]['iso']==$partner[$j]['iso']){
            $result[$i]['data'][$k][$j]=-99 ;                   // return -  mean same country
        }
       else{
        $result[$i]['data'][$k][$j]= rand(40,120) ;
            if($result[$i]['data'][$k][$j]>115){
                $result[$i]['data'][$k][$j]=0;                  // return  0 = No Data
            }
            else if($result[$i]['data'][$k][$j]>100){
                $result[$i]['data'][$k][$j]=100;
            }
        }
    
    
    }
}
//////// avg at data[0][n]  of 7 ; n mean 7 dimension
for($j=0;$j<sizeof($partner);$j++){
   
    if($result[$i]['data'][0][$j]>0){
        $count=0;
        $result[$i]['data'][0][$j]=0;
    for($k=1;$k<8;$k++){
        if($result[$i]['data'][$k][$j]!=0){
        $result[$i]['data'][0][$j]+=$result[$i]['data'][$k][$j];
        $count++;
        }
    }
    $result[$i]['data'][0][$j]=round($result[$i]['data'][0][$j]/$count);
}
}
}
echo json_encode($result);
?>