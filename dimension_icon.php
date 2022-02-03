<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$type = $_POST['type'];

$result[0]['name']= "Trade and investment";
$result[1]['name']="Financial";
$result[2]['name']= 'Regional value chain';
$result[3]['name'] = 'Infrastructure';
$result[4]['name'] = 'Movement of peolple';
$result[5]['name']= 'Regulatory cooperation';
$result[6]['name']= 'Digital economy';

$result[0]['icon']="dimension01.svg";
$result[1]['icon']= "dimension02.svg";
$result[2]['icon']='dimension03.svg';
$result[3]['icon'] = 'dimension04.svg';
$result[4]['icon'] = 'dimension05.svg';
$result[5]['icon'] = 'dimension06.svg';
$result[6]['icon'] = 'dimension07.svg';

$result[0]['color']='#64C1E8';
$result[1]['color']= '#D85B63';
$result[2]['color']='#D680AD';
$result[3]['color'] = '#88643A';
$result[4]['color'] = '#C0BA80';
$result[5]['color'] = '#FDC47D';
$result[6]['color'] = '#EA3B46';



if($type == 'Sustainable'){
  
    $result[0]['indicator'] = ['Exports to GDP', 'Imports to GDP', 'Import tarriffs','FDI inflows to GDP', 'FDI outflows to GDP'];
    $result[1]['indicator'] = ['Cross-border portfolio liablilities and assests to GDP', 'Deposit rates dispersion','Share price index correlation'];
    $result[2]['indicator']= ['Export complementarity index', 'RVC participation index', 'Intermediate goods exports to GDP', 'Intermediate goods imports to GDP'];
    $result[3]['indicator']= ['Linear shipping connectivity index', 'Trade facilitation implement','Average internet quality','Average trade cost'];
    $result[4]['indicator']= ['Stock of emigrants per capita', 'Stock of immigrants per capita','Remittances outflow to GDP','Remittances inflow to GDP'];
    $result[5]['indicator']=['Signed FTA (Yes/No)', 'Signed IIA (Yes/No)' , 'Embassy (yes/No)', 'Trade regulatory distance'];
    $result[6]['indicator']=['ICT goods exports to GDP', 'Signed IIA (Yes/No)' , 'Embassy (yes/No)', 'Trade regulatory distance'];
} else {
    $result[0]['indicator'] = ['Environmental goods exports in GDP of exporting country', 'Environmental goods imports in GDP of importing country', 'Tariff on intraregional imports of environmental goods','Employment created by DVA in exports to regional economies'];
    $result[1]['indicator'] = ['Intraregional real exchange rate volatility', 'Average intraregional financial development index score','Volatility weighted pair-wise correlaton of share price index averaged regionally'];
    $result[2]['indicator']= ['Regional environmental good export complementarity index', 'Sustainable RVC participation index', 'Intraregional exports of intermediates per unit of CO2 emissions'];
    $result[3]['indicator']= ['Average intraregional rural access to electricity', 'Intraregional sustainable trade facilitation implementation','Average intraregional share of Internet users in population'];
    $result[4]['indicator']= ['Average outward remittances per regional immigrant','Average inward remittances per emigrant'];
    $result[5]['indicator']=['Sustainable regional FTA score', 'Sustainable regional IIA score' , 'Average intraregional rule of law index score', 'SDG trade regulatory distance from regional partners'];
    $result[6]['indicator']=['Average intraregional secure Internet servers','Average intraregional proportion of households with Internet access', 'Average intraregional share of female population with financial institution or mobile money account', 'Average intraregional share of female population that use Internet for online purchase'];
}

echo json_encode($result);
?>