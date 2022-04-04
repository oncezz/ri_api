<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$countryFullList=$_POST['countryFullList'];
$countryMap=$_POST['countryMap'];
$input=$_POST['input'];
$yearMax = $input['year']['max'];
$yearMin = $input['year']['min'];
$diffYear = $yearMax - $yearMin;
$type=$input['type'];
$dimension = ['Trade and investment', 'Financial', 'Regional value chains', 'Infrastructure','Movement of people', 'Regulatory cooperation','Digital economy'];

if($type == "Sustainable"){
    $table = "ri_intra_sus_alldim";
} else {
    $table = "ri_intra_con_alldim";
}

$result =$db->select($table,[
    "dimension",
    "score",
    "year"
],[
    "reporter"=>$countryMap,
    "partner"=>$countryMap,
    "year[<>]"=>[$yearMin,$yearMax]
]);
// for($i=0;$i<sizeof($dimension);$i++){
//     $dim=$i+1;
//     $indexList = [];
//     $result[$i]['name'] =  $dimension[$i];
//     for($year = $yearMin; $year <=$yearMax;$year ++){
//         $tempScore=$db->avg($table,"score",[
//             "reporter"=>$countryMap,
//             "partner"=>$countryMap,
//             "dimension"=>$dim,
//             "year"=>$year
//         ]);

//         array_push($indexList, $tempScore);
//     }
//     $result[$i]['data']= $indexList;
//     $result[$i]['lastValue'] = (float)number_format($indexList[$diffYear],2);
// }
echo json_encode($result);
?>

