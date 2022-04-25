<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$report=$_POST['report'];                   // country report
$partner=$_POST['partner'];                 // country partner
$dataBase=$_POST['dataBase'];               // database type  'digi'= DigiSRII  ,  'all'= ALL Data
$integration=$_POST['integration'];         // "sustainable" / "conventional"

if($dataBase == 'digi'){
    $table = "data_digi_pair_";
} else {
    $table = "data_all_pair_";
}

if($integration == "sustainable"){
    $table .= "sus";
} else {
    $table .= "con";
}

$result = $db->select($table, ['report','partner','avg'],[
    "report"=>$report,
    "partner"=>$partner
]);
echo json_encode($result);
?>