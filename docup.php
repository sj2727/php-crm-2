<?php 
session_start();
include("panel/globale.php");


if ( isset($_POST) ) {

foreach($_POST as $key => $val){
    if($key!="id"){
    $data[$key] = $val;
    }
}

$res = $db->update("crm_doc",$data," agent_id=".$_POST['id']);
echo json_encode($res);
}

?>