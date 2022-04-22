<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$input=$_POST['input'];
$data=$_POST['data'];
$countryMap=$_POST['countryMap'];
$dimension=$_POST['dimension'];
$dimensionIndex=$_POST['index'];

$type = $input["type"];
$yearMax = $input['year']['max'];
$yearMin = $input['year']['min'];
$diffYear = floor(($yearMax - $yearMin)/2);

if($type == "Sustainable"){
    $table = "ri_intra_sus_alldim";
} else {
    $table = "ri_intra_con_alldim";
}

$allCountry=sizeof($data);
$count=0;
for($i=0; $i< $allCountry;$i++){

    $tempData[$count]['data'][0]=$db->avg($table,"score",[
        "OR"=>[
            "reporter"=>$countryMap[$i],
            "partner"=>$countryMap[$i],
        ],
        "reporter"=>$countryMap,
        "partner"=>$countryMap,
        "dimension"=>$dimensionIndex,
        "year[<>]"=>[$yearMin,$yearMin+$diffYear]
    ]);
    $tempData[$count]['data'][1]=$db->avg($table,"score",[
        "OR"=>[
            "reporter"=>$countryMap[$i],
            "partner"=>$countryMap[$i],
        ],
        "reporter"=>$countryMap,
        "partner"=>$countryMap,
        "dimension"=>$dimensionIndex,
        "year[<>]"=>[$yearMax-$diffYear,$yearMax]
    ]);
    $tempData[$count]['country']=$data[$i]['label'];
    $tempData[$count]['dif']=$tempData[$count]['data'][1]-$tempData[$count]['data'][0];
    if($tempData[$count]['data'][0]!=null&& $tempData[$count]['data'][1]!=null){
        $count++;
    }
}

echo json_encode($tempData);
?>



