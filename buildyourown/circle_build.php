<?php
function returnMap($v)
{
    $str="";
    $str=$str . "(";
    for($i=0;$i<sizeof($v);$i++){
        $str=$str . "'" . $v[$i] . "'";
    if($i!=sizeof($v)-1){
        $str=$str . ",";
    }
  }
  $str=$str .")";
  return $str;
}
function returnNum($v)
{
    $str="";
    $str=$str . "(";
    for($i=0;$i<sizeof($v);$i++){
        $str=$str . $v[$i] ;
    if($i!=sizeof($v)-1){
        $str=$str . ",";
    }
  }
  $str=$str .")";
  return $str;
}
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$partner = $_POST['partner'];
$reporting=$_POST['reporting'];
$type = $_POST['type'];
$dimension=$_POST['dimension'];

if($type == "Conventional"){
    $table = "ri_build_con";
} else {
    $table = "ri_build_sus";
}

$sql="SELECT `reporting`,`partner`,COUNT('dim') AS dimall FROM " . $table . "  WHERE `reporting` IN ". returnMap($reporting) . " AND `partner` IN " . returnMap($partner) . " AND `dim` IN " . returnNum($dimension) . " GROUP BY reporting,partner";
$cloneTable = $db->query($sql)->fetchAll();
// $cloneTable = $db->debug()->select($table,[
//     "reporting","partner","dim"
// ],[
//     "reporting"=>$reporting,
//     "partner"=>$partner,
//     "dim"=>$dimension
// ]);
// print_r($cloneTable);
echo json_encode($cloneTable);
?>