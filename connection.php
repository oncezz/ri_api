<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header('Content-type: application/x-www-form-urlencoded');
header('Content-type: application/json');


date_default_timezone_set("Asia/Bangkok");

require("Medoo.php");
 
// Using Medoo namespace
use Medoo\Medoo;
 


$db = new Medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'hotel',
	'server' => 'localhost',
	'port'=>3306,
	'username' => 'root',
	'password' => '12345678',
	"charset" => "utf8",
]);

// $db = new Medoo([
// 	// required
// 	'database_type' => 'mysql',
// 	'database_name' => 'unescap',
// 	'server' => 'localhost',
// 	'port'=>3306,
// 	'username' => 'admin_unescap',
// 	'password' => '@Chomart12',
// 	"charset" => "utf8",
// ]);


?>