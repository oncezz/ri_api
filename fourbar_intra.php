<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$economic = $_POST['economic'];
$year = $_POST['year'];
$type = $_POST['type'];

$result[0]['name'] = 'China-Mongolia';
$result[0]['value']= 0.91;
$result[0]['own']= false;

$result[1]['name'] = 'ASEAN';
$result[1]['value']= 0.84;
$result[1]['own']= false;

$result[2]['name'] = 'Your group';
$result[2]['value']= 0.74;
$result[2]['own']= true;

$result[3]['name'] = 'Asia-Pacific';
$result[3]['value']= 0.56;
$result[3]['own']= false;

echo json_encode($result);
?>
