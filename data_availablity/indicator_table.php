<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$report=$_POST['report'];                   // country report
$partner=$_POST['partner'];                 // country partner
$dataBase=$_POST['dataBase'];               // database type  'digi'= DigiSRII  ,  'all'= ALL Data
$compareType=$_POST['compareType'];         // 'group'= Economy group,  'specific'= report, partner ; when compare 'group' report=partner
$disaggregation=$_POST['disaggregation'];   // 'pair'=Pair , 'dimension'=Dimension and indicator
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
//
for($i=0;$i<sizeof($report);$i++){

    $result[$i]['iso']=$report[$i]['iso'];                        
    $result[$i]['label']=$report[$i]['label'];
    for($j=0;$j<sizeof($partner);$j++){
        $result[$i]['partner'][$j]['iso']=$partner[$j]['iso'];
        $result[$i]['partner'][$j]['label']=$partner[$j]['label'];
        for($m=0;$m<sizeof($dimensionData);$m++){
            $result[$i]['partner'][$j]['dimension'][$m]['label']=$dimensionData[$m]['label'];
            for($n=0;$n<sizeof($dimensionData[$m]['indicator']);$n++){
                $result[$i]['partner'][$j]['dimension'][$m]['indicator'][$n]['label']=$dimensionData[$m]['indicator'][$n];
                if($report[$i]['iso']==$partner[$j]['iso']){
                    $result[$i]['partner'][$j]['dimension'][$m]['indicator'][$n]['data']=-99 ;                   // return -  mean same country
                }
                else{
                    $result[$i]['partner'][$j]['dimension'][$m]['indicator'][$n]['data']= rand(40,120) ;
                    if($result[$i]['partner'][$j]['dimension'][$m]['indicator'][$n]['data']>115){
                        $result[$i]['partner'][$j]['dimension'][$m]['indicator'][$n]['data']=0;                  // return  0 = No Data
                    }
                    else if($result[$i]['partner'][$j]['dimension'][$m]['indicator'][$n]['data']>100){
                        $result[$i]['partner'][$j]['dimension'][$m]['indicator'][$n]['data']=100;
                    }
                }
            }
        }
    }
}

echo json_encode($result);
?>