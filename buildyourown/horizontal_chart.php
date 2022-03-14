<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$selected = $_POST['selected'];
$input=$_POST['input'];
$index = $_POST['index'];

if($input['type'] == 'Conventional'){
    if($index == 0){
        $subData =  ['Exports to GDP', 'Imports to GDP', 'Import tarriffs','FDI inflows to GDP', 'FDI outflows to GDP'];
    } else if($index == 1){
        $subData =  ['Cross-border portfolio liablilities and assests to GDP', 'Deposit rates dispersion','Share price index correlation'];
    } else if ($index == 2){
        $subData = ['Export complementarity index', 'RVC participation index', 'Intermediate goods exports to GDP', 'Intermediate goods imports to GDP'];
    } else if ($index == 3){
        $subData = ['Linear shipping connectivity index', 'Trade facilitation implement','Average internet quality','Average trade cost'];
    } else if ($index == 4){
        $subData = ['Stock of emigrants per capita', 'Stock of immigrants per capita','Remittances outflow to GDP','Remittances inflow to GDP'];
    } else if($index == 5){
        $subData = ['Signed FTA (Yes/No)', 'Signed IIA (Yes/No)' , 'Embassy (yes/No)', 'Trade regulatory distance'];
    } else if($index ==  6){
        $subData = ['ICT goods exports to GDP', 'Signed IIA (Yes/No)' , 'Embassy (yes/No)', 'Trade regulatory distance'];
    }
}
else {
    if($index == 0){
        $subData =  ['Environmental goods exports in GDP of exporting country', 'Environmental goods imports in GDP of importing country', 'Tariff on intraregional imports of environmental goods','Employment created by DVA in exports to regional economies'];
     } else if($index == 1){
        $subData =   ['Intraregional real exchange rate volatility', 'Average intraregional financial development index score','Volatility weighted pair-wise correlaton of share price index averaged regionally'];
   } else if ($index == 2){
        $subData = ['Regional environmental good export complementarity index', 'Sustainable RVC participation index', 'Intraregional exports of intermediates per unit of CO2 emissions'];
    } else if ($index == 3){
        $subData =  ['Average intraregional rural access to electricity', 'Intraregional sustainable trade facilitation implementation','Average intraregional share of Internet users in population'];
    } else if ($index == 4){
        $subData = ['Average outward remittances per regional immigrant','Average inward remittances per emigrant'];
   } else if($index == 5){
        $subData = ['Sustainable regional FTA score', 'Sustainable regional IIA score' , 'Average intraregional rule of law index score', 'SDG trade regulatory distance from regional partners'];
    } else if($index ==  6){
        $subData =['Sustainable regional FTA score', 'Sustainable regional IIA score' , 'Average intraregional rule of law index score', 'SDG trade regulatory distance from regional partners'];
    }
}

$numIndication = sizeof($subData);

for($i=0; $i< $numIndication;$i++){
    $tempData[$i]['data'][0]= rand(60,95)/100;
    $tempData[$i]['data'][1]= rand(60,95)/100;
    $tempData[$i]['catName'] = $subData[$i];
}

echo json_encode($tempData);
?>