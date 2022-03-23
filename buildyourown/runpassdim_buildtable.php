<?php
require_once('../connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$type = "con";

if($type == "con"){
    $tableName = "ri_build_con";
} else {
    $tableName = "ri_build_sus";
}
$indexTable= $db->select("ri_dim_index",[
    "dim","num_ind","pass"
],[
    "type"=>$type
]);
$table=$db->select($tableName,"*");
//// run part length 10k 
$st=0;
$fi=10000;
for($i=$st;$i<$fi;$i++){
    $id=$table[$i]['id'];
    if($table[$i]['num_ind']>=$indexTable[$table[$i]['dim']-1]['pass']){
        $db->update($tableName,[
            "pass"=>1
        ],[
            "id"=>$id
        ]);
    }
}

?>