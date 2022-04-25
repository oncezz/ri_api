<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$integration=$_POST['integration'];         // "sustainable" / "conventional"
//  set $dimensionData
$dimensionData[0]['label']="Trade and investment";
$dimensionData[1]['label']="Financial";
$dimensionData[2]['label']="Regional value chain";
$dimensionData[3]['label']="Infrastructure";
$dimensionData[4]['label']="Movement of peolple";
$dimensionData[5]['label']='Regulatory cooperation';
$dimensionData[6]['label']='Digital economy';

if($integration == 'conventional'){
    $dimensionData[0]['indicator']=['Exports to GDP', 'Imports to GDP', 'Import tarriffs','FDI inflows to GDP', 'FDI outflows to GDP'];
    $dimensionData[1]['indicator']=['Cross-border portfolio liablilities and assests to GDP', 'Deposit rates dispersion','Share price index correlation'];
    $dimensionData[2]['indicator']=['Export complementarity index', 'RVC participation index', 'Intermediate goods exports to GDP', 'Intermediate goods imports to GDP'];
    $dimensionData[3]['indicator']=['Linear shipping connectivity index', 'Trade facilitation implement','Average internet quality','Average trade cost'];
    $dimensionData[4]['indicator']=['Stock of emigrants per capita', 'Stock of immigrants per capita','Remittances outflow to GDP','Remittances inflow to GDP'];
    $dimensionData[5]['indicator']=['Signed FTA (Yes/No)', 'Signed IIA (Yes/No)' , 'Embassy (yes/No)', 'Trade regulatory distance'];
    $dimensionData[6]['indicator']=['ICT goods exports to GDP', 'Signed IIA (Yes/No)' , 'Embassy (yes/No)', 'Trade regulatory distance'];
}
else{
    $dimensionData[0]['indicator']=['Environmental goods exports in GDP of exporting country', 'Environmental goods imports in GDP of importing country', 'Tariff on intraregional imports of environmental goods','Employment created by DVA in exports to regional economies'];
    $dimensionData[1]['indicator']=['Intraregional real exchange rate volatility', 'Average intraregional financial development index score','Volatility weighted pair-wise correlaton of share price index averaged regionally'];
    $dimensionData[2]['indicator']=['Regional environmental good export complementarity index', 'Sustainable RVC participation index', 'Intraregional exports of intermediates per unit of CO2 emissions'];
    $dimensionData[3]['indicator']=['Average intraregional rural access to electricity', 'Intraregional sustainable trade facilitation implementation','Average intraregional share of Internet users in population'];
    $dimensionData[4]['indicator']=['Average outward remittances per regional immigrant','Average inward remittances per emigrant'];
    $dimensionData[5]['indicator']=['Sustainable regional FTA score', 'Sustainable regional IIA score' , 'Average intraregional rule of law index score', 'SDG trade regulatory distance from regional partners'];
    $dimensionData[6]['indicator']=['Average intraregional secure Internet servers','Average intraregional proportion of households with Internet access', 'Average intraregional share of female population with financial institution or mobile money account', 'Average intraregional share of female population that use Internet for online purchase'];
}
echo json_encode($dimensionData);
?>