<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$countryList = $_POST['data'];
$input = $_POST['input'];
$selected = $_POST['selected'];

$type = $input["type"];
$yearEnd = $input['year']['max'];
$yearStart = $input['year']['min'];
$diffYear = floor(($input['year']['max'] - $input['year']['min'])/2);
$series1 = "test";


if($type == 'Conventional'){
    if($selected == "Trade and investment"){
        $subData =  ['Exports to GDP', 'Imports to GDP', 'Import tarriffs','FDI inflows to GDP', 'FDI outflows to GDP'];
        $subDataLower =  ['exports to GDP', 'imports to GDP', 'import tarriffs','FDI inflows to GDP', 'FDI outflows to GDP'];
    } else if($selected == "Financial"){
        $subData =  ['Cross-border portfolio liablilities and assests to GDP', 'Deposit rates dispersion','Share price index correlation'];
        $subDataLower =  ['cross-border portfolio liablilities and assests to GDP', 'deposit rates dispersion','share price index correlation'];
    } else if ($selected == "Regional value chain"){
        $subData = ['Export complementarity index', 'RVC participation index', 'Intermediate goods exports to GDP', 'Intermediate goods imports to GDP'];
        $subDataLower = ['export complementarity index', 'RVC participation index', 'intermediate goods exports to GDP', 'intermediate goods imports to GDP'];
    } else if ($selected == "Infrastructure"){
        $subData = ['Linear shipping connectivity index', 'Trade facilitation implement','Average internet quality','Average trade cost'];
        $subDataLower = ['linear shipping connectivity index', 'trade facilitation implement','average internet quality','average trade cost'];
    } else if ($selected == "Movement of peolple"){
        $subData = ['Stock of emigrants per capita', 'Stock of immigrants per capita','Remittances outflow to GDP','Remittances inflow to GDP'];
        $subDataLower = ['stock of emigrants per capita', 'stock of immigrants per capita','remittances outflow to GDP','remittances inflow to GDP'];
    } else if($selected == 'Regulatory cooperation'){
        $subData = ['Signed FTA (Yes/No)', 'Signed IIA (Yes/No)' , 'Embassy (yes/No)', 'Trade regulatory distance'];
        $subDataLower = ['signed FTA (Yes/No)', 'signed IIA (Yes/No)' , 'embassy (yes/No)', 'trade regulatory distance'];
    } else if($selected ==  'Digital economy'){
        $subData = ['ICT goods exports to GDP', 'Signed IIA (Yes/No)' , 'Embassy (yes/No)', 'Trade regulatory distance'];
        $subDataLower = ['ICT goods exports to GDP', 'signed IIA (Yes/No)' , 'embassy (yes/No)', 'trade regulatory distance'];
    }
}
else {
    if($selected == "Trade and investment"){
        $subData =  ['Environmental goods exports in GDP of exporting country', 'Environmental goods imports in GDP of importing country', 'Tariff on intraregional imports of environmental goods','Employment created by DVA in exports to regional economies'];
        $subDataLower =  ['environmental goods exports in GDP of exporting country', 'environmental goods imports in GDP of importing country', 'tariff on intraregional imports of environmental goods','employment created by DVA in exports to regional economies'];
    } else if($selected == "Financial"){
        $subData =   ['Intraregional real exchange rate volatility', 'Average intraregional financial development index score','Volatility weighted pair-wise correlaton of share price index averaged regionally'];
        $subDataLower =   ['intraregional real exchange rate volatility', 'average intraregional financial development index score','volatility weighted pair-wise correlaton of share price index averaged regionally'];
    } else if ($selected == "Regional value chain"){
        $subData = ['Regional environmental good export complementarity index', 'Sustainable RVC participation index', 'Intraregional exports of intermediates per unit of CO2 emissions'];
        $subDataLower = ['regional environmental good export complementarity index', 'sustainable RVC participation index', 'intraregional exports of intermediates per unit of CO2 emissions'];
    } else if ($selected == "Infrastructure"){
        $subData =  ['Average intraregional rural access to electricity', 'Intraregional sustainable trade facilitation implementation','Average intraregional share of Internet users in population'];
        $subDataLower =  ['average intraregional rural access to electricity', 'intraregional sustainable trade facilitation implementation','average intraregional share of Internet users in population'];
    } else if ($selected == "Movement of peolple"){
        $subData = ['Average outward remittances per regional immigrant','Average inward remittances per emigrant'];
        $subDataLower = ['average outward remittances per regional immigrant','average inward remittances per emigrant'];
    } else if($selected == 'Regulatory cooperation'){
        $subData = ['Sustainable regional FTA score', 'Sustainable regional IIA score' , 'Average intraregional rule of law index score', 'SDG trade regulatory distance from regional partners'];
        $subDataLower = ['sustainable regional FTA score', 'sustainable regional IIA score' , 'average intraregional rule of law index score', 'SDG trade regulatory distance from regional partners'];
    } else if($selected ==  'Digital economy'){
        $subData =['Sustainable regional FTA score', 'Sustainable regional IIA score' , 'Average intraregional rule of law index score', 'SDG trade regulatory distance from regional partners'];
        $subDataLower =['sustainable regional FTA score', 'sustainable regional IIA score' , 'average intraregional rule of law index score', 'SDG trade regulatory distance from regional partners'];
    }
}

$numIndication = sizeof($subData);

for($i=0; $i< $numIndication;$i++){
    $tempData[$i]['data']= rand(60,95);
    $tempData[$i]['catName'] = $subData[$i];
    $tempData[$i]['catNameLower'] = $subDataLower[$i];
}

echo json_encode($tempData);
?>