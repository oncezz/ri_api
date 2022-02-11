<?php
require_once('../connection.php');
// $_POST = json_decode(file_get_contents("php://input"),true);
$result['start']= 2012;
$result['end']=2020;
echo json_encode($result);
?>