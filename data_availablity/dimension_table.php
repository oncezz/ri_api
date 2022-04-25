<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$report=$_POST['report'];                   // country report
$partner=$_POST['partner'];                 // country partner
$dataBase=$_POST['dataBase'];               // database type  'digi'= DigiSRII  ,  'all'= ALL Data
$integration=$_POST['integration'];         // "sustainable" / "conventional"

//  set $dimensionData
$dimensionData[0]['label']="Trade and investment";
$dimensionData[1]['label']="Financial";
$dimensionData[2]['label']="Regional value chain";
$dimensionData[3]['label']="Infrastructure";
$dimensionData[4]['label']="Movement of peolple";
$dimensionData[5]['label']='Regulatory cooperation';
$dimensionData[6]['label']='Digital economy';

if($dataBase == 'digi'){
    $table = "data_digi_dimension_";
} else {
    $table = "data_all_dimension_";
}

if($integration == "sustainable"){
    $table .= "sus";
} else {
    $table .= "con";
}
$result = $db->select($table, [
    "report","partner", "dim", "coverage"
],[
    "report"=>$report,
    "partner"=>$partner
]);

echo json_encode($result);
?>