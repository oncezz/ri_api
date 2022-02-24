<?php
require_once('../connection.php');
// $_POST = json_decode(file_get_contents("php://input"),true);
$result['start']= 2010;
$result['end']=2019;
echo json_encode($result);
?>